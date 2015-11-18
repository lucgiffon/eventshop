$(function ()
{
	// select active link in menu
	(function ()
	{
		var currentPage = window.location.href;
		currentPage = currentPage.replace(window.location.search, '');
		currentPage = currentPage.replace(/\/create$/, '');
		currentPage = currentPage.replace(/\/([0-9]+)\/edit/, '');

		var currentPageLink = $('.sidebar-menu a[href="' + window.location.href + '"]');
		if ( ! currentPageLink.length)
		{
			currentPageLink = $('.sidebar-menu a[href="' + currentPage + '"]');
		}
		currentPageLink.addClass('active').parents('li').addClass('active').end().parents('ul').addClass('collapse').addClass('in');
	})();

	// create tooltips
	(function ()
	{
		$('html').tooltip({
			selector: "[data-toggle=tooltip]",
			container: "body"
		})
	})();

	// autofocus first text input
	(function ()
	{
		$('input[type="text"]:first').focus();
	})();

    if (typeof dataparticipantsByExpertiseCount != 'undefined') {
        Morris.Donut({
            element: 'participantsByExpertiseCount',
            data: dataparticipantsByExpertiseCount,
            colors: [ '#D2527F', '#F1A9A0', '#E26A6A']
        });
}

    if (typeof participantsByGenderCount != 'undefined') {
        Morris.Donut({
            element: 'participantsByGenderCount',
            data: dataparticipantsByGenderCount,
            colors: ['#E9D460', '#EB9532', '#F4B350']
        });
    }
});