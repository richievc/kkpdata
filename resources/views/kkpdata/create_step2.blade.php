@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url(Request::segment(1) . '/kkpdata/process_step2/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 2 - (Staff Information)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="manager">Who has primary responsibility for security planning and management at the facility?</label>
                <div class="col-md-4">
                    <textarea id="manager" name="manager" class="form-control">{{@$account['manager']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="director">Facility Director</label>
                <div class="col-md-4">
                    <input id="director" name="director" value="{{@$account['director']}}" type="text" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="operation_manager">Building Operations Manager</label>
                <div class="col-md-4">
                    <input id="operation_manager" name="operation_manager" value="{{@$account['operation_manager']}}" type="text" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="hr_manager">HR Manager</label>
                <div class="col-md-4">
                    <input id="hr_manager" name="hr_manager" type="text" value="{{@$account['hr_manager']}}" class="form-control input-md">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{url(Request::segment(1) . '/kkpdata/edit/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>












            </div>
        </div>
    </div>

























@endsection