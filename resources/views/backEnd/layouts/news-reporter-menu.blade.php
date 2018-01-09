@extends('backEnd.layouts.panel-home')

@section('panel-menu')
<ul class="nav nav-tabs nav-stacked main-menu">
    <li><a target="_blank" href="{{url('/')}}"><i class="halflings-icon white home"></i><span class="hidden-tablet">Home</span></a></li>
    <li><a href="{{url('/reporter-home')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Dashboard</span></a></li>
    <li><a href="{{url('/news')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">News</span></a></li>
</ul>
@endsection 