<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Patient;
use Auth;

class PacientesController extends Controller
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
        $datospa=\DB::table('patients')
            ->select('patients.*')
            //->where('id','?') //syntax para where
            ->orderBy('id','DESC')
            ->get();
        return view('admin.pacientes') 
            ->with('pacientes',$datospa);
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
            'id_user'=>'required|min:1',
            'name'=>'required|max:255|min:1',
            'weight'=>'required|max:255|min:1',
            'fat_per'=>'required|max:255|min:1',
            'bmi'=>'required|max:255|min:1'          
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorData','Favor de llenar todos los campos')
                ->withErrors($validator);
        }else{
            $paciente= Patient::create([ 
                'id_user'=>$request->id_user,
                'name'=>$request->name, 
                'weight'=>$request->weight,
                'fat_per'=>$request->fat_per,
                'bmi'=>$request->bmi,
            ]);
            $paciente->save();
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
