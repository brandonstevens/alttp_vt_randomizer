<?php namespace ALttP\Region\Inverted;

use ALttP\Boss;
use ALttP\Item;
use ALttP\Location;
use ALttP\Region;
use ALttP\Support\LocationCollection;
use ALttP\World;

/**
 * Turtle Rock Region and it's Locations contained within
 */
class TurtleRock extends Region\Standard\TurtleRock {
	protected function enterTop($locations, $items) {
		return ((($locations["Turtle Rock Medallion"]->hasItem(Item::get('Bombos')) && $items->has('Bombos'))
					|| ($locations["Turtle Rock Medallion"]->hasItem(Item::get('Ether')) && $items->has('Ether'))
					|| ($locations["Turtle Rock Medallion"]->hasItem(Item::get('Quake')) && $items->has('Quake')))
				&& ($this->world->config('mode.weapons') == 'swordless' || $items->hasSword()))
			&& $items->has('CaneOfSomaria')
			&& $this->world->getRegion('East Death Mountain')->canEnter($locations, $items);
	}

	protected function enterMiddle($locations, $items) {
		// @TODO: implement
	}

	protected function enterBottom($locations, $items) {
		// @TODO: implement
	}

	/**
	 * Initalize the requirements for Entry and Completetion of the Region as well as access to all Locations contained
	 * within for No Glitches
	 *
	 * @return $this
	 */
	public function initNoGlitches() {
		$this->can_enter = function($locations, $items) {
			return $this->enterTop($locations, $items)
				|| $this->enterMiddle($locations, $items)
				|| $this->enterBottom($locations, $items);
		};

		return $this;
	}
}
