<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiaRequest;
use Illuminate\Http\Request;
use App\Models\Noticia;
use Carbon\Carbon;


class NoticiasController extends Controller
{
    public function index()
        {
            $noticias = Noticia::paginate(5);

            return view('noticias.index', [
                'noticias' => $noticias
            ]);
        }

    public function create()
        {
            return view('noticias.create');
        }
    public function store(NoticiaRequest $request)
        {
        $dados = $request->all();
        $nomeImagem = "sdsdgsd.jpg";
        $pathImagem = $request->imagem->storeAs('public', $nomeImagem);
        $dados['imagem'] = '/storage/' . $nomeImagem;

        $noticia = Noticia::create($dados);

        return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
    }

    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', [
        "noticia" => $noticia
        ]);
    }

    public function update(Noticia $noticia, NoticiaRequest $request)
    {
        $dados = $request->all();
        $dados['imagem'] = UploadService::upload($request);

        $noticia->update($dados);

        return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');

    }

    public function destroy(Noticias $noticia)
    {
        $noticia->delete();
        return redirect()->back()->with('mensagem', 'Registro excluído com sucesso!');        
    }
}
