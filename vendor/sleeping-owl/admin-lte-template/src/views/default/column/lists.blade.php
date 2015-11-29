<td>
	<ul class="list-unstyled">
		@foreach ($values as $value)
			<li><div class="@if(isset($append)) pull-left @endif">{{ $value }}</div> {!! $append !!}</li> <!-- TODO: Afficher l'id de chaque evenement dans la requete -->
		@endforeach
	</ul>
</td>