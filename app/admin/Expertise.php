<?php

Admin::model(App\Expertise::class)->title('Domaine d\'expertise')->with('participant')->filters(function ()
{
    })->columns(function ()
    {
        Column::string('name', 'Nom');
        //Column::lists('participant.firstname', 'Participants');
        Column::count('participant', 'Participants')->append(Column::filter('expertise_id')->model(App\Participant::class));
    })->form(function ()
    {
        FormItem::text('name', 'Nom')->required();
    }
);