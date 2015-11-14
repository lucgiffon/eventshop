<?php

Admin::model(App\Participate::class)->title('Participation')->filters(function ()
{
    ModelItem::filter('event_id')->title()->from('\App\Event');
    })->columns(function ()
    {
        Column::string('participant_id', 'Participant');
        Column::string('event_id', 'Evènement');
        /*
        Column::action('show', 'Custom action')->target('_blank')->icon('fa-globe')->style('long')->callback(function ($instance)
        {
            echo 'You are trying to call custom action "show" with row id "' . $instance->id . '"';
            die;
        });
        */
    })->form(function ()
    {
        FormItem::text('participant_id', 'Participant')->required();
        FormItem::text('event_id', 'Evénement')->required();
    }
);