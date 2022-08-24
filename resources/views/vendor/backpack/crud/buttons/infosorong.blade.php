@if ($crud->hasAccess('infogempa'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/infosorong') }}" class="btn btn-xs btn-success"><i class="fa fa-map"></i> Infogempa</a>
@endif