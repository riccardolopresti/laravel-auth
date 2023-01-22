@extends('layouts.app')

@section('title')
    | Dettagli
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="px-5 py-3">
            @if (session('update'))
                <div class="alert alert-success" role="alert">
                    {!!session('update')!!}
                </div>
            @endif
            <h1 class="text-uppercase text-black-50 mb-5">Dettaglio progetto {{$project->name}}</h1>

            <div class="card" style="max-width: 800px">
                @if ($project->cover_image)
                    <img src="{{asset('storage/' . $project->cover_image)}}" class="card-img-top" alt="{{asset('storage/' . $project->image_original_name)}}">
                @endif

                <div class="card-body">

                    <div class="custom-action d-flex mb-3">
                        <h4 class="card-title">{{$project->name}}</h4>
                        <a class="btn btn-outline-warning mx-2" href="{{route('admin.projects.edit', $project->slug)}}" role="button"><i class="fa-solid fa-pen"></i></a>

                        @include('admin.partials.delete-form')
                    </div>

                    <h6 class="card-title">{{$project->client_name}}</h6>
                    <p class="card-text">{!!$project->summary!!}</p>

                    <a href="{{route('admin.projects.index')}}" class="btn btn-primary mt-3">Torna a tutti i progetti</a>

                </div>
            </div>

        </div>


    </div>
</div>
@endsection
