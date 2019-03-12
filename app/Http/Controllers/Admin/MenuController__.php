<?php
namespace App\Http\Controllers\Admin;

use \Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all();
        return view('admin.menu.menu')->with('menus',$menus);
    }

    public function delete(Request $request,$id=''){

        $is_exist = Menu::find($id);

        if(isset($is_exist) && count($is_exist) > 0){
            // $user = User::find($id);
            $is_exist->delete();
        }
        return redirect('menu')->with('delete','successfully deleted!!');
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function save(Request $request){
        $post = $request->all();

        $validator = Validator::make($post, [
            'role_name' => 'required|unique:menu|max:20'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            $role = new Role;
            $role->role_name = $post['role_name'];
            $role->save();

            return redirect('roles')->with('success','successfully added!!');
        }


    }
}