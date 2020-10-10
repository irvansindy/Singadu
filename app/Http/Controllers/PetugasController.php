<?php

namespace App\Http\Controllers;

use App\panel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dataPengaduan = Panel::where('id_pic', \Auth::user()->id)->paginate(10);
        $dataPengaduan = DB::table('panel_maintenance')
        ->join('users', 'panel_maintenance.id_client', '=', 'users.id')
        ->select('panel_maintenance.*', 'users.name')
        ->where('id_pic', \Auth::user()->id)
        ->paginate(10);
        return view('teknisi.index', ['pengaduan'=> $dataPengaduan]);
    }

    public function searchPengaduan(Request $request)
    {
        // , 'id_pic', \Auth::user()->id]
        $data = $request->dataPengaduan;
        $dataPengaduan = DB::table('panel_maintenance')
        ->join('users', 'panel_maintenance.id_client', '=', 'users.id')
        ->select('panel_maintenance.*', 'users.name')
        ->where('id_pic', \Auth::user()->id)
        ->orWhere('title', 'like', "%".$data."%")
        ->orWhere('id_maintenance', 'like', "%".$data."%")
        ->paginate(10);
        // $dataPengaduan = Panel::where('title', 'like', "%".$data."%")->paginate(10);
        return view('teknisi.index', ['pengaduan'=> $dataPengaduan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$id
        return view('petugas.detail');
    }

    public function showPengaduan($id)
    {
        //$id
        $detailPengaduan = Panel::find($id);
        return view('teknisi.detail', ['detailPengaduan' => $detailPengaduan]);
    }

    public function acceptPengaduanTeknisi($id)
    {
        $acceptPengaduanTeknisi = Panel::findOrFail($id);
        $acceptPengaduanTeknisi->status = 'ON PROGRESS';
        $acceptPengaduanTeknisi->save();
        return redirect('teknisi');
    }

    public function updatePengaduanTeknisi(Request $request, $id)
    {
        $deskripsi = $request->description;
        $updatePengaduan = Panel::findOrFail($id);
        $updatePengaduan->description_from_teknisi = $deskripsi;
        if($request->file('file2')){
            $newFile = $request->file('file2')->store('files', 'public');
            $updatePengaduan->file2 = $newFile;
        }
        $updatePengaduan->status = 'DONE';
        $updatePengaduan->tanggal_selesai = date('Y-m-d');
        $updatePengaduan->save();

        return redirect('teknisi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
