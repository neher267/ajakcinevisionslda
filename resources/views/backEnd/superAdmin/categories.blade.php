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
        <h2><i class="halflings-icon user"></i><span class="break"></span>All Categories</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
        </div>
    </div>
    <a style="margin: 10px;" class="btn btn-success" href="{{ url('/add-category') }}"><i class="halflings-icon white zoom-in"></i>Add Category</a>
    <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th style="width: 100px;">Status</th>
                    <th style="width: 42px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach ($all_categories as $category)
                <tr>
                    <td class="center">{{++$i}}</td>
                    <td class="center"><?php echo html_entity_decode($category->category_name); ?></td>
                    <td class="center"><?php echo html_entity_decode($category->description); ?></td>
                    <td class="center">
                        @if($category->pub_status == 1)
                        <span class="label label-success">Published</span>
                        @else
                        <span class="label label-warning">Unpublished</span>
                        @endif
                    </td>
                    <td class="center">
                        @if($category->pub_status == 0)
                        <a class="btn btn-success" title="Published" href="{{url('/category-publish/'.$category->id)}}">
                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @else
                        <a class="btn btn-danger" title="Unpublished" href="{{url('/category-unpublish/'.$category->id)}}">
                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @endif
<!--                        <a class="btn btn-info" href="{{url('/edit-category/'.$category->id)}}">
                            <i class="halflings-icon white edit"></i>
                        </a>-->
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><!--/span-->
@endsection
