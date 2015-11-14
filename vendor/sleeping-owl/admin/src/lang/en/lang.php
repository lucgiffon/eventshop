<?php

return [
	'404'      => 'Page not found.',
	'auth'     => [
		'title'          => 'Authorization',
		'username'       => 'Username',
		'password'       => 'Password',
		'login'          => 'Login',
		'logout'         => 'Logout',
		'wrong-username' => 'Wrong username',
		'wrong-password' => 'or password'
	],
	'ckeditor' => [
		'upload'        => [
			'success' => 'File was uploaded: \\n- Size: :size kb \\n- width/height: :width x :height',
			'error'   => [
				'common'              => 'Unable to upload the file.',
				'wrong_extension'     => 'File ":file" has wrong extension.',
				'filesize_limit'      => 'Maximum allowed file size is :size kb.',
				'imagesize_max_limit' => 'Width x Height = :width x :height \\n The maximum Width x Height must be: :maxwidth x :maxheight',
				'imagesize_min_limit' => 'Width x Height = :width x :height \\n The minimum Width x Height must be: :minwidth x :minheight',
			]
		],
		'image_browser' => [
			'title'    => 'Insert image from server',
			'subtitle' => 'Choose image to insert',
		],
	],
	'table'    => [
		'new-entry'      => 'Nouvelle entrée',
		'edit'           => 'éditer',
		'delete'         => 'supprimer',
		'delete-confirm' => 'êtes-vous sur de vouloir supprimer cette entrée ?',
		'delete-error'   => 'Erreur lors de la suppression. Vous devez supprimer toute les entrées liées avant de pouvoir supprimer celle-ci.',
		'moveUp'         => 'Move Up',
		'moveDown'       => 'Move Down',
		'filter'         => 'Afficher les entrées similaires',
		'filter-goto'    => 'Afficher',
		'save'           => 'Sauvegarder',
		'cancel'         => 'Annuler',
		'download'       => 'Télécharger',
		'all'            => 'Tout',
		'processing'     => '<i class="fa fa-5x fa-circle-o-notch fa-spin"></i>',
		'loadingRecords' => 'Chargement...',
		'lengthMenu'     => 'Afficher _MENU_ entrées',
		'zeroRecords'    => 'Pas d\'enregistrement correspondant à la recherche.',
		'info'           => 'Affichage de _START_ à _END_ de _TOTAL_ entrées',
		'infoEmpty'      => 'Affichage 0 to 0 of 0 entries',
		'infoFiltered'   => '(filtered from _MAX_ total entries)',
		'infoThousands'  => ',',
		'infoPostFix'    => '',
		'search'         => 'Recherche : ',
		'emptyTable'     => 'Pas de données disponible dans la table',
		'paginate'       => [
			'first'    => 'Premier',
			'previous' => '&larr;',
			'next'     => '&rarr;',
			'last'     => 'Dernier'
		]
	],
	'select'   => [
		'nothing'  => 'Rien n\'est sélectionné',
		'selected' => 'sélectionné'
	]
];