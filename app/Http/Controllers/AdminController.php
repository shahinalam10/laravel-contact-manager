<?php

namespace App\Http\Controllers;

use App\Models\Contractdata;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $contactdata,$image,$imageName,$directory,$imgUrl;
    public function index(){
        return view('admin.dashboard');
    }
    public function inputInfo(Request $request){
    $this->contactdata=new Contractdata();
    $this->contactdata->image=$this->saveImage($request);
    $this->contactdata->name=$request->name;
    $this->contactdata->phone=$request->phone;
    $this->contactdata->email=$request->email;
    $this->contactdata->save();
    return back()->with('message','Data insert successfully');
    }
    private function saveImage(Request $request){
        $this->image=$request->file('image');
        $this->imageName=rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory="frontendAsset/contact-data/";
        $this->imgUrl=$this->directory.$this->imageName;
        $this->image->move($this->directory,$this->imageName);
        return $this->imgUrl;
    }
    public function editData($id){
        return view('frontend.edit-data',[
            'value'=>Contractdata::find($id)
        ]);
    }
    public function updateData(Request $request){
        $this->contactdata=Contractdata::find($request->update_id);
        if ($request->file('image')){
            if ($this->contactdata->image){
                unlink($this->contactdata->image);
            }
            $this->contactdata->image=$this->saveImage($request);
        }
        $this->contactdata->name=$request->name;
        $this->contactdata->phone=$request->phone;
        $this->contactdata->email=$request->email;
        $this->contactdata->save();
        return redirect('/')->with('message','Data update successfully');
    }
    public function deleteData(Request $request){
        $this->contactdata=Contractdata::find($request->update_id);
        if ($this->contactdata->image){
            unlink($this->contactdata->image);
        }
        $this->contactdata->delete();
        return redirect('/')->with('message','Data delete successfully');
    }
}
