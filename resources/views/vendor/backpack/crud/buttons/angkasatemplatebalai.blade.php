@if ($crud->hasAccess('angkasatemplatebalai'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/angkasa/template/balai') }}" class="btn btn-xs btn-warning"><i class="fa fa-map"></i>Template Balai</a>
@endif