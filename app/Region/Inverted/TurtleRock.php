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
	protected function enterTop() {
		// @TODO: implement
	}

	protected function enterMiddle() {
		// @TODO: implement
	}

	protected function enterBottom() {
		// @TODO: implement
	}

	/**
	 * Initalize the requirements for Entry and Completetion of the Region as well as access to all Locations contained
	 * within for No Glitches
	 *
	 * @return $this
	 */
	public function initNoGlitches() {
		// @TODO: implement

		return $this;
	}
}
