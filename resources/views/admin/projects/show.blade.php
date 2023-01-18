@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="px-5 py-3">
            <h1 class="text-uppercase text-black-50 mb-5">Dettaglio progetto {{$project->name}}</h1>

            <div class="card" style="max-width: 800px">
                <img src="{{$project->cover_image}}" class="card-img-top" alt="{{$project->name}}">

                <div class="card-body">

                    <div class="custom-action d-flex">
                        <h4 class="card-title">{{$project->name}}</h4>
                        <a class="btn btn-warning mx-2" href="{{route('admin.projects.edit', $project->slug)}}" role="button"><i class="fa-solid fa-pen"></i></a>
                        <a class="btn btn-danger" href="#" role="button"><i class="fa-solid fa-trash"></i></a>
                    </div>

                    <h6 class="card-title">{{$project->client_name}}</h6>
                    <p class="card-text">{{$project->summary}}</p>

                    <a href="{{route('admin.projects.index')}}" class="btn btn-primary mt-3">Torna a tutti i progetti</a>

                </div>
            </div>

        </div>


    </div>
</div>
@endsection
