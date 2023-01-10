@if ($crud->hasAccess('kirimsdgjay'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/kirimsdgjay') }}" class="btn btn-xs btn-success"><i class="fa fa-send"></i> Kirim ke SDG</a>
@endif