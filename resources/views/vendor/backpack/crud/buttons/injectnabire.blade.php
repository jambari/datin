@if ($crud->hasAccess('injectnabire'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/injectnabire') }}" class="btn btn-xs btn-success"><i class="fa fa-read"></i>inject</a>
@endif
