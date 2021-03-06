@extends('backEnd.layouts.panel-home')

@section('content')
<div class="row-fluid sortable">
    <div class="box span12">

        @if (Session::has('message_error'))
        <div class="alert alert-danger" role="alert">{{Session::get('message_delete')}}</div>
        @endif
        @if (Session::has('message_success'))
        <div class="alert alert-success" role="alert">{{Session::get('message_success')}}</div>
        @endif

        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
                <form class="form-horizontal" action="{{url('/update-category')}}" method="post">
                    {!! csrf_field() !!}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="name">Category Name </label>
                            <div class="controls">
                                <input type="text" name="name" class="span7 typeahead" id="name" value="{{$category->name}}">                               
                                <input type="hidden" name="id" value="{{$category->id}}">                               
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="description">Category Description </label>
                            <div class="controls">
                                <textarea name="description" class="cleditor" id="description" rows="3" >{{$category->description}}</textarea>
                            </div>
                        </div>
                       
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
    </div><!--/span-->

</div><!--/row-->

@endsection

