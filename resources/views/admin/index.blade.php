
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><i class="fa fa-graduation-cap fa-fw"></i> Participants par domaine d'expertise</h4>
            </div>
            <div class="panel-body">
                <div id="participantsByExpertiseCount" style="height: 250px;"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><i class="fa fa-intersex fa-fw"></i> Participants pour chaque genre</h4>
            </div>
            <div class="panel-body">

                <div id="participantsByGenderCount" style="height: 250px;"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="form-inline  pull-right">
                    <div class="form-group">
                        <select class="form-control" title="id événement" id="idEventForEat">
                            @foreach($eventAll as $event)
                                <option @if($event->id == 3 ) selected="selected" @endif value="{{ $event->id }}">{{ $event->title }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" title="nombre jour"  id="nbrDayForEat">
                            <option selected="selected" value="7">une semaine</option>
                            <option value="14">deux semaines</option>
                            <option value="30">un mois</option>
                            <option value="90">trois mois</option>
                        </select>
                    </div>
                </div>
                <h4><i class="fa fa-cutlery fa-fw"></i> Repas par jour, par événement</h4>
            </div>
            <div class="panel-body">
                <div id="eat" style="height: 250px;"></div>
            </div>
        </div>
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
        var eventIdGlobal = 3, daysGlobal = 14;
        var eatMorrisLine;

        $('#idEventForEat').change(function() {
            eventIdGlobal = $(this).val();

            refreshEat($(this).val(), daysGlobal)
        });

        $('#nbrDayForEat').change(function() {
            daysGlobal = $(this).val();

            refreshEat(eventIdGlobal, $(this).val())
        });

        function refreshEat (eventId, days) {
            eventId = eventId || '3';
            days = days || '14';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: 'getEat/' + days + '/' + eventId,
                success: function (response) {
                    dataEat = response;

                    eatMorrisLine.setData(response);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            })
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: 'getEat/14/3',
            success: function (response) {
                dataEat = response;

                eatMorrisLine = Morris.Line({
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
                    resize: true,
                    xLabelFormat: function (date) {
                        return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
                    },
                    dateFormat: function (date) {
                        d = new Date(date);
                        return d.getDate() + '/' + (d.getMonth() + 1) + '/' + d.getFullYear();
                    }
                });
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        })
    </script>
</div>