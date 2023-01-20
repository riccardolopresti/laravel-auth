@extends('layouts.app')

@section('title')
    | Modifica
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center px-5 py-3">

        <h1 class="text-uppercase text-black-50">Modifica il progetto {{$project->name}}</h1>

        <div class="col">
            <div class="table-container px-5 py-3 ">
                <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome progetto*</label>
                        <input type="text" class="form-control" id="name" value="{{$project->name}}" name="name" placeholder="Nome del progetto">
                    </div>

                    <div class="mb-3">
                        <label for="client_name" class="form-label">Nome del cliente*</label>
                        <input type="text" class="form-control" id="client_name" value="{{$project->client_name}}" name="client_name" placeholder="Nome del cliente">
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Immagine*</label>
                        <input onchange="showImg(event)" type="file" class="form-control" id="cover_image" value="{{$project->cover_image}}" name="cover_image" placeholder="Immagine">

                        <img id="output-image" src="{{asset('storage/' . $project->cover_image)}}" alt="{{asset('storage/' . $project->image_origianal_name)}}">

                    </div>

                    <div class="mb-3">
                        <label for="summary" class="form-label">Descrizione*</label>
                        <textarea class="form-control" id="summary" name="summary" rows="3"
                        placeholder="Descrizione">
                            {{$project->summary}}
                        </textarea>
                    </div>

                    <a href="{{route('admin.projects.index')}}" class="btn btn-danger" role="button" onclick="return confirm('Vuoi davvero tornare a tutti i progetti? Perderai tutte le modifiche effettuate')">Annulla e torna a tutti i progetti</a>
                    <button type="submit" class="btn btn-success">Modifica</button>
                  </form>
            </div>
        </div>


    </div>
</div>

<script>
    ClassicEditor
            .create( document.querySelector( '#summary' ),{
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            })
            .catch( error => {
                console.error( error );
            } );
    function showImg(event){
        const tagImage = document.getElementById('output-image');
        tagImage.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
