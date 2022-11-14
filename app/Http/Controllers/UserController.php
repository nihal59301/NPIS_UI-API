<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\DataTables\UsersDataTable;
use App\DataTables\TempUsersDataTable;
use DataTables;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return view('userlist');
        //return $dataTable->render('users.index');
    }

    public function indexTemp(TempUsersDataTable $dataTable)
    {
        return $dataTable->render('users.temp');
    }

    // public function index(Request $request)
    // {
    //     //
    //     //if ($request->ajax()) {
    //         $data = \App\Models\User::get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function($row){
    //                 $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
    //                 return $actionBtn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     //}
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatans = \App\Models\refJabatan::get();
        $bahagians = \App\Models\refBahagian::get();
        $negeris = \App\Models\refNegeri::get();
        $daerahs = \App\Models\refdaerah::get();
        $jawatans = \App\Models\refJawatan::get();
        $gredJawatans = \App\Models\refGredJawatan::get();
        return view('users.create',compact('jabatans','bahagians','negeris','daerahs','jawatans','gredJawatans'));        
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
        $this->validator($request->all())->validate();

        $this->createData($request->all());

        session()->flash('message', 'Pendaftaran User Berjaya.'); 

        return redirect('home');
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
     * reset during first time login
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function firstReset()
    {
        //
        $email = Auth::user()->email;        
        return view('auth.passwords.first',compact('email'));
    }    


    public function firstResetUpdate(Request $request)
    {
        //
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'])->validate();
        
        $user = Auth::user();
        
        $user->password = Hash::make($request->password);

        $user->setRememberToken(Str::random(60));

        $user->first_time = 0;

        $user->save();

        //event(new PasswordReset($user));

        Auth::guard()->login($user);
        
        return redirect()->route('home');
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

    /**
     * Approve user registration
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userApproval($id)
    {
        //
        $tempUser = \App\Models\tempUser::whereId($id)->first();
        
        User::create([
            'name' => $tempUser->name,
            'email' => $tempUser->email,
            'password' => $tempUser->password,
            'no_ic' => $tempUser->no_ic,          
            'jenis_pengguna_id' => $tempUser->jenis_pengguna_id,
            'no_telefon' => $tempUser->no_telefon,
            'jawatan_id' => $tempUser->jawatan_id,
            'jabatan_id' => $tempUser->jabatan_id,
            'gred_jawatan_id' => $tempUser->gred_jawatan_id,
            //'kementerian' => $tempUser->kementerian,
            'bahagian_id' => $tempUser->bahagian_id,
            'negeri_id' => $tempUser->negeri_id,
            'daerah_id' => $tempUser->daerah_id,
            'catatan' => $tempUser->catatan,
            'first_time' => $tempUser->first_time,
            'status_pengguna_id' => $tempUser->status_pengguna_id,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dibuat_oleh' => Auth::user()->id,
            'dikemaskini_pada' => Auth::user()->id,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $tempUser->delete();
        session()->flash('message', 'Approval for User Berjaya.'); 

        return redirect('home');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_kod_penganalan' => ['required', 'string',  'max:255'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
            'kategori' => ['required', 'integer', 'max:255'],
            'no_telefon' => ['required', 'string', 'max:255'],
            'jawatan' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'gred' => ['required', 'string', 'max:255'],
            'kementerian' => ['required', 'integer', 'max:255'],
            'bahagian' => ['required', 'integer', 'max:255'],
            'negeri' => ['required', 'integer', 'max:255'],
            'daerah' => ['required', 'integer', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createData(array $data)
    {
        return User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make('password'),
            'no_ic' => $data['no_kod_penganalan'],            
            'jenis_pengguna_id' => $data['kategori'],
            'no_telefon' => $data['no_telefon'],
            'jawatan_id' => $data['jawatan'],
            'jabatan_id' => $data['jabatan'],
            'gred_jawatan_id' => $data['gred'],
            //'kementerian' => $data['kementerian'],
            'bahagian_id' => $data['bahagian'],
            'negeri_id' => $data['negeri'],
            'daerah_id' => $data['daerah'],
            'catatan' => $data['catatan'],
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
