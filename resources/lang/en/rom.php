<?php
return [
	'loader' => [
		'title' => 'Getting Started',
		'file_select' => 'Select ROM File',
		'content' => '<ol>'
				. '<li>Select your rom file and load it into the browser (Please use a <strong>Zelda no Densetsu: Kamigami no Triforce v1.0</strong> ROM with an .smc or .sfc extension)</li>'
				. '<li>Select the <a href="/en/options">' . __('navigation.options') . '</a> for how you would like your game randomized</li>'
				. '<li>Click ' . __('randomizer.generate.casual') . '</li>'
				. '<li>Then Save your rom and get to playing</li>'
			. '</ol>',
	],
];
