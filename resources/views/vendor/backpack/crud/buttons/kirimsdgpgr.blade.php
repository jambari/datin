@if ($crud->hasAccess('kirimsdgpgr'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/kirimsdgpgr') }}" class="btn btn-xs btn-success"><i class="fa fa-send"></i> Kirim ke SDG</a>
@endif