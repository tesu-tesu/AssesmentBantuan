<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Users;
use App\Models\Lembaga;
use Illuminate\Support\Facades\DB;
use Exception;
use Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::with('lembagas', 'users')->get();
        return view('admin.read', compact('admin'));
    }
    
    public function add_page()
    {
        $lembaga = Lembaga::get();
        return view('admin.add', compact('lembaga'));
    }

    public function add_data(Request $data)
    {
        
        DB::beginTransaction();

        try {
            $admin = new Admin;
            $admin->email = $data->email;
            $admin->password = Hash::make($data->password);
            $admin->id_lembaga = (int)$data->lembaga;
            $admin->status = 1;
            
            
            $user = new Users;
            $user->name = $data->name;
            $user->nik = $data->nik;
            $user->alamat = $data->alamat;
            $user->no_telp = $data->no_telp;
            $user->status = 0;
            if (!$user -> save()) {
                throw new Exception("Gagal Menyimpan Data");
            }
            
            $admin->id_users = $user->id;
            
            if (!$admin -> save()) {
                throw new Exception("Gagal Menyimpan Data");
            }

            DB::commit();

            return redirect()->route('read_admin');
        } catch (Exception $e) {
            DB::rollback();
            dd("error cuy gatau :(", $e->getMessage());
        }
    } 

    
    public function ubah_status_data($id_data)
    {
        
        DB::beginTransaction();
        try {
            if (!DB::table('admins')->where('id', $id_data)->first()) {
                abort(404);
            }
            $admin = Admin::find($id_data);
            if ($admin->status == 1) {
                $admin->status = 0;  
            } else {
                $admin->status = 1;  
            }
            if (!$admin -> save()) {
                throw new Exception("Gagal Menyimpan Data");
            }
            DB::commit();
            return redirect()->route('read_admin');
        } catch (\Throwable $th) {

            DB::rollback();
            dd("error cuy gatau :(");
        }
    }

    public function edit_page($id_data)
    {

        
        DB::beginTransaction();
        try {
            if (!DB::table('admins')->where('id', $id_data)->first()) {
                abort(404);
            }
            $admin = DB::table('admins')->where('id', $id_data)->first();
            $user = DB::table('users')->where('id', $admin->id_users)->first();
            $lembagas = DB::table('lembagas')->get();
            $lembaga = DB::table('lembagas')->where('id', $admin->id_lembaga)->first();
            
            return view('admin.edit', compact('admin', 'user', 'lembagas', 'lembaga'));
        } catch (\Throwable $th) {

            DB::rollback();
            dd("error cuy gatau :(");
        }        
    }

    public function edit_data(Request $data, $id_admin)
    {

        
        DB::beginTransaction();
        try {
            if (!DB::table('admins')->where('id', $id_admin)->first()) {
                abort(404);
            }
            $admin = Admin::find($id_admin);
            $admin->id_lembaga = $data->id_lembaga;
            $admin->email = $data->email;
            $admin->password = Hash::make($data->password);
            $admin->id_lembaga = (int)$data->lembaga;
            
            $user = Users::find($admin->id_users);
            $user->name = $data->name;
            $user->nik = $data->nik;
            $user->alamat = $data->alamat;
            $user->no_telp = $data->no_telp;
            $user->status = 0;

            if (!$user -> save()) {
                dd('halo');
                throw new Exception("Gagal Menyimpan Data");
            }
            
            if (!$admin -> save()) {
                throw new Exception("Gagal Menyimpan Data");
            }
            DB::commit();

            return redirect()->route('read_admin');
        } catch (Exception $e) {

            DB::rollback();
            dd($e->getMessage());
        }        
    }

}
