<?php

Admin::model(App\Expertise::class)->title('Domaine d\'expertise')->alias('Expertise')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();

    $display->columns([
        Column::string('name')->label('Nom'),
        Column::count('participant')->label('Participants')->append(Column::filter('expertise_id')),
    ]);

    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();

    $form->items([
        FormItem::text('name', 'Nom')->required()->unique(),
    ]);

    return $form;
});