<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Blog;
use App\Models\Campaign;
use App\Models\Organization;
use App\Models\contact_form;

class AdminDash extends Controller
{
    public function index(){
        $blog = Blog::all()->count();
        $campaign = Campaign::all()->count();
        $blood_requests = Guest::all()->count();
        $organization = Organization::all()->count();
        $contact = contact_form::all()->count();
        return view('adminDash',compact('campaign'))->with('blog',$blog)->with('blood_requests',$blood_requests)->with('organization',$organization)->with('contact',$contact);
        
    }
    
    
    public function show($id){
        $adminvalidation = Guest::find($id);
        return view('validation',compact('adminvalidation'));
    }

    public function destroy($id)
    {
        Guest::find($id)->delete();
        return redirect()->route('guest.show');
    }
}
