<x-layout title="Temporadas de {!!$series->nome!!}">


    <ul class="list-group">
        @foreach($seasons as $season)
        <li class="list-group-item d-flex justify-content-between align-items-center">
               <a href="{{route('episodes.index',$season->id)}}">
                Temporada {{$season->number}}
                </a> 
            <span class="badge bg-secondary">
            {{$season->episodes()->watched()->count() }} / {{$season->episodes->count()}}
            </span>
        </li>
        @endforeach 
    </ul>

    <br>
    <a class="btn btn-primary" href="{{ route('series.index') }}" role="button">Voltar a tela inicial</a>
</x-layout>
