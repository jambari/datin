@extends('layanan') @section('title')

<title>Permintaan Data dan Informasi</title>
@endsection @section('content')

<div class="container">
    <div class="section">
        <nav>
            <div class="nav-wrapper red accent-3">
                <div class="col s12">
                    <a href="/layanandata" class="breadcrumb">Home</a>
                    <a href="/layanandata/data" class="breadcrumb">Permintaan Data dan Informasi</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="section">
        <div class="row">
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ asset('images/layanan/page01.jpg') }}">
                    </div>
                    <div class="card-content">
                        <span class="card-title red-text text-accent-3">Peta Kegempaan</span>
                        <p>Peta Kegempaan merupakan informasi sebaran gempabumi untuk perencanaan kontruksi. Tarif dibawah berlaku untuk data per tahun. Tarif berlaku kelipatan sesuai jumlah tahun yang diminta.</p>
                    </div>
                    <div class="card sticky-action">
                        <div class="card-action">
                            <a href="#">Rp250.000</a>
                            <a href="/layanandata/formulir/1">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ asset('images/layanan/page03.jpg') }}">
                    </div>
                    <div class="card-content">
                        <span class="card-title red-text text-accent-3">Peta Tingkat Kerawanan Petir</span>
                        <p>Informasi geofisika berupa peta tingkat kerawanan petir per lokasi per tahun</p>
                    </div>
                    <div class="card sticky-action">
                        <div class="card-action">
                            <a href="#">Rp200.000</a>
                            <a href="/layanandata/formulir/2">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ asset('images/layanan/page04.jpg') }}">
                    </div>
                    <div class="card-content">
                        <span class="card-title red-text text-accent-3">Waktu Terbit dan Terbenam Matahari atau Bulan</span>
                        <p>Informasi geofisika berupa waktu terbit dan terbenam matahari dan bulan per lokasi per tahun</p>
                    </div>
                    <div class="card sticky-action">
                        <div class="card-action">
                            <a href="#">Rp50.000</a>
                            <a href="/layanandata/formulir/3">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="row">
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ asset('images/layanan/kejadianpetir.jpg') }}">
                    </div>
                    <div class="card-content">
                        <span class="card-title red-text text-accent-3">Peta Kejadian Petir</span>
                        <p>Peta Kejadian Petir merupakan informasi geofisika berisi sebaran sambaran petir per hari per lokasi.Tarif berlaku kelipatan sesuai jumlah hari</p>
                    </div>
                    <div class="card sticky-action">
                        <div class="card-action">
                            <a href="#">Rp75.000</a>
                            <a href="/layanandata/formulir/4">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ asset('images/layanan/card-epoch.jpeg') }}">
                    </div>
                    <div class="card-content">
                        <span class="card-title red-text text-accent-3">Buku dan Peta Variasi Magnetbumi (Epoch)</span>
                        <p>Buku berisi peta variasi magnet bumi per tahun yang dirangkum selama 5 (lima) tahun. Semua tujuh komponen magnetbumi (H,D,Z,I, dan F) berada dalam buku ini.</p>
                    </div>
                    <div class="card sticky-action">
                        <div class="card-action">
                            <a href="#">Rp300.000</a>
                            <a href="/layanandata/formulir/7">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection