@if ($crud->hasAccess('peta'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/peta') }}" class="btn btn-xs btn-default"><i class="fa fa-download"></i> Peta</a>
@endif