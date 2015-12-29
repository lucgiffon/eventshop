<?php

$class = 'default';
$value = '&nbsp;' . $value;

if(isset($isgenerated))
    if(file_exists(base_path('/storage/exports/attestation_' . $isgenerated . '.pdf')))
    {
        $class = 'success';
        $value = '&nbsp;Attestation générée';
    }

?>

<td>
    <a class="btn btn-{{ $class }} btn-sm btnAction flat btnActionTop" href="{{ $url }}" data-href="{{ $url }}" @if ($style == 'short') data-toggle="tooltip" title="{{ $value }}" @endif target="{{ $target }}">
        @if ($icon)
            <i class="fa {{ $icon }}"></i>
        @endif
        @if ($style == 'long')
            {{ $value }}
        @endif
    </a>
</td>