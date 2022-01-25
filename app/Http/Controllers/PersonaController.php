<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Controllers\Exception;
use Illuminate\Support\Facades\Storage;
use App\Mail\EnviarMensaje;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PersonaCrear;

class PersonaController extends Controller
{
    /*Mostrar*/
    public function mostrarPersona(){
        $listaPersona = DB::table('tbl_persona')->join('tbl_telef','tbl_persona.id','=','tbl_telef.id_persona')->select('*')->get();
        return view('mostrar', compact('listaPersona'));
        //return $listaPersona;
    }

    /*Crear*/
    public function crearPersona(){
        return view('crear');
    }

    public function crearPersonaPost(PersonaCrear  $request){
        $datos = $request->except('_token');
        $request->validate([
            'nombre_persona'=>'required|string|max:30',
            'apellido_persona'=>'required|string|max:30',
            'dni_persona'=>'required|string|max:10|min:10',
            'edad_persona'=>'required|int|min:18|max:130',
            'num_telf'=>'required|string|min:9|max:9',
            'num_telf2'=>'required|string|min:9|max:9',
            'foto_persona'=>'required|mimes:jpg,png,jpeg,webp,svg'
        ]);
        if($request->hasFile('foto_persona')){
            $datos['foto_persona'] = $request->file('foto_persona')->store('uploads','public');
        }else{
            $datos['foto_persona'] = NULL;
        }

        try{
            DB::beginTransaction();
            $id = DB::table('tbl_persona')->insertGetId(["foto_persona"=>$datos['foto_persona'],"nombre_persona"=>$datos['nombre_persona'],"apellido_persona"=>$datos['apellido_persona'],"dni_persona"=>$datos['dni_persona'],"edad_persona"=>$datos['edad_persona']]);
            DB::table('tbl_telef')->insertGetId(["num_telf"=>$datos['num_telf'],"num_telf2"=>$datos['num_telf2'],"id_persona"=>$id]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        //return redirect('mostrar');
    }

    /*Actualizar*/
    public function modificarPersona($id){
        $persona=DB::table('tbl_persona')->join('tbl_telef','tbl_persona.id','=','tbl_telef.id_persona')->select()->where('id','=',$id)->first();
        return view('modificar', compact('persona'));
    }

    public function modificarPersonaPut(Request $request){
        $datos=$request->except('_token','_method','num_telf','num_telf2','id_telf');
        if ($request->hasFile('foto_persona')) {
            $foto = DB::table('tbl_persona')->select('foto_persona')->where('id','=',$request['id'])->first();
            if ($foto->foto_persona != null) {
                Storage::delete('public/'.$foto->foto_persona);
            }
            $datos['foto_persona'] = $request->file('foto_persona')->store('uploads','public');
        }else{
            $foto = DB::table('tbl_persona')->select('foto_persona')->where('id','=',$request['id'])->first();
            $datos['foto_persona'] = $foto->foto_persona;
        }
        $datostelf=$request->except('_token','_method','nombre_persona','apellido_persona','dni_persona','edad_persona','id','foto_persona');
        try {
            DB::beginTransaction();
            DB::table('tbl_telef')->where('id_telf','=',$datostelf['id_telf'])->update($datostelf);
            DB::table('tbl_persona')->where('id','=',$datos['id'])->update($datos);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrar');
    }

    /*Eliminar*/
    public function eliminarPersona($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_telef')->where('id_persona','=',$id)->delete();
            DB::table('tbl_persona')->where('id','=',$id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrar');
    }

    /*LogIn y LogOut*/
    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){
        $datos = $request->except('_token','_method');
        $user = DB::table("tbl_emp")->where('correo_emp','=',$datos['correo_emp'])->where('pass_emp','=',$datos['pass_emp'])->count();
        if($user == 1){
            //Establecemos session y lo enviamos a la pag que toca
            $rol = DB::table("tbl_emp")->select('rol_emp')->where('correo_emp','=',$datos['correo_emp'])->where('pass_emp','=',$datos['pass_emp'])->first();
            if($rol->rol_emp =="Administrador"){
                $request->session()->put('nombre_admin',$request->correo_emp);
            }
            return redirect('/mostrar');
        }else{
            //No establecemos session y lo enviamos a login
            return redirect('');
        }
        return $user;
    }

    public function logout(Request $request){
        //Olvidas
        $request->session()->forget('nombre_admin');
        //Eliminar todo
        $request->session()->flush();
        return redirect('/');
    }
    /*Correo*/
    public function correoPersona(Request $request){
        $form = $request->except('_token');
        $msj = $form['mensaje'];
        $sub = $form['sub'];
        $datos = array('message'=>$msj);
        $enviar = new EnviarMensaje($datos);
        $enviar -> sub = $sub;
        Mail::to($form['correo_persona'])->send($enviar);
        return redirect('/mostrar');
    }

    public function correoPersona2($correo_persona){
        return view('mostrarCorreo',compact('correo_persona'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
