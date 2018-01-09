@extends('backEnd.layouts.panel-home')

@section('content')

<div class="box span12">
    @if (Session::has('message_error'))
    <div class="alert alert-danger" role="alert">{{Session::get('message_error')}}</div>
    @endif
    @if (Session::has('message_success'))
    <div class="alert alert-success" role="alert">{{Session::get('message_success')}}</div>
    @endif

    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon user"></i><span class="break"></span>All Story Types</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
        </div>
    </div>
    <a style="margin: 10px;" class="btn btn-success" href="{{ url('/add-story-type') }}"><i class="halflings-icon white zoom-in"></i>Add Type</a>
    <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($all_types as $type)
                <tr>
                    <td class="center">{{++$i}}</td>
                    <td class="center"><?php echo html_entity_decode($type->story_type_name); ?></td>
                    <td class="center"><?php echo html_entity_decode($type->description); ?></td>
                    <td class="center">
                        <a class="btn btn-info" href="{{url('/edit-category/'.$type->id)}}" title="Edit Type">
                            <i class="halflings-icon white edit"></i>
                        </a>

                        <form  action="{{url('/delete-story-type')}}" method="post" style="display: inline">
                            {!! csrf_field() !!}

                            <button type="submit" class="btn btn-danger"><i class="halflings-icon white trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><!--/span-->
@endsection
