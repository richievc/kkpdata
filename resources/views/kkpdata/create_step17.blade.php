@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            {!! view('kkpdata/partials/side_menu', compact('account')) !!}

            <div class="col-md-8">
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



                        @for ($i = 1; $i <= 10; $i++)
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="building_name{{$i}}">
                                    Building Name {{$i}}
                                </label>
                                <div class="col-md-4">
                                    <input id="building_name{{$i}}" name="building_name{{$i}}"
                                           value="{{$account['building_name' . $i]}}"
                                           type="text" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="no_of_floor_plans{{$i}}">
                                    No of Floor Plans {{$i}}</label>
                                <div class="col-md-4">
                                    <input id="no_of_floor_plans{{$i}}" name="no_of_floor_plans{{$i}}" value="{{$account['no_of_floor_plans' . $i]}}" type="text" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="floor_plans{{$i}}_file">
                                    FloorPlans {{$i}} (MS Word or PDF): </label>
                                <div class="col-md-4">
                                    @if(!empty($account['floor_plans' . $i . '_file']))
                                        FileName: {{$account['floor_plans' . $i .'_file']}}
                                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step17/floor_plans' . $i . '_file')}}"><i class="fa fa-trash"></i> Delete</a>
                                    @else
                                        <input type="file" name="floor_plans{{$i}}_file" id="floor_plans{{$i}}_file" >
                                    @endif
                                </div>
                            </div>
                        @endfor
                    </fieldset>
                    <!------------------------- --?
                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-8">
                            <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                            <a href="{{ url('kkpdata/step16/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>





































@endsection