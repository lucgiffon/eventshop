@extends('template')

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
                            {!! Form::open(['url' => 'confirm']) !!}
                            {{ csrf_field() }}
                            <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                                {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
                                {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
                                {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
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
                            <div class="form-group {!! $errors->has('EventName') ? 'has-error' : '' !!}">
                                {!! Form::text('EventName', null, ['class' => 'form-control', 'placeholder' => "Titre de l'événement"]) !!}
                                {!! $errors->first('EventName', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group {!! $errors->has('EventAddr') ? 'has-error' : '' !!}">
                                {!! Form::text ('EventAddr', null, ['class' => 'form-control', 'placeholder' => "Adresse de l'événement"]) !!}
                                {!! $errors->first('EventAddr', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {!! $errors->has('EventBeginDate') ? 'has-error' : '' !!}">
                                        <div class="input-group">
                                            <span class="input-group-addon">Date de début</span>
                                            {!! Form::date ('EventBeginDate', null, ['class' => 'form-control', 'placeholder' => "Date de début"]) !!}
                                            {!! $errors->first('EventBeginDate', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {!! $errors->has('EventEndDate') ? 'has-error' : '' !!}">
                                        <div class="input-group">
                                            <span class="input-group-addon">Date de fin</span>
                                            {!! Form::date ('EventEndDate', null, ['class' => 'form-control', 'placeholder' => "Date de fin"]) !!}
                                            {!! $errors->first('EventEndDate', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {!! $errors->has('EventDescr') ? 'has-error' : '' !!}">
                                {!! Form::textarea ('EventDescr', null, ['class' => 'form-control', 'placeholder' => "Description de l'événement"]) !!}
                                {!! $errors->first('EventDescr', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group {!! $errors->has('EventPicture') ? 'has-error' : '' !!}">
                                <p>Choisissez un logo pour votre événement: </p>
                                {!!  Form::file('EventPicture', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('EventPicture', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop