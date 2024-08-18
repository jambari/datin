@if ($crud->hasAccess('sorongtemplatebalai'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/sorong/template/balai') }}" class="btn btn-xs btn-warning"><i class="fa fa-map"></i>Template Balai</a>
@endif