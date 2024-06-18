<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



//Agregamos

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

//prueba
use Spatie\Permission\Models\Permission;



class UsuarioController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-usuarios|crear-usuarios|editar-usuarios|borrar-usuarios')->only('index');
        $this->middleware('permission:crear-usuarios', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-usuarios', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-usuarios', ['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *//*

    public function index(Request $request): View
    {
        $data = User::latest()->paginate(5);
  
        return view('usuarios.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }*/
    
    public function index(): View
    {
        $usuarios = User::all();
        $roles = Role::all();
        
        //return view('usuarios.index', compact('usuarios', 'roles'));
        return view('usuarios.index',['usuarios' => $usuarios, 'roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();

        return view('usuarios.crear',compact('roles'));

        //$roles = Role::all();
        //return view('usuarios.lider.crear', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('usuarios.index')
                         ->with('success','Usuario creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $user = User::find($id);

        return view('usuarios.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('usuarios.editar',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('usuarios.index')
                        ->with('success','Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index')
                        ->with('success','Usuario eliminado exitosamente');
    }
}
