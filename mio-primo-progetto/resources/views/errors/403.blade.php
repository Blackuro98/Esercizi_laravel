@extends('layouts.app')
@section('content')
  <div class="text-center">
    <h1 class="display-5 text-danger">403 — Accesso negato</h1>
    <p>Non hai i permessi per questa sezione.</p>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Torna alla Dashboard</a>
  </div>
@endsection