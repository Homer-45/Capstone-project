<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unbaptized;
use Illuminate\Support\Facades\DB;

class UnbaptizedController extends Controller
{
    public function AllUnbap(){
        //  $unbaptizeds = Unbaptized::latest()->get();
        $unbaptizeds = DB::table('unbaptizeds')->latest()->paginate(5);
        return view('admin.unbaptized.index', compact('unbaptizeds'));
    }
    public function AddUnbap(Request $request){
        // $unbaptized = Unbaptized::create(['name'=> $request->name, 'address'=>$request->address,]);
        $validatedData = $request->validate([
            'name' => 'required|unique:unbaptizeds|min:3',
            'address' => 'required|unique:unbaptizeds|min:5',
            'mobile' => 'required|unique:unbaptizeds|min:11',            
        ], 
        [
            'name.required' => 'Please Input Full Name',
            // 'name.max' => 'Name Less than 255 Character', 
            'address.required' => 'Please Input Complete Address Name',
            // 'address.max' => 'Address Less than 255 Character',
            'mobile.required' => 'Please Input Mobile Number',
            // 'mobile.max' => 'Mobile Less than 11 Character',           
        ]);
        Unbaptized::create([
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
        ]);
        return Redirect()->back()->with('success', 'Add List Inserted Successfull');



    }


}
