@if ($crud->hasAccess('peta'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/peta') }}" class="btn btn-xs btn-success"><i class="fa fa-map"></i> Peta</a>
@endif