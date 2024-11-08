@if ($crud->hasAccess('infonganjuk'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/infonganjuk') }}" class="btn btn-xs btn-success"><i class="fa fa-map"></i> Infogempa</a>
@endif