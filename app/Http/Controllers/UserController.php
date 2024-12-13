<?php

namespace App\Http\Controllers;

use Hash;
use Flash;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\View\Components\Widget\Alert;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash as FacadesHash;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    //
    private $userRepository;


    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.destroy')->only('destroy');
        // $this->middleware('can:users.show')->only('show');
        //  $this->userRepository = $userRepo;
    }

    // protected $paginationTheme = "bootstrap";
    public function index()
    {
    //    $users=User::paginate();

       $roles = Role::all();
       $users = User::all();
       return view('users.index', compact('users', 'roles'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::all();
        // $users = User::all();
        // return view('users.index', compact('roles', 'users'));

    }

    // private function subirArchivo($file)
    // {
        

    //     if (is_null($file)) {
    //         // Flash::error('Elija imagenes validas. (*.jpg | *.jpeg | *.png)');
    //         return redirect(route('users.show'));
    //     }
    //     $nombreArchivo = time() . '.' . $file->getClientOriginalExtension();
    //     $file->move(public_path('images_user'), $nombreArchivo);
    //     return $nombreArchivo;
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user= new User();


        // try {
        //     $input = $request->all();

        //     $input['password'] = FacadesHash::make($request->password);
        //     $input['alta'] = true;
        //     if (isset($input['foto_input']))
        //         $input['fotografia'] = $this->subirArchivo($input['foto_input']);
        //     else
        //         $input['fotografia'] = 'foto_base.png';

        //     $user = $this->userRepository->create($input);


        //     return redirect(route('users.index'));
        // } catch (\Exception $e) {
        //     return $e->getMessage();
        // }

        // $user->roles()->sync($request->roles);
        // $user->save();

        // return redirect()->route('users.index', $user)->with('datos', 'El usuario se creó con éxito');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // return $user;
   
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('users.edit', $user)->with('datos', 'Se actualizó el rol correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, User $user, $id)
    // {
    //     $user->roles()->sync($request->roles);
    //     return redirect()->route('users.index', $user)->with('datos', 'Se asignó los roles correctamente');

    //     $input = $request->all();
    //     $input['password'] = Hash::make($request->password);
    //     if (isset($input['foto_input']))
    //         $input['fotografia'] = $this->subirArchivo($input['foto_input']);
    //     $user = $this->userRepository->update($input, $id);
    // }


    public function show($id, Request $request)
    {
         $user = User::findOrFail($id);
         $roles = Role::findOrFail($id);
        return view('users.show')->with('user', $user, $roles);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::findOrFail($id);

        $users->delete();
        return redirect()->route('users.index', compact('users', 'roles'))->with('eliminar', '¡Usuario eliminado correctamente!');
    }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect()->route('inicio');
    // }

}
