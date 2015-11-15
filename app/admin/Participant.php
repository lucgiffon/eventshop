<?php

Admin::model(App\Participant::class)->title('Participants')->with('event', 'gender', 'expertise')->filters(function ()
{
        ModelItem::filter('gender_id')->title('genre')->from('App\Gender');
        ModelItem::filter('expertise_id')->title('domaine d\'expertise')->from('App\Gender');
    })->columns(function ()
    {
        Column::string('lastname', 'Nom');
        Column::string('firstname', 'Prénom');
        //Column::count('event', 'Evénements')->append(Column::filter('participant_id')->model(App\Event::class));
        Column::lists('event.title', 'Evenements');
        Column::string('email', 'Mail');
        Column::string('gender.name', 'Genre');
        Column::string('expertise.name', 'Domaine d\'expertise');
        Column::string('phonenumber', 'Numéro de téléphone');
        Column::string('address', 'Adresse');
        Column::string('department', 'Département');
        Column::string('country', 'Pays');
    })->form(function ()
    {
        FormItem::text('lastname', 'Nom')->required();
        FormItem::text('firstname', 'Prénom')->required();
        FormItem::text('email', 'Mail')->required();
        FormItem::text('idgender', 'Sexe')->required();
        FormItem::text('idexpertise', 'Domaine d\'expertise')->required();
        FormItem::text('phonenumber', 'Numéro de téléphone')->required();
        FormItem::text('address', 'Adresse')->required();
        FormItem::text('department', 'Département')->required();
        FormItem::text('country', 'Pays')->required();
    }
);