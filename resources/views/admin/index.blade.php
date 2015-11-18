
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Bienvenue sur l'administration</h1>
    </div>
</div>

<div class="row">
    @include('admin.partial.infoBlock', ['title' => $eventCount,
        'label' => 'Événement',
        'model' => 'Event',
        'style' => 'info',
        'icon' => 'fa-calendar'])
    @include('admin.partial.infoBlock', ['title' => $participantCount,
        'label' => 'Participants',
        'model' => 'Participant',
        'style' => 'success',
        'icon' => 'fa-users'])
    @include('admin.partial.infoBlock', ['title' => $pictureCount,
        'label' => 'Images',
        'model' => 'EventPicture',
        'style' => 'warning',
        'icon' => 'fa-picture-o'])
    @include('admin.partial.infoBlock', ['title' => $eatCount,
        'label' => 'Repas',
        'model' => 'Eat',
        'style' => 'danger',
        'icon' => 'fa-cutlery'])
</div>

<div class="row">
    <div class="col-lg-3">
        <div id="participantsByExpertiseCount" style="height: 250px;"></div>
    </div>

    <script>
        dataparticipantsByExpertiseCount = [
            @foreach ($participantsByExpertiseCount as $participantByExpertiseCount)
                {label: "{!! $participantByExpertiseCount['name'] !!}", value: {{$participantByExpertiseCount['count']}}},
            @endforeach
        ]
    </script>

    <div class="col-lg-3">
        <div id="participantsByGenderCount" style="height: 250px;"></div>
    </div>

    <script>
        dataparticipantsByGenderCount = [
                @foreach ($participantsByGenderCount as $participantByGenderCount)
                    {label: "{!! $participantByGenderCount['name'] !!}", value: {{$participantByGenderCount['count']}}},
            @endforeach
        ]
    </script>
</div>