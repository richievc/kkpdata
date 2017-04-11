@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url(Request::segment(1) . '/kkpdata/process_step12/' . $account['id'])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 12 - (Access Control and Visitors)</legend>
            <h4>Does the facility have a written access control and visitor policy addressing the following:</h4>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_visitor_procedures">
                    Visitor Procedures?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_visitor_procedures-0">
                        <input type="radio" name="has_visitor_procedures" id="has_visitor_procedures-0" value="yes"
                                {{($account['has_visitor_procedures'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_visitor_procedures-1">
                        <input type="radio" name="has_visitor_procedures" id="has_visitor_procedures-1" value="no"
                                {{($account['has_visitor_procedures'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="visitor_procedures_access_file">
                    If YES, Please upload a copy for our review (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['visitor_procedures_access_file']))
                        FileName: {{$account['visitor_procedures_access_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step12/visitor_procedures_access_file')}}"><i class="fa fa-trash"></i></a>
                    @else
                        <input type="file" name="visitor_procedures_access_file" id="visitor_procedures_access_file" >
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_employee_access">
                    Employee Access? </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_employee_access-0">
                        <input type="radio" name="has_employee_access" id="has_employee_access-0" value="yes"
                                {{($account['has_employee_access'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_employee_access-1">
                        <input type="radio" name="has_employee_access" id="has_employee_access-1" value="no"
                                {{($account['has_employee_access'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="employee_access_file">
                    If YES, Please upload a copy for our review (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['employee_access_file']))
                        FileName: {{$account['employee_access_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step12/employee_access_file')}}"><i class="fa fa-trash"></i></a>
                    @else
                        <input type="file" name="employee_access_file" id="employee_access_file" >
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_contractor_access">
                    Contractor Access and Control? </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_contractor_access-0">
                        <input type="radio" name="has_contractor_access" id="has_contractor_access-0" value="yes"
                                {{($account['has_contractor_access'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_contractor_access-1">
                        <input type="radio" name="has_contractor_access" id="has_contractor_access-1" value="no"
                                {{($account['has_contractor_access'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="contractor_access_file">
                    If YES, Please upload a copy for our review (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['contractor_access_file']))
                        FileName: {{$account['contractor_access_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step12/contractor_access_file')}}"><i class="fa fa-trash"></i></a>
                    @else
                        <input type="file" name="contractor_access_file" id="contractor_access_file" >
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_electronic_access_control_systems">
                    Is there a written policy defining access control system administration, user enrollment, and user restrictions for electronic access control systems </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_electronic_access_control_systems-0">
                        <input type="radio" name="has_electronic_access_control_systems" id="has_electronic_access_control_systems-0" value="yes"
                                {{($account['has_electronic_access_control_systems'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_electronic_access_control_systems-1">
                        <input type="radio" name="has_electronic_access_control_systems" id="has_electronic_access_control_systems-1" value="no"
                                {{($account['has_electronic_access_control_systems'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="electronic_access_control_systems_file">
                    If YES, Please upload a copy for our review (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['electronic_access_control_file']))
                        FileName: {{$account['electronic_access_control_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step12/electronic_access_control_file')}}"><i class="fa fa-trash"></i></a>
                    @else
                        <input type="file" name="electronic_access_control_file" id="electronic_access_control_file" >
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_written_key_control_policy">
                    Is there a written key control policy?   </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_written_key_control_policy-0">
                        <input type="radio" name="has_written_key_control_policy" id="has_written_key_control_policy-0" value="yes"
                                {{($account['has_written_key_control_policy'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_written_key_control_policy-1">
                        <input type="radio" name="has_written_key_control_policy" id="has_written_key_control_policy-1" value="no"
                                {{($account['has_written_key_control_policy'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="written_key_control_policy_file">
                    If YES, Please upload a copy for our review (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['written_key_control_policy_file']))
                        FileName: {{$account['written_key_control_policy_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step12/written_key_control_policy_file')}}"><i class="fa fa-trash"></i></a>
                    @else
                        <input type="file" name="written_key_control_policy_file" id="written_key_control_policy_file" >
                    @endif
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="facility_key_control_manager">
                    Who is designated as the facility key control manager? </label>
                <div class="col-md-4">
                    <textarea id="facility_key_control_manager" name="facility_key_control_manager" class="form-control"></textarea>
                </div>
            </div>


            <!------------------------- --?

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url(Request::segment(1) . '/kkpdata/step11/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>






</div>
        </div>
    </div>































@endsection