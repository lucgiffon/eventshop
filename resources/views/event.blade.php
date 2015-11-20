
@extends('template')

@section('homescripts')

@stop

@section('contenu')

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{ $event->title }}
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Date/Time -->
            <p><i class="fa fa-clock-o"></i> Créé le {{ $event->created_at }}</p>

            <hr>

            <!-- Carousel Images -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($event->eventpicture as $k => $picture)
                        <li data-target="#myCarousel" data-slide-to="{{ $k }}" class="@if ($k === 0) active @endif"></li>
                    @endforeach
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach($event->eventpicture as $k => $picture)
                        <div class="item @if ($k === 0) active @endif">
                            <img alt="image {{ $k }}" src="{{ $picture->picture }}" height="10%">
                        </div>
                    @endforeach
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </div>

            <hr>

            <!-- Post Content -->
            <p class="lead">{!! $event->description !!}</p>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Side Image Well -->
            <div class="well">
                <img width="100%" src="{{ URL::to($event->logo) }}">
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Participants</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @foreach($event->participant()->get() as $k => $participant)
                                <li>@if($k%2 === 0) {{ $participant->firstname }} @endif</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @foreach($event->participant()->get() as $k => $participant)
                                <li>@if($k%2 === 1) {{ $participant->firstname }} @endif</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Renseignements</h4>
                <p><strong>Adresse</strong> : {{ $event->address }}</p>
                <p><strong>Mail</strong> : {{ $event->mailcontact }}</p>
                <p><strong>Date début</strong> : {{ date('d/m/Y', strtotime($event->begindate)) }}</p>
                <p><strong>Date fin</strong> : {{ date('d/m/Y', strtotime($event->enddate)) }}</p>
            </div>

        </div>
    </div>

@stop