<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('menus.index', [
            'menus' => Menu::with('roles')->orderBy('order')->get(),
            'roles' => Role::all(),
            'parents' => Menu::whereNull('parent_id')->get()
        ]);
    }

    public function store(Request $request)
    {
        $menu = Menu::create($request->only([
            'name','route','icon','parent_id','order','is_active'
        ]));

        $menu->roles()->sync($request->roles ?? []);

        return response()->json(['message' => 'Menu berhasil ditambahkan']);
    }

    public function show(Menu $menu)
    {
        return response()->json($menu->load('roles'));
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->only([
            'name','route','icon','parent_id','order','is_active'
        ]));

        $menu->roles()->sync($request->roles ?? []);

        return response()->json(['message' => 'Menu berhasil diupdate']);
    }

    public function destroy(Menu $menu)
    {
        $menu->roles()->detach();
        $menu->delete();

        return response()->json(['message' => 'Menu berhasil dihapus']);
    }
}