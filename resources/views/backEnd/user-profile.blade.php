@extends('backEnd.layouts.panel-home')

@section('content')
<style>
    .element-padding{
        padding-left: 10px;
        padding-bottom: 10px;
        width: 100%;
        float: left;
    }

    th,td{
        text-align: left;
        padding: 8px;
    }
</style>

<div class="table-responsive">
    <table width='50%' class="table">
        <thead>
            <tr>
            <td colspan="2">
                @if(sizeof($user_info)>0)
                <img style="height: 200px; width: 200px;" src="{{asset('/public'.$user_info->profile_picture)}}">
                @else 
                <img style="height: 200px; width: 200px;" src="{{asset('/public/images/profile.jpg')}}">
                @endif
            </td>
        </tr>
        </thead>
        <tr>
            <th>Name</th>
            <td>{{$user->first_name.' '.$user->last_name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Mobile No</th>
            <td>{{$user->mobile}}</td>
        </tr>
        <tr>

            <td colspan="2">
                <a href="{{URL::to('/edit-profile')}}" class="btn btn-primary">Edit Profile</a>
            </td>
        </tr>
    </table>
</div>
@endsection 


