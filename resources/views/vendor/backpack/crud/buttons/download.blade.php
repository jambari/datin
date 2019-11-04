@if ($crud->hasAccess('download'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/download') }}" class="btn btn-xs btn-success"><i class="fa fa-read"></i>Download</a>
@endif