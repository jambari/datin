@if ($crud->hasAccess('nabiretemplatebalai'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/nabire/template/balai') }}" class="btn btn-xs btn-warning"><i class="fa fa-map"></i>Template Balai</a>
@endif