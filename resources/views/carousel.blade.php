 <!-- Header Carousel -->
</div>
    <header id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($eventsArray_OurSelection as $k => $event)
                <li data-target="#myCarousel" data-slide-to="{{ $k }}" class="@if ($k === 0) active @endif"></li>
            @endforeach
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($eventsArray_OurSelection as $k => $event)
                <div class="item @if ($k === 0) active @endif">
                    <div class="fill" style="background-image:url('{{ $event->eventpicture->where('isprincipal', 1)->first()->picture }}');"></div>
                    <div class="carousel-caption">
                        <h2>{{ $event->title }}</h2>
                        <p>{!! str_limit($event->description, $limit = 1000) !!}</p>
                    </div>
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
    </header>
<div class="container">
