<?php

Admin::model(App\Gender::class)->title('Genre')->with('participant')->filters(function ()
{
    })->columns(function ()
    {
        Column::string('name', 'Nom');
        //Column::lists('participant.firstname', 'Participants');
        Column::count('participant', 'Participants')->append(Column::filter('gender_id')->model(App\Participant::class));
    })->form(function ()
    {
        FormItem::text('name', 'Nom')->required();
    }
);