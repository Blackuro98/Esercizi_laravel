@extends('layouts.app')

@section('content')
  <!--<h2 class="h5 mb-3">Progetti di Ricerca</h2>-->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h5 m-0">Progetti di Ricerca</h2>
    <a href="{{ url('/projects/create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg"></i> + Nuovo Progetto
    </a>
</div>

  @forelse ($projects as $p)
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <h3 class="h6 m-0">{{ $p->title }}</h3>
            <div class="text-muted small">Status: {{ $p->status ?? 'n/d' }}</div>
            @if($p->file_path)
                <div class="mt-1">
                    <a href="{{ asset('storage/' . $p->file_path) }}" target="_blank" class="small text-danger text-decoration-none">
                        <i class="bi bi-file-pdf"></i> Scarica PDF
                    </a>
                </div>
            @endif
          </div>
          <!--<a class="btn btn-sm btn-outline-primary" href="{{ route('projects.show', $p->id) }}">Dettagli</a>-->
          <a class="btn btn-sm btn-outline-primary" href="{{ url('/projects/' . $p->id) }}">Dettagli</a>
        </div>

        @if($p->tags->isNotEmpty())
          <div class="mt-2 d-flex gap-2 flex-wrap">
            @foreach($p->tags as $t)
              <span class="badge text-bg-info">#{{ $t->name }}</span>
            @endforeach
          </div>
        @endif

        <div class="mt-2 text-muted small">
          Milestone: {{ $p->milestones->count() }} |
          Pubblicazioni collegate: {{ $p->publications->count() }}
        </div>
      </div>
    </div>
  @empty
    <div class="alert alert-secondary">Nessun progetto presente.</div>
  @endforelse
@endsection