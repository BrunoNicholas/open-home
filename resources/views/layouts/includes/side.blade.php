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
		            <span class="fa-diamond fa"></span> Layout
		            <span class="fa-angle-right fa right-arrow text-right"></span>
		        </a>
		        <ul class="nav nav-list tree">
		            <li><a href="javascript:void(0)">Top Navigation</a></li>
		            <li><a href="javascript:void(0)">Boxed</a></li>
		        </ul>
	        </li>
	        <li class="ripple">
		        <a class="tree-toggle nav-header">
		            <span class="fa-area-chart fa"></span> Charts
		            <span class="fa-angle-right fa right-arrow text-right"></span>
		        </a>
		        <ul class="nav nav-list tree">
		            <li><a href="javascript:void(0)">ChartJs</a></li>
		            <li><a href="javascript:void(0)">Morris</a></li>
		            <li><a href="javascript:void(0)">Flot</a></li>
		            <li><a href="javascript:void(0)">SparkLine</a></li>
		        </ul>
	        </li>
	        <li class="ripple">
	        	<a class="tree-toggle nav-header">
	        		<span class="fa fa-pencil-square"></span> Ui Elements  
	        		<span class="fa-angle-right fa right-arrow text-right"></span> 
	        	</a>
		        <ul class="nav nav-list tree">
		            <li><a href="javascript:void(0)">Color</a></li>
		            <li><a href="javascript:void(0)">Weather</a></li>
		        </ul>
	        </li>
	        <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-check-square-o"></span> Forms  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
		        <ul class="nav nav-list tree">
		            <li><a href="javascript:void(0)">Form Element</a></li>
		            <li><a href="javascript:void(0)">Wizard</a></li>
		            <li><a href="javascript:void(0)">File Upload</a></li>
		            <li><a href="javascript:void(0)">Text Editor</a></li>
		        </ul>
	        </li>
	        <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-table"></span> Tables  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
		        <ul class="nav nav-list tree">
		            <li><a href="javascript:void(0)">Data Tables</a></li>
		            <li><a href="javascript:void(0)">handsontable</a></li>
		            <li><a href="javascript:void(0)">Static</a></li>
		        </ul>
	        </li>
	        <li class="ripple"><a href="calendar.html"><span class="fa fa-calendar-o"></span>Calendar</a></li>
	        <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-envelope-o"></span> Mail <span class="fa-angle-right fa right-arrow text-right"></span> </a>
		        <ul class="nav nav-list tree">
		            <li><a href="javascript:void(0)">Inbox</a></li>
		            <li><a href="javascript:void(0)">Compose Mail</a></li>
		            <li><a href="javascript:void(0)">View Mail</a></li>
		        </ul>
	        </li>
	        <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-file-code-o"></span> Pages  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
		        <ul class="nav nav-list tree">
		            <li><a href="javascript:void(0)">Forgot Password</a></li>
		            <li><a href="javascript:void(0)">SignIn</a></li>
		        </ul>
	        </li>
	        <li class="ripple"><a class="tree-toggle nav-header"><span class="fa "></span> MultiLevel  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
		        <ul class="nav nav-list tree">
		            <li><a href="view-mail.html">Level 1</a></li>
		            <li><a href="view-mail.html">Level 1</a></li>
		            <li class="ripple">
			            <a class="sub-tree-toggle nav-header">
			                <span class="fa fa-envelope-o"></span> Level 1
			                <span class="fa-angle-right fa right-arrow text-right"></span>
			            </a>
			            <ul class="nav nav-list sub-tree">
			                <li><a href="javascript:void(0)">Level 2</a></li>
			                <li><a href="javascript:void(0)">Level 2</a></li>
			                <li><a href="javascript:void(0)">Level 2</a></li>
			            </ul>
		            </li>
		        </ul>
	        </li>
	        <li class="text-center">
	        	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-power-off"></i> Logout </a>
	        	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
	        </li>

        <li><a href="credits.html">Credits</a></li>
      </ul>
    </div>
</div>