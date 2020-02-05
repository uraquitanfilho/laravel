<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class OutroControlador extends Controller
{
    private $clientes = [
        ["id" => 1, "nome" => "Tan"],
        ["id" => 2, "nome" => "Thais"],
        ["id" => 3, "nome" => "Helen"],
        ["id" => 4, "nome" => "Lopes"],
        ["id" => 5, "nome" => "Araujo"],
    ];

    public function __construct()
    {
        $clientes = session('clientes');
        if (!isset($clientes)) {
            session(['clientes' => $this->clientes]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes  = session('clientes');
        //return view("clientes.index", compact(['clientes']));
        //outras maneiras
        return view("clientes.index", ['clientes' => $clientes, 'title' => 'Show all clients']);
        /*
        return view("clientes.index")
            ->with('clientes', $clientes)
            ->with('title', "Client List");
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = session('clientes');
        $id = end($clientes)['id'] + 1; //count($clientes) + 1;
        $nome = $request->nome;
        $dados = ["id" => $id, "nome" => $nome];
        $clientes[] = $dados;
        session(['clientes' => $clientes]);
        //$clientes  = $this->clientes;
        //return view("clientes.index", compact(['clientes']));
        return redirect()->route('clientes.index');
        // $dados = $request->all();
        //dd($dados);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.info', compact(['cliente']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.edit', compact(['cliente']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes[$index]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1);
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    private function getIndex($id, $clientes)
    {
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        return $index;
    }
}
