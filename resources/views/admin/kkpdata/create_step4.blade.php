@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            KKPDATA<small> Create Accounts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Home</a></li>
            <li class="active">KKPData</li>
            <li class="active">Step 4</li>
        </ol>
    </section>
@endsection

@section('content')
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('admin/kkpdata/process_step4/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 4 - (Security Threat Concerns)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="">
                    Describe any recent history of the following problems:  </label>
                <div class="col-md-4">
                    <label class="control-label" for="trespass_concerns">
                        Trespass:</label>
                    <textarea id="trespass_concerns" name="trespass_concerns" class="form-control"></textarea>
                    <label class="control-label" for="vandalism_concerns">
                        Vandalism:</label>
                    <textarea id="vandalism_concerns" name="vandalism_concerns" class="form-control"></textarea>
                    <label class="control-label" for="theft_concerns">
                        Theft:</label>
                    <textarea id="theft_concerns" name="theft_concerns" class="form-control"></textarea>
                    <label class="control-label" for="threatening_employee">
                        Threats and Threatening Employee/Patron Behavior: </label>
                    <textarea id="threatening_employee" name="threatening_employee" class="form-control"></textarea>
                    <label class="control-label" for="violence">
                        Violence: </label>
                    <textarea id="violence" name="violence" class="form-control"></textarea>
                    <label class="control-label" for="special_concerns">
                        Please describe any special concerns you may have related to security or emergency readiness at your facility:  </label>
                    <textarea id="special_concerns" name="special_concerns" class="form-control"></textarea>
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