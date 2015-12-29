<?php

Admin::model(App\Event::class)->title('Evénements')->alias('Event')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();
    $display->with('participant', 'eventpicture');
    $display->order([[1, 'ASC']]);
    $display->filters([
        Filter::related('id')->model('App\Event'),
    ]);
    $display->columns([
        Column::string('title')->label('Titre'),
        Column::image('logo')->label('Logo'),
        Column::count('eventpicture')->label('Images')->append(Column::filter('event_id')->model('App\EventPicture'))->orderable(false),
        Column::lists('participant.firstname')->label('Participants')->orderable(false),
        Column::datetime('begindate')->label('Début')->format('d/m/Y'),
        Column::datetime('enddate')->label('Fin')->format('d/m/Y'),
        Column::string('address')->label('Adresse'),
        Column::string('mailcontact')->label('Mail'),
        Column::string('description')->label('Description'),
        Column::custom()->label('Sélectionné')->callback(function ($instance)
        {
            return $instance->selected ? '&check;' : '-';
        })->orderable(false),
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
                FormItem::checkbox('selected', 'Sélectionné'),
                FormItem::timestamp('begindate', 'Date de début')->format('d/m/Y H:i'),
                FormItem::timestamp('enddate', 'Date de fin')->format('d/m/Y H:i'),
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