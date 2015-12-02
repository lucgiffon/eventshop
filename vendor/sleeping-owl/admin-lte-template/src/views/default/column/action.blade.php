<?php

$class = 'primary';
$value = '&nbsp;' . $value;
$disabled = '';

if($icon == 'fa-download')
	$disabled = 'disabled="disabled"';

if(isset($isgenerated))
	if(file_exists(base_path('/storage/exports/attestation_' . $isgenerated . '.pdf')))
	{
		if($icon == 'fa-file-pdf-o')
		{
			$url = '';
			$class = 'success';
			$value = '&nbsp;Attestation générée';
			$target = '';
			$disabled = 'disabled="disabled"';
		}
		else if($icon == 'fa-download')
		{
			$disabled = '';
		}
	}

?>

<td>
	<a {{ $disabled }} class="btn btn-{{ $class }} btn-sm btnAction flat btnActionTop" href="{{ $url }}" data-href="{{ $url }}" @if ($style == 'short') data-toggle="tooltip" title="{{ $value }}" @endif target="{{ $target }}">
		@if ($icon)
			<i class="fa {{ $icon }}"></i>
		@endif
		@if ($style == 'long')
			{{ $value }}
		@endif
	</a>
</td>