@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $album->name }}
            @if ($album->description)
                <p>{{ $album->description }}</p>
            @endif
        </div>

        <div class="col-md-8 offset-md-2">
            <ul>
                @forelse ($album->medias as $media)
                    <li>{{ $media->data }}</li>
                @empty
                    <p>No hay imágenes ni vídeos en este álbum</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
