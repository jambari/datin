@extends('infos.layout')
@section('after_style')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container" style="margin-top: 3%;">
                <h3 class="text-center" >Daftar Infogempa</h3>
            </div>

                <div class="row" style="margin-top: 3%;">
                <table class="table table-hover table-striped table-responsive">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lintang</th>
                    <th scope="col">Bujur</th>
                    <th scope="col">SMS</th>
                    <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                @if ($infos)
                    @foreach ($infos as $info)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td> {{ $info->lintang }}</td>
                        <td> {{ $info->bujur }} </td>
                        <td> {{ $info->sms }} </td>
                        <td>
                            <a href="/infogempa/peta/{{ $info->id }}" class="btn btn-primary">Peta</a>

                        </td>
                    </tr>
                    @endforeach
                    {!! $infos->links() !!}
                @endif
             </div>
        </div>
    </div>
</div>
    <!-- end of container -->
@endsection

@section('script')
@endsection

