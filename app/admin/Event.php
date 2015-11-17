<?php

Admin::model(App\Event::class)->title('Evénements')->alias('Event')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();
    $display->with('participant');

    $display->columns([
        Column::string('title')->label('Titre'),
        Column::image('logo')->label('Logo'),
        Column::lists('participant.firstname')->label('Participants'),
        Column::datetime('begindate')->label('Début')->format('d/m/Y'),
        Column::datetime('enddate')->label('End')->format('d/m/Y'),
        Column::string('address')->label('Adresse'),
        Column::string('mailcontact')->label('Mail'),
        Column::string('description')->label('Description'),
    ]);

    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();

    $form->items([
        FormItem::columns()->columns([
            [
                FormItem::text('title', 'Titre')->required(),
                FormItem::text('mailcontact', 'Mail')->required(),
                FormItem::text('address', 'Address'),
                FormItem::date('begindate', 'Date de début')->format('d/m/Y'),
                FormItem::date('enddate', 'Date de fin')->format('d/m/Y'),
            ],
            [
                FormItem::image('logo', 'Logo'),
            ],
            [
                FormItem::ckeditor('description', 'Description'),
            ],
        ]),
    ]);

    return $form;
});