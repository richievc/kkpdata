@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            KKPDATA<small> Create Accounts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Home</a></li>
            <li class="active">KKPData</li>
            <li class="active">Step 5</li>
        </ol>
    </section>
@endsection

@section('content')
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('admin/kkpdata/process_step5/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 5 - (Local Emergency Responders and Jurisdictions)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="police_jurisdiction">
                    What police jurisdiction is the facility located? </label>
                <div class="col-md-4">
                    <input id="police_jurisdiction" name="police_jurisdiction" type="text" placeholder="What police jurisdiction is the facility located?" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="local_ambulance_jurisdiction">
                    What is the local ambulance/EMS service in the jurisdiction?  </label>
                <div class="col-md-4">
                    <textarea id="local_ambulance_jurisdiction" name="local_ambulance_jurisdiction" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="local_ambulance_jurisdiction">
                    What is the local ambulance/EMS service in the jurisdiction?  </label>
                <div class="col-md-4">
                    <textarea id="local_ambulance_jurisdiction" name="local_ambulance_jurisdiction" class="form-control"></textarea>
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