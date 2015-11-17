$(function ()
{
	$.fn.dataTable.ext.errMode = function ()
	{
		$.notify(window.admin.lang.table.error, 'error');
	};
	$('.datatables').each(function ()
	{
		var $this = $(this);
		var params = {
			language: {
				"sProcessing":     "Traitement en cours...",
				"sSearch":         "Rechercher&nbsp;:&nbsp;",
				"sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
				"sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
				"sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
				"sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
				"sInfoPostFix":    "",
				"sLoadingRecords": "Chargement en cours...",
				"sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
				"sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
				"oPaginate": {
					"sFirst":      "Premier",
					"sPrevious":   "Pr&eacute;c&eacute;dent",
					"sNext":       "Suivant",
					"sLast":       "Dernier"
				},
				"oAria": {
					"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
					"sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
				}
			},
			stateSave: true,
			responsive: true,
			lengthMenu: [
				[10, 25, 50, -1],
				[10, 25, 50, window.admin.lang.table.all]
			]
		};

		params = $.extend(params, $this.data('attributes'));

		var url;
		if (url = $this.data('url'))
		{
			params.serverSide = true;
			params.processing = true;
			params.ajax = {
				url: url,
				data: function (d)
				{
					$this.find('.column-filter').each(function ()
					{
						var $this = $(this);
						var index = $this.closest('td').data('index');
						if (name = $this.data('ajax-data-name'))
						{
							d.columns[index]['search'][name] = $this.val();
						}
					});
				}
			};
		}
		var table = $this.DataTable(params);

		$this.find('.column-filter').each(function ()
		{
			if ($(this).parent().closest('.column-filter').length > 0) return;
			var type = $(this).data('type');
			window.columnFilters[type](this, table);
		});
	});
});