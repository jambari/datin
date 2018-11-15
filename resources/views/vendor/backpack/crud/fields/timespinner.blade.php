<div @include('crud::inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
    <input
        name="{{ $field['name'] }}"
        value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
        style="width:100%;"
        class="easyui-timespinner"
        data-options="min:'00:00:00',showSeconds:true"
        @include('crud::inc.field_attributes')
    >

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>


@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))
  {{-- FIELD EXTRA CSS  --}}
  {{-- push things in the after_styles section --}}

      @push('crud_fields_styles')
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/adminlte/') }}/dist/js/jeasyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/adminlte/') }}/dist/js/jeasyui/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/adminlte/') }}/dist/js/jeasyui/themes/color.css">
      @endpush


  {{-- FIELD EXTRA JS --}}
  {{-- push things in the after_scripts section --}}

      @push('crud_fields_scripts')
        <script type="text/javascript" src="{{ asset('vendor/adminlte') }}/dist/js/jeasyui/jquery.easyui.min.js"></script>
});
        </script>
      @endpush
@endif