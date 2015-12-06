@extends('template')

@section('homescripts')

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/locales/bootstrap-datepicker.fr.min.js"></script>
    <script src="{{ URL::asset('js/jquery.gritter.min.js') }}"></script>

    <script type="text/javascript">
        var datepicker_eat = $('#datepicker-eat').datepicker({
                todayBtn: true,
                clearBtn: true,
                language: "fr",
                multidate: true,
                format: 'dd/mm/yyyy',
                multidateSeparator: ", ",
                startDate: "@if(date ('Y-m-d', strtotime('tomorrow UTC')) > date('Y-m-d', strtotime($event->enddate))) {{ date('d/m/Y', strtotime($event->enddate . "+1 days")) }} @elseif((date ('Y-m-d', strtotime('tomorrow UTC')) > date('Y-m-d', strtotime($event->begindate)))){{ date('d/m/Y', strtotime('tomorrow UTC')) }}@else{{ date('d/m/Y', strtotime($event->begindate)) }}@endif",
                endDate: "{{ date('d/m/Y', strtotime($event->enddate)) }}"
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var panel = $('.panel').collapse();
            panel.on('hidden.bs.collapse', function () {
                panelBody = $('.panel-body');
                panelBody.addClass('text-center text-success');
                panelBody.html('Votre participation a bien été prise en compte.');
                $('.panel-footer').html('');
                $('.panel').collapse('show');
            });

            $('#postFormEvent').submit(function (e) {
                e.preventDefault();

                var gender = $('#postFormEvent [name="gender"] option:selected').val();
                var expertise = $('#postFormEvent [name="expertise"] option:selected').val();
                var country = $('#postFormEvent [name="country"] option:selected').val();

                var lastname = $('#postFormEvent [name="lastname"]').val();
                var firstname = $('#postFormEvent [name="firstname"]').val();
                var mail = $('#postFormEvent [name="mail"]').val();
                var phone = $('#postFormEvent [name="phone"]').val();
                var address = $('#postFormEvent [name="address"]').val();
                var department = $('#postFormEvent [name="department"]').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: $(this).attr('action'),
                    type: "post",
                    data: {
                        //hidden
                        'event' : {{ $event->id }},

                        'gender' : gender,
                        'expertise' : expertise,
                        'country' : country,

                        'lastname' : lastname,
                        'firstname' : firstname,
                        'mail' : mail,
                        'phone' : phone,
                        'address' : address,
                        'department' : department,

                        'dates' : datepicker_eat.datepicker("getDates").map(function(date){return moment(date).format('DD/MM/YYYY')})
                    },
                    success: function () {
                        panel.collapse('hide');
                    },
                    error: function(data){
                        console.log(data.responseText);

                        var errors = $.parseJSON(data.responseText);
                        console.log(errors);

                        if(errors.error == "L'événement est terminé.") {
                            alert(errors.error);
                            return;
                        }

                        $.each(errors.error, function(index, value) {
                            $('#postFormEvent #' + index + '-input').addClass('has-error');
                            $('#postFormEvent #' + index + '-input').prepend(value);
                        });
                    }
                });
            });
        });
    </script>

@stop

@section('homestyles')

    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ URL::asset('css/jquery.gritter.css') }}" rel="stylesheet">

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
            <p><i class="fa fa-clock-o"></i> Créé le {{ date('d/m/Y', strtotime($event->created_at)) }}, dernière modification le {{ date('d/m/Y', strtotime($event->updated_at)) }}</p>

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
            <div class="lead">{!! $event->description !!}</div>
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
                <p><strong>Date début</strong> : {{ date('d/m/Y H:i', strtotime($event->begindate)) }}</p>
                <p><strong>Date fin</strong> : {{ date('d/m/Y H:i', strtotime($event->enddate)) }}</p>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @if(date('Y-m-d', strtotime('tomorrow UTC')) > date('Y-m-d', strtotime($event->enddate)))

                <div class="alert alert-warning text-center" role="alert">L'événement est terminé.</div>

            @else
            <div class="panel panel-default" style="margin-top: 40px;">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Rejoindre l'événement
                    </h4>
                </div>
                {!! Form::open(['url' => 'postFormEvent', 'method' => 'POST', 'id' => 'postFormEvent']) !!}
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <div id="gender-input" class="form-group">
                                Genre :
                                {!! Form::select('gender', $genders, null, ['class' => 'form-control']) !!}
                            </div>
                            <div id="expertise-input" class="form-group">
                                Domaine d'expertise :
                                {!! Form::select('expertise', $expertises, null, ['class' => 'form-control']) !!}
                            </div>
                            <div id="country-input" class="form-group">
                                Pays :
                                {!! Form::select('country', $countries, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="lastname-input" class="form-group">
                                {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
                            </div>
                            <div id="firstname-input" class="form-group">
                                {!! Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
                            </div>
                            <div id="mail-input" class="form-group">
                                {!! Form::text('mail', null, ['class' => 'form-control', 'placeholder' => 'Adresse mail']) !!}
                            </div>
                            <div id="phone-input" class="form-group">
                                {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Téléphone']) !!}
                                {!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div id="address-input" class="form-group">
                                {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Adresse']) !!}
                            </div>
                            <div id="department-input" class="form-group}">
                                {!! Form::text('department', null, ['class' => 'form-control', 'placeholder' => 'Département']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                Repas :
                                <div id="datepicker-eat"></div>
                                {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        {!! Form::submit('Envoyer !', ['class' => 'btn btn-primary', 'id' => 'postFormContact-btn']) !!}
                    </div>
                {!! Form::close() !!}
                {{-- </div>--}}
            </div>

            @endif
        </div>
    </div>

@stop