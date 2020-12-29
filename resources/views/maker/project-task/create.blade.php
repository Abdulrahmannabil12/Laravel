

@extends('layouts.maker')
@section('content')

    <div class="app-content content ">
        <div class="content-wrapper">
            <div class="content-body">

                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    @if(isset($project))
                                        <strong> Project - {{$project->title}}</strong>
                                    <form class="form" action="{{route('task.store')}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="title">Task Title</label>
                                            <input type="text" name="title" value="" class="form-control" id=""
                                                   aria-describedby="" placeholder="enter project title">
                                        </div>
                                        <div>
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Task Details</label>
                                            <input type="text" name="details" class="form-control" id=""
                                                   aria-describedby=""value="" placeholder="enter project title">
                                        </div>
                                        <div>
                                            @error('content')
                                            <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                           </span>
                                            @enderror
                                        </div>
                                        <div class="form-group" hidden>
                                            <input type="text" value="0" name="status">
                                            @error("status")
                                            <span class="text-danger"> </span>
                                            @enderror
                                        </div>
                                        <div class="form-group" hidden>
                                            <input type="text" value="{{$project->id}}" name="project_id">
                                            @error("status")
                                            <span class="text-danger"> </span>
                                            @enderror
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> Back
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Create
                                            </button>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>

@endsection
