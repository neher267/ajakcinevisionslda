@extends('layouts.panel-home')

@section('content')
<div>
    <fieldset style="border: 1px solid; padding: 50px;">
        <h1 align="center">Registration</h1>
        <form action="{{url('/create-user')}}" method="POST" style="margin: 30px 0px 0px 38%;">
        {{ csrf_field() }}
        
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-cog"></i></span>
                <select name="user_type" required>
                    <option value="">Select</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                    @endforeach
               </select>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-cog"></i></span>
                <select name="user_type" required>
                    <option value="">Select</option>
                    <option value="admin">Admin</option>
                    <option value="agent">Agent</option>
                    <option value="corporate">Corporate</option>
                    <option value="call center">Call Center Executive</option>
                    <option value="employee">Employee</option>
                    <option value="manager">Manager</option>
                    <option value="supplier">Supplier</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
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
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" name="location" class="form-control" placeholder="Location">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password"  required>
            </div>
        </div>

        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password Conformation" required>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <input type="submit" value="Register" class="btn btn-success">
        </div>

    </form>
    </fieldset>
</div>
@endsection