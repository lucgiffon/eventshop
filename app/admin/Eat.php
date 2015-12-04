<?php

Admin::model(App\Eat::class)->title('Repas')->alias('Eat')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();
    $display->with('Participant', 'Event');
    $display->order([[0, 'ASC']]);
    $display->filters([
        Filter::related('event_id')->model('App\Event')->display('événement'),
        Filter::related('participant_id')->model('App\Participant')->display('participant'),
    ]);
    $display->columns([
        Column::datetime('date')->label('Date')->format('d/m/Y'),
        Column::string('Event.title')->label('Evénement')->append(Column::filter('event_id'))->orderable(false),
        Column::string('Participant.firstname')->label('Participant')->append(Column::filter('participant_id'))->orderable(false),
        Column::datetime('created_at')->label('Date création')->format('d/m/Y'),
        Column::datetime('updated_at')->label('Date dernière modification')->format('d/m/Y'),
    ]);

    $display->columnFilters([
        ColumnFilter::range()->from(
            ColumnFilter::date()->placeholder('From Date')->format('d/m/Y')
        )->to(
            ColumnFilter::date()->placeholder('To Date')->format('d/m/Y')
        ),
        null,
        null,
        null,
        null
    ]);

    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();

    $form->items([
        FormItem::columns()->columns([
            [
                FormItem::text('event.title', 'AFAIRE')->required(),
            ],
            [
                FormItem::text('participant.firstname', 'AFAIRE')->required(),
            ],
            [
                FormItem::date('date', 'Date')->format('d/m/Y'),
            ],
        ]),
    ]);

    return $form;
});