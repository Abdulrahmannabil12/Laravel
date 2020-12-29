

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
                                    <form class="form" action="{{route('project.store')}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Project Title</label>
                                            <input type="text" name="name" class="form-control" id=""
                                                   aria-describedby="" placeholder="enter project title">
                                        </div>
                                        <div>
                                            @error('name')
                                          <strong class="text-danger">{{ $message }}</strong>

                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="status" id="">
                                                <option value="1" >
                                                    Active
                                                </option>
                                                <option value="0">
                                                    Inactive
                                                </option>
                                            </select>
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
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection
