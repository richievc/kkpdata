@extends('layouts.app')


@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4> <span class="semi-bold">Facilities</span></h4>
                        </div>
                    </div>
                    <div class="panel-body ">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <a href="kkpdata/create_account">
                            <button class="btn btn-primary"  style="margin-bottom:20px" id="create_account"><i class="fa fa-building-o"></i> Create a Facility</button>
                        </a>

                            <table class="table" id="example3" >
                                <thead>
                                <tr>
                                    <th>Facility</th>
                                    <th>Main Telephone</th>
                                    <th>Point of Contact</th>
                                    <th>POC Phone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($accounts) < 1)
                                    <div class="alert alert-danger">No Accounts Found</div>
                                @else

                                    @foreach ($accounts as $data)
                                        <tr>
                                            <td>{{$data->facility}}</td>
                                            <td>{{$data->main_phone}}</td>
                                            <td>{{($data->is_point_of_contact == 0 ? $data->your_name : $data->point_of_contact_name)}}</td>
                                            <td>{{($data->is_point_of_contact == 0 ? $data->your_phone : $data->point_of_contact_phone)}}</td>
                                            <td>
                                                <a href="{{url('kkpdata/edit/' . $data->id)}}" class="btn btn-xs btn-default">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                             	<a href="{{url('kkpdata/create_pdf/' . $data->id)}}" class="btn btn-xs btn-primary">
                                                    <i class="fa fa-pdf"></i> Print To PDF
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>



                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
