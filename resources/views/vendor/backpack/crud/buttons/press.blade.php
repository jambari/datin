@if ($crud->hasAccess('press'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/press') }}" class="btn btn-xs btn-success"><i class="fa fa-read"></i>Press Release</a>
@endif