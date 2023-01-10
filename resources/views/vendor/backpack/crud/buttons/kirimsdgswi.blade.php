@if ($crud->hasAccess('kirimsdgswi'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/kirimsdgswi') }}" class="btn btn-xs btn-success"><i class="fa fa-send"></i> Kirim ke SDG</a>
@endif