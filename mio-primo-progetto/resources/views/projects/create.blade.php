@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Nuovo Progetto</h1>

    <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo del Progetto</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Allega Documento (PDF)</label>
            <input type="file" class="form-control" id="file" name="file" accept=".pdf">
        </div>

        <button type="submit" class="btn btn-primary">Salva Progetto</button>
        <a href="{{ url('/projects') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection