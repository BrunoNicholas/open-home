@extends('layouts.site')
@section('title') Incidents @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/datatables.bootstrap.min.css') }}"/>
@endsection
@section('content')
<div class="panel">
	<div class="panel-body">
	      <div class="col-md-6 col-sm-12">
	        <h3 class="animated fadeInLeft"> Incidents | {{ config('app.name') }} </h3>
	        <p> The following are the incident cases reported to {{ config('app.name') }} by our faithful users. <a href="{{ route('incidents.create') }}" class="btn btn-xs btn-info btn-round">Add New</a> </p>
	    </div>
	    <div class="col-7 align-self-center pull-right">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fa fa-user-plus"></i> Administrator </a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-list"></i> Incidents </li>
                    </ol>
                    <p class="animated fadeInDown"><span class="fa fa-user"></span> Logged in as <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> | {{ App\Models\Role::where('name',Auth::user()->role)->get()->first()->display_name }} </p>
                </nav>
            </div>
        </div>
	</div>                    
</div>
@include('layouts.includes.notifications')
<!-- /end of description section -->
<div class="col-md-12" style="padding:10px;">
    <div class="col-md-12 padding-0">
        <div class="col-md-12 padding-0">
            <div class="panel box-v4">
                <div class="panel-body padding">
                    <div class="responsive-table">
                        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0" style="border: thin solid transparent;">
                            <thead>
                                <tr>
                                    <th>#(Edit)</th>
                                    <th>Title</th>
                                    <th>By</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Comments</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($incidents as $incident)
                                    @if(strtolower($incident->status) == 'approved' || Auth::user()->id == $incident->user_id)
                                        <tr title="{{ $incident->comments->count() }} Comments">
                                            <td style="min-width: 65px;">{{ ++$i }} 
                                                @role(['super-admin','admin']) | <a href="{{ route('incidents.edit',$incident->id) }}"><i class="fa-edit fa"></i></a>@endrole
                                                <br>
                                                @if(Auth::user()->id == $incident->user_id){{ $incident->status }}@endif
                                            </td>
                                            <td style="min-width: 150px;"> 
                                                <a href="{{ route('incidents.show', $incident->id) }}">
                                                    @if($incident->attachement)
                                                        <img src="{{ asset('files/profile/images/'. $incident->attachement) }}" style="max-width: 25px; border-radius: 10%;">  
                                                    @else <img src="{{ asset('asset/img/logomi.png') }}" style="max-width: 25px; border-radius: 10%;"> @endif
                                                    {{ $incident->title }}
                                                </a>
                                            </td>
                                            <td> {{ App\User::where('id',$incident->user_id)->get()->first()->name }}</td>
                                            <td> {{ substr($incident->description, 0,40) . '...' }} </td>
                                            <td> {{ $incident->location }} </td>
                                            <td> <a href="{{ route('incidents.show',$incident->id) }}">{{ $incident->comments->count() }} Comments</a> </td>
                                            <td> <a href="{{ route('incidents.show',$incident->id) }}">{{ $incident->created_at }}</a> </td>
                                        </tr>
                                    @endif
                                    @if(Auth::user()->hasRole(['super-admin','admin']) && Auth::user()->id != $incident->user_id && strtolower($incident->status) != 'approved')
                                        <tr title="{{ $incident->comments->count() }} Comments">
                                            <td style="min-width: 65px;">{{ ++$i }} 
                                                @role(['super-admin','admin']) | <a href="{{ route('incidents.edit',$incident->id) }}"><i class="fa-edit fa"></i></a>@endrole
                                            </td>
                                            <td style="min-width: 150px;"> 
                                                <a href="{{ route('incidents.show', $incident->id) }}">
                                                    @if($incident->attachement)
                                                        <img src="{{ asset('files/profile/images/'. $incident->attachement) }}" style="max-width: 25px; border-radius: 10%;">  
                                                    @else <img src="{{ asset('asset/img/logomi.png') }}" style="max-width: 25px; border-radius: 10%;"> @endif
                                                    {{ $incident->title }}
                                                </a>
                                            </td>
                                            <td> {{ App\User::where('id',$incident->user_id)->get()->first()->name }}</td>
                                            <td> {{ substr($incident->description, 0,40) . '...' }} </td>
                                            <td> {{ $incident->location }} </td>
                                            <td> <a href="{{ route('incidents.show',$incident->id) }}">{{ $incident->comments->count() }} Comments<br>{{ $incident->status }}</a> </td>
                                            <td> <a href="{{ route('incidents.show',$incident->id) }}">{{ $incident->created_at }}<br>{{ $incident->status }}</a> </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script src="{{ asset('asset/js/plugins/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/datatables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datatables-example').DataTable();
        });
    </script>
@endsection
