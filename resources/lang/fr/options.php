<?php
return [
	'header' => 'Options',
	'subheader' => 'Il y a plusieurs façons de jouer à ALttP: Randomizer!',
	'cards' => [
		'mode' => [
			'header' => __('randomizer.mode.title'),
			'sections' => [
				[
					'header' => __('randomizer.mode.options.standard'),
					'content' => [
						'Ce mode est le plus proche du jeu original. Vous allez commencer dans le lit de Link, obtenir une arme de l’oncle (selon l’option de vos épées, voir ci-dessous), et sauver Zelda avant de continuer avec le reste de la partie.',
					],
				],
				[
					'header' => __('randomizer.mode.options.open'),
					'content' => [
						'Ce mode commence par l’option de démarrer dans votre maison ou le sanctuaire, et vous êtes libre d’explorer. Il y a quelques points à noter dans ce mode:',
						'<ul>'
							. '<li>Oncle est déjà dans les égouts et a un objet.</li>'
							. '<li>Les pièces sombres ne reçoivent pas de cône de lumière libre, pas même les égouts.</li>'
						. '</ul>',
					],
				],
			],
		],
		'weapons' => [
			'header' => __('randomizer.weapons.title'),
			'sections' => [
				[
					'header' => __('randomizer.weapons.options.randomized'),
					'content' => [
						'Toutes les améliorations de l’épée sont randomisées. Vous ne commencerez pas avec une épée, et cela pourrait prendre un certain temps avant que vous en trouviez un. Les bombes sont une arme précieuse, tout comme les buissons et les signes! Utilisez les objets que vous trouvez pour vous défendre.',
						'Si cette option est combinée avec ' . __('randomizer.mode.options.standard') . ' ' . __('randomizer.mode.title') .' (voir ci-dessus), votre oncle vous donnera gracieusement l’un des éléments suivants pour vous permettre de terminer la séquence d’échappement:',
						'<ul>'
							. '<li>Mise à jour de l’épée (oui, c’est toujours possible)</li>'
							. '<li>Marteau</li>'
							. '<li>Recharge arc + flèche complète</li>'
							. '<li>Recharge Complète De Bombe</li>'
							. '<li>Fire Rod + Recharge Magique Complète</li>'
							. '<li>Cane of Somaria + Recharge Magique Complète</li>'
							. '<li>Cane of Byrna + Recharge Magique Complète</li>'
						. '</ul>',
					],
				],
				[
					'header' => __('randomizer.weapons.options.uncle'),
					'content' => [
						'Oncle a toujours une épée. Les mises à niveau restantes sont randomisées.',
					],
				],
				[
					'header' => __('randomizer.weapons.options.swordless'),
					'content' => [
						'Toutes les épées sont retirées du jeu. Comme le jeu attend de vous que vous ayez une épée, les changements suivants ne sont présents qu’en mode sans épée:',
						'<ul>'
							. '<li>Les épées ont été remplacées par quatre copies de 20 roupies (un sprite en roupie verte avec “20” dessus).</li>'
							. '<li>La barrière bloquant l’accès à la tour d’Agahnim peut être brisée avec le marteau.</li>'
							. '<li>Les rideaux qui bloquent la progression dans la tour d’Agahnim sont pré-ouverts, tout comme les vignes de Skull Woods.</li>'
							. '<li>Les médaillons ne peuvent être utilisés que pour ouvrir Misery Mire ou Turtle Rock, ou pour progresser dans Ice Palace. Normalement, ils nécessitent une épée à utiliser.</li>'
							. '<li>Ganon subit maintenant les dégâts du marteau.</li>'
							. '<li>Les flèches d’argent sont disponibles dans toutes les difficultés.</li>'
							. '<li>Les tablettes Ether et Bombos nécessitent le marteau et le livre de Mudora.</li>'
						. '</ul>',
					],
				],
			],
		],
		'logic' => [
			'header' => __('randomizer.logic.title'),
			'sections' => [
				[
					'header' => __('randomizer.logic.options.NoMajorGlitches'),
					'content' => [
						'Cette logique ne nécessite aucune connaissance avancée du jeu. Il est conçu comme si vous jouiez au jeu original pour la première fois.',
						'Sous ce mode, vous ne pouvez rester bloqué où que vous soyez, quelle que soit la manière dont vous utilisez les petites clés dans les donjons.',
						'Vous devrez peut-être sauver et arrêter dans certaines situations, comme retourner dans le monde de la lumière lorsque vous êtes dans le monde sombre sans miroir.',
					],
				],
				[
					'header' => __('randomizer.logic.options.OverworldGlitches'),
					'content' => [
						'Ce mode <span class="running-now">nécessite</span> certains des problèmes les plus faciles à exécuter. C’est plus difficile que de simplement utiliser de fausses palmes pour visiter le hobo! Les deux types de problèmes majeurs sont nécessaires:',
						'<ul>'
							. '<li>Coupure de bottes Overworld</li>'
							. '<li>Coupure de miroir (DMD, TR Middle Clip et Fluteless Mire)</li>'
						. '</ul>',
						'La plupart des petits Glitches sont également pris en compte:',
						'<ul>'
							. '<li>Fake Flippers (permet d’accéder au palais de glace, au roi Zora, au cœur du lac Hylia et au hobo sans palmes)</li>'
							. '<li>Dungeon Bunny Revival (permet l’accès au palais de glace sans la perle de lune)</li>'
							. '<li>Overworld Bunny Revival (permet d’accéder à Misery Mire et Misery Mire perdus sans la Moon Pearl et sans faire de DMD)</li>'
							. '<li>Super Bunny (permet l’accès à deux coffres dans Dark World Death Mountain sans la perle de lune)</li>'
							. '<li>Surfing Bunny (Permet l’accès au lac Hylia Heart Piece sans la perle de lune)</li>'
							. '<li>Walk on Water (permet d’accéder à la pièce cœur de lorgnette de Zora sans les palmes)</li>'
						. '</ul>',
						'Les éléments suivants ne sont PAS pris en compte par la logique, de sorte que vous ne serez jamais obligé d’en faire:',
						'<ul>'
							. '<li>Bootless Clips</li>'
							. '<li>Mirror Screenwraps</li>'
							. '<li>Overworld YBAs</li>'
							. '<li>Underworld Clips</li>'
							. '<li>Dark Room Navigation</li>'
							. '<li>Hovering</li>'
						. '</ul>',
					],
				],
				[
					'header' => __('randomizer.logic.options.MajorGlitches'),
					'content' => [
						'Ce mode représente tout sauf EG et semi-EG. Ce mode est extrêmement difficile et nécessite une connaissance approfondie des principaux problèmes, notamment:',
						'<ul>'
							. '<li>Overworld YBA</li>'
							. '<li>Clipping out of bounds</li>'
							. '<li>Screenwraps</li>'
						. '</ul>',
						'Des modifications supplémentaires ont été apportées afin d’assurer que le jeu fonctionne correctement dans cette logique:',
						'<ul>'
							. '<li>Le faux monde sombre n’est plus corrigé. Les cristaux tombent toujours, indépendamment des conflits pendants.</li>'
							. '<li>Les niveaux d’eau du palais des marais ne s’écoulent pas lorsque vous quittez l’écran de la planète supérieure, à l’exception de la première pièce.</li>'
							. '<li>Vous aurez toujours sauvegarder et quitter la pyramide après avoir vaincu Agahnim dans le monde des ténèbres.</li>'
						. '</ul>',
					],
				],
				[
					'header' => __('randomizer.logic.options.None'),
					'content' => [
						'Il n’y a aucune vérification sérieuse de l’endroit où les articles finissent, bonne chance si vous essayez cette option.',
					],
				],
			],
		],
		'goal' => [
			'header' => __('randomizer.goal.title'),
			'sections' => [
				[
					'header' => __('randomizer.goal.options.ganon'),
					'content' => [
						'Tout comme le jeu de vanille, votre objectif sera de collecter les sept cristaux, de vous frayer un chemin à travers la tour de Ganon et de vaincre Ganon.',
					],
				],
				[
					'header' => __('randomizer.goal.options.dungeons'),
					'content' => [
						'Vous devrez vaincre tous les boss des donjons d’Hyrule, y compris les deux incarnations d’Agahnim. Une fois qu’ils sont vaincus, vous pourrez affronter Ganon.',
					],
				],
				[
					'header' => __('randomizer.goal.options.pedestal'),
					'content' => [
						'Ramassez les pendentifs du courage, de la sagesse et du pouvoir et tirez la Triforce du piédestal! Méfiez-vous, vous devrez peut-être vous aventurer dans Hyrule, y compris la Tour de Ganon, afin de terminer votre quête.',
					],
				],
				[
					'header' => __('randomizer.goal.options.triforce-hunt'),
					'content' => [
						'La Triforce a été brisée et dispersée en 30 pièces dans Hyrule! Collectez 20 pièces à gagner!',
					],
				],
			],
		],
		'difficulty' => [
			'header' => __('randomizer.difficulty.title'),
			'sections' => [
				[
					'header' => __('randomizer.difficulty.options.easy'),
					'content' => [
						'Ce mode est recommandé pour les nouveaux joueurs. Il est facile de voyager à travers Hyrule.',
						'Trouver la seconde ½ magie vous fera passer à ¼ de magie.',
						'En mode standard, si l’oncle a l’arc, les bombes, le bâton de feu, la canne de Somaria ou la canne de Byrna, Link se verra attribuer des munitions illimitées pour cet objet pendant la durée de la séquence d’échappement.',
						'Voir le tableau de comparaison des difficultés ci-dessous pour plus de détails.',
					],
				],
				[
					'header' => __('randomizer.difficulty.options.normal'),
					'content' => [
						'Dans ce mode, vous trouverez tous les éléments du jeu original.',
					],
				],
				[
					'header' => sprintf('%s, %s, et %s', __('randomizer.difficulty.options.hard'), __('randomizer.difficulty.options.expert'), __('randomizer.difficulty.options.insane')),
					'content' => [
						'Vous cherchez un défi? Ces difficultés avancées ajustent encore plus le jeu pour tester vos compétences! Consultez la comparaison ci-dessous pour plus de détails.',
					],
				],
				[
					'header' => __('randomizer.goal.options.triforce-hunt'),
					'content' => [
						'La Triforce a été brisée et dispersée en 30 pièces dans Hyrule! Collectez 20 pièces à gagner!',
					],
				],
			],
			'comparison' => [
				'header' => 'Comparaison de difficulté',
				'maximum_health' => 'Santé maximum',
				'heart_containers' => 'Conteneurs de coeur',
				'heart_pieces' => 'Pièces de coeur',
				'maximum_mail' => 'Armure Maximum',
				'number_in_pool' => '# dans la groupement d’objets',
				'maximum_sword' => 'Épée maximale',
				'maximum_shield' => 'Bouclier maximum',
				'shields_store' => 'Boucliers achetables',
				'maximum_magic' => 'Capacité magique maximale',
				'number_silvers' => '# de flèches d’argent',
				'number_silvers_swordless' => '# de flèches d’argent (sans épée)',
				'number_bottles' => '# de bouteilles',
				'number_lamps' => '# de lampes',
				'potion_magic' => 'Recharge Magique Potion',
				'potion_health' => 'Recharge Coeurs Potion',
				'bug_net_fairy' => 'Bug Net attrape les fées',
				'powder_bubble' => 'Poudre magique sur les bulles',
				'cape_consumption' => 'Taux de consommation de Cape',
				'byrna_invincible' => 'Byrna accorde l’invincibilité',
				'stun_boomerang' => 'Boomerangs étourdissent les ennemis',
				'stun_hookshot' => 'HHookshot étourdit les ennemis',
				'capacity_upgrade' => 'Amélioration de la capacité des flèches / bombes',
				'drop_rates' => 'Taux de chute de l’ennemi',
				'quarter' => 'Trimestre',
				'half' => 'Moitié',
				'normal' => 'Ordinaire',
				'shield_3' => 'Miroir',
				'shield_2' => 'Feu',
				'shield_1' => 'Combattant',
				'none' => 'Aucun',
				'sword_4' => 'Or',
				'sword_3' => 'Tempéré',
				'sword_2' => 'Maîtriser',
				'mail_3' => 'Rouge',
				'mail_2' => 'Bleu',
				'mail_1' => 'Vert',
				'fairy' => 'Fée',
				'heart' => 'Cœur',
				'bee' => 'Abeilles',
				'yes' => 'Oui',
				'no' => 'Non',
				'tooltip' => [
					'silvers' => 'Les flèches d’argent ne fonctionnent que dans la chambre de Ganon.',
					'bottles' => 'Une fois que 4 bouteilles ont été collectées, les bouteilles restantes redeviendront roupies.',
					'potion_magic' => 'Les potions rempliront 100% de magie dans Spike Cave.',
					'potion_health' => 'Les potions rempliront 20 coeurs à Spike Cave.',
				],
			],
		],
		'variation' => [
			'header' => __('randomizer.variation.title'),
			'sections' => [
				[
					'header' => __('randomizer.variation.options.none'),
					'content' => [
						'L’option la plus proche du jeu original.',
					],
				],
				[
					'header' => __('randomizer.variation.options.timed-race'),
					'content' => [
						'Le chronomètre compte à partir de 0, l’objectif étant de terminer la partie avec le meilleur temps du chronomètre. Il y a des articles dans le monde qui affecteront votre chronomètre, donc finir en premier ne signifie pas nécessairement que vous êtes le gagnant.',
						'Est-ce que vous passez du temps à chercher une horloge pour arrêter votre chronomètre ou est-ce que vous courez jusqu’au bout?',
						'Les éléments suivants ont été ajoutés au pool d’éléments:',
						'<ul>'
							. '<li>20 horloges vertes qui soustraient 4 minutes de la minuterie</li>'
							. '<li>10 horloges bleues qui soustraient 2 minutes de la minuterie</li>'
							. '<li>10 horloges rouges qui ajoutent 2 minutes à la minuterie</li>'
						. '</ul>',
					],
				],
				[
					'header' => __('randomizer.variation.options.timed-ohko') . ' (Un coup de grâce)',
					'content' => [
						'Dans ce mode, vous commencez avec l’heure sur la minuterie et vous constatez que les horloges vertes ajoutent du temps à la minuterie.',
						'Si votre minuterie atteint zéro, vous entrez en mode Un coup de grâce, où tout va vous tuer.',
						'Ne désespérez pas, cependant. Si vous êtes en mode OHKO et que vous trouvez une autre horloge, vous quitterez le mode OHKO et obtiendrez du temps sur votre horloge, peu importe depuis combien de temps vous êtes en mode OHKO.',
					],
					'ohko_table' => [
						'minutes' => 'minutes',
						'start_time' => 'Heure de départ',
						'green_clock' => 'Horloges Vertes (+4 minutes)',
						'red_clock' => 'Horloges Rouges (instantanées OHKO)',
					],
				],
				[
					'header' => __('randomizer.variation.options.ohko') . ' (Un coup de grâce)',
					'content' => [
						'Prenez n’importe quel dommage et Link est mort. Pas pour les faibles de cœur.',
					],
				],
				[
					'header' => __('randomizer.variation.options.key-sanity'),
					'content' => [
						'Jeu pas assez aléatoire pour toi? Vous cherchez le vrai défi?',
						'BIEN!',
						'Toutes les cartes, boussoles et clés trouvées dans les coffres ne sont plus liées à leurs donjons!',
						'Vous devrez chercher haut et bas pour trouver les clés dont vous avez besoin pour progresser dans les donjons. Les clés trouvées sur les ennemis ou sous les pots resteront les mêmes.',
						'En outre, les cartes et les boussoles ont plus de valeur: votre carte d’ombre ne montrera aucune information de donjon tant que vous n’avez pas collecté la carte pour ce donjon (et si vous pensiez que la musique vous parviendrait, détrompez-vous. Compas, bien, ceux-ci vous montreront combien de coffres vous avez enregistrés dans un donjon après que vous les ayez collectés.',
						'Vous vous demandez probablement comment vous savez quelle clé / carte / boussole vous avez trouvée. Nous vous avons couvert: Il y aura une zone de texte qui vous permettra de savoir à quel donjon appartient. Le menu aura également un tableau pour vous aider si vous perdez la trace.',
						'La logique exige que les cartes et les compas complètent leurs donjons respectifs.',
					],
				],
				[
					'header' => __('randomizer.variation.options.retro'),
					'content' => [
						'Rappel de la première entrée de la série Legend of Zelda, ' . __('randomizer.variation.title') . ' ' . __('randomizer.variation.options.retro') . ' nous rapproche encore plus du passé.',
						[
							'header' => 'Arc de Roupie',
							'content' => [
								'L’arc n’utilise plus de flèches pour les munitions. Au lieu de cela, il utilise des roupies! Chaque flèche en bois coûte 10 roupies pour tirer tandis que chaque flèche d’argent coûte 50 roupies.',
								'Les flèches en bois sont désormais indépendantes de l’arc, tout comme les flèches d’argent; Vous devez acquérir à la fois l’arc et les flèches en bois ou en argent afin d’utiliser l’arc.',
								'Les flèches en bois sont désormais un objet à acquérir et doivent être achetées une fois dans un magasin. Ils ne sont pas disponibles dans des coffres réguliers ou en dehors des magasins.',
								'Si vous trouvez des flèches d’argent sans acheter de flèches en bois, vous ne pourrez tirer que des flèches d’argent.',
							],
						],
						[
							'header' => 'Boutiques du monde',
							'content' => [
								'Cinq magasins sur neuf seront choisis au hasard lorsque la ROM sera générée pour avoir du nouveau stock. Cela ne comprend PAS le Big Bomb Shop ou le Witch’s Potion Shop. L’élément Arrow en bois sera disponible pour 80 roupies et les petites clés pour 100 roupies chacune. Les petites clés pourront être achetées plusieurs fois.',
							],
						],
						[
							'header' => 'Petites clés',
							'content' => [
								'Les petites clés ne sont plus spécifiques au donjon. Ils sont maintenant mélangés dans le groupement d’objets généraux et seront trouvés en dehors des donjons. Les clés sous les pots ou larguées par les ennemis n’ont pas été modifiées.',
								'Dix clés ont été retirées du groupe d’articles en mode Facile et Normal. quinze ont été retirés des modes Hard, Expert et Insane. Réfléchissez bien avant d’utiliser les clés et rappelez-vous que vous pouvez en acheter si vous êtes bloqué!',
								'Les grandes clés, les cartes et les compas restent spécifiques au donjon et n’ont pas été randomisés en dehors de leurs donjons.',
							],
						],
						[
							'header' => 'Grottes de Take-Any',
							'content' => [
								'Quatre grottes aléatoires à une seule entrée et des maisons qui ne mènent pas à une position d’objet mènent désormais à des grottes à emporter où les joueurs ont le choix entre une recharge contenant un cœur ou une potion bleue. Les conteneurs de cœur n’ont pas été déplacés du groupement d’objets généraux et des bonus. Cependant, vous ne pourrez pas avoir plus de 20 cœurs à la fois.',
								'Une grotte unique à entrée unique contiendra un vieil homme mystérieux mais familier avec une mise à niveau d’épée. Cette mise à niveau de l’épée remplace celle de la réserve d’objets.',
							],
						],
					],
				],
			],
		],
		'item_pool' => 'Groupement d’objets',
	],
];
