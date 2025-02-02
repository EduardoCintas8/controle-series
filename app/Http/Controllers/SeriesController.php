<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository) 
    {
        $this->middleware(Autenticador::class)->except('index');
    }
    public function index(Request $request)
    {

        if (Auth::check()) {


            $series = Serie::all();
            $mensagemSucesso = session('mensagem.sucesso');

            return view('series.index')->with('series', $series)
                ->with('mensagemSucesso', $mensagemSucesso);
        }
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, SeriesRepository $repository)
    {
        $serie = $this->repository->add($request);

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}
