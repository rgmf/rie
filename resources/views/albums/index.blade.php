@extends('template')

@section('content')
    <div class="row justify-content-center">
        @forelse ($albums as $album)
            <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-2 mt-4">
                <div class="card">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180"
                         xmlns="http://www.w3.org/2000/svg" role="img"
                         aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice"
                         focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect>
                        <text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                    </svg>
                    <div class="card-body">
                        <h4 class="card-title">{{ $album->name }}</h4>
                        <p class="card-text">
                            Creado por {{ $album->user->name }}
                        </p>
                        <a href="{{ route('albums.show', $album->id) }}" class="btn btn-primary">
                            Abrir
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-8 mt-4 offset-md-2">
                <p class="alert alert-info">
                    No hay nada que mostrar
                </p>
            </div>
        @endforelse
    </div>
@endsection
