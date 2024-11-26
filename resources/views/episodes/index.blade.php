<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">
    <form method="post">
        <ul class="list-group">
            @csrf
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Episódio {{ $episode->number }}</span>


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $episode->id }}" id="flexCheckDefault"
                            name="episodes[]" @if ($episode->watched) checked @endif />
                        <label class="form-check-label" for="flexCheckDefault">
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
        <br>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</x-layout>
