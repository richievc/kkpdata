@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            KKPDATA<small> Create Accounts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Home</a></li>
            <li class="active">KKPData</li>
            <li class="active">Step 2</li>
        </ol>
    </section>
@endsection

@section('content')
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('admin/kkpdata/process_step2/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 2 - (Staff Information)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="manager">Who has primary responsibility for security planning and management at the facility?</label>
                <div class="col-md-4">
                    <textarea id="manager" name="manager" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="director">Facility Director</label>
                <div class="col-md-4">
                    <input id="director" name="director" type="text" placeholder="Facility Director" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="operation_manager">Building Operations Manager</label>
                <div class="col-md-4">
                    <input id="operation_manager" name="operation_manager" type="text" placeholder="Building Operations Manager" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="hr_manager">HR Manager</label>
                <div class="col-md-4">
                    <input id="hr_manager" name="hr_manager" type="text" placeholder="HR Manager" class="form-control input-md">
                </div>
            </div>




            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                </div>
            </div>

        </fieldset>
    </form>






































@endsection