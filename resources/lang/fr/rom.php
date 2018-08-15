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
	'info' => [
		'logic' => __('randomizer.logic.title'),
		'build' => 'Création de ROM',
		'difficulty' => __('randomizer.difficulty.title'),
		'variation' => __('randomizer.variation.title'),
		'shuffle' => __('entrance.shuffle.title'),
		'mode' => __('randomizer.mode.title'),
		'weapons' => __('randomizer.weapons.title'),
		'goal' => __('randomizer.goal.title'),
		'permalink' => 'Lien permanent',
		'special' => 'Spécial',
		'notes' => 'Remarques',
		'generated' => 'Créé',
	],
	'settings' => [
		'title' => 'Options de ROM supplémentaires',
		'heart_speed' => 'Vitesse cardiaque',
		'heart_speeds' => [
			'off' => 'Éteindre',
			'double' => 'Double vitesse',
			'normal' => 'Vitesse normale',
			'half' => 'Demi vitesse',
			'quarter' => 'Quart de vitesse',
		],
		'menu_speed' => 'Vitesse du menu',
		'menu_speeds' => [
			'instant' => 'Immédiatement',
			'fast' => 'Vite',
			'normal' => 'Ordinaire',
			'slow' => 'Lent',
		],
		'heart_color' => 'Couleur de coeur',
		'heart_colors' => [
			'blue' => 'Bleu',
			'green' => 'Vert',
			'red' => 'Rouge',
			'yellow' => 'Jaune',
		],
		'play_as' => 'Jouer comme',
		'music' => 'Musique de fond (définie sur "Non" pour le support MSU-1)',
		'quickswap' => 'Échange rapide d’article',
		'race_warning' => 'Ne fonctionne pas dans les Roms de course',
	],
];
