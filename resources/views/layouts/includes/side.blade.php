<div id="left-menu">
  	<div class="sub-left-menu scroll">
    	<ul class="nav nav-list">
        <li><div class="left-bg"></div></li>
	        <li class="time">
	          	<h1 class="animated fadeInLeft">21:00</h1>
	          	<p class="animated fadeInRight">Sat,October 1st {{ date('Y') }}</p>
	        </li>
	        <li class="active ripple">
	          	<a class="tree-toggle nav-header">
	          		<span class="fa-home fa"></span> Home Links 
		            <span class="fa-angle-right fa right-arrow text-right"></span>
		        </a>
		        <ul class="nav nav-list tree">
		            <li><a href="{{ route('home') }}"> Home </a></li>
		            <li><a href="{{ route('admin') }}"> Administrator </a></li>
		        </ul>
	        </li>
	        <li class="ripple">
		        <a class="tree-toggle nav-header">
		            <span class="fa-list fa"></span> Incidences
		            <span class="fa-angle-right fa right-arrow text-right"></span>
		        </a>
		        <ul class="nav nav-list tree">
		            <li><a href="{{ route('incidents.index') }}"> All Incidences </a></li>
		            <li><a href="{{ route('incidents.create') }}"> Report Case </a></li>
		            <li><a href="javascript:void(0)"> Map of Incidents </a></li>
		        </ul>
	        </li>
	        <li class="ripple">
		        <a class="tree-toggle nav-header">
		            <span class="fa-diamond fa"></span> Posts
		            <span class="fa-angle-right fa right-arrow text-right"></span>
		        </a>
		        <ul class="nav nav-list tree">
		            <li><a href="{{ route('posts.index') }}"> All Posts </a></li>
		            <li><a href="{{ route('posts.create') }}"> Add Post </a></li>
		        </ul>
	        </li>
	        <li class="ripple">
	        	<a class="tree-toggle nav-header">
	        		<span class="fa fa-pencil-square"></span> Questions  
	        		<span class="fa-angle-right fa right-arrow text-right"></span> 
	        	</a>
		        <ul class="nav nav-list tree">
		            <li><a href="{{ route('questions.index') }}"> My Questions </a></li>
		            <li><a href="{{ route('questions.create') }}"> Ask Question </a></li>
		        </ul>
	        </li>
	        <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-check-square-o"></span> Reports  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
		        <ul class="nav nav-list tree">
		            <li><a href="{{ route('reports.index') }}"> Incident Reports </a></li>
		            <li><a href="{{ route('reports.index') }}"> All Reports </a></li>
		            <li><a href="{{ route('reports.create') }}"> Add New </a></li>
		        </ul>
	        </li>
	        <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-gear"></span> Management  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
		        <ul class="nav nav-list tree">
		            <li><a href="{{ route('projects.index') }}"> Projects </a></li>
		            <li><a href="{{ route('departments.index') }}"> Departments </a></li>
		            <li><a href="javascript:void(0)"> Reviews </a></li>
		        </ul>
	        </li>
	        <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-user"></span> User  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
		        <ul class="nav nav-list tree">
		            <li><a href="{{ route('profile') }}"> My Profile </a></li>
		            <li><a href="javascript:void(0)"> My Settings </a></li>
		        </ul>
	        </li>
	        <li class="text-center">
	        	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-power-off"></i> Logout </a>
	        	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
	        </li>
        	<!-- <li><a href="">Credits</a></li> -->
      </ul>
    </div>
</div>