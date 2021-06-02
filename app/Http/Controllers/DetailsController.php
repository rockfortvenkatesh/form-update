<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    public function AllDetail(){
    	#return view('salesteam.salesteamdetails');
    }

    public function StoreDetail(Request $request){
    	$validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:details',
        'phone' => 'required|unique:details',
        'address' => 'required',
        ]);

            Detail::insert([
        	'name'=> $request->name,
        	'email'=> $request->email,
        	'phone'=> $request->phone,
        	'address'=> $request->address,
        	'created_at'=>Carbon::now()
            
        	        ]);
        	      
   return Redirect()->back()->with('success','Detail Inserted Succeddfully');


    }

    public function DetailEdit($id){
    	//$details = Detail::find($id);
    	$details =DB::table('details')->where('id',$id)->first();
    	return view('salesteam.edit',compact('details'));
    }

    public function DetailUpdate(Request $request,$id){
    	$update = Detail::find($id)->update([
'name'=>$request->name,
'email'=>$request->email,
'phone'=>$request->phone,
'address'=>$request->address,
    	]);
return Redirect()->back()->with('success','Detail Updated Succeddfully');


    }

    public function DetailDelete($id){
    	$delete= Detail::find($id)->delete();
    	return Redirect()->back()->with('success','Detail Deleted Succeddfully');
    }


}

