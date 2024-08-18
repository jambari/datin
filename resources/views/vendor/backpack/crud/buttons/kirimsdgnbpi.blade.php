@if ($crud->hasAccess('kirimsdgnbpi'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/kirimsdgnbpi') }}" class="btn btn-xs btn-success"><i class="fa fa-send"></i> Kirim ke SDG</a>
@endif