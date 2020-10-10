<?php

namespace App\Http\Controllers;

use App\Panel;
use App\Type;
use App\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Storage;

class PanelController extends Controller
{
    // use Auth;
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeMaintenance = Type::all();
        return view('clients.formPanel', ['typeMaintenances' => $typeMaintenance]);
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
        $checkId = DB::table('panel_maintenance')->max('id_maintenance');

        if ($checkId == NULL) {
            $config = [
                'table' => 'panel_maintenance',
                'length' => 10,
                'prefix' => date('m').date('d').date('y')
            ];
            $dataId = IdGenerator::generate($config);
        } else {
            $dataId = $checkId+1;
        }

        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'name' => 'required',
            'description' => 'required',
            'file1' => 'required|mimes:jpg,pdf,png,jpeg'
        ]);

        if($validator->fails()){
            return redirect('panel/create')->withErrors($validator)->withInput();
        } else {
            $panel = new Panel;
            $panel->id_maintenance = $dataId;
            $panel->id_client = \Auth::user()->id;
            $panel->id_pic = 'NULL';
            $panel->title = $request->name;
            $panel->id_type = $request->type;
            $panel->description = $request->description;
            $panel->description_from_teknisi = 'NULL';
            $panel->status = 'WAITING';
            if($request->file('file1')){
                $newFile = $request->file('file1')->store('files', 'public');
                $panel->file1 = $newFile;
            }
            $panel->file2 = 'NULL';
            $panel->file3 = 'NULL';
            $panel->tanggal_pengajuan = date('Y-m-d');
            $panel->tanggal_selesai = date('Y-m-d');
            $panel->save();
            
            return redirect('client');
        }
        
    }
    
    public function delete($id)
    {
        $dataPanel = Panel::find($id);
        $dataPanel->delete();
        return redirect('/client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
