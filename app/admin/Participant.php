<?php

Admin::model(App\Participant::class)->title('Participants')->with('event')->filters(function ()
{
    })->columns(function ()
    {
        Column::string('lastname', 'Nom');
        Column::string('firstname', 'Prénom');
        //Column::count('participate', 'Evénement')->append(Column::filter('participant_id')->model('App\Participate'));
        Column::lists('event.title', 'Evenements');
        Column::string('email', 'Mail');
        Column::string('idgender', 'Sexe');
        Column::string('idexpertise', 'Domaine d\'expertise');
        Column::string('phonenumber', 'Numéro de téléphone');
        Column::string('address', 'Adresse');
        Column::string('department', 'Département');
        Column::string('country', 'Pays');
        /*
        Column::action('show', 'Custom action')->target('_blank')->icon('fa-globe')->style('long')->callback(function ($instance)
        {
            echo 'You are trying to call custom action "show" with row id "' . $instance->id . '"';
            die;
        });
        */
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