@extends('template')

@section('contenu')

<div class="container">        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                Notre sélection
            </h1>
        </div>
    </div>
</div>

@include('carousel')

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Événements Populaires
            </h1>
        </div>
        @foreach($eventsArray_OurSelection as $event)
            @include('cardEvent', ['col_md'=>"4", 'col_sm'=>"4",
                'title'=>$event->title,
                'subTitles'=>"sous-titre",
                'eventAddr'=>$event->address,
                'eventCompany'=>"compagnie",
                'eventEmail'=>$event->mailcontact,
                'eventMessage'=>$event->description,
                'titleDescr1'=>"descriptioN2",
                'frontMess1'=>"frontmess1",
                'titleDescr2'=>"titledesc2",
                'frontMess2'=>"Frontmess2"])
        @endforeach
    </div>

    <!-- Les Nouveaux Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Les nouveaux
            </h1>
        </div>
        @foreach($eventsArray_Newest as $event)
            @include('cardEvent', ['col_md'=>"3", 'col_sm'=>"6",
                'title'=>$event->title,
                'subTitles'=>"sous-titre",
                'eventAddr'=>$event->address,
                'eventCompany'=>"compagnie",
                'eventEmail'=>$event->mailcontact,
                'eventMessage'=>$event->description,
                'titleDescr1'=>"descriptioN2",
                'frontMess1'=>"frontmess1",
                'titleDescr2'=>"titledesc2",
                'frontMess2'=>"Frontmess2"])
        @endforeach
    </div>
    <!-- /.row -->

    <hr>

@stop