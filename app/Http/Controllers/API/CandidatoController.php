<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatoController extends Controller
{
    
    public function index()
    {
        try {
            $lista = DB::table('candidatos')->get();
            return response()->json($lista,200);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {

        try {
            $store = DB::table('candidatos')->insertGetId([
                'nome' => $request->nome,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'profissao' => $request->profissao,
                'status' => 'NOVO',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return response()->json(['status'=>'success'],201);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        
    }

  
    public function show($id)
    {
        try {
            $data = DB::table('candidatos')->where('id',$id)->first();
            return response()->json($data,200);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {


        try {
            $store = DB::table('candidatos')->where('id', $id)->update([
                'nome' => $request->nome,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'profissao' => $request->profissao,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return response()->json(['status'=>'success'],200);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }



        
    }

    public function destroy($id)
    {
        DB::table('candidatos')->where('id', $id)->delete();
        return response()->json(['message' => 'Deletado com sucesso.'],200);

    }
}
