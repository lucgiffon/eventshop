<?php

Admin::model(App\Event::class)->title('Evènements')->filters(function ()
    {
        /*
        ModelItem::filter('country_id')->title()->from('\Country');
        ModelItem::filter('withoutCompanies')->scope('withoutCompanies')->title('without companies');
        */
    })->columns(function ()
    {
        Column::string('title', 'Titre');
        Column::image('logo', 'Logo');
        Column::count('participant', 'Participants')->append(Column::filter('event_id')->model('App\Participant'));
        Column::date('begindate', 'Début')->format('medium', 'none');
        Column::date('enddate', 'Fin')->format('medium', 'none');
        Column::string('address', 'Adresse');
        Column::string('mailcontact', 'Mail');
        Column::string('description', 'Description');
        /*
        Column::action('show', 'Custom action')->target('_blank')->icon('fa-globe')->style('long')->callback(function ($instance)
        {
            echo 'You are trying to call custom action "show" with row id "' . $instance->id . '"';
            die;
        });
        */
    })->form(function ()
    {
        FormItem::text('title', 'Titre')->required();
        FormItem::image('logo', 'Logo');
        FormItem::date('begindate', 'Date de début')->required();
        FormItem::date('enddate', 'Date de fin')->required();
        FormItem::text('address', 'Addresse')->required();
        FormItem::text('mailcontact', 'Mail')->required();
        FormItem::ckeditor('description', 'Description')->required();
    }
);