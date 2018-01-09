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
        <h2><i class="halflings-icon user"></i><span class="break"></span>All News</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
        </div>
    </div>
    <a style="margin: 10px;" class="btn btn-success" href="{{ url('/write-news') }}"><i class="halflings-icon white zoom-in"></i>Write News</a>
    <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
                <tr>
                    <th style="width: 40px; text-align: center;">No</th>
                    <th style="width: 116px; text-align: center;">Category Name</th>
                    <th>Title</th>
                    <th style="width: 116px; text-align: center;">Submitting Date</th>
                    <th style="width: 100px; text-align: center;">Status</th>
                    <th style="width: 45px; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0;?>
                @foreach ($all_news as $news)
                <tr>
                    <td class="center">{{++$i}}</td>
                    <td class="center"><?php echo html_entity_decode($news->category_name); ?></td>
                    <td class="center"><?php echo html_entity_decode($news->news_title); ?></td>
                    <td class="center">{{$news->created_at}}</td>
                    <td class="center">
                        @if($news->pub_status == 1)
                        <span class="label label-success">Published</span>
                        @else
                        <span class="label label-warning">Unpublished</span>
                        @endif
                    </td>
                    <td class="center">
                        <a class="btn btn-info" href="{{url('/edit-news/'.$news->id)}}">
                            <i class="halflings-icon white edit"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><!--/span-->
@endsection


