<?php

Admin::model(App\Participant::class)->title('Participants')->alias('Participant')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();
    $display->with('event', 'gender', 'expertise', 'country');

    $display->columns([
        Column::string('lastname')->label('Nom'),
        Column::string('firstname')->label('Prénom'),
        Column::lists('event.title')->label('Evénements'),
        Column::string('email')->label('Mail'),
        Column::string('gender.name')->label('Genre'),
        Column::string('expertise.name')->label('Domaine d\'expertise'),
        Column::string('phonenumber')->label('Numéro de téléphone'),
        Column::string('address')->label('Adresse'),
        Column::string('department')->label('Département'),
        Column::string('country.short_name')->label('Pays'),
    ]);

    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();

    $form->items([
        FormItem::columns()->columns([
            [
                FormItem::text('lastname', 'Nom')->required(),
                FormItem::text('firstname', 'Prénom')->required(),
                FormItem::text('email', 'Mail')->required(),
            ],
            [
                FormItem::text('address', 'Adresse')->required(),
                FormItem::text('department', 'Département')->required(),
                FormItem::text('phonenumber', 'Numéro de téléphone')->required(),
            ],
            [
                FormItem::select('gender_id', 'Genre')->model('App\Gender')->display('name')->required(),
                FormItem::select('expertise_id', 'Domaine d\'expertise')->model('App\Expertise')->display('name')->required(),
                FormItem::select('country_id', 'Pays')->model('App\Country')->display('short_name')->required(),
                FormItem::multiselect('Event', 'Evénements')->model('App\Event')->display('title'),
            ],
        ]),
    ]);

    return $form;
});