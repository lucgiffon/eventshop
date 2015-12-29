<?php

Admin::model(App\Message::class)->title('Messages')->alias('Message')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();
    $display->with('Event');
    $display->columns([
        Column::string('title')->label('Titre message'),
        Column::string('name')->label('Nom créateur'),
        Column::string('email')->label('Mail créateur'),
        Column::string('description')->label('Description message'),
        Column::string('Event.title')->label('Evénement')->append(Column::filter('id')->model('App\Event')),
        Column::datetime('created_at')->label('Date création')->format('d/m/Y'),
    ]);

    return $display;
})->createAndEdit(null);