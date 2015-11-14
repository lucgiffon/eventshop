
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Bienvenue sur l'administration</h1>
    </div>
</div>

<div class="row">
    @include('admin.partial.infoBlock', ['title' => $eventCount,
        'label' => 'Événement',
        'model' => 'events',
        'style' => 'primary',
        'icon' => 'fa-calendar'])
    @include('admin.partial.infoBlock', ['title' => $participantCount,
        'label' => 'Participants',
        'model' => 'participants',
        'style' => 'green',
        'icon' => 'fa-users'])
</div>