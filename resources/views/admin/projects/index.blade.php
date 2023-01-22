@extends('layouts.app')

@section('title')
    | Projects
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="px-5 py-3">
            @if (session('delete'))
                <div class="alert alert-success" role="alert">
                    {!!session('delete')!!}
                </div>
            @endif
            <h1 class="text-uppercase text-black-50">Lista dei Progetti</h1>
            <div class="table-container pt-2">
                <table class="table table-striped">

                    <div class="new-project px-2 py-3">
                        <a class="btn btn-success" href="{{route('admin.projects.create')}}" role="button"><i class="fa-solid fa-plus"></i> Nuovo Progetto</a>
                        <div class="total py-2">
                            <strong>Progetti Trovati:</strong><span> {{$projects->total()}}</span>
                        </div>
                    </div>

                    <thead>
                      <tr>
                        <th scope="col">
                            <a href="{{route('admin.projects.orderby', ['id', $direction])}}">
                                ID
                                @if ($column == 'id')

                                    @if ($direction === 'asc' && $column === 'id')
                                        <i class="fa-solid fa-sort-down"></i>
                                    @else
                                        <i class="fa-solid fa-sort-up"></i>
                                    @endif
                                @endif

                            </a>
                        </th>
                        <th scope="col">
                            <a href="{{route('admin.projects.orderby', ['name', $direction])}}">
                                Nome
                                @if ($column == 'name')

                                    @if ($direction === 'asc' && $column === 'name')
                                        <i class="fa-solid fa-sort-down"></i>
                                    @else
                                        <i class="fa-solid fa-sort-up"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">
                            <a href="{{route('admin.projects.orderby', ['client_name', $direction])}}">
                                Nome del Cliente
                                @if ($column == 'client_name')
                                    <i></i>
                                    @if ($direction === 'asc' && $column === 'client_name')
                                        <i class="fa-solid fa-sort-down"></i>
                                    @else
                                        <i class="fa-solid fa-sort-up"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project )
                            <tr>
                                <th scope="row">{{$project->id}}</th>
                                <td>{{$project->name}}</td>
                                <td>{{$project->client_name}}</td>
                                <td>
                                    <a class="btn btn btn-outline-info" href="{{route('admin.projects.show', $project->slug)}}" role="button"><i class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-outline-warning" href="{{route('admin.projects.edit', $project->slug)}}" role="button"><i class="fa-solid fa-pen"></i></a>
                                    @include('admin.partials.delete-form')
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4"><h3>Nessun risultato</h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $projects->links() }}
            </div>

        </div>

    </div>
</div>
@endsection
