@extends('base.master')
@section('title', 'Task Management System')
@section('contents')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0">Create Task</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Task Management System</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">All Task</a></li>
                    <li class="breadcrumb-item active">Create Task</li>
                </ol>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <div class="card">
                <div class="actor_card_hd card-header">
                    <h4 class="float-left">
                        <a href="{{ route('tasks.index') }}" class="add_btn btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    </h4>
                    <h5 class="float-right"></h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 pt-3">
                                <div class="input-group input_field">
                                    <div class="col-sm-2">
                                        <label for="title">Title <span class="text-danger"> *</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control" required>
                                        @error('title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 pt-3">
                                <div class="input-group input_field">
                                    <div class="col-sm-2">
                                        <label for="description">Description </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 pt-3">
                                <div class="input-group input_field">
                                    <div class="col-sm-2">
                                        <label for="priority">Priority </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control select2" name="priority" id="priority">
                                            <option value="Low">Low</option>
                                            <option value="Medium" selected>Medium</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 pt-3">
                                <div class="input-group input_field">
                                    <div class="col-sm-2">
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control select2" id="status" name="status">
                                            <option value="1">Completed </option>
                                            <option value="0" selected>Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 pt-3">
                                <div class="input-group input_field">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <button type="submit" class="add_btn btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#priority').select2({
            allowClear: true
        });
    });

    $(document).ready(function () {
        $('#status').select2({
            allowClear: true
        });
    });
</script>
@endsection