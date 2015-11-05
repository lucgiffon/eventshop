 <!-- Header Carousel -->

    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            $isActive = true;
            ?>
            @foreach($eventsArray_OurSelection as $k => $event)
                <li data-target="#myCarousel" data-slide-to="$k" class="<?php if($isActive) { echo "active"; $isActive = false; } ?>"></li>
            @endforeach
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php
            $isActive = true;
            ?>
            @foreach($eventsArray_OurSelection as $event)
                <div class="item <?php if($isActive) { echo "active"; $isActive = false; } ?>">
                    <div class="fill" style="background-image:url('http://placehold.it/1900x1080/E08283/&amp;text=Évènement Un');"></div>
                    <div class="carousel-caption">
                        <h2>{{ $event->title }}</h2>
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
	
	
	    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
