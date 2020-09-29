<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Alert;

class MenuController extends Controller
{
    private $menu;
    public $html = "";

    public function __construct(Menu $menu)
    {   
        $this->menu = $menu;
    }
    public function index()
    {
        if(session('success_message')){
            alert('success_title', 'success_message');
        }
        $getMenus = $this->menu::paginate(5);
        return view('admin.pages.menu.view_menu',compact('getMenus'));
    }
    
    public function create()
    {
        if(session('success')){
            toast(session('success'), 'success');
        }
        if (session('error')){
           toast(session('success', 'error'));
        }
        $htmlMenus = $this->menuRecursive(0);
        return view('admin.pages.menu.add_menu',compact('htmlMenus'));
       
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:10|min:2',
        ],[
            'name.required' => "Tên không được trống",
            'name.min' => "Tên phải lớn hơn 2 kí tự",
            'name.max' => "Tên phải nhỏ hơn 10 kí tự",
        ]);
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->parent_id = $request->parent_id;
        $menu->save();
        return redirect()->back()->withSuccess('Thêm thành công');
    }

    public function edit($id)
    {
        $findMenu = $this->menu::find($id);
        $htmlMenus = $this->menuRecursive(0,"",$findMenu->parent_id);
        return view('admin.pages.menu.edit_menu',compact('findMenu', 'htmlMenus'));
    }

    public function update(Request $request, $id)
    {
        $findUpdate = $this->menu::find($id);
        $findUpdate->name = $request->name;
        $findUpdate->parent_id = $request->parent_id;
        $findUpdate->save();

    }
    
    public function destroy($id)
    {
        $this->menu::find($id)->delete();
        $this->menu::where('parent_id','=', $id)->delete();
    }

    public function menuRecursive($parent_id, $text='', $findMenu = false)
    {   
        $getParentsMenu = $this->menu::all();

        foreach($getParentsMenu as $parentMenu){
            if ($parentMenu->parent_id == $parent_id) {

                if($parentMenu->id == $findMenu){
                    $this->html .= "<option selected value=".$parentMenu->id.">".$text.$parentMenu->name."</option>";
                }else{
                    $this->html .= "<option value=".$parentMenu->id.">".$text.$parentMenu->name."</option>";
                }
                $this->menuRecursive($parentMenu->id, $text."--", $findMenu);
            }
        }
        return $this->html;
    }
}
