@extends('backEnd.layouts.panel-home')

@section('panel-menu')
<ul class="nav nav-tabs nav-stacked main-menu">
    <li><a target="_blank" href="{{url('/')}}">
            <i class="halflings-icon white home"></i><span class="hidden-tablet">Home</span></a></li>
    <li><a href="{{url('/super-admin-home')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Dashboard</span></a></li>
    <li>
        <a class="dropmenu" href="#"><i class="icon-dashboard"></i><span class="hidden-tablet">Setting</span></a>
        <ul>
            <li><a href="{{url('/categories')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Categories</span></a></li>
            <li><a href="{{url('/story-types')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Story Types</span></a></li>
        </ul>
    </li>
    <li><a href="{{url('/create-user')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Create User</span></a></li>
    <li><a href="{{url('/manage-news')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Manage News</span></a></li>
    <li><a href="{{url('/trailers')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Trailers</span></a></li>
    <li><a href="{{url('/gallery')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Gallery</span></a></li>
</ul>
@endsection 