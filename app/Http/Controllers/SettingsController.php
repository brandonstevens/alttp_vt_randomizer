<?php namespace ALttP\Http\Controllers;

use ALttP\Item;
use ALttP\Location;
use ALttP\Randomizer;
use ALttP\Rom;
use ALttP\Sprite;
use ALttP\Support\ItemCollection;
use ALttP\World;
use Cache;
use Illuminate\Http\Request;

class SettingsController extends Controller {
	protected $items = [
		'Bow' => 1,
		'BookOfMudora' => 1,
		'Hammer' => 1,
		'Hookshot' => 1,
		'MagicMirror' => 1,
		'OcarinaInactive' => 1,
		'PegasusBoots' => 1,
		'Cape' => 1,
		'Mushroom' => 1,
		'Shovel' => 1,
		'Lamp' => 1,
		'Powder' => 1,
		'MoonPearl' => 1,
		'CaneOfSomaria' => 1,
		'FireRod' => 1,
		'Flippers' => 1,
		'IceRod' => 1,
		'Ether' => 1,
		'Bombos' => 1,
		'Quake' => 1,
		'SilverArrowUpgrade' => 1,
		'Arrow' => 1,
		'TenArrows' => 5,
		'ArrowUpgrade10' => 1,
		'ArrowUpgrade5' => 6,
		'ThreeBombs' => 9,
		'TenBombs' => 1,
		'BombUpgrade10' => 1,
		'BombUpgrade5' => 6,
		'Boomerang' => 1,
		'RedBoomerang' => 1,
		'BossHeartContainer' => 10,
		'BugCatchingNet' => 1,
		'HeartContainer' => 1,
		'PieceOfHeart' => 24,
		'CaneOfByrna' => 1,
		'OneRupee' => 2,
		'FiveRupees' => 4,
		'TwentyRupees' => 28,
		'FiftyRupees' => 7,
		'OneHundredRupees' => 1,
		'ThreeHundredRupees' => 5,
		'HalfMagic' => 1,
		'MapA2' => 1,
		'MapD7' => 1,
		'MapD4' => 1,
		'MapP3' => 1,
		'MapD5' => 1,
		'MapD3' => 1,
		'MapD6' => 1,
		'MapD1' => 1,
		'MapD2' => 1,
		'MapP2' => 1,
		'MapP1' => 1,
		'MapH2' => 1,
		'CompassA2' => 1,
		'CompassD7' => 1,
		'CompassD4' => 1,
		'CompassP3' => 1,
		'CompassD5' => 1,
		'CompassD3' => 1,
		'CompassD6' => 1,
		'CompassD1' => 1,
		'CompassD2' => 1,
		'CompassP2' => 1,
		'CompassP1' => 1,
		'BigKeyA2' => 1,
		'BigKeyD7' => 1,
		'BigKeyD4' => 1,
		'BigKeyP3' => 1,
		'BigKeyD5' => 1,
		'BigKeyD3' => 1,
		'BigKeyD6' => 1,
		'BigKeyD1' => 1,
		'BigKeyD2' => 1,
		'BigKeyP2' => 1,
		'BigKeyP1' => 1,
		'KeyH2' => 1,
		'KeyP2' => 1,
		'KeyA1' => 2,
		'KeyD2' => 1,
		'KeyD1' => 6,
		'KeyD6' => 3,
		'KeyD3' => 3,
		'KeyD5' => 2,
		'KeyP3' => 1,
		'KeyD4' => 1,
		'KeyD7' => 4,
		'KeyA2' => 4,
		'ProgressiveShield' => 3,
		'ProgressiveGlove' => 2,
		'ProgressiveSword' => 4,
		'ProgressiveArmor' => 2,
	];
	protected $drops = [
		'ArrowRefill10' => 3,
		'ArrowRefill5' => 5,
		'Bee' => 0,
		'BeeGood' => 0,
		'BombRefill1' => 7,
		'BombRefill4' => 1,
		'BombRefill8' => 2,
		'Fairy' => 1,
		'Heart' => 13,
		'MagicRefillFull' => 3,
		'MagicRefillSmall' => 6,
		'RupeeBlue' => 7,
		'RupeeGreen' => 9,
		'RupeeRed' => 6,
	];

	public function item(Request $request) {
		return config('alttp.randomizer.item');
	}

	public function entrance(Request $request) {
		return config('alttp.randomizer.entrance');
	}

	public function customizer(Request $request) {
		//return Cache::rememberForever('customizer_settings', function() {
			$world = World::factory();
			$items = Item::all();
			$sprites = Sprite::all();
			return [
				'locations' => array_values($world->getLocations()->filter(function($location) {
					return !$location instanceof Location\Prize\Event
						&& !$location instanceof Location\Trade;
				})->map(function($location) {
					return [
						'hash' => base64_encode($location->getName()),
						'name' => $location->getName(),
						'region' => $location->getRegion()->getName(),
						'class' => $location instanceof Location\Fountain ? 'bottles'
							: ($location instanceof Location\Medallion ? 'medallions'
							: ($location instanceof Location\Prize ? 'prizes' : 'items')),
					];
				})),
				'prizepacks' => array_values(array_map(function($pack) {
					return [
						'name' => $pack->getName(),
						'slots' => count($pack->getDrops()),
					];
				}, $world->getPrizePacks())),
				'items' => array_merge([
						['value' => 'auto_fill', 'name' => 'Random', 'placed' => 0],
						['value' => 'BottleWithRandom', 'name' => 'Bottle (Random)', 'count' => 4, 'placed' => 0],
					],
					$items->filter(function($item) {
					return !$item instanceof Item\Pendant
						&& !$item instanceof Item\Crystal
						&& !$item instanceof Item\Event
						&& !$item instanceof Item\Programmable
						&& !$item instanceof Item\BottleContents
						&& !in_array($item->getName(), [
							'BigKey',
							'Compass',
							'Key',
							'L2Sword',
							'Map',
							'multiRNG',
							'PowerStar',
							'singleRNG',
							'TwentyRupees2',
							'HeartContainerNoAnimation',
							'UncleSword',
						])
						|| $item == Item::get('Triforce');
					})->map(function($item) {
						return [
							'value' => $item->getName(),
							'name' => $item->getNiceName(),
							'count' => $this->items[$item->getName()] ?? 0,
							'placed' => 0,
						];
					})
				),
				'prizes' => array_merge([
						['value' => 'auto_fill', 'name' => 'Random', 'placed' => 0],
					],
					$items->filter(function($item) {
						return $item instanceof Item\Pendant
							|| $item instanceof Item\Crystal;
					})->map(function($item) {
						return [
							'value' => $item->getName(),
							'name' => $item->getNiceName(),
							'count' => 0,
							'placed' => 0,
						];
					})
				),
				'medallions' => array_merge([
						['value' => 'auto_fill', 'name' => 'Random', 'placed' => 0],
					], $items->filter(function($item) {
						return $item instanceof Item\Medallion;
					})->map(function($item) {
						return [
							'value' => $item->getName(),
							'name' => $item->getNiceName(),
							'count' => 0,
							'placed' => 0,
						];
					})
				),
				'bottles' => array_merge([
						['value' => 'auto_fill', 'name' => 'Random', 'placed' => 0],
					], $items->filter(function($item) {
						return $item instanceof Item\Bottle;
					})->map(function($item) {
						return [
							'value' => $item->getName(),
							'name' => $item->getNiceName(),
							'count' => 0,
							'placed' => 0,
						];
					})
				),
				'droppables' => array_merge([
						['value' => 'auto_fill', 'name' => 'Random', 'placed' => 0],
					], array_values($sprites->filter(function($sprite) {
						return $sprite instanceof Sprite\Droppable;
					})->map(function($item) {
						return [
							'value' => $item->getName(),
							'name' => $item->getNiceName(),
							'count' => $this->drops[$item->getName()] ?? 0,
							'placed' => 0,
						];
					})
				)),
			];
		//});
	}

	public function rom(Request $request) {
		return [
			'rom_hash' => Rom::HASH,
			'base_file' => mix('js/base2current.json')->toHtml(),
		];
	}

	public function sprites(Request $request) {
		$sprites =  [];
		foreach (config('sprites') as $file => $info) {
			$sprites[] = [
				'name' => $info['name'],
				'author' => $info['author'],
				'file' => 'https://08b3693090b88cc23068-781cc7889ba8761758717cf14b1800b4.ssl.cf2.rackcdn.com/' . $file,
			];
		}
		return $sprites;
	}
}
