<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $table = 'menu';

    protected $fillable = [
        'menu_name','menu_url','parent_menu','description'
    ];


    public static function rules($id = 0) {
        $rules = [
            'menu_name' => 'required|unique:menu,menu_name'.($id ? ",$id" : ''),
            'menu_url' => 'required|unique:menu,menu_url'.($id ? ",$id" : ''),
            'description' => 'required'
        ];

        return $rules;
    }

    public static function getCustomMessages() {
        return [
            'menu_name.required' => 'Please Enter Menu Name.',
            'menu_name.unique' => 'Menu already exist.',
            'menu_url.required' => 'Please Enter Menu URL.',
            'menu_url.unique' => 'Menu Url already exist.',
            'description.required' => 'Please Enter Menu URL.',
        ];
    }

}

