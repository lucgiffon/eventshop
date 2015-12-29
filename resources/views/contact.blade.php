@extends('template')

@section('homescripts')

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/locales/bootstrap-datepicker.fr.min.js"></script>
    <script src="{{ URL::asset('js/jquery.gritter.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $( "#datepicker_begin" ).datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                startDate: "{{ date('d/m/Y', strtotime('tomorrow UTC')) }}",
            })
            .on('changeDate', function(e)
            {
                $("#datepicker_end").datepicker('setStartDate', e.date);
            });

            $( "#datepicker_end" ).datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,

            })
            .on('changeDate', function(e)
            {
                $("#datepicker_begin").datepicker('setEndDate', e.date);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){

            var panel = $('.contactform_wrapper').collapse();
            panel.on('hidden.bs.collapse', function (e) {
                if ($(this).is(e.target)) {
                    panelBody = $('.contact_form-body');
                    panelBody.addClass('text-center text-success');
                    panelBody.html('Votre message a été transmis aux administrateurs.');
                    $('.panel-footer').html('');
                    $('.contactform_wrapper').collapse('show');
                }
            });


            $('#postFormContact').submit(function (e) {
                e.preventDefault();

                var formData = new FormData(this);

                var nom = $('#postFormContact [name="nom"]').val();
                var email = $('#postFormContact [name="email"]').val();
                var texte = $('#postFormContact [name="texte"]').val();

                var eventName = $('#postFormContact [name="eventName"]').val();
                var eventAddr = $('#postFormContact [name="eventAddr"]').val();
                var eventBeginDate = $('#postFormContact [name="eventBeginDate"]').val();
                var eventEndDate = $('#postFormContact [name="eventEndDate"]').val();
                var eventDescr = $('#postFormContact [name="eventDescr"]').val();
                var eventPicture = $('#postFormContact [name="eventPicture"]').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: $(this).attr('action'),
                    type: "post",
                    contentType: false, // obligatoire pour de l'upload
                    processData: false,
                    /*data: {
                        'nom' : nom,
                        'email' : email,
                        'texte' : texte,
                        'eventName' : eventName,
                        'eventAddr' : eventAddr,
                        'eventBeginDate' : eventBeginDate,
                        'eventEndDate' : eventEndDate,
                        'eventDescr' : eventDescr,
                        'eventPicture' : eventPicture
                    },*/
                    data: formData,
                    success: function (data) {
                        console.log(data);
                        $('.contactform_wrapper').collapse('hide');
                    },
                    error: function(data){
                        console.log(data.responseText);

                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.error, function(index, value) {
                            $('#postFormContact #' + index + '-input').addClass('has-error');
                            $('#postFormContact #' + index + '-input').prepend(value);

                        });
                    }
                });
            });
        });
    </script>

@stop


@section('homestyles')

    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
{{--
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
--}}

    @stop

    @section('contenu')

            <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nous contacter
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Map Column -->
        <div class="col-md-8">
            <!-- Embedded Google Map -->
            <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.951438781762!2d5.437445215744267!3d43.23147778761538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9b9adb8f06c67%3A0x909b2f1ed0fb048b!2sFacult%C3%A9+des+Sciences+de+Luminy!5e0!3m2!1sfr!2sfr!4v1445531956991"></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h3>Informations</h3>
            <p>
                Faculté des sciences de Luminy<br>13009, Marseille
            </p>
            <p><i class="fa fa-phone"></i>
                (123) 456-7890</p>
            <p><i class="fa fa-envelope-o"></i>
                <a href="mailto:contact@eventshop.com">contact@eventshop.com</a>
            </p>
        </div>
    </div>
    <!-- /.row -->


    <div class="row">
        <div class="col-sm-12">
            <div class="contactform_wrapper">
                <div class="contact_form-body">
                    {!! Form::open(['url' => 'postFormContact', 'method' => 'POST', 'id' => 'postFormContact', 'files' => true]) !!}
                    {{ csrf_field() }}
                    <div class="panel panel-default contact_form">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                {{--<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
                                Contactez l'administrateur
                                {{--  </a>--}}
                            </h4>
                        </div>
                        {{-- <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">--}}
                        <div class="panel-body">

                            <div id="nom-input" class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                                {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
                                {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div id="email-input" class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
                                {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div id="texte-input" class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
                                {!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'Votre message']) !!}
                                {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                        {{-- </div>--}}
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Proposer un événement (optionnel)
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div id="eventName-input" class="form-group {!! $errors->has('eventName') ? 'has-error' : '' !!}">
                                    {!! Form::text('eventName', null, ['class' => 'form-control', 'placeholder' => "Titre de l'événement"]) !!}
                                    {!! $errors->first('eventName', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div id="eventAddr-input" class="form-group {!! $errors->has('eventAddr') ? 'has-error' : '' !!}">
                                    {!! Form::text ('eventAddr', null, ['class' => 'form-control', 'placeholder' => "Adresse de l'événement"]) !!}
                                    {!! $errors->first('eventAddr', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group {!! $errors->has('eventBeginDate') ? 'has-error' : '' !!}">
                                            <div id="eventBeginDate-input" class="input-group date">
                                                <span class="input-group-addon">Date de début</span>
                                                {!! Form::text ('eventBeginDate', null, ['id' => 'datepicker_begin', 'class' => 'form-control']) !!}
                                                {!! $errors->first('eventBeginDate', '<small class="help-block">:message</small>') !!}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="eventEndDate-input" class="form-group {!! $errors->has('eventEndDate') ? 'has-error' : '' !!}">
                                            <div class="input-group date">
                                                <span class="input-group-addon">Date de fin</span>
                                                {!! Form::text ('eventEndDate', null, ['id' => 'datepicker_end', 'class' => 'form-control']) !!}
                                                {!! $errors->first('eventEndDate', '<small class="help-block">:message</small>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="eventDescr-input" class="form-group {!! $errors->has('eventDescr') ? 'has-error' : '' !!}">
                                    {!! Form::textarea ('eventDescr', null, ['class' => 'form-control', 'placeholder' => "Description de l'événement"]) !!}
                                    {!! $errors->first('eventDescr', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div id="eventPicture-input" class="form-group {!! $errors->has('eventPicture') ? 'has-error' : '' !!}">
                                    <p>Choisissez un logo pour votre événement: </p>
                                    {!!  Form::file('eventPicture', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('eventPicture', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Envoyer !', ['class' => 'btn btn-primary', 'id' => 'postFormContact-btn']) !!}
                    {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>

@stop
