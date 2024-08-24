@if ($crud->hasAccess('press'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/press') }}" class="btn btn-xs btn-info"><i class="fa fa-read"></i>PRESS RELEASE</a>
@endif