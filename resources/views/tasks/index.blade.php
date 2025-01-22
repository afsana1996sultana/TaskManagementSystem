@extends('base.master')
@section('title', 'Task Management System')
@section('contents')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0">Tasks</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Task Management System</a></li>
                    <li class="breadcrumb-item active">All Task</li>
                </ol>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-2"><h1 class="m-0">All Tasks</h1></div>
                        <div class="col-sm-4">
                            <form method="get" action="{{ route('tasks.index') }}" class="form-group filter_group">
                                <select class="form-control select2 w-100" name="priority" id="priority" onchange="this.form.submit()">
                                    <option value="">Filter By Priority</option>
                                    <option value="Low" {{ request('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                                    <option value="Medium" {{ request('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="High" {{ request('priority') == 'High' ? 'selected' : '' }}>High</option>
                                </select>
                            </form>
                        </div>

                        <div class="col-sm-4">
                            <form method="get" action="{{ route('tasks.index') }}" class="form-group filter_group">
                                <select class="form-control select2 w-100" name="status" id="status" onchange="this.form.submit()">
                                    <option value="">Filter By Status</option>
                                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Completed</option>
                                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Pending</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('tasks.create') }}" class="add_task_btn btn btn-primary"><i class="fas fa-plus"></i> Add Task</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="25%">Task Name</th>
                                <th width="35%">Description</th>
                                <th width="10%">Priority</th>
                                <th width="10%">Status</th>
                                <th width="20%" class="text-right">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $key => $val)
                            <tr>
                                <td>{{ $val->title }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($val->description, 70, '...') ?? "No Description"}}</td>
                                <td>{{ $val->priority }}</td>
                                <td>
                                    @if($val->status == 0)
                                        Pending
                                    @else
                                        Completed 
                                    @endif
                                </td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a type="button" class="task_view_cls" href="{{ route('tasks.view',$val->id) }}"><i class="far fa-eye"></i></a>&nbsp;
                                        <a type="button" class="task_edit_cls" href="{{ route('tasks.edit',$val->id) }}"><i class="far fa-edit"></i></a>&nbsp;
                                        <a type="button" class="task_delete_cls" href="{{ route('tasks.destroy',$val->id) }}" id="delete"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#priority').select2({
            placeholder: "Filter By Priority",
            allowClear: true 
        });
    });

    $(document).ready(function () {
        $('#status').select2({
            placeholder: "Filter By Status",
            allowClear: true 
        });
    });
</script>
@endsection