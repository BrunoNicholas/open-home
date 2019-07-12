<div id="left-menu">
  	<div class="sub-left-menu scroll">
    	<ul class="nav nav-list">
        <li>
        	<div class="left-bg"></div></li>
	        <li class="time">
	          	<h1 class="animated fadeInLeft">21:00</h1>
	          	<p class="animated fadeInRight">Sat,October 1st {{ date('Y') }}</p>
	        </li>
	        <li class="ripple @if(route('home') == Request::fullUrl() || route('messages.index','inbox') == Request::fullUrl() || route('admin') == Request::fullUrl()) active @endif">
	          	<a class="tree-toggle nav-header">
	          		<span class="fa-home fa"></span> Start
		            <span class="fa-angle-right fa right-arrow text-right"></span>
		        </a>
		        <ul class="nav nav-list tree">
		            <li class="@if(route('home') == Request::fullUrl()) active @endif"><a href="{{ route('home') }}"> <i class="fa-home fa text-info"></i> Home </a></li>
		            <li class="@if(route('messages.index','inbox') == Request::fullUrl()) active @endif"><a href="{{ route('messages.index','inbox') }}"> <i class="fa-envelope fa text-success"></i> Messages </a></li>
		            @role(['admin','super-admin'])
		            	<li class="text-danger @if(route('admin') == Request::fullUrl()) active @endif"><a href="{{ route('admin') }}"> <i class="fa-user-plus fa text-danger"></i> Administrator </a></li>
		            @endrole
		        </ul>
	        </li>
	        <li class="ripple @if(route('incidents.index') == Request::fullUrl() || route('incidents.create') == Request::fullUrl()) active @endif">
		        <a class="tree-toggle nav-header">
		            <span class="fa-list fa"></span> Incidences
		            <span class="fa-angle-right fa right-arrow text-right"></span>
		        </a>
		        <ul class="nav nav-list tree">
		            <li class="@if(route('incidents.index') == Request::fullUrl()) active @endif"><a href="{{ route('incidents.index') }}"> All Incidences </a></li>
		            <li class="@if(route('incidents.create') == Request::fullUrl()) active @endif"><a href="{{ route('incidents.create') }}"> Report Case </a></li>
		            <li><a href="javascript:void(0)"> Map of Incidents </a></li>
		        </ul>
	        </li>
	        <li class="ripple @if(route('posts.index') == Request::fullUrl()) active @endif">
		        <a class="tree-toggle nav-header">
		            <span class="fa-diamond fa"></span> Posts
		            <span class="fa-angle-right fa right-arrow text-right"></span>
		        </a>
		        <ul class="nav nav-list tree">
		            <li class="@if(route('posts.index') == Request::fullUrl()) active @endif"><a href="{{ route('posts.index') }}"> All Posts </a></li>
		            <li class="@if(route('posts.create') == Request::fullUrl()) active @endif"><a href="{{ route('posts.create') }}"> Add Post </a></li>
		        </ul>
	        </li>
	        <li class="ripple @if(route('questions.index') == Request::fullUrl() || route('questions.create') == Request::fullUrl()) active @endif">
	        	<a class="tree-toggle nav-header">
	        		<span class="fa fa-pencil-square"></span> Questions  
	        		<span class="fa-angle-right fa right-arrow text-right"></span> 
	        	</a>
		        <ul class="nav nav-list tree">
		            <li class="@if(route('questions.index') == Request::fullUrl()) active @endif"><a href="{{ route('questions.index') }}"> My Questions </a></li>
		            <li class="@if(route('questions.create') == Request::fullUrl()) active @endif"><a href="{{ route('questions.create') }}"> Ask Question </a></li>
		        </ul>
	        </li>
	        <li class="ripple @if(route('reports.index') == Request::fullUrl()) active @endif">
	        	<a class="tree-toggle nav-header">
	        		<span class="fa fa-check-square-o"></span> Reports  
	        		<span class="fa-angle-right fa right-arrow text-right"></span>
	        	</a>
		        <ul class="nav nav-list tree">
		            <li class="@if(route('reports.index') == Request::fullUrl()) active @endif"><a href="{{ route('reports.index') }}"> All Reports </a></li>
		            <li class="@if(route('reports.index') == Request::fullUrl()) active @endif"><a href="{{ route('reports.create') }}"> Add New </a></li>
		        </ul>
	        </li>
	        <li class="ripple @if(route('projects.index') == Request::fullUrl() || route('departments.index') == Request::fullUrl()) active @endif">
	        	<a class="tree-toggle nav-header">
	        		<span class="fa fa-gear"></span> Management
	        		<span class="fa-angle-right fa right-arrow text-right"></span> 
	        	</a>
		        <ul class="nav nav-list tree">
		            <li class="@if(route('projects.index') == Request::fullUrl()) active @endif"><a href="{{ route('projects.index') }}"> Projects </a></li>
		            <li class="@if(route('departments.index') == Request::fullUrl()) active @endif"><a href="{{ route('departments.index') }}"> Departments </a></li>
		            <li><a href="javascript:void(0)"> Reviews </a></li>
		        </ul>
	        </li>
	        <li class="ripple @if(route('comments.index',['all',0]) == Request::fullUrl() || route('profile') == Request::fullUrl()) active @endif">
	        	<a class="tree-toggle nav-header">
	        		<span class="fa fa-user"></span> User  
	        		<span class="fa-angle-right fa right-arrow text-right"></span> 
	        	</a>
		        <ul class="nav nav-list tree">
		        	<li class="@if(route('comments.index',['all',0]) == Request::fullUrl()) active @endif"><a href="{{ route('comments.index',['all',0]) }}">My Comments</a></li>
		            <li class="@if(route('profile') == Request::fullUrl()) active @endif"><a href="{{ route('profile') }}"> My Profile </a></li>
		            <li class="@if(route('settings') == Request::fullUrl()) active @endif"><a href="{{ route('settings') }}"> My Settings </a></li>
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