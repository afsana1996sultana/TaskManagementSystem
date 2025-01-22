@extends('base.master')
@section('title', 'Task Management System')
@section('contents')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0">Edit Task</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Task Management System</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">All Task</a></li>
                    <li class="breadcrumb-item active">Edit Task</li>
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
                    <div class="row">
                        <div class="col-sm-12 pt-3">
                            <div class="input-group input_field">
                                <div class="col-sm-2">
                                    <label for="title">Title: </label>
                                </div>
                                <div class="col-sm-8">{{ $tasks->title }}</div>
                            </div>
                        </div>

                        <div class="col-sm-12 pt-3">
                            <div class="input-group input_field">
                                <div class="col-sm-2">
                                    <label for="description">Description: </label>
                                </div>
                                <div class="col-sm-8">{{ $tasks->description ?? "No Description" }}</div>
                            </div>
                        </div>

                        <div class="col-sm-12 pt-3">
                            <div class="input-group input_field">
                                <div class="col-sm-2">
                                    <label for="priority">Priority: </label>
                                </div>
                                <div class="col-sm-8">{{ $tasks->priority }}</div>
                            </div>
                        </div>

                        <div class="col-sm-12 pt-3">
                            <div class="input-group input_field">
                                <div class="col-sm-2">
                                    <label for="status">Status: </label>
                                </div>
                                <div class="col-sm-8">
                                    @if($tasks->status == 0)
                                        Pending
                                    @else
                                        Completed 
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection