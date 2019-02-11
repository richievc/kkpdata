@extends('backpack::layout')


@section('content')

    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4><span class="semi-bold">Accounts</span></h4>

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

                    <hr>


                    <table class="table table-bordered table-striped" id="example3" >
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Point of Contact</th>
                                <th>POC Phone</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @if(count($accounts) < 1)
                                <div class="alert alert-danger">No Rows found</div>
                            @else
                                @foreach($accounts as $account)
                                    <tr>
                                        <td>{{ $account->company == "" ? 'Not Assigned' : $account->company }}</td>
                                        <td>{{ $account->name }}</td>
                                        <td>{{ $account->phone }}</td>
                                        <td>{{ count($account->orders) }}</td>
                                        <td style="text-align: right">
                                            <a href="{{ url('admin/kkpdata/orders/' . $account->id) }}" data-toggle="tooltip" title="See All Orders" class="btn btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>

                    {{ $accounts->render() }}
                </div>
            </div>
        </div>
    </div>

@endsection
