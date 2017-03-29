@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
       Profile<small>Manage your Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>
@endsection



@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Main content -->
    		<section class="content">
      			<div class="row">
            
            		<div class="col-md-3 ">
            			<div class="text-center" style="width: 100%;"><img 
            				src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" 
            				class="img-circle" 
            				alt="{{Auth::user()->name}}">
            			</div>
             			<h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
             			<ul class="list-group list-group-unbordered">
                			<li class="list-group-item">
                  				<b>Created: </b> <a class="pull-right">{{date("M d, Y h:i:s", strtotime(Auth::user()->created_at))}}</a>
                			</li>
                			<li class="list-group-item">
                  				<b>Last Logged In:</b> <a class="pull-right">{{date("M d, Y h:i:s", strtotime(Auth::user()->updated_at))}}</a>
                			</li>
                			<li class="list-group-item">
                  				<b>Username:</b> <a class="pull-right">{{Auth::user()->username}}</a>
                			</li>
              			</ul>
              			
              			<!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            		</div>
            		
            		<div class="col-md-3 ">
            			<ul class="list-group ">
                			<li class="list-group-item">
                  				<i></i><b>Change Password: </b> <a href="admin/profile/change_pasword" class="pull-right">Change</a>
                			</li>
                			<li class="list-group-item">
                  				<b>Change Account: </b> <a href="admin/profile/change_account" class="pull-right">Change</a>
                			</li>
              			</ul>
              			
              			<!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            		</div>
            	</div>
            </section>	
        </div>
    </div>
@endsection