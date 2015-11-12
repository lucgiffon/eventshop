@extends('template')

@section('contenu')

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">
                    Tous les événements
                </h1>
            </div>

            <div class="col-lg-12 text-center">
                {!! str_replace('/?', '?', $eventsShowAll->render()) !!}
            </div>

            @foreach($eventsShowAll as $event)
                @include('cardEvent', ['col_md'=>"4", 'col_sm'=>"4",
                    'title'=>$event->title,
                    'subTitles'=>"sous-titre",
                    'eventAddr'=>$event->address,
                    'eventCompany'=>"compagnie",
                    'eventEmail'=>$event->mailcontact,
                    'eventMessage'=>"message de l'event",
                    'titleDescr1'=>"descriptioN2",
                    'frontMess1'=>$event->description,
                    'titleDescr2'=>"titledesc2",
                    'frontMess2'=>"Frontmess2"])
            @endforeach

            <div class="col-lg-12 text-center">
                {!! str_replace('/?', '?', $eventsShowAll->render()) !!}
            </div>
        </div>

@stop