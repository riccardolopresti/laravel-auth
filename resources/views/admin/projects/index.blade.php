@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="px-5 py-3">
            <h1 class="text-uppercase text-black-50">Projects List</h1>
            <div class="table-container pt-2">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Nome del Cliente</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project )
                            <tr>
                                <th scope="row">{{$project->id}}</th>
                                <td>{{$project->name}}</td>
                                <td>{{$project->client_name}}</td>
                                <td>
                                    <a class="btn btn-primary" href="#" role="button"><i class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-warning" href="#" role="button"><i class="fa-solid fa-pen"></i></a>
                                    <a class="btn btn-danger" href="#" role="button"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>



                  {{ $projects->links() }}
            </div>


        </div>


    </div>
</div>
@endsection
