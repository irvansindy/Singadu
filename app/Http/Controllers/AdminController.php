<?php

namespace App\Http\Controllers;
// use Carbon;
use App\User;
use App\Type;
use App\Panel;
use App\Exports\PanelExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
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
        $dataWaiting = Panel::where('status', 'WAITING')->count();
        $dataApprove = Panel::where('status', 'APPROVE')->count();
        $dataOnProgess = Panel::where('status', 'ON PROGRESS')->count();
        $dataDone = Panel::where('status', 'DONE')->count();
        // $dataPengaduan = Panel::paginate(10);
        $dataPengaduan = DB::table('panel_maintenance')
            ->join('users', 'panel_maintenance.id_client', '=', 'users.id')
            ->select('panel_maintenance.*', 'users.name')
            ->paginate(10);
            // dd($dataPengaduan);
        return view ('admin.home', ['pengaduan'=>$dataPengaduan, 'waiting' => $dataWaiting, 'approve' => $dataApprove, 'onProgess'=>$dataOnProgess, 'done'=>$dataDone]);
    }

    public function searchPengaduan(Request $request)
    {
        $dataWaiting = Panel::where('status', 'WAITING')->count();
        $dataApprove = Panel::where('status', 'APPROVE')->count();
        $dataOnProgess = Panel::where('status', 'ON PROGRESS')->count();
        $dataDone = Panel::where('status', 'DONE')->count();
        $data = $request->dataPengaduan;
        $dataPengaduan = DB::table('panel_maintenance')
            ->join('users', 'panel_maintenance.id_client', '=', 'users.id')
            ->select('panel_maintenance.*', 'users.name')
            ->orWhere('title', 'like', "%".$data."%")
            ->orWhere('id_maintenance', 'like', "%".$data."%")
            ->paginate(10);
        // $dataPengaduan = Panel::where('title', 'like', "%".$data."%")->orWhere('id_maintenance', 'like', "%".$data."%")->paginate(10);
        return view ('admin.home', ['pengaduan'=>$dataPengaduan, 'waiting' => $dataWaiting, 'approve' => $dataApprove, 'onProgess'=>$dataOnProgess, 'done'=>$dataDone]);
    }

    public function dataClient()
    {
        $dataClient = User::all()->where('role', '2');
        return view ('admin.dataClient', ['clients'=>$dataClient]);
    }

    public function dataTeknisi()
    {
        $dataTeknisi = User::all()->where('role', '3');
        return view ('admin.dataTeknisi', ['teknisi'=>$dataTeknisi]);
    }
    
    public function dataLaporan()
    {
        // $dataLaporan = Panel::all();
        $dataLaporan = DB::table('panel_maintenance')
            ->join('users', 'panel_maintenance.id_client', '=', 'users.id')
            ->select('panel_maintenance.*', 'users.name')
            ->paginate(10);
        return view ('admin.dataLaporan', ['laporan'=>$dataLaporan]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view ('admin.formUser');
    }
    public function createClient()
    {        
        return view ('admin.formUserClient');
    }
    
    public function createTeknisi()
    {        
        return view ('admin.formUserTeknisi');
    }
    
    public function createType()
    {
        return view ('admin.formType');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClient(Request $request)
    {
        $checkId = DB::table('users')->max('userid');

        if ($checkId == NULL) {
            $config = [
                'table' => 'users',
                'length' => 10,
                'prefix' => date('y').date('m')
            ];
            $dataId = IdGenerator::generate($config);
        } else {
            $dataId = $checkId+1;
        }
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'telepon' => 'required',
            'seluler' => 'required',
            'password' => 'required_with:passwordConfirmation|same:passwordConfirmation|min:6',
            'passwordConfirmation' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('admin/createClient')->withErrors($validator)->withInput();
        } else {
            $newUser = new User;
            $newUser->userid = $dataId;
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->alamat = $request->alamat;
            $newUser->no_telp = $request->telepon;
            $newUser->no_hp = $request->seluler;
            $newUser->role = '2';
            $newUser->password = Hash::make($request->password);
            $newUser->save();
            return redirect('admin/dataClient');
        }
        

    }

    public function storeTeknisi(Request $request)
    {
        $checkId = DB::table('users')->max('userid');

        if ($checkId == NULL) {
            $config = [
                'table' => 'users',
                'length' => 10,
                'prefix' => date('y').date('m')
            ];
            $dataId = IdGenerator::generate($config);
        } else {
            $dataId = $checkId+1;
        }
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'alamat' => 'required',
            'telepon' => 'required',
            'seluler' => 'required',
            'password' => 'required_with:passwordConfirmation|same:passwordConfirmation|min:6',
            'passwordConfirmation' => 'required'
        ]);
        if($validator->fails()) {
            return redirect('admin/createTeknisi')->withErrors($validator)->withInput();
        }else{
            $newUser = new User;
            $newUser->userid = $dataId;
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->alamat = $request->alamat;
            $newUser->no_telp = $request->telepon;
            $newUser->no_hp = $request->seluler;
            $newUser->role = '3';
            $newUser->password = Hash::make($request->password);
            $newUser->save();
            return redirect('admin/dataTeknisi');
        }

    }

    public function storeType(Request $request)
    {
        $dataId = DB::table('type_maintenance')->max('id_type');

        if ($dataId == NULL) {
            $config = [
                'table' => 'type_maintenance',
                'length' => 8,
                'prefix' => date('y').date('m').date('d')
            ];
            $dataId = IdGenerator::generate($config);
        } else {
            $dataId = $dataId + 1;
        }

        $validator = Validator::make($request->all(),[
            'name_type' => 'required'
        ]);
        if($validator->fails()) {
            return redirect('/admin/createType')->withErrors($validator)->withInput();
        }else{
        
        $type = new Type;
        $type->id_type = $dataId;
        $type->name_type = $request->name_type;
        $type->save();

        return redirect('admin');
        }
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
    
    public function editClient($id='')
    {
        $editClient = User::findOrFail($id);
        // dd($editClient);
        return view ('admin.showOneClient', ['client' => $editClient]);
    }
    
    public function editTeknisi($id='')
    {
        $editTeknisi = User::find($id);
        return view ('admin.showOneTeknisi', ['teknisi' => $editTeknisi]);
    }

    public function updateClient(Request $request, $id=''){
        $name = $request->post('name');
        $email = $request->post('email');
        $alamat = $request->post('alamat');
        $telepon = $request->post('telepon');
        $seluler = $request->post('seluler');
        $updateClient =  User::findOrFail($id);
        $updateClient->name = $name;
        $updateClient->email = $email;
        $updateClient->alamat = $alamat;
        $updateClient->no_telp = $telepon;
        $updateClient->no_hp = $seluler;
        $updateClient->role = '2';
        $updateClient->save();

        return redirect()->route('dataClient');
    }
    
    public function updateTeknisi(Request $request, $id=''){
            $name = $request->post('name');
            $email = $request->post('email');
            $alamat = $request->post('alamat');
            $telepon = $request->post('telepon');
            $seluler = $request->post('seluler');
            $updateClient =  User::findOrFail($id);
            $updateClient->name = $name;
            $updateClient->email = $email;
            $updateClient->alamat = $alamat;
            $updateClient->no_telp = $telepon;
            $updateClient->no_hp = $seluler;
            $updateClient->role = '3';
            $updateClient->save();
    
            return redirect()->route('dataTeknisi');

    }

    public function deleteClient($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect ('admin/dataClient');
    }

    public function deleteTeknisi($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect ('admin/dataTeknisi');
    }

    public function detailPengaduan($id)
    {
        $detailPengaduan = Panel::find($id);
        $dataTeknisi = User::all()->where('role', '3');
        return view ('admin.formDetailPengaduan', ['detailPengaduan' => $detailPengaduan, 'teknisi' => $dataTeknisi]);
    }

    public function updatePengaduanAdmin(Request $request, $id)
    {
        $teknisi = $request->post('teknisi');
        $updatePengaduan = Panel::findOrFail($id);
        $updatePengaduan->id_pic = $teknisi;
        $updatePengaduan->status = 'APPROVE';
        $updatePengaduan->save();
        return redirect()->route('admin');
        // data pertama waiting
        // data kedua approve
        // data ketiga on progress
        // data keempat done
    }

    public function reportExcel()
	{
		return Excel::download(new PanelExport, 'report_pengaduan.xlsx');
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
