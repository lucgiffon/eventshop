@extends('template')

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">
                    Tous les événements
                </h1>
            </div>
        </div>
    </div>

    @foreach($eventsShowAll as $event)
        @include('cardEvent', ['col_md'=>"4", 'col_sm'=>"4",
                   'title'=>$event->title,
                   'subTitles'=>"sous-titre",
                   'eventAddr'=>$event->address,
                   'eventCompany'=>"compagnie",
                   'eventEmail'=>$event->mailcontact,
                   'eventMessage'=>$event->description,
                   'frontMess1'=>"description de l'evenement",])
    @endforeach

@stop