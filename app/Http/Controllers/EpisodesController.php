<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class EpisodesController extends Controller
{

    public function index(Season $season)
    {

        return view('episodes.index', [
            'episodes' => $season->episodes,
            'mensagemSucesso' => Session('mensagem.sucesso')
        ]);
    }


    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {

            $episode->watched = in_array($episode->id, $watchedEpisodes);
        });
        $season->push();

        return to_route('episodes.index', $season->id)->with('mensagem.sucesso', 'Episodios marcados como assistidos');
    }
}
