<div class="row">
    <div class=" col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                {{ $event->tanggal }} {{ $event->origin }}
            </div>
            <div class="box-body" >
                <div class="row">
                    <div class="container-fluid">
                        {!! $event->narasi !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>