<?php
return [
	'loader' => [
		'title' => 'Pour commencer',
		'file_select' => 'Sélectionnez le fichier ROM',
		'content' => '<ol>'
				. '<li>Sélectionnez votre fichier rom et chargez-le dans le navigateur (utilisez une ROM <strong>Zelda no Densetsu: Kamigami no Triforce v1.0</strong> avec une extension .smc ou .sfc)</li>'
				. '<li>Sélectionnez les <a href="/fr/options">' . __('navigation.options') . '</a> de jeu pour déterminer de quelle façon le jeu sera randomisé</li>'
				. '<li>Cliquez sur ' . __('randomizer.generate.casual') . '</li>'
				. '<li>Ensuite, sauvegardez votre rom et commencez à jouer</li>'
			. '</ol>',
	],
];
