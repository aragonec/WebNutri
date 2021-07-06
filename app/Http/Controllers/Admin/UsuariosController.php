<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use File;
use Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(){
        $this->middleware('auth');
    }   
    public function index()
    {
        if (Auth::user()->level != "admin"){return redirect('/admin');}
        $datos=\DB::table('users')
            ->select('users.*')
            //->where('id','?') //syntax para where
            ->orderBy('id','DESC')
            ->get();
        return view('admin.usuarios') 
            ->with('usuarios',$datos);
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
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:255|min:1',
            'email'=>'required|max:255|min:0',
            'telefono'=>'required|min:8',
            'modalidad'=>'required|max:255|min:1',
            'password'=>'required|max:255|min:1',
            'level'=>'required|max:255|min:1',           
            'img_profile'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorInsert','Favor de llenar todos los campos')
                ->withErrors($validator);
        }else{
            $imagen=$request->file('img_profile');
            $nombre=time().'.'.$imagen->getClientOriginalExtension();
            $destino= public_path('img/usuarios');
            $request->img_profile->move($destino, $nombre);
            $usuario= User::create([ 
                'name'=>$request->name,
                'email'=>$request->email, 
                'telefono'=>$request->telefono,
                'modalidad'=>$request->modalidad,
                //'password'=>$request->password,
                'password'=>Hash::make($request->password),
                'level'=>$request->level,
                'img_profile'=>$nombre
            ]);

            $usuario->save();
            return back()->with('Listo', 'Se ha agregado correctamente');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:255|min:1',
            'email'=>'required|max:255|min:0',
            'telefono'=>'required|min:8',
            'modalidad'=>'required|max:255|min:1',
            'password'=>'required|max:255|min:1',
            'level'=>'required|max:255|min:1'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorEdit','Favor de llenar todos los campos')
                ->withErrors($validator);
        }else{
            $usr = User::find($request->id);
            $usr->name=$request->name;
            $usr->email=$request->email;
            $usr->telefono=$request->telefono;
            $usr->modalidad=$request->modalidad;
            //$usr->password=$request->password;
            $usr->password=Hash::make($request->password);
            $usr->level=$request->level;

            $validator2=Validator::make($request ->all(),[
                'img_profile'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
            ]);
            if(!$validator2->fails()){
                $imagen=$request->file('img_profile');
                $nombre=time().'.'.$imagen->getClientOriginalExtension();
                $destino= public_path('img/usuarios');
                $request->img_profile->move($destino, $nombre);
                if(File::exists( public_path('img/usuarios/'.$prod->img_profile))){
                    unlink( public_path('img/usuarios/'.$prod->img_profile));
                }
                $usr->img_profile=$nombre; 
            }
                $usr ->save();
                return back()->with('Listo', 'Se ha actualizado correctamente');
        }
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
        $usuario = User::find($id);
        if(File::exists( public_path('img/usuarios/'.$usuario->img_profile))){
            unlink( public_path('img/usuarios/'.$usuario->img_profile));
        }
        $usuario->delete();
        return back()->with('Listo', 'Se ha borrado correctamente');
    }

}
