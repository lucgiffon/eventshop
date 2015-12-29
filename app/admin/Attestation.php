<?php

Admin::model(App\PivotEventParticipant::class)->title('Attestations')->alias('attestation')->display(function ()
{
    $display = AdminDisplay::datatablesAsync();
    $display->with('event');
    $display->filters([
        Filter::related('event_id')->model('App\Event'),
        Filter::related('participant_id')->model('App\Participant'),
    ]);
    $display->actions([
        Column::action('export_all_pdf')->value(' Générer les attestations sélectionnés')->icon('fa-file-pdf-o')->target('_blank')->callback(function ($collection)
        {
            foreach($collection as $instance)
            {
                if(!file_exists(base_path('/storage/exports/attestation_' . $instance->id . '.pdf')))
                {
                    $event = App\Event::find($instance->event_id);
                    $participant = App\Participant::find($instance->participant_id);

                    Excel::create('attestation_' . $instance->id, function($excel) use($event, $participant) {
                        $excel->sheet($event->title, function($sheet) use($event, $participant) {
                            $sheet->loadView('admin.attestation', ['participant' => $participant, 'event' => $event]);
                            $sheet->getDefaultStyle()->applyFromArray(array(
                                'border' => array(
                                    'top'  => array(
                                        'style' => 'none'
                                    ),
                                    'bottom'  => array(
                                        'style' => 'none'
                                    ),
                                    'left'  => array(
                                        'style' => 'none'
                                    ),
                                    'right'  => array(
                                        'style' => 'none'
                                    )
                                )
                            ));
                        });
                    })->store('pdf', false, true);
                }
            }

            echo "<script>window.close();</script>";
        }),
        Column::action('download_all_pdf')->value(' Télécharger les attestations sélectionnés')->icon('fa-download ')->target('_blank')
    ]);

    $columnExport = Column::action('export_pdf')->value('Générer attestation')->label('Générer')->icon('fa-file-pdf-o')->target('_blank')->callback(function ($instance)
    {
        $event = App\Event::find($instance->event_id);
        $participant = App\Participant::find($instance->participant_id);

        $pdf_stored = Excel::create('attestation_' . $instance->id, function($excel) use($event, $participant) {
            $excel->sheet($event->title, function($sheet) use($event, $participant) {
                $sheet->loadView('admin.attestation', ['participant' => $participant, 'event' => $event]);
                $sheet->getDefaultStyle()->applyFromArray(array(
                    'border' => array(
                        'top'  => array(
                            'style' => 'none'
                        ),
                        'bottom'  => array(
                            'style' => 'none'
                        ),
                        'left'  => array(
                            'style' => 'none'
                        ),
                        'right'  => array(
                            'style' => 'none'
                        )
                    )
                ));
            });
        })->store('pdf', false, true);

        if($pdf_stored)
            echo '<html><head><meta charset="UTF-8"></head><body><script>window.close();</script><body></html>';
        else
            echo '<html><head><meta charset="UTF-8"></head><body>Un problème est survenu lors de la génération <a href="javascript:window.close();">fermer cette fenêtre</a>.<body></html>';
        die;
    });

    $columnDownload = Column::action('download_pdf')->value('Télécharger attestation')->label('Télécharger')->icon('fa-download')->target('_blank')->url('../downloadAttestation/:id');

    $display->columns([
        Column::checkbox(),
        Column::string('event.title')->label('Evénement')->append(Column::filter('event_id')),
        Column::string('participant.fullname')->label('Participant')->append(Column::filter('participant_id')),
        $columnExport,
        $columnDownload,
        Column::datetime('created_at')->label('Date création')->format('d/m/Y'),
        Column::datetime('updated_at')->label('Date dernière modification')->format('d/m/Y')
    ]);

    return $display;
})->createAndEdit(null)->delete(null);