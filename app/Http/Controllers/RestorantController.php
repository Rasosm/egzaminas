<?php

namespace App\Http\Controllers;

use App\Models\Restorant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RestorantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restorants = Restorant::all()->sortBy('title');
        
            
        
                 
        return view('back.restorants.index', [
            'restorants' => $restorants
            
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('back.restorants.create');
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
        
        'restorant_title' => 'required|min:3|max:100|regex:/^([a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s]+){3,}$/',
        'restorant_code' => 'required|regex:/^[1-9]\d*(\.\d{1,2})?$/',
        'restorant_address' => 'required|min:3|max:100|string'

        ],
        [
            'restorant_title.required' => 'Please enter dish title',
            'restorant_title.min' => 'Please enter at least 3 characters',
            'restorant_title.max' => 'Please enter correct dish title. Dish name has too many characters',
            'dish_title.regex' => 'Please enter correct dish title',
            'restorant_price.required' => 'Please enter price',
            'restorant_price.regex' => 'Please enter correct price',
        ]);
            
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
    


        
        $restorant = new Restorant;

        $restorant->title = $request->restorant_title;
        $restorant->code = $request->restorant_code;
        $restorant->address = $request->restorant_address;
        
                
        $restorant->save();
        

        return redirect()->route('restorants-index', ['#'.$restorant->id])->with('ok', 'Congradulations! You are created new restaurant');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function show(Restorant $restorant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restorant $restorant)
    {
        return view('back.restorants.edit',[
            'restorant' => $restorant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restorant $restorant)
    {
        $restorant->title = $request->restorant_title;
        $restorant->code = $request->restorant_code;
        $restorant->address = $request->restorant_address;
        
        $restorant->save();

        return redirect()->route('restorants-index', ['#'.$restorant->id])->with('ok', 'Restaurant was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restorant $restorant)
    {
        if(!$restorant->restorantDishes()->count()){
            $restorant->delete();
            return redirect()->route('restorants-index');
        }
        return redirect()->back()->with('not', 'You can not delete this restorant, because it has some dishes');

    }
}