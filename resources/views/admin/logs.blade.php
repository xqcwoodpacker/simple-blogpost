@extends('admin.layout')

@section('title','Logs')

@section('content')
<div class="container-fluid my-5">
    <div class="table-responsive">
        <h1>Logs</h1>
        <table class="table table-striped table-hover w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($logs as $log)
                    <tr scope="row">
                        <td>{{ $logs->firstItem() + $loop->index }}</td>
                        <td>{{ $log->user && $log->user->exists() ? $log->user->name:"No User" }}</td>
                        <td>{{ $log->action }}</td>
                        <td>{{ $log->timestamp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $logs->links() }}
    </div>
</div>
@endsection