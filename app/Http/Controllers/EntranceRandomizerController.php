<?php namespace ALttP\Http\Controllers;

use ALttP\Enemizer;
use ALttP\EntranceRandomizer;
use ALttP\Rom;
use Illuminate\Http\Request;

class EntranceRandomizerController extends Controller {
	public function generateSeed(Request $request, $seed_id = null) {
		$payload = $this->prepSeed($request, $seed_id, true);
		$save_data = json_encode(array_except($payload, ['current_rom_hash']));
		//Storage::put($payload['hash'] . '.json', $save_data);
		cache(['hash.' . $payload['hash'] => $save_data], now()->addDays(7));
		return json_encode($payload);
	}

	public function generateSpoiler(Request $request, $seed_id) {
		return json_encode($this->prepSeed($request, $seed_id)['spoiler']);
	}

	public function testGenerateSeed(Request $request, $seed_id = null) {
		return json_encode(array_except($this->prepSeed($request, $seed_id), ['patch']));
	}

	protected function prepSeed(Request $request, $seed_id = null, $save = false) {
		$difficulty = $request->input('difficulty', 'normal') ?: 'normal';
		$variation = $request->input('variation', 'none') ?: 'none';
		$goal = $request->input('goal', 'ganon') ?: 'ganon';
		$shuffle = $request->input('shuffle', 'full') ?: 'full';
		$enemizer = $request->input('enemizer', false);
		if ($enemizer && $enemizer['bosses']) {
			config(['alttp.boss_shuffle' => $enemizer['bosses']]);
		}

		config(['alttp.mode.state' => $request->input('mode', 'standard')]);

		$rom = new Rom(env('ENEMIZER_BASE', null));
		$rom->applyPatchFile(public_path('js/base2current.json'));
		if ($request->filled('heart_speed')) {
			$rom->setHeartBeepSpeed($request->input('heart_speed'));
		}
		if ($request->filled('menu_speed')) {
			$rom->setMenuSpeed($request->input('menu_speed', 'normal'));
		}
		if ($request->filled('debug')) {
			$rom->setDebugMode($request->input('debug') == 'true');
		}

		$seed_id = is_numeric($seed_id) ? $seed_id : abs(crc32($seed_id));

		try {
			$rand = new EntranceRandomizer($difficulty, 'noglitches', $goal, $variation, $shuffle);
			$rand->makeSeed($seed_id);
			$rand->writeToRom($rom);
			$patch = $rom->getWriteLog();
			$spoiler = $rand->getSpoiler();
			$hash = ($save) ? $rand->saveSeedRecord() : $spoiler->meta->seed;
		} catch (Exception $e) {
			report($e);
			return response('Failed', 409);
		}

		if ($enemizer) {
			$en = new Enemizer($rand, $patch, array_merge($enemizer, ['native_boss_shuffle' => true]));
			$en->makeSeed();
			$en->writeToRom($rom);
			$patch = $rom->getWriteLog();
		}

		if ($request->filled('tournament') && $request->input('tournament') == 'true') {
			$rom->setSeedString(str_pad(sprintf("ER TOURNEY %s", $hash), 21, ' '));
			$patch = $rom->getWriteLog();
			if ($request->input('spoilers', false)) {
				$spoiler = array_except($spoiler, ['playthrough']);
			} else {
				$spoiler = array_except(array_only($spoiler, ['meta']), ['meta.seed']);
			}
		}

		if ($save) {
			$rom->setStartScreenHash($rand->getSeedRecord()->hashArray());
			$patch = patch_merge_minify($rom->getWriteLog());
			$rand->updateSeedRecordPatch($patch);
		}

		return [
			'logic' => $rand->getLogic(),
			'difficulty' => $difficulty,
			'patch' => patch_merge_minify($patch),
			'spoiler' => $spoiler,
			'hash' => $hash,
			'size' => $enemizer ? 4 : 2,
			'current_rom_hash' => Rom::HASH,
		];
	}
}
