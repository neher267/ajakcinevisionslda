@extends('layouts.master')

@section('content') 
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="palel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title"> Forgot Password </h1>
            </div>
            <div class="panel-body">
                <form action="{{url('/forgot-password')}}" method="POST">
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
                        <input type="submit" value="Send Code" class="btn btn-success pull-right">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection 
