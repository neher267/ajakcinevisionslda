@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="palel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title"> Edit Profile </h1>
            </div>
            <div class="panel-body">
                <form action="{{url('/edit-profile')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                   <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{$user->first_name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{$user->last_name}}">
                        </div>
                    </div>
                    
                    
                   <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" name="location" class="form-control" placeholder="Location" value="{{$user->location}}">
                        </div>
                    </div>

                    @if(sizeof($user_info)>0)
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <textarea name="address" class="form-control" placeholder="Permanent Address">{{$user_info->address}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" value="{{$user_info->mobile}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" style=" padding: 0px;">
                                <img style="height: 25px; width: 25px;" src="{{asset('/public'.$user_info->profile_picture)}}">
                            </span>
                            <input type="file" name="profile_picture" class="form-control">
                        </div>
                    </div>
                    @else
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <textarea name="address" class="form-control" placeholder="Permanent Address"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-photo"></i></span>
                            <input type="file" name="profile_picture" class="form-control">
                        </div>
                    </div>
                    @endif
                    
                    <div class="form-group">
                        <input type="submit" value="Register" class="btn btn-success pull-right">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

