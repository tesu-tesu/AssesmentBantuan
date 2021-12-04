<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengajuan;
use App\Models\Admin;
use App\Models\Users;
use App\Models\Lembaga;
use Illuminate\Support\Facades\DB;
use Exception;
use Hash;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::with('users', 'lembagas')->get();
        return view('pengajuan.read', compact('pengajuan'));
    }
    
    public function add_page()
    {
        $user = Users::get();
        return view('pengajuan.add', compact('user'));
    }

    public function add_pengajuan_page(Request $data)
    {
        DB::beginTransaction();
        try {
            $temp = new Users;
            if (!$data->id) {
                
                $user = new Users;
                $user->name = $data->name;
                $user->nik = $data->nik;
                $user->alamat = $data->alamat;
                $user->no_telp = $data->no_telp;
                $user->status = 1;
                $temp = $user;

                if (!$user -> save()) {
                    throw new Exception("Gagal Menyimpan Data");
                }
                $temp->id = $user->id;
            } else {
                $temp = DB::table('users')->where('id', $data->id)->first();
            }
            $lembaga = DB::table('lembagas')->get();

            DB::commit();
            return view('pengajuan.add_pengajuan', compact('temp', 'lembaga'));
        } catch (Exception $e) {
            DB::rollBack();
            dd( $e->getMessage());
        }
    }

    public function add_data(Request $data)
    {
        
        DB::beginTransaction();

        try {
            $pengajuan = new Pengajuan();
            $pengajuan->id_user = $data->user;
            $pengajuan->id_lembaga = $data->lembaga;
            $pengajuan->program_bantuan = $data->program_bantuan;
            $pengajuan->status = $data->status;
            
            if (!$pengajuan -> save()) {
                dd('halo');
                throw new Exception("Gagal Menyimpan Data");
            }
            
            DB::commit();

            return redirect()->route('read_pengajuan');
        } catch (Exception $e) {
            DB::rollback();
            dd("error cuy gatau :(", $e->getMessage());
        }
    } 

    
    public function edit_status($status)
    {
        
        DB::beginTransaction();
        try {
            $data = explode(" ", $status);
            
            if (!DB::table('pengajuans')->where('id', $data[1])->first()) {
                abort(404);
            }
            
            $pengajuan = Pengajuan::find((int)$data[1]);
            $pengajuan->status = $data[0];

            if (!$pengajuan -> save()) {
                throw new Exception("Gagal Menyimpan Data");
            }
            
            DB::commit();
            return redirect()->route('read_pengajuan');
        } catch (Exception $e) {

            DB::rollback();
            dd($e->getMessage());
        }
    }

    public function delete_data($id_data)
    {
        DB::beginTransaction();
        try {

            if (!DB::table('pengajuans')->where('id', $id_data)->first()) {
                abort(404);
            }

            $pengajuan = Pengajuan::find($id_data);
            $pengajuan->delete();

            DB::commit();
            return redirect()->route('read_pengajuan');
        } catch (Exception $e) {

            DB::rollback();
            dd($e->getMessage());
        }
    }

    public function edit_page($id_data)
    {
        
        DB::beginTransaction();
        try {
            if (!DB::table('pengajuans')->where('id', $id_data)->first()) {
                abort(404);
            }

            $pengajuan = DB::table('pengajuans')->where('id', $id_data)->first();
            $user = DB::table('users')->where('id', $pengajuan->id_user)->first();
            $lembagas = DB::table('lembagas')->get();
            $lembaga = DB::table('lembagas')->where('id', $pengajuan->id_lembaga)->first();
            return view('pengajuan.edit', compact('pengajuan', 'user', 'lembagas', 'lembaga'));
        } catch (Exception $e) {

            DB::rollback();
            dd($e);
        }        
    }

    public function edit_data(Request $data, $id_pengajuan)
    {

        
        DB::beginTransaction();
        try {
            if (!DB::table('pengajuans')->where('id', $id_pengajuan)->first()) {
                abort(404);
            }
            $pengajuan = Pengajuan::find($id_pengajuan);
            $pengajuan->program_bantuan = $data->program_bantuan;
            $pengajuan->status = $data->status;
            $pengajuan->id_lembaga = $data->lembaga;
            if (!$pengajuan -> save()) {
                throw new Exception("Gagal Menyimpan Data");
            }
            DB::commit();

            return redirect()->route('read_pengajuan');
        } catch (Exception $e) {

            DB::rollback();
            dd($e->getMessage());
        }        
    }
}
