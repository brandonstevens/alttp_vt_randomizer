<?php namespace Inverted;

use ALttP\Item;
use ALttP\World;
use TestCase;

/**
 * @group Inverted
 */
class ThievesTownTest extends TestCase {
	public function setUp() {
		parent::setUp();
		$this->world = World::factory('inverted', 'test_rules', 'NoGlitches');
	}

	public function tearDown() {
		parent::tearDown();
		unset($this->world);
	}

	/**
	 * @param string $location
	 * @param bool $access
	 * @param array $items
	 * @param array $except
	 *
	 * @dataProvider accessPool
	 */
	public function testLocation(string $location, bool $access, array $items, array $except = []) {
		if (count($except)) {
			$this->collected = $this->allItemsExcept($except);
		}

		$this->addCollected($items);

		$this->assertEquals($access, $this->world->getLocation($location)
			->canAccess($this->collected));
	}

	/**
	 * @param string $location
	 * @param bool $access
	 * @param string $item
	 * @param array $items
	 * @param array $except
	 * @param array $keys
	 * @param string $big_key
	 *
	 * @dataProvider fillPool
	 */
	public function testFillLocation(string $location, bool $access, string $item, array $items = [], array $except = []) {
		if (count($except)) {
			$this->collected = $this->allItemsExcept($except);
		}

		$this->addCollected($items);

		$this->assertEquals($access, $this->world->getLocation($location)
			->fill(Item::get($item), $this->collected));
	}



	public function fillPool() {
		return [
			["Thieves' Town - Attic", false, 'BigKeyD4', [], ['BigKeyD4']],
			["Thieves' Town - Attic", false, 'KeyD4', [], ['KeyD4']],

			["Thieves' Town - Big Key Chest", true, 'BigKeyD4', [], ['BigKeyD4']],

			["Thieves' Town - Map Chest", true, 'BigKeyD4', [], ['BigKeyD4']],

			["Thieves' Town - Compass Chest", true, 'BigKeyD4', [], ['BigKeyD4']],

			["Thieves' Town - Ambush Chest", true, 'BigKeyD4', [], ['BigKeyD4']],

			["Thieves' Town - Big Chest", false, 'BigKeyD4', [], ['BigKeyD4']],
			["Thieves' Town - Big Chest", true, 'KeyD4', [], ['KeyD4']],

			["Thieves' Town - Blind's Cell", false, 'BigKeyD4', [], ['BigKeyD4']],

			["Thieves' Town - Blind", false, 'BigKeyD4', [], ['BigKeyD4']],
			["Thieves' Town - Blind", false, 'KeyD4', [], ['KeyD4']],
		];
	}

	public function accessPool() {
		return [
			["Thieves' Town - Attic", false, []],
			["Thieves' Town - Attic", false, [], ['BigKeyD4']],
			["Thieves' Town - Attic", true, ['TitansMitt', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Attic", true, ['ProgressiveGlove', 'ProgressiveGlove', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Attic", true, ['ProgressiveGlove', 'Hammer', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Attic", true, ['PowerGlove', 'Hammer', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Attic", true, ['DefeatAgahnim', 'Hammer', 'Hookshot', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Attic", true, ['DefeatAgahnim', 'ProgressiveGlove', 'Hookshot', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Attic", true, ['DefeatAgahnim', 'PowerGlove', 'Hookshot', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Attic", true, ['DefeatAgahnim', 'Flippers', 'Hookshot', 'KeyD4', 'BigKeyD4']],

			["Thieves' Town - Big Key Chest", true, []],

			["Thieves' Town - Map Chest", true, []],

			["Thieves' Town - Compass Chest", true, []],

			["Thieves' Town - Ambush Chest", true, []],

			["Thieves' Town - Big Chest", false, []],
			["Thieves' Town - Big Chest", false, [], ['BigKeyD4']],
			["Thieves' Town - Big Chest", true, ['ProgressiveGlove', 'Hammer', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Big Chest", true, ['TitansMitt', 'Hammer', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Big Chest", true, ['PowerGlove', 'Hammer', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Big Chest", true, ['DefeatAgahnim', 'Hammer', 'Hookshot', 'KeyD4', 'BigKeyD4']],
			["Thieves' Town - Big Chest", true, ['DefeatAgahnim', 'Flippers', 'Hammer', 'Hookshot', 'KeyD4', 'BigKeyD4']],

			["Thieves' Town - Blind's Cell", false, []],
			["Thieves' Town - Blind's Cell", false, [], ['BigKeyD4']],
			["Thieves' Town - Blind's Cell", true, ['TitansMitt', 'BigKeyD4']],
			["Thieves' Town - Blind's Cell", true, ['ProgressiveGlove', 'ProgressiveGlove', 'BigKeyD4']],
			["Thieves' Town - Blind's Cell", true, ['ProgressiveGlove', 'Hammer', 'BigKeyD4']],
			["Thieves' Town - Blind's Cell", true, ['PowerGlove', 'Hammer', 'BigKeyD4']],
			["Thieves' Town - Blind's Cell", true, ['DefeatAgahnim', 'Hammer', 'Hookshot', 'BigKeyD4']],
			["Thieves' Town - Blind's Cell", true, ['DefeatAgahnim', 'ProgressiveGlove', 'Hookshot', 'BigKeyD4']],
			["Thieves' Town - Blind's Cell", true, ['DefeatAgahnim', 'PowerGlove', 'Hookshot', 'BigKeyD4']],
			["Thieves' Town - Blind's Cell", true, ['DefeatAgahnim', 'Flippers', 'Hookshot', 'BigKeyD4']],

			["Thieves' Town - Blind", false, []],
			["Thieves' Town - Blind", false, [], ['BigKeyD4']],
			["Thieves' Town - Blind", true, ['KeyD4', 'PowerGlove', 'Hammer', 'BigKeyD4']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'Hammer', 'Hookshot', 'BigKeyD4']],
			["Thieves' Town - Blind", true, ['KeyD4', 'ProgressiveGlove', 'Hammer', 'BigKeyD4']],
			["Thieves' Town - Blind", true, ['KeyD4', 'TitansMitt', 'BigKeyD4', 'ProgressiveSword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'TitansMitt', 'BigKeyD4', 'L1Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'TitansMitt', 'BigKeyD4', 'MasterSword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'TitansMitt', 'BigKeyD4', 'L3Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'TitansMitt', 'BigKeyD4', 'L4Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'TitansMitt', 'BigKeyD4', 'CaneOfByrna']],
			["Thieves' Town - Blind", true, ['KeyD4', 'TitansMitt', 'BigKeyD4', 'CaneOfSomaria']],
			["Thieves' Town - Blind", true, ['KeyD4', 'TitansMitt', 'BigKeyD4', 'Hammer']],
			["Thieves' Town - Blind", true, ['KeyD4', 'ProgressiveGlove', 'ProgressiveGlove', 'BigKeyD4', 'ProgressiveSword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'ProgressiveGlove', 'ProgressiveGlove', 'BigKeyD4', 'L1Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'ProgressiveGlove', 'ProgressiveGlove', 'BigKeyD4', 'MasterSword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'ProgressiveGlove', 'ProgressiveGlove', 'BigKeyD4', 'L3Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'ProgressiveGlove', 'ProgressiveGlove', 'BigKeyD4', 'L4Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'ProgressiveGlove', 'ProgressiveGlove', 'BigKeyD4', 'CaneOfByrna']],
			["Thieves' Town - Blind", true, ['KeyD4', 'ProgressiveGlove', 'ProgressiveGlove', 'BigKeyD4', 'CaneOfSomaria']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'ProgressiveGlove', 'Hookshot', 'BigKeyD4', 'ProgressiveSword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'ProgressiveGlove', 'Hookshot', 'BigKeyD4', 'L1Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'ProgressiveGlove', 'Hookshot', 'BigKeyD4', 'MasterSword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'ProgressiveGlove', 'Hookshot', 'BigKeyD4', 'L3Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'ProgressiveGlove', 'Hookshot', 'BigKeyD4', 'L4Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'ProgressiveGlove', 'Hookshot', 'BigKeyD4', 'CaneOfByrna']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'ProgressiveGlove', 'Hookshot', 'BigKeyD4', 'CaneOfSomaria']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'PowerGlove', 'Hookshot', 'BigKeyD4', 'ProgressiveSword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'PowerGlove', 'Hookshot', 'BigKeyD4', 'L1Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'PowerGlove', 'Hookshot', 'BigKeyD4', 'MasterSword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'PowerGlove', 'Hookshot', 'BigKeyD4', 'L3Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'PowerGlove', 'Hookshot', 'BigKeyD4', 'L4Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'PowerGlove', 'Hookshot', 'BigKeyD4', 'CaneOfByrna']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'PowerGlove', 'Hookshot', 'BigKeyD4', 'CaneOfSomaria']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'Flippers', 'Hookshot', 'BigKeyD4', 'ProgressiveSword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'Flippers', 'Hookshot', 'BigKeyD4', 'L1Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'Flippers', 'Hookshot', 'BigKeyD4', 'MasterSword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'Flippers', 'Hookshot', 'BigKeyD4', 'L3Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'Flippers', 'Hookshot', 'BigKeyD4', 'L4Sword']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'Flippers', 'Hookshot', 'BigKeyD4', 'CaneOfByrna']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'Flippers', 'Hookshot', 'BigKeyD4', 'CaneOfSomaria']],
			["Thieves' Town - Blind", true, ['KeyD4', 'DefeatAgahnim', 'Flippers', 'Hookshot', 'BigKeyD4', 'Hammer']],
		];
	}
}
