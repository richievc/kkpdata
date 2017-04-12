@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('kkpdata/process_step5/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 5 - (Local Emergency Responders and Jurisdictions)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="police_jurisdiction">
                    In what police jurisdiction is the facility located? </label>
                <div class="col-md-4">
                    <input id="police_jurisdiction" name="police_jurisdiction" value="{{$account['police_jurisdiction']}}" type="text" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="local_police_response time">
                    What has been the local police response time in previous emergencies? </label>
                <div class="col-md-4">
                    <textarea id="local_police_response time" name="local_police_response time" class="form-control">{{$account['local_police_response time']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="local_ambulance_jurisdiction">
                    What is the local ambulance/EMS service in the jurisdiction?  </label>
                <div class="col-md-4">
                    <textarea id="local_ambulance_jurisdiction" name="local_ambulance_jurisdiction" class="form-control">{{$account['local_ambulance_jurisdiction']}}</textarea>
                </div>
            </div>


            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{url('kkpdata/step4/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>


</div>
        </div>
    </div>



































@endsection