@extends('layouts.app')

@section('content')
  <div class="bg-white p-6 rounded shadow">
    <h2 class="h5 mb-4">Dashboard di {{ $user->name }}</h2>

    <h4>Progetti associati</h4>
    <ul class="mb-4">
      @forelse($projects as $p)
        <li>
          <strong>{{ $p->title }}</strong> 
          <span class="text-muted">(Ruolo: {{ $p->pivot->role ?? 'n/d' }})</span>
        </li>
      @empty
        <li>Nessun progetto associato.</li>
      @endforelse
    </ul>

    <h4>Task attivi</h4>
    <ul class="mb-4">
      @forelse($tasks as $t)
        <li>{{ $t->title }} — <span class="badge bg-info text-dark">{{ $t->status }}</span></li>
      @empty
        <li>Nessun task attivo.</li>
      @endforelse
    </ul>

    <h4>Pubblicazioni correlate</h4>
    <ul>
      @forelse($publications as $pub)
        <li>{{ $pub->title }} {{ $pub->status ? '(' . $pub->status . ')' : '' }}</li>
      @empty
        <li>Nessuna pubblicazione trovata.</li>
      @endforelse
    </ul>
  </div>
@endsection