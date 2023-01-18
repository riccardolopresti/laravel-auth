@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center px-5 py-3">

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-uppercase text-black-50">Crea un nuovo progetto</h1>

        <div class="col">
            <div class="table-container px-5 py-3 ">
                <form action="{{route('admin.projects.store')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome progetto*</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" name="name" placeholder="Nome del progetto">

                        @error('name')
                            <p class="invalid-feedback">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="client_name" class="form-label">Nome del cliente*</label>
                        <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" value="{{old('client_name')}}" name="client_name" placeholder="Nome del cliente">

                        @error('client_name')
                            <p class="invalid-feedback">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">URL immagine*</label>
                        <input type="text" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" value="{{old('cover_image')}}" name="cover_image" placeholder="URL immagine">

                        @error('cover_image')
                            <p class="invalid-feedback">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="summary" class="form-label">Descrizione*</label>
                        <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary" rows="3"
                        placeholder="Descrizione"></textarea>

                        @error('summary')
                            <p class="invalid-feedback">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Crea</button>
                  </form>
            </div>
        </div>


    </div>
</div>
@endsection
