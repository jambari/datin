<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
{{-- <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> --}}
<li><a href="{{ backpack_url('gempa') }}"><i class="wi wi-earthquake"></i></i> <span>Gempabumi</span></a></li>
<li class="treeview">
	<a href="#"><i class="fa fa-magnet"></i><span>Magnetbumi</span><i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href="{{ backpack_url('kindek') }}"><i class="wi wi-storm-warning"></i></i> <span>Kindek</span></a></li>
		<li><a href="{{ backpack_url('deklinasi') }}"><i class="wi wi-storm-warning"></i></i> <span>Deklinasi</span></a></li>
		<li><a href="{{ backpack_url('inklinasi') }}"><i class="wi wi-storm-warning"></i></i> <span>Inklinasi</span></a></li>

		<li><a href="{{ backpack_url('absolut') }}"><i class="wi wi-storm-warning"></i></i> <span>Absolut</span></a></li>
	</ul>
</li>



<li class="treeview">
	<a href="#"> <i class="wi wi-lightning" ></i><span>Listrik Udara</span> <i class="fa fa-angle-left pull-right"></i> </a>
	<ul class="treeview-menu">
		<li><a href="{{ backpack_url('summary') }}"><i class="wi wi-storm-warning"></i> <span>Summary</span></a></li>		
	</ul>
	
</li>


<li class="treeview">
		<a href="#"> <i class="wi wi-dust" ></i><span>Kualitas Udara</span> <i class="fa fa-angle-left pull-right"></i> </a>
	<ul class="treeview-menu">
		<li><a href="{{ backpack_url('hujan') }}"><i class="wi wi-raindrops"></i> <span>Hujan</span></a></li>
		<li><a href="{{ backpack_url('kah') }}"><i class="wi wi-dust"></i> <span>KAH</span></a></li>
		<li><a href="{{ backpack_url('spm') }}"><i class="wi wi-humidity"></i> <span>SPM</span></a></li>
	</ul>
</li>


<li><a href="{{ url('admin/menu-item') }}"><i class="fa fa-list"></i> <span>Menu</span></a></li>
<li><a href="{{ url(config('backpack.base.route_prefix').'/page') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li>