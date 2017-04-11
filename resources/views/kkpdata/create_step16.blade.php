@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url(Request::segment(1) . '/kkpdata/process_step16/' . $account['id'])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 16 - (Emergency Preparations)</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_emergency_response_management_plan">
                    Does the facility have an Emergency Response/Management Plan?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_emergency_response_management_plan-0">
                        <input type="radio" name="has_emergency_response_management_plan" id="has_emergency_response_management_plan-0" value="yes"
                                {{($account['has_emergency_response_management_plan'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_emergency_response_management_plan-1">
                        <input type="radio" name="has_emergency_response_management_plan" id="has_emergency_response_management_plan-1" value="no"
                        {{($account['has_emergency_response_management_plan'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="responsible_for_authoring_employees">
                    If YES, who is responsible for authoring and updating the EMP? </label>
                <div class="col-md-4">
                    <textarea id="responsible_for_authoring_employees" name="responsible_for_authoring_employees" class="form-control">{{$account['responsible_for_authoring_employees']}}</textarea>
                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="responsible_for_authoring_employees_file">
                    If YES, Please upload a copy for our review (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['responsible_for_authoring_employees_file']))
                        FileName: {{$account['responsible_for_authoring_employees_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step16/assessment_and_management_plan_file')}}"><i class="fa fa-trash"></i></a>
                    @else
                        <input type="file" name="assessment_and_management_plan_file" id="assessment_and_management_plan_file" >
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_floor_captain_warden_system">
                    Does the facility have a Floor Captain/Warden system for providing employee and visitor actions during emergencies? </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_floor_captain_warden_system-0">
                        <input type="radio" name="has_floor_captain_warden_system" id="has_floor_captain_warden_system-0" value="yes"
                                {{($account['has_floor_captain_warden_system'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_floor_captain_warden_system-1">
                        <input type="radio" name="has_floor_captain_warden_system" id="has_floor_captain_warden_system-1" value="no"
                        {{($account['has_floor_captain_warden_system'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="types_of_emergency_drills">
                    What types of emergency drills are conducted and according to what schedule?</label>
                <div class="col-md-4">
                    <textarea id="types_of_emergency_drills" name="types_of_emergency_drills" class="form-control">{{$account['types_of_emergency_drills']}}</textarea>
                </div>
            </div>

            <!------------------------- --?
            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url(Request::segment(1) . '/kkpdata/step14/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>

            </div>
        </div>
    </div>





































@endsection