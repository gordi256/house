<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\AdminPassUpdateRequest;
use App\Mail\UserCreated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' =>  "Список пользователей",
        ];
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $roles = Role::all();
        $permissions = Permission::all();

        $data = [
            'title' =>  "Создание пользователя",
            'roles' => $roles,
            'permissions' => $permissions,
        ];

        return view('user.create',   $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        //  $temp = $request->validated();

        $temp = $request->all();
        $temp['password'] = Hash::make($request->password);
        $user = User::create($temp);

        $this->syncPermissions($request, $user);
        Mail::to($request->user())->send(new UserCreated($user));

        session()->flash('success', 'Пользователь успешно сохранен');
        return redirect(route('user.index' ));
        //return redirect(route('user.edit', ['user' => $user]));
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        $roles = Role::all();
        $permissions = Permission::all();

        $data = [
            'title' =>  "Редактирование пользователя",
            'roles' => $roles,
            'permissions' => $permissions,
            'user' => $user,

        ];

        return view('user.edit',   $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (!Gate::allows('manage users')) {
            return abort(401);
        }
        $input = $request->except(['roles', 'permissions']);
        isset($input['active']) ? $input['active'] = '1' : $input['active'] = '0';
        isset($input['is_admin']) ? $input['is_admin'] = '1' : $input['is_admin'] = '0';

        $user->update($input);
        $this->syncPermissions($request, $user);
        //  TODO сделать копирование пермишенов роли! Или не надо?
        session()->flash('success', 'Пользователь успешно обновлен');
        return redirect(route('user.index' ));

       // return redirect(route('user.edit', ['user' => $user]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        if (!Gate::allows('manage users')) {
            return abort(401);
        }

        // TODO удаление!

    }

    public function updatepass(AdminPassUpdateRequest $request)
    {
        if (!Gate::allows('manage users')) {
            return abort(401);
        }

        $user = User::find($request->id);
        if (!(Hash::check($request->get('oldpass'), $user->password))) {
            // The passwords matches
            session()->flash('error', 'Ваш текущий пароль не совпадает с введенным вами. Попробуйте еще раз.');

            return redirect()->back();
        }

        if (strcmp($request->get('oldpass'), $request->get('newpass')) == 0) {
            session()->flash('error', 'Новый пароль не может быть равен старому. Попробуйе другой пароль.');

            return redirect()->back();
        }

        $user->password = bcrypt($request->get('newpass'));
        $user->save();
        session()->flash('success', 'Пароль удачно обновлен');


        return redirect(route($this->path_admin . '.index'));
    }

    private function syncPermissions(Request $request, $user)
    {
        $roles       = $request->get('roles', []);
        $permissions = $request->get('permissions', []);
        $roles = Role::find($roles);

        if (!$user->hasAllRoles($roles)) {
            $user->permissions()->sync([]);
        } else {
            $user->syncPermissions($permissions);
        }
        $user->syncRoles($roles);

        return $user;
    }
}
