@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('kkpdata/process_step17/' . $account['id'])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 17 - (Campus Geography)</legend>
            <div class="alert alert-default">
                Please describe the number of buildings on campus and number of floors per building (including any sub-levels) below.
                <hr>
                Please upload floor plans for each building by using the upload button. We do not need full architectural drawings for this purpose.
                Simple floor plans identifying rooms, doors, hallways, elevators, stairwells, and exits will meet our current needs. Anything you
                have previously prepared for fire evacuation plans will probably be sufficient.
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="building_name1">
                    Building Name </label>
                <div class="col-md-4">
                    <input id="building_name1" name="building_name1" value="{{$account['building_name1']}}" type="text" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="no_of_floor_plans1">
                    No of Floor Plans </label>
                <div class="col-md-4">
                    <input id="no_of_floor_plans1" name="no_of_floor_plans1" value="{{$account['no_of_floor_plans1']}}" type="text" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="floor_plans1_file">
                    FloorPlans (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['floor_plans1_file']))
                        FileName: {{$account['floor_plans1_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step17/floor_plans1_file')}}"><i class="fa fa-trash"></i></a>
                    @else
                        <input type="file" name="floor_plans1_file" id="floor_plans1_file" >
                    @endif
                </div>
            </div>



            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="building_name2">
                    Building Name 2 </label>
                <div class="col-md-4">
                    <input id="building_name2" name="building_name2" value="{{$account['building_name2']}}" type="text" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="no_of_floor_plans2">
                    No of Floor Plans 2 </label>
                <div class="col-md-4">
                    <input id="no_of_floor_plans2" name="no_of_floor_plans2" value="{{$account['no_of_floor_plans2']}}" type="text" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="floor_plans2_file">
                    FloorPlans 2 (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['floor_plans2_file']))
                        FileName: {{$account['floor_plans2_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step17/floor_plans2_file')}}"><i class="fa fa-trash"></i></a>
                    @else
                        <input type="file" name="floor_plans2_file" id="floor_plans2_file" >
                    @endif
                </div>
            </div>



            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="building_name3">
                    Building Name 3 </label>
                <div class="col-md-4">
                    <input id="building_name3" name="building_name3" value="{{$account['building_name3']}}" type="text" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="no_of_floor_plans3">
                    No of Floor Plans 3 </label>
                <div class="col-md-4">
                    <input id="no_of_floor_plans3" name="no_of_floor_plans3" value="{{$account['no_of_floor_plans3']}}" type="text" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="floor_plans3_file">
                    FloorPlans 3 (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['floor_plans3_file']))
                        FileName: {{$account['floor_plans3_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step17/floor_plans3_file')}}"><i class="fa fa-trash"></i></a>
                    @else
                        <input type="file" name="floor_plans3_file" id="floor_plans3_file" >
                    @endif
                </div>
            </div>

            <!------------------------- --?
            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url('kkpdata/step16/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>

            </div>
        </div>
    </div>





































@endsection