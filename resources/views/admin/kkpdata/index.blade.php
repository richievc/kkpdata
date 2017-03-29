@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            KKPDATA<small> Manage Accounts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Home</a></li>
            <li class="active">KKPData</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4> <span class="semi-bold">Accounts</span></h4>
                    <div class="tools">
                        <a href="javascript:;" class="reload"></a>
                    </div>
                </div>

                <div class="grid-body ">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <a href="kkpdata/create_account">
                        <button class="btn btn-primary"  style="margin-bottom:20px" id="create_account">Create Account</button>
                    </a>

                    <table class="table" id="example3" >
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Published</th>
                            <th>Publish Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!$accounts)
                            <div class="alert alert-danger">No Accounts Found</div>
                        @else
                            @foreach ($accounts as $blog)


                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
                <div class="grid-footer">

                </div>
            </div>
        </div>
    </div>




@endsection
