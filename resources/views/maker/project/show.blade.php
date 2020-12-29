@extends('layouts.maker')
@section('content')

    <div class="card-body">

        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    @include('maker.includes.alerts.success')
                                    @include('maker.includes.alerts.errors')
                                    <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead class="">
                                        <tr>
                                            <th>id</th>
                                            <th>Project Title</th>
                                            <th>Author</th>
                                            <th>status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Tasks</th>
                                            <th>Make Task</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($projects) && $projects->count()>0)
                                            @foreach($projects as $project)
                                                <tr>
                                                    <td>{{$project->id}}</td>
                                                    <td>{{$project->title}}</td>
                                                    <td>{{$project->users->name}}</td>
                                                    <td>{{$project->status?'active':'inactive'}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{route('project.edit',$project->id)}}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                                                Edit </a>
                                                        </div>
                                                    </td>


                                                    <td>
                                                        <form method="post"
                                                              action="{{route('project.delete',$project->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>

                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{route('task.show',$project->id)}}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                                                Tasks </a>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{route('task.create',$project->id)}}"
                                                               class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">
                                                               <small> Make New Task</small> </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection
