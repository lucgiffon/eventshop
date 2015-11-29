<?php

$img = 'imagePHPExceltemp.jpg';
file_put_contents($img, file_get_contents($event->logo));

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body border="0" style="text-align:center" align="center">
        <h1 align="center">Certificat de participation</h1>
        <img align="center" width="367px" src="{{ $img }}" alt="logo-event">
        <br>
        <h2 align="center"><b>{{ $participant->gender->name }} {{ $participant->lastname }} {{ $participant->firtstname }}</b></h2>
        <h3 align="center"><i>participe à l'événement</i></h3>
        <h2 align="center">{{ $event->title }}</h2>
        <h4 align="center"><i>à la date du</i></h4>
        <h3 align="center">{{ $event->begindate }}</h3>
        <h4 align="center"><i>jusqu'au</i></h4>
        <h3 align="center">{{ $event->enddate }}</h3>
    </body>
</html>