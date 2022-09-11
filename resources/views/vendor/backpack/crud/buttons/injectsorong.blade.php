@if ($crud->hasAccess('injectsorong'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/injectsorong') }}" class="btn btn-xs btn-success"><i class="fa fa-read"></i>inject</a>
@endif
