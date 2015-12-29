<?php

Admin::model(App\Gender::class)->title('Genre')->alias('Gender')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();
    $display->with('participant');

    $display->columns([
        Column::string('name')->label('Nom'),
        Column::count('participant')->label('Participants')->append(Column::filter('expertise_id')),
    ]);

    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();

    $form->items([
        FormItem::columns()->columns([
            [
                FormItem::text('name', 'Nom')->required(),
            ],
            [
            ],
            [
            ],
        ]),
    ]);

    return $form;
});