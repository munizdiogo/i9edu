<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->paginate(20);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:80|unique:roles,name',
            'description' => 'nullable|string|max:255',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
        ]);
        if (isset($data['permissions'])) {
            $role->permissions()->sync($data['permissions']);
        }

        return redirect()->route('roles.index')->with('success', 'Regra criada com sucesso!');
    }

    public function show(Role $role)
    {
        $role->load('permissions');
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('id')->toArray();
        return view('roles.permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => 'required|string|max:80|unique:roles,name,' . $role->id,
            'description' => 'nullable|string|max:255',
            'permissions' => 'nullable|array',
        ]);

        $role->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
        ]);
        if (isset($data['permissions'])) {
            $role->permissions()->sync($data['permissions']);
        } else {
            $role->permissions()->detach();
        }

        return redirect()->route('roles.index')->with('success', 'Regra atualizada com sucesso!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Regra excluída com sucesso!');
    }

    /**
     * Permite adicionar/remover usuários da role
     */
    public function assignUsers(Request $request, Role $role)
    {
        $data = $request->validate([
            'users' => 'nullable|array',
        ]);

        $role->users()->sync($data['users'] ?? []);
        return back()->with('success', 'Usuários vinculados à regra com sucesso!');
    }

    public function permissions(Role $role)
    {
        $permissionsByCollection = Permission::all()->groupBy('collection');
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('roles.permissions', compact('role', 'permissionsByCollection', 'rolePermissions'));
    }

    public function updatePermissions(Request $request, Role $role)
    {
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('roles.index')->with('success', 'Permissões atualizadas com sucesso!');
    }
}
