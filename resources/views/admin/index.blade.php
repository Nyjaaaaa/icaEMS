@extends('admin.layout')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="pull-left">
                <h2>Monitor Equipments</h2>
            </div>

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('admin.create')}}">Monitor Equipment</a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-succes">
                    <p>{{$message}}</p>
                </div>

            @endif

            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Borrower Name</th>
                    <th>Equipment Name</th>
                    <th>Datetime Borrowed</th>
                    <th>Datetime Returned</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($admin as $admin)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $admin->borrower_id }}</td>
                    <td>{{ $admin->equipment_name }}</td>
                    <td>{{ $admin->datetime_borrowed }}</td>
                    <td>{{ $admin->datetime_returned }}</td>
                    <td>
                        <form action="{{route('admin.destroy', $admin->logs_id)}}" method="POST">
                            <a class="btn btn-info" href="{{route('admin.show', $admin->id)}}">See details</a>
                            <a class="btn btn-primary" href="{{route('admin.edit', $admin->id)}}">Update</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
