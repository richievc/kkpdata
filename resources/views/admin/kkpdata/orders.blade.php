@extends('backpack::layout')


@section('content')

    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4><span class="semi-bold">Properties</span></h4>

                </div>
                <div class="grid-body ">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                  {{--  <a href="kkpdata/create_property">
                        <button class="btn btn-primary pull-right"
                                id="create_account">
                            <i class="fa fa-plus"></i> Add property
                        </button>
                    </a>--}}
                    <hr>


                    <table class="table table-bordered table-striped" id="example3" >
                        <thead>
                        <tr>
                            <th>Property</th>
                            <th>Point of Contact</th>
                            <th>POC Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>

                        @if(count($properties) < 1)
                            <div class="alert alert-danger">No Rows found</div>
                        @else
                            @foreach($properties as $property)
                                <tr>
                                    <td>{{ $property->address }}</td>
                                    <td>{{ $property->state }}</td>
                                    <td>{{ $property->zip }}</td>
                                    <td style="text-align: right">
                                        <a href="{{ url('admin/kkpdata/pdf/' . $property->id) }}" data-toggle="tooltip" title="Download PDF" class="btn btn-sm"><i class="fa fa-file-pdf-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>

                    {{ $properties->render() }}
                </div>
            </div>
        </div>
    </div>

@endsection
