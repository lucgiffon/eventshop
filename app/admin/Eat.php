<?php

Admin::model(App\Eat::class)->title('Repas')->alias('Eat')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();
    $display->with('Participant', 'Event');
    $display->order([[0, 'ASC']]);

    $display->columns([
        Column::datetime('date')->label('Date')->format('d/m/Y'),
        Column::string('Event.title')->label('Evénement')->append(Column::filter('event_id'))->orderable(false),
        Column::string('Participant.firstname')->label('Participant')->append(Column::filter('participant_id'))->orderable(false),
        Column::datetime('created_at')->label('Date création')->format('d/m/Y'),
        Column::datetime('updated_at')->label('Date dernière modification')->format('d/m/Y'),
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