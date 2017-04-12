@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('kkpdata/process_step4/' . $account['id'])}}" method="post" class="form-horizontal">
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
                    <textarea id="trespass_concerns" name="trespass_concerns" class="form-control">{{@$account['trespass_concerns']}}</textarea>
                    <label class="control-label" for="vandalism_concerns">
                        Vandalism:</label>
                    <textarea id="vandalism_concerns" name="vandalism_concerns" class="form-control">{{@$account['vandalism_concerns']}}</textarea>
                    <label class="control-label" for="theft_concerns">
                        Theft:</label>
                    <textarea id="theft_concerns" name="theft_concerns" class="form-control">{{@$account['theft_concerns']}}</textarea>
                    <label class="control-label" for="threatening_employee">
                        Threats and Threatening Employee/Patron Behavior: </label>
                    <textarea id="threatening_employee" name="threatening_employee" class="form-control">{{@$account['threatening_employee']}}</textarea>
                    <label class="control-label" for="violence">
                        Violence: </label>
                    <textarea id="violence" name="violence" class="form-control"></textarea>
                    <label class="control-label" style="text-align: left" for="special_concerns">
                        Please describe any special concerns you may have related to security or emergency readiness at your facility:
                    </label>
                    <textarea id="special_concerns" name="special_concerns" class="form-control">{{@$account['special_concerns']}}</textarea>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{url('kkpdata/step3/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>

            </div>
        </div>
    </div>




































@endsection