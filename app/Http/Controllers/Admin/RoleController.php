<?php
namespace App\Http\Controllers\Admin;

use \Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();

        return view('admin.roles.roles')->with('roles',$roles);
    }

    public function delete(Request $request,$id=''){

        $is_exist = Role::find($id);

        if(isset($is_exist) && count($is_exist) > 0){
           // $user = User::find($id);
            $is_exist->delete();
        }
       return redirect('roles')->with('delete','successfully deleted!!');
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function save(Request $request){
        $post = $request->all();

        $validator = Validator::make($post, [
            'role_name' => 'required|unique:role|max:20'
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


    public function edit($id){

        $data = Role::find($id);
        if(count($data) > 0){
            $roleData = $data;
        }else{
            $roleData = '';
        }

        return view('admin.roles.edit')->with('roleData',$roleData);
    }


    public function update(Request $request,$id){
        dd($request);
    }
}