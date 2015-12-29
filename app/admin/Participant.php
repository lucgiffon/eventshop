<?php

Admin::model(App\Participant::class)->title('Participants')->alias('Participant')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();
    $display->with('Event', 'Gender', 'Expertise', 'Country');
    $display->actions([
        Column::action('download_all_xls')->value(' Télécharger les fiches des participants sélectionnés')->icon('fa-download ')->target('_blank')->callback(function ($collection)
        {
            $data = [];

            foreach($collection as $instance)
            {
                $instanceArray = $instance->toArray();
                $instanceArray['event'] = '';

                foreach($instance->event as $k => $event)
                {
                    if($k == 0)
                        $instanceArray['event'] = $event->title;
                    else
                        $instanceArray['event'] = $instanceArray['event'] . PHP_EOL . $event->title;
                }

                $gender = App\Gender::find($instanceArray['gender_id']);
                $expertise = App\Expertise::find($instanceArray['expertise_id']);
                $country = App\Country::find($instanceArray['country_id']);

                unset($instanceArray['gender_id']);
                $instanceArray['gender'] = $gender->name;

                unset($instanceArray['expertise_id']);
                $instanceArray['expertise'] = $expertise->name;

                unset($instanceArray['country_id']);
                $instanceArray['country'] = $country->short_name;

                $data[] = $instanceArray;
            }

            Excel::create('participants', function($excel) use($data) {

                $excel->sheet('participants', function($sheet) use($data) {

                    $numberRow = count($data) + 1;

                    $sheet->fromArray($data, null, 'A1', true, false);
                    $sheet->prependRow(['id', 'Mail', 'Nom', 'Prénom', 'Téléphone', 'Adresse', 'Département', 'Date de création', 'Date dernière modification', 'Evénement(s)', 'Genre', 'Domaine d\'expertise', 'Pays']);
                    $sheet->getStyle('J2:J' . $numberRow)->getAlignment()->setWrapText(true);

                });

            })->export('xls');

            echo "<script>window.close();</script>";
        })
    ]);
    $display->columns([
        Column::checkbox(),
        Column::string('lastname')->label('Nom'),
        Column::string('firstname')->label('Prénom'),
        Column::lists('event.title')->label('Evénements'),
        Column::string('email')->label('Mail'),
        Column::string('Gender.name')->label('Genre'),
        Column::string('Expertise.name')->label('Domaine d\'expertise'),
        Column::string('phonenumber')->label('Numéro de téléphone'),
        Column::string('address')->label('Adresse'),
        Column::string('department')->label('Département'),
        Column::string('country.short_name')->label('Pays')
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