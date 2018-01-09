@extends('backEnd.layouts.panel-home')

@section('content')
<div class="palel panel-primary" style="margin-left: 2%;">
    <div class="panel-heading">
        <h1 class="panel-title"> Register </h1>
    </div>
    <div class="panel-body">
        <form action="{{url('/create-user')}}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="input-group">
                    <span>User Type:</span>
                    <select name="user_type" required style="width: 164px;">
                        <option value="">Select</option>
                        <option value="admin">Admin</option>
                        <option value="news reporter">News Reporter</option>
                        <option value="manager">Manager</option>
                        <option value="photographer">Photographer</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="example@example.com">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                    <input type="text" name="mobile" class="form-control" placeholder="Mobile no">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password_conformation" class="form-control" placeholder="Password Conformation">
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Register" class="btn btn-success">
            </div>

        </form>
    </div>
</div>
@endsection