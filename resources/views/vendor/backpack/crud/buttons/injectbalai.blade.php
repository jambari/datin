@if ($crud->hasAccess('injectbalai'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/injectbalai') }}" class="btn btn-xs btn-success"><i class="fa fa-read"></i>inject</a>
@endif
