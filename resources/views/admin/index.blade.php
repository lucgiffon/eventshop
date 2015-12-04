
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

    <div class="col-lg-3">
        <div id="participantsByGenderCount" style="height: 250px;"></div>
    </div>

    <div class="col-lg-6">
        <div id="eat" style="height: 250px;"></div>
    </div>

    <script>
        dataparticipantsByExpertiseCount = [
                @foreach ($participantsByExpertiseCount as $participantByExpertiseCount)
                    {label: "{!! $participantByExpertiseCount['name'] !!}", value: {{$participantByExpertiseCount['count']}}},
            @endforeach
        ];

        dataparticipantsByGenderCount = [
                @foreach ($participantsByGenderCount as $participantByGenderCount)
                    {label: "{!! $participantByGenderCount['name'] !!}", value: {{$participantByGenderCount['count']}}},
            @endforeach
        ];

        dataEat = [];
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: 'getEat/300/85',
            success: function (response) {
                dataEat = response;

                Morris.Line({
                    // ID of the element in which to draw the chart.
                    element: 'eat',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: dataEat,
                    // The name of the data record attribute that contains x-values.
                    xkey: 'date',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['value'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['Repas'],
                    // Sets the x axis labelling interval. By default the interval will be automatically computed.
                    xLabels: "day",
                    resize: true
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
            }
        })
    </script>
</div>