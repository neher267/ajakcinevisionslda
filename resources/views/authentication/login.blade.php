@extends('web.layouts.master')

@section('content') 
<div class="row" style="min-height: 600px;">
    <div class="col-md-6 col-md-offset-3">
        <div class="palel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title"> Login </h1>
            </div>
            <div class="panel-body">
                <form action="{{url('/login')}}" method="POST">
                    {{ csrf_field() }}
                    
                    @if(Session('error'))
                    <div class="alert alert-danger">
                        {{ Session('error') }}
                    </div>
                    @endif 
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <a href="{{ url('/forgot-password') }}">Forgot your password?</a>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right" style="background-color: #3c763d;">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection 
