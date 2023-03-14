@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $album->name }}
            @if ($album->description)
                <p>{{ $album->description }}</p>
            @endif
        </div>
    </div>
    <div class="row">
        @forelse ($album->medias as $media)
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 mt-4">
                @if ($media->media_type == "video")
                    <video width="100%" controls loop>
                        <source src="{{ $media->data }}">
                        Vídeo no soportado por tu navegador web
                    </video>
                @else
                    <img src="{{ $media->thumbnail }}" width="100%">
                @endif
            </div>
        @empty
            <div class="col-md-8 mt-4 offset-md-2">
                <p class="alert alert-info">No hay imágenes ni vídeos en este álbum</p>
            </div>
        @endforelse
    </div>
@endsection
