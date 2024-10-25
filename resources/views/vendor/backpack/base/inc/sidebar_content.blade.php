
<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
@if (backpack_auth()->user()->name == 'balai5')
	<li><a href="{{ backpack_url('balaigempa') }}"><i class="wi wi-earthquake"></i> <span>Repositori PGR V</span></a></li>
<li><a href="{{ backpack_url('joingempa') }}"><i class="wi wi-earthquake" style="margin-right: 0.5em;"></i> <span>ESDX PGR V JAY NBPI</span></a></li>
<li><a href="{{ backpack_url('significant') }}"><i class="wi wi-earthquake" style="margin-right: 0.5em;"></i> <span>SIGNIFIKAN / MANUAL</span></a></li>
<li><a href="{{ backpack_url('satudatagempa') }}"><i class="wi wi-earthquake"></i> <span>Satu Data Gempa</span></a></li>
<li><a href="{{ backpack_url('gempa') }}"><i class="wi wi-earthquake"></i> <span>Repositori JAY</span></a></li>
<li><a href="{{ backpack_url('gempanabire') }}"><i class="wi wi-earthquake"></i> <span>Repositori NBPI</span></a></li>
<li><a href="{{ backpack_url('gempasorong') }}"><i class="wi wi-earthquake"></i> <span>Repositori SWI</span></a></li>
<li><a href="{{ backpack_url('satudatagempa') }}"><i class="wi wi-earthquake"></i> <span>Satu Data Gempa</span></a></li>
@elseif (backpack_auth()->user()->name == 'mendat.bawil5')
<li class="treeview">
		<a href="#"> <i class="wi wi-dust" style="margin-right: 0.5em;"></i><span>Kualitas Udara</span> <i class="fa fa-angle-left pull-right"></i> </a>
	<ul class="treeview-menu">
		<li><a href="{{ backpack_url('hujan') }}"><i class="wi wi-raindrops" style="margin-right: 0.5em;"></i> <span>Hujan</span></a></li>
{{-- 		<li><a href="{{ backpack_url('kah') }}"><i class="wi wi-dust" style="margin-right: 0.5em;"></i> <span>KAH</span></a></li>
		<li><a href="{{ backpack_url('spm') }}"><i class="wi wi-humidity" style="margin-right: 0.5em;"></i> <span>SPM</span></a></li> --}}
	</ul>
</li>


@elseif (backpack_auth()->user()->name == 'nabire')
<li><a href="{{ backpack_url('gempanabire') }}"><i class="wi wi-earthquake"></i> <span>Repositori Gempa Nabire</span></a></li>
<li><a href="{{ backpack_url('joingempa') }}"><i class="wi wi-earthquake" style="margin-right: 0.5em;"></i> <span>ESDX PGR V DAN ANGKASA</span></a></li>
<li><a href="{{ backpack_url('significant') }}"><i class="wi wi-earthquake" style="margin-right: 0.5em;"></i> <span>SIGNIFIKAN / MANUAL</span></a></li>
<li><a href="{{ backpack_url('satudatagempa') }}"><i class="wi wi-earthquake"></i> <span>Satu Data Gempa</span></a></li>
@elseif (backpack_auth()->user()->name == 'sorong')
<li><a href="{{ backpack_url('gempasorong') }}"><i class="wi wi-earthquake"></i> <span>Repositori</span></a></li>
<li><a href="{{ backpack_url('joingempa') }}"><i class="wi wi-earthquake" style="margin-right: 0.5em;"></i> <span>ESDX PAPUA</span></a></li>
<li><a href="{{ backpack_url('satudatagempa') }}"><i class="wi wi-earthquake"></i> <span>Satu Data Gempa</span></a></li>
@else



<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
{{-- <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> --}}

<li class="treeview">
<a href="#"><i class="wi wi-earthquake" style="margin-right: 0.5em;"></i><span>Gempabumi</span><i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
	<li><a href="/gempa/jay"><i class="wi wi-earthquake"></i> <span>GEMPA TERKINI ANGKASA</span></a></li>
	<li><a href="{{ backpack_url('gempa') }}"><i class="wi wi-earthquake"></i> <span>Repositori JAY</span></a></li>
	<!-- <li><a href="{{ backpack_url('infogempa') }}"><i class="fa fa-envelope"></i></i> <span>Info Gempa</span></a></li> -->
{{-- 	<li><a href="{{ backpack_url('mercally') }}"><i class="fa fa-envelope"></i></i> <span>MMI</span></a></li> --}}
{{-- <li><a href="{{ backpack_url('balaisms') }}"><i class="fa fa-envelope"></i></i> <span>Info Gempa PGR V</span></a></li> --}}
<li><a href="{{ backpack_url('joingempa') }}"><i class="wi wi-earthquake" style="margin-right: 0.5em;"></i> <span>ESDX PGR V DAN ANGKASA</span></a></li>
<li><a href="{{ backpack_url('significant') }}"><i class="wi wi-earthquake" style="margin-right: 0.5em;"></i> <span>SIGNIFIKAN / MANUAL</span></a></li>
<li><a href="{{ backpack_url('balaigempa') }}"><i class="wi wi-earthquake"></i> <span>Repositori PGR V</span></a></li>
<li><a href="{{ backpack_url('gempanabire') }}"><i class="wi wi-earthquake"></i> <span>Repositori NBPI</span></a></li>
<li><a href="{{ backpack_url('gempasorong') }}"><i class="wi wi-earthquake"></i> <span>Repositori SWI</span></a></li>
<li><a href="{{ backpack_url('satudatagempa') }}"><i class="wi wi-earthquake"></i> <span>Satu Data Gempa</span></a></li>


	</ul>
</li>



<li><a href="{{ backpack_url('hujan') }}"><i class="wi wi-raindrops" style="margin-right: 0.5em;"></i> <span>Hujan</span></a></li>
<!-- <li class="">
		<a href="{{ backpack_url('hujan') }}"> <i class="wi wi-dust" style="margin-right: 0.5em;"></i><span>Hujan</span> <i class="fa fa-angle-left pull-right"></i> </a>
	 <ul class="treeview-menu">
		<li><a href="{{ backpack_url('hujan') }}"><i class="wi wi-raindrops" style="margin-right: 0.5em;"></i> <span>Hujan</span></a></li>
	<li><a href="{{ backpack_url('kah') }}"><i class="wi wi-dust" style="margin-right: 0.5em;"></i> <span>KAH</span></a></li>
		<li><a href="{{ backpack_url('spm') }}"><i class="wi wi-humidity" style="margin-right: 0.5em;"></i> <span>SPM</span></a></li> --}}
	</ul>
</li> -->

<!-- <li class="treeview">
	<a href="#"><i class="fa fa-magnet"></i><span>Magnetbumi</span><i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
{{-- 		<li><a href="{{ backpack_url('kindek') }}"><i class="wi wi-storm-warning" style="margin-right: 0.5em;"></i> <span>Kindek</span></a></li> --}}
		<li><a href="{{ backpack_url('magnet') }}"><i class="wi wi-storm-warning" style="margin-right: 0.5em;"></i> <span>Variasi</span></a></li>
		<li><a href="{{ backpack_url('absolut') }}"><i class="wi wi-storm-warning" style="margin-right: 0.5em;"></i> <span>Absolut</span></a></li>
	</ul>
</li> -->


<!-- <li class="treeview">
	<a href="#"><i class="fa fa-lightning"></i><span>Petir</span><i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu"> -->
	<!-- <li><a href="{{ backpack_url('petir') }}"><i class="wi wi-lightning" style="margin-right: 0.5em;"></i> <span>Petir</span></a></li> -->
<!-- 	</ul>
</li>
 -->

<!-- {{-- <li class="treeview">
	<a href="#"> <i class="wi wi-lightning" style="margin-right: 0.5em;"></i><span>Listrik Udara</span> <i class="fa fa-angle-left pull-right"></i> </a>
	<ul class="treeview-menu">
		<li><a href="{{ backpack_url('summary') }}"><i class="wi wi-storm-warning" style="margin-right: 0.5em;"></i> <span>Summary</span></a></li>
	</ul>

</li> --}} -->




<li class="treeview">
	<a href="#"><i class="fa fa-newspaper-o"></i> <span>Berita</span> <i class="fa fa-angle-left pull-right"></i></a>

</li>
<!--
<li><a href="{{ backpack_url('lapbul') }}"><i class="fa fa-book" style="margin-right: 0.5em;"></i> <span>Laporan Bulanan (Under Construction)</span></a></li>-->
<li><a href="{{ backpack_url('bulletin') }}"><i class="fa fa-book" style="margin-right: 0.5em;"></i> <span>Buletin</span></a></li>
{{-- <li><a href="{{ backpack_url('kegiatan') }}"><i class="fa fa-user" style="margin-right: 0.5em;"></i> <span>Kegiatan</span></a></li> --}}
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-file" style="margin-right: 0.5em;"></i> <span>File Manager</span></a></li>

{{-- <li><a href="{{ url('admin/menu-item') }}"><i class="fa fa-list"></i> <span>Menu</span></a></li>
<li><a href="{{ url(config('backpack.base.route_prefix').'/page') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li> --}}

<li><a href="{{ backpack_url('logbook') }}"><i class="fa fa-tasks"></i> <span>Logbook</span></a></li>

<li><a href='{{ backpack_url('layanan') }}'><i class='fa fa-envelope'></i> <span>Pelayanan</span></a></li>
<li><a href='{{ backpack_url('city') }}'><i class='fa fa-envelope'></i> <span>Daftar Kota</span></a></li>
@endif

<li class="treeview">
	<a href="#"><i class="fa fa-newspaper-o"></i> <span>LAPBUL DAN BULETIN</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href="/bahan/lapbul/gempa/"><i class="wi wi-earthquake"></i> <span>Gempa</span></a></li>
		<li><a href="/bahan/buletin/hujan/"><i class="wi wi-rain"></i> <span>Hujan</span></a></li>
		<!-- <li><a href="/sampel/hujan"><i class="wi wi-rain-mix"></i> <span>Sampel Hujan</span></a></li> -->
		<li><a href="/lapbul/ttm"><i class="wi wi-sunrise"></i> <span>Terbit Terbenam Matahari</span></a></li>
	</ul>
</li>

<li><a href="/admin/nyusahin"><i class="fa fa-envelope"></i> <span>NGREPOTIN :D :P :[ </span></a></li>

<!-- <li class="treeview">
	<a href="#"><i class="fa fa-newspaper-o"></i> <span>SLA OLA</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href="/latency"><i class="wi wi-earthquake"></i> <span>SLA SEISMIC <sub>under development</sub> </span></a></li>
		<li><a href="/availability"><i class="wi wi-earthquake"></i> <span>OLA SEISMIK <sub>under development</sub></span></a></li>
	</ul>
</li> -->

