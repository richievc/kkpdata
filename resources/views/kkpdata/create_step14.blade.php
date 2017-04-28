@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            {!! view('kkpdata/partials/side_menu', compact('account')) !!}

            <div class="col-md-8">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('kkpdata/process_step14/' . $account['id'])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 14 - (Workplace Violence Policy)</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_threatening_behavior_policy">
                    Does the facility have a written policy regarding reporting of threatening behavior? </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_threatening_behavior_policy-0">
                        <input type="radio" name="has_threatening_behavior_policy" id="has_threatening_behavior_policy-0" value="yes"
                                {{($account['has_threatening_behavior_policy'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_threatening_behavior_policy-1">
                        <input type="radio" name="has_threatening_behavior_policy" id="has_threatening_behavior_policy-1" value="no"
                                {{($account['has_threatening_behavior_policy'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="threatening_behavior_policy_file">
                    If YES, Please upload a copy for our review (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['threatening_behavior_policy_file']))
                        FileName: {{$account['threatening_behavior_policy_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step14/threatening_behavior_policy_file')}}"><i class="fa fa-trash"></i> Delete</a>
                    @else
                        <input type="file" name="threatening_behavior_policy_file" id="threatening_behavior_policy_file" >
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_assessment_and_management_plan">
                    Does the facility have a written threat assessment and management plan? </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_assessment_and_management_plan-0">
                        <input type="radio" name="has_assessment_and_management_plan" id="has_assessment_and_management_plan-0" value="yes"
                                {{($account['has_assessment_and_management_plan'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_assessment_and_management_plan-1">
                        <input type="radio" name="has_assessment_and_management_plan" id="has_assessment_and_management_plan-1" value="no"
                                {{($account['has_assessment_and_management_plan'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="assessment_and_management_plan_file">
                    If YES, Please upload a copy for our review (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['assessment_and_management_plan_file']))
                        FileName: {{$account['assessment_and_management_plan_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step14/assessment_and_management_plan_file')}}"><i class="fa fa-trash"></i> Delete</a>
                    @else
                        <input type="file" name="assessment_and_management_plan_file" id="assessment_and_management_plan_file" >
                    @endif
                </div>
            </div>


            <!------------------------- --?

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url('kkpdata/step13/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>





</div>
        </div>
    </div>

































@endsection