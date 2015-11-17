
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
</div>