<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{

    public function index(){
        $update = DB::select('SELECT data_update.*, admin_stts.jenis
        FROM data_update
        JOIN admin_stts ON data_update.stts = admin_stts.id WHERE data_update.id = 1');

        $osmupdate = DB::select('SELECT data_absen.*, admin_stts.jenis, admin_user.nama, admin_user.jabatan
        FROM data_absen
        JOIN admin_stts ON data_absen.data_user = admin_stts.id
        JOIN admin_user ON data_absen.user = admin_user.id
        ORDER BY id DESC
        LIMIT 1');

        // $monitoring = DB::select('SELECT data_monitoring.*, admin_stts.jenis
        //                 FROM data_monitoring
        //                 JOIN admin_stts ON data_monitoring.stts = admin_stts.id
        //                 ORDER BY id DESC');

        //QUERY BUILDER LARAVEL
        $monitoring = DB::table('data_monitoring')
                        ->join('admin_stts', 'data_monitoring.stts', '=', 'admin_stts.id')
                        ->select('data_monitoring.*', 'admin_stts.jenis')
                        ->orderBy('id', 'DESC')
                        ->get();

        $osm = DB::select('SELECT data_absen.*, admin_stts.jenis, admin_user.nama, admin_user.jabatan
        FROM data_absen
        JOIN admin_stts ON data_absen.data_user = admin_stts.id
        JOIN admin_user ON data_absen.user = admin_user.id
        ORDER BY id DESC
        LIMIT 10');
        // dd($update,$monitoring,$osm,$osmupdate);
        return view('master.dashboard', compact('update', 'monitoring', 'osm', 'osmupdate'));
    }



    public function dashboardAjax(){
        $update = DB::select('SELECT data_update.*, admin_stts.jenis
        FROM data_update
        JOIN admin_stts ON data_update.stts = admin_stts.id WHERE data_update.id = 1');

        $osmupdate = DB::select('SELECT data_absen.*, admin_stts.jenis, admin_user.nama, admin_user.jabatan
        FROM data_absen
        JOIN admin_stts ON data_absen.data_user = admin_stts.id
        JOIN admin_user ON data_absen.user = admin_user.id
        ORDER BY id DESC
        LIMIT 1');

        return response()->jsonjson(['update' => $update, 'osmupdate' => $osmupdate]);
        // dd($osmupdate,$update);
    }

    public function logData(){
        $monitoring = DB::select('SELECT data_monitoring.*, admin_stts.jenis
        FROM data_monitoring
        JOIN admin_stts ON data_monitoring.stts = admin_stts.id
        ORDER BY id DESC');

        return view('master.monitoring', compact('monitoring'));
    }

    public function osm(){
        $osm = DB::select('SELECT data_absen.*, admin_stts.jenis, admin_user.nama, admin_user.jabatan
        FROM data_absen
        JOIN admin_stts ON data_absen.data_user = admin_stts.id
        JOIN admin_user ON data_absen.user = admin_user.id
        ORDER BY id DESC');
        return view('master.osm', compact('osm'));
    }

    public function drain(){
        $drain = DB::select('SELECT data_drain.*, user.nama AS user_nama, user.jabatan AS user_jabatan, acc.nama AS acc_nama, acc.jabatan AS acc_jabatan,  admin_stts.jenis
        FROM data_drain
        JOIN admin_user AS user ON data_drain.user = user.id
        JOIN admin_stts ON data_drain.stts = admin_stts.id
        JOIN admin_user AS acc ON data_drain.acc = acc.id');
        // dd($drain);
        return view('master.drain', compact('drain'));
    }

    public function user(){
        $user = DB::select('SELECT admin_user.*, admin_role.role FROM admin_user JOIN admin_role ON admin_user.role_id = admin_role.id');
        // dd($osmupdate,$update);
        return view('master.user', compact('user'));
    }
}
