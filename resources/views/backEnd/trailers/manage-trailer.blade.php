@extends('backEnd.layouts.panel-home')

@section('content')

<div class="box span12">
    @if (Session::has('message_error'))
    <div class="alert alert-danger" role="alert">{{Session::get('message_delete')}}</div>
    @endif
    @if (Session::has('message_success'))
    <div class="alert alert-success" role="alert">{{Session::get('message_success')}}</div>
    @endif

    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon user"></i><span class="break"></span>All Trailers</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
        </div>
    </div>
    <a style="margin: 10px;" class="btn btn-success" href="{{ url('/add-trailer') }}"><i class="halflings-icon white zoom-in"></i>Add Trailer</a>
    <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
                <tr>
                    <th style="width: 40px; text-align: center;">No</th>
                    <th style="width: 116px; text-align: center;">Image</th>
                    <th>Title</th>
                    <th style="width: 116px; text-align: center;">Director</th>
                    <th style="width: 100px; text-align: center;">Producer</th>
                    <th style="width: 100px; text-align: center;">Script Writer</th>
                    <th style="width: 130px; text-align: center;">Status</th>
                    <th style="width: 130px; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach ($trailers as $trailer)
                <tr>
                    <td style="text-align: center;">{{++$i}}</td>
                    <td>
                        <img style="height: 100px; width: 100px;" src="{{asset('public/'.$trailer->trailer_image)}}">
                    </td>
                    <td>{{$trailer->title}}</td>
                    <td style="text-align: center;">{{$trailer->director_name}}</td>
                    <td style="text-align: center;">{{$trailer->producer_name}}</td>
                    <td style="text-align: center;">{{$trailer->script_writer}}</td>
                    <td style="text-align: center;">
                        @if($trailer->pub_status == 1)
                        <span class="label label-success">Published</span>
                        @else
                        <span class="label label-warning">Unpublished</span>
                        @endif
                    </td>
                    <td class="center">
                        @if($trailer->pub_status == 0)
                        <a class="btn btn-success" title="Published" href="{{url('/trailer-publish/'.$trailer->id)}}">
                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @else
                        <a class="btn btn-danger" title="Unpublished" href="{{url('/trailer-unpublish/'.$trailer->id)}}">
                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @endif
                        
                        <a class="btn btn-info" href="{{url('/edit-trailer/'.$trailer->id)}}">
                            <i class="halflings-icon white edit"></i>
                        </a>
                        
                        <form  action="{{url('/delete-trailer')}}" method="post" style="display: inline">
                            {!! csrf_field() !!}
                            
                            <input type="hidden" name="id" value="{{$trailer->id}}">
                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete()"><i class="halflings-icon white trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><!--/span-->
@endsection


