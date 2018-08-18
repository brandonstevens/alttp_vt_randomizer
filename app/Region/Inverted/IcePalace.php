<?php namespace ALttP\Region\Inverted;

use ALttP\Boss;
use ALttP\Item;
use ALttP\Location;
use ALttP\Region;
use ALttP\Support\LocationCollection;
use ALttP\World;

/**
 * Ice Palace Region and it's Locations contained within
 */
class IcePalace extends Region\Standard\IcePalace {
	/**
	 * Initalize the requirements for Entry and Completetion of the Region as well as access to all Locations contained
	 * within for No Glitches
	 *
	 * @return $this
	 */
	public function initNoGlitches() {
		parent::initNoGlitches();

		$this->can_enter = function($locations, $items) {
			return ($this->world->config('canFakeFlipper', false) || $items->has('Flippers'))
				&& $items->canMeltThings()
				&& $this->world->getRegion('South Dark World')->canEnter($locations, $items);
		};

		return $this;
	}
}
