<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Support\Facades\DB;
use Exception;

use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index()
    {
        $lembaga = Lembaga::get();
        return view('lembaga.read', compact('lembaga'));
    }

    public function add_page()
    {
        return view('lembaga.add');
    }

    public function add_data(Request $data)
    {

        DB::beginTransaction();

        try {
            $lembagaModel = new Lembaga;
            $lembagaModel->name = $data->name;
            
            if (!$lembagaModel -> save()) {
                throw new Exception("Gagal Menyimpan Data");
            }

            DB::commit();

            return redirect()->route('read_lembaga');
        } catch (\Throwable $th) {
            DB::rollback();
            dd("error cuy gatau :(");
        }
    }

    public function delete_data($id_data)
    {
        
        DB::beginTransaction();
        try {
            if (!DB::table('lembagas')->where('id', $id_data)->first()) {
                abort(404);
            }
            $lembaga = Lembaga::find($id_data);
            $lembaga->delete();  
            DB::commit();
            return redirect()->route('read_lembaga');
        } catch (\Throwable $th) {

            DB::rollback();
            dd("error cuy gatau :(");
        }
    }

    public function edit_page($id_data){

        if (!DB::table('lembagas')->where('id', $id_data)->first()) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $lembaga = DB::table('lembagas')->where('id', $id_data)->first();
            
            return view('lembaga.edit', compact('lembaga'));
        } catch (\Throwable $th) {

            DB::rollback();
            dd("error cuy gatau :(");
        }        
    }

    public function edit_data(Request $data, $id_lembaga){

        
        DB::beginTransaction();
        try {
            if (!DB::table('lembagas')->where('id', $id_lembaga)->first()) {
                abort(404);
            }
            $lembaga = Lembaga::find($id_lembaga); 
            $lembaga->name = $data->nama_lembaga;
            if (!$lembaga -> save()) {
                throw new Exception("Gagal Menyimpan Data");
            }

            DB::commit();

            return redirect()->route('read_lembaga');
        } catch (Exception $e) {

            DB::rollback();
            dd($e->getMessage());
        }        
    }
}
