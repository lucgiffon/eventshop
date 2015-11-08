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

            @include('cardEvent', ['col_md'=>"4", 'col_sm'=>"4",
                'title'=>$eventsArray_MostPopular->title,
                'subTitles'=>"sous-titre",
                'eventAddr'=>$eventsArray_MostPopular->address,
                'eventCompany'=>"compagnie",
                'eventEmail'=>$eventsArray_MostPopular->mailcontact,
                'eventMessage'=>$eventsArray_MostPopular->description,
                'frontMess1'=>"description de l'evenement",])

            <div class="col-md-4 col-sm-4">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="images/rotating_card_thumb2.png"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="images/rotating_card_profile2.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Titre évènement</h3>
                                    <p class="profession">Sous-titre évènement</p>
                                    <h5><i class="fa fa-map-marker fa-fw text-muted"></i> Adresse évènement</h5>
                                    <h5><i class="fa fa-building-o fa-fw text-muted"></i> Compagnie évènement</h5>
                                    <h5><i class="fa fa-envelope-o fa-fw text-muted"></i> mail@evenement-adresse.com</h5>
                                </div>
                                <div class="footer">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"Message principal de l'évènement"</h5>
                            </div> 
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Titre description 1 évènement</h4>
                                    <p>Description 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <h4 class="text-center">Titre description 2 évènement</h4>
                                    <p>Description 2 Nam sed finibus lectus.</p>
                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div> <!-- end col sm 3 -->
            <div class="col-md-4 col-sm-4">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="images/rotating_card_thumb3.png"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="images/rotating_card_profile3.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Titre évènement</h3>
                                    <p class="profession">Sous-titre évènement</p>
                                    <h5><i class="fa fa-map-marker fa-fw text-muted"></i> Adresse évènement</h5>
                                    <h5><i class="fa fa-building-o fa-fw text-muted"></i> Compagnie évènement</h5>
                                    <h5><i class="fa fa-envelope-o fa-fw text-muted"></i> mail@evenement-adresse.com</h5>
                                </div>
                                <div class="footer">
                                    <div class="rating">
                                        <i class="fa fa-star" style="color:#d58512;"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"Message principal de l'évènement"</h5>
                            </div> 
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Titre description 1 évènement</h4>
                                    <p>Description 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <h4 class="text-center">Titre description 2 évènement</h4>
                                    <p>Description 2 Nam sed finibus lectus.</p>
                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div> <!-- end col sm 3 -->
        </div>
		   
		   
        <!-- Les Nouveaux Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Les nouveaux 
                </h1>
            </div>
            <div class="col-md-3 col-sm-6">
                 <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="images/rotating_card_thumb2.png"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="images/rotating_card_profile3.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Titre évènement</h3>
                                    <p class="profession">Sous-titre évènement</p>
                                    <h5><i class="fa fa-map-marker fa-fw text-muted"></i> Adresse évènement</h5>
                                    <h5><i class="fa fa-building-o fa-fw text-muted"></i> Compagnie évènement</h5>
                                    <h5><i class="fa fa-envelope-o fa-fw text-muted"></i> mail@evenement-adresse.com</h5>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"Message principal de l'évènement"</h5>
                            </div> 
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Titre description 1 évènement</h4>
                                    <p>Description 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <h4 class="text-center">Titre description 2 évènement</h4>
                                    <p>Description 2 Nam sed finibus lectus.</p>
                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div> <!-- end col sm 3 -->
            <div class="col-md-3 col-sm-6">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="images/rotating_card_thumb2.png"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="images/rotating_card_profile3.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Titre évènement</h3>
                                    <p class="profession">Sous-titre évènement</p>
                                    <h5><i class="fa fa-map-marker fa-fw text-muted"></i> Adresse évènement</h5>
                                    <h5><i class="fa fa-building-o fa-fw text-muted"></i> Compagnie évènement</h5>
                                    <h5><i class="fa fa-envelope-o fa-fw text-muted"></i> mail@evenement-adresse.com</h5>
                                </div>
                                <div class="footer">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"Message principal de l'évènement"</h5>
                            </div> 
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Titre description 1 évènement</h4>
                                    <p>Description 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <h4 class="text-center">Titre description 2 évènement</h4>
                                    <p>Description 2 Nam sed finibus lectus.</p>
                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div> <!-- end col sm 3 -->
            <div class="col-md-3 col-sm-6">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="images/rotating_card_thumb2.png"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="images/rotating_card_profile3.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Titre évènement</h3>
                                    <p class="profession">Sous-titre évènement</p>
                                    <h5><i class="fa fa-map-marker fa-fw text-muted"></i> Adresse évènement</h5>
                                    <h5><i class="fa fa-building-o fa-fw text-muted"></i> Compagnie évènement</h5>
                                    <h5><i class="fa fa-envelope-o fa-fw text-muted"></i> mail@evenement-adresse.com</h5>
                                </div>
                                <div class="footer">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"Message principal de l'évènement"</h5>
                            </div> 
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Titre description 1 évènement</h4>
                                    <p>Description 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <h4 class="text-center">Titre description 2 évènement</h4>
                                    <p>Description 2 Nam sed finibus lectus.</p>
                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div> <!-- end col sm 3 -->
            <div class="col-md-3 col-sm-6">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="images/rotating_card_thumb2.png"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="images/rotating_card_profile3.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Titre évènement</h3>
                                    <p class="profession">Sous-titre évènement</p>
                                    <h5><i class="fa fa-map-marker fa-fw text-muted"></i> Adresse évènement</h5>
                                    <h5><i class="fa fa-building-o fa-fw text-muted"></i> Compagnie évènement</h5>
                                    <h5><i class="fa fa-envelope-o fa-fw text-muted"></i> mail@evenement-adresse.com</h5>
                                </div>
                                <div class="footer">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"Message principal de l'évènement"</h5>
                            </div> 
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Titre description 1 évènement</h4>
                                    <p>Description 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <h4 class="text-center">Titre description 2 évènement</h4>
                                    <p>Description 2 Nam sed finibus lectus.</p>
                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div> <!-- end col sm 3 -->
        </div>
        <!-- /.row -->

        <hr>
    </div>

@stop