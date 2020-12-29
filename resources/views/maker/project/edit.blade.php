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
                                    @if(isset($project) && $project->count()>0)


                                        <form class="form" action="{{route('project.update',$project->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="name"> Project Title</label>
                                                <input type="text" name="name" class="form-control" id="" value="{{$project->title}}"
                                                       aria-describedby="" placeholder="Enter project title">
                                            </div>
                                            <div>
                                                @error('name')
                                                 <strong class="text-danger"> {{$message}} </strong>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Project status</label>

                                                    <select class="form-control" name="status" id="">
                                                        <option value="1" {{$project->status ===1 ?'selected':''}}>
                                                            Activate
                                                        </option>
                                                        <option value="0" {{$project->status ===0 ?'selected':''}}>
                                                            Deactivate
                                                        </option>
                                                    </select>
                                                    @error("project.status")
                                                    <span class="text-danger"> </span>
                                                    @enderror

                                            </div>
                                            <div>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                           </span>
                                                @enderror
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
