<?php

Admin::model(App\Message::class)->title('Messages')->alias('Message')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();
    $display->with('Event');
    $display->columns([
        Column::string('title')->label('Titre'),
        Column::string('name')->label('Nom créateur'),
        Column::string('email')->label('Mail créateur'),
        Column::string('description')->label('Mail créateur'),
        Column::datetime('created_at')->label('Date création')->format('d/m/Y'),
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
                FormItem::select('event_id', 'Evénement')->model('App\Event')->display('title'),
            ],
            [
                FormItem::select('participant_id', 'Participant')->model('App\Participant')->display('fullname'),
            ],
            [
                FormItem::date('date', 'Date')->format('d/m/Y'),
            ],
        ]),
    ]);

    return $form;
});