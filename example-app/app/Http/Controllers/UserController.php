<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $user = Users::where('status', 1)->get();
        return view('user.read', compact('user'));
    }

    public function add_page()
    {
        return view('user.add');
    }

    public function add_data(Request $data)
    {

        DB::beginTransaction();

        try {

            $user = new Users;
            $user->name = $data->nama;
            $user->nik = $data->nik;
            $user->alamat = $data->alamat;
            $user->no_telp = $data->no_telp;
            $user->status = 1;
            if (!$user -> save()) {
                throw new Exception("Gagal Menyimpan Data");
            }

            DB::commit();

            return redirect()->route('read_user');
        } catch (\Throwable $th) {
            DB::rollback();
            dd("error cuy gatau :(", $th);
        }
    }

    public function delete_data($id_data)
    {
        
        DB::beginTransaction();
        try {
            if (!DB::table('users')->where('id', $id_data)->first()) {
                abort(404);
            }
            $user = Users::find($id_data);
            $user->delete();  
            DB::commit();
            return redirect()->route('read_user');
        } catch (\Throwable $th) {

            DB::rollback();
            dd("error cuy gatau :(");
        }
    }

    public function edit_page($id_data){

        
        DB::beginTransaction();
        try {
            if (!DB::table('users')->where('id', $id_data)->first()) {
                abort(404);
            }
            $user = DB::table('users')->where('id', $id_data)->first();
            
            return view('user.edit', compact('user'));
        } catch (\Throwable $th) {

            DB::rollback();
            dd("error cuy gatau :(");
        }        
    }

    public function edit_data(Request $data, $id_user){

        
        DB::beginTransaction();
        try {
            if (!DB::table('users')->where('id', $id_user)->first()) {
                abort(404);
            }
            $user = Users::find($id_user); 
            $user->name = $data->name;
            $user->nik = $data->nik;
            $user->alamat = $data->alamat;
            $user->no_telp = $data->no_telp;
            if (!$user -> save()) {
                throw new Exception("Gagal Menyimpan Data");
            }

            DB::commit();

            return redirect()->route('read_user');
        } catch (\Throwable $th) {

            DB::rollback();
            dd("error cuy gatau :(");
        }        
    }
}
