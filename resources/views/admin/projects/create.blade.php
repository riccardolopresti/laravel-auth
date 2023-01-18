@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center px-5 py-3">

        <h1 class="text-uppercase text-black-50">Crea un nuovo progetto</h1>

        <div class="col">
            <div class="table-container px-5 py-3 ">
                <form >
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome progetto*</label>
                        <input type="text" class="form-control" id="name" placeholder="Nome del progetto">
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>
            </div>
        </div>


    </div>
</div>
@endsection
