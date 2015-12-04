$(function ()
{
	$('.datepicker').each(function ()
	{
		var $this = $(this);

        $('#' + $this.attr('id')).datetimepicker({
			locale: 'fr',
			icons: {
				time: "fa fa-clock-o",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			}
		});
	});

	if ($('#enddate').length )
	{
		$('#enddate').data("DateTimePicker").minDate($('#begindate').data("DateTimePicker").date());

		$('#begindate').on("dp.change", function(e) {
			$('#enddate').data("DateTimePicker").minDate(e.date);
		});
	}
});