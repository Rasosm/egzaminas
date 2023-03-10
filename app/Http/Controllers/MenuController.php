<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all()->sortBy('title');
        
            
        
                 
        return view('back.menus.index', [
            'menus' => $menus
            
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('back.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    $validator = Validator::make(
        $request->all(),
        [
        
        'menu_title' => 'required|min:3|max:100|string',
        

        ],
        [
            'menu_title.required' => 'Please enter menu title',
            'menu_title.min' => 'Please enter at least 3 characters',
            'menu_title.max' => 'Please enter correct menu title. Menu name has too many characters',
            
        ]);
            
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
    


        
        $menu = new Menu;

        $menu->title = $request->menu_title;
        
        
                
        $menu->save();
        

        return redirect()->route('menus-index', ['#'.$menu->id])->with('ok', 'Congradulations! You are created new menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('back.menus.edit',[
            'menu' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->title = $request->menu_title;
        
        
        $menu->save();

        return redirect()->route('menus-index', ['#'.$menu->id])->with('ok', 'Menu was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if(!$menu->menuDishes()->count()){
            $menu->delete();
            return redirect()->route('menus-index');
        }
        return redirect()->back()->with('not', 'You can not delete this menu, because it has some dishes');

    }
}