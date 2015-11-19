<?php

Admin::model(App\EventPicture::class)->title('Images des événements')->alias('EventPicture')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();

    $display->filters([
        Filter::field('event_id')->title(function ($value)
        {
            return 'Filtré sur l\'événement ' . $value;
        }),
    ]);

    $display->attributes([
        'ordering' => false
    ]);

    $display->columns([
        Column::image('picture')->label('Image')->orderable(false),
        Column::string('event_id')->label('Evénement')->append(Column::filter('event_id'))->orderable(false),
        Column::custom()->label('Principale')->callback(function ($instance)
        {
            return $instance->isprincipal ? '&check;' : '-';
        })->orderable(false),
    ]);

    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();

    $form->items([
        FormItem::image('picture', 'Image')->required(),
    ]);

    return $form;
});