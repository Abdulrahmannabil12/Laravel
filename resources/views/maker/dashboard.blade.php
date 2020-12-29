@extends('layouts.maker')
@section('content')
    <div class="card-body">

        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="d-flex justify-content-center">
                                <span class="text"> projects</span>
                                <ul>
                                    <li><a href="{{route('project.index')}}">view Project</a></li>
                                    <li><a href="{{route('project.create')}}">create Project</a></li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection
