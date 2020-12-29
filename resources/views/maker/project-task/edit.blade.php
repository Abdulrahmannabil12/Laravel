@extends('layouts.maker')
@section('content')
    @if(isset($task)&& $task->count()>0)

        <div class="app-content content ">
            <div class="content-wrapper">
                <div class="content-body">

                    <!-- Basic form layout section start -->
                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <strong> Project - {{$task->projects->title}}</strong>
                                        <form class="form" action="{{route('task.update',$task->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="title">Task Title</label>
                                                <input type="text" name="title" value="{{$task->title}}"
                                                       class="form-control" id=""
                                                       aria-describedby="" placeholder="enter project title">
                                            </div>
                                            <div>
                                                @error('title')

                                                <span class="text-danger">{{$message}} </span>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Task Details</label>
                                                <input type="text" name="details" class="form-control" id=""
                                                       aria-describedby="" value="{{$task->content}}"
                                                       placeholder="enter project title">
                                            </div>
                                            <div>
                                                @error('details')

                                                <span class="text-danger">{{$message}} </span>


                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="content">Task Status</label>
                                                <input type="text" value="{{$task->status}}" name="status" src=""
                                                       class="form-control" id=""
                                                       aria-describedby="" value="{{$task->content}}"


                                                       placeholder="project Status">
                                                @error('status')
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group" hidden>
                                                <input type="text" value="{{$task->projects->id}}" name="project_id">

                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> Back
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Update
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>

    @endif
@endsection
