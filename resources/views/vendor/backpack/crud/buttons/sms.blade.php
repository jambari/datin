@if ($crud->hasAccess('sms'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/sms') }}" class="btn btn-xs btn-success"><i class="fa fa-read"></i>sms</a>
@endif
