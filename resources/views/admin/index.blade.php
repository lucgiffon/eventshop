
<div class="row">
    @include('admin._partials.index_info_block', ['title' => $contactsCount,
        'label' => 'Contacts',
        'model' => 'event',
        'style' => 'primary',
        'icon' => 'fa-calendar'])
    @include('admin._partials.index_info_block', ['title' => $companiesCount,
        'label' => 'Companies',
        'model' => 'participant',
        'style' => 'green',
        'icon' => 'fa-users'])
</div>