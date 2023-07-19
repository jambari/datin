@if ($crud->hasAccess('unduh'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/logbook') }}" class="btn btn-xs btn-success" target="_blank" ><i class="fa fa-print" ></i> Print</a>
@endif