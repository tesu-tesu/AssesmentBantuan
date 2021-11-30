<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Support\Facades\DB;

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
            $lembagaModel->name = $data->nama_lembaga;

            DB::commit();

            return redirect()->route('read_lembaga');
        } catch (\Throwable $th) {
            DB::rollback();
            dd("error cuy gatau :(");
        }
    }

    public function delete_data($id_data)
    {

        if (!DB::table('lembagas')->where('id', $id_data)->first()) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $lembaga = DB::table('lembagas')->where('id', $id_data)->first();

            DB::commit();
            return redirect()->route('read_lembaga');
        } catch (\Throwable $th) {

            DB::rollback();
            dd("error cuy gatau :(");
        }
    }
}
