<?php

Admin::menu()->url('/')->label('Accueil')->icon('fa-dashboard');
Admin::menu(App\Participant::class)->icon('fa-users');
Admin::menu(App\Event::class)->icon('fa-calendar');
Admin::menu(App\EventPicture::class)->icon('fa-picture-o');
Admin::menu(App\Expertise::class)->icon('fa-lemon-o');
Admin::menu(App\Gender::class)->icon('fa-intersex');
Admin::menu(App\Eat::class)->icon('fa-cutlery');