<?php

namespace App\Http\Controllers\Admin;

use \Validator;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
//        rules
//        getCustomMessages
    }



    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.menu')->with('menus',$menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post_data = $request->all();

        $validator = Validator::make($post_data, Menu::rules(),Menu::getCustomMessages());

        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($post_data);
        }
        else
        {
            $menu = new Menu;
            $menu->menu_name = $post_data['menu_name'];
            $menu->menu_url = $post_data['menu_url'];
            $menu->description = $post_data['description'];
            $menu->parent_menu = $post_data['parent'];
            $menu->save();

            return redirect('menu')->with('success','successfully added!!');
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
        $menuData = Menu::find($id);

        return view('admin.menu.edit')->withMenuData($menuData);

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
        $post_data = $request->all();
        $menu = Menu::findOrFail($id);

        $validator = Validator::make($post_data, Menu::rules($id),Menu::getCustomMessages());


        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }
        else {

            $menu->fill($post_data)->save();

        }

        return  redirect('menu/'.$id.'/edit')->with('success','successfully added!!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user = Menu::find($id);
        $user->delete();

        return $this->sendResponse($id,'successfully deleted!!');
    }


    public function sendResponse($result, $message = '')
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }
}
