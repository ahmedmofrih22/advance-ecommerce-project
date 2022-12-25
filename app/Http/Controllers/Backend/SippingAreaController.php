<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SippingAreaController extends Controller
{
    public function  DivisionView()
    {
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('admin.backend.ship.division.view_division',compact('divisions'));
    }

    public function DivisionStore(Request $request){
        $request->validate([
            'division_name' => 'required',

        ]);

        ShipDivision::insert([

            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),

        ]);

        $notifcation = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);
    }//end method


    public function DivisionEdit($id){
        $divisions = ShipDivision::findOrFail($id);
        return view('admin.backend.ship.division.edit_division',compact('divisions'));
    }


    public function DivisionUpdata(Request $request,$id){
        ShipDivision::findOrFail($id)->update([

            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),

        ]);

        $notifcation = array(
            'message' => 'Update Inserted Successfully',
            'alert-type' => 'info'
        );

        return  redirect()->route('Manage-division')->with($notifcation);
    }

    public function DivisionDelete($id){
            ShipDivision::findOrFail($id)->delete();

            $notifcation = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'error'
        );

        return  redirect()->route('Manage-division')->with($notifcation);
    }




    /// start   ship   District

        public function DistrictView(){
            $divisions = ShipDivision::orderBy('division_name','ASC')->get();
            $district = ShipDistrict::with('division')->orderBy('id','DESC')->get();
            return view('admin.backend.ship.district.view_district',compact('divisions','district'));
        }


    /// end   ship   District


    public function DistrictStore(Request $request){
        $request->validate([
            'district_name' => 'required',
            'division_id' => 'required',

        ]);

      ShipDistrict::insert([

            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),

        ]);

        $notifcation = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);
    }//end method


    public function DistrictEdit($id){
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('admin.backend.ship.district.edit_district',compact('divisions','district'));
    }

    public function DistrictUpdata(Request $request,$id){
        ShipDistrict::findOrFail($id)->update([

            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),

        ]);

        $notifcation = array(
            'message' => 'Update Inserted Successfully',
            'alert-type' => 'info'
        );

        return  redirect()->route('Manage-district')->with($notifcation);
    }

    public function DistrictDelete($id){
        ShipDistrict::findOrFail($id)->delete();

            $notifcation = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'error'
        );

        return  redirect()->route('Manage-district')->with($notifcation);
    }


    ///////////////////////////// Start State////////////

public function StateView(){
    $divisions = ShipDivision::orderBy('division_name','ASC')->get();
    $district = ShipDistrict::orderBy('district_name','ASC')->get();
    $state = ShipState::with('division','district')->orderBy('id','DESC')->get();
    return view('admin.backend.ship.state.view_state',compact('divisions','district','state'));
}

public function StateStore(Request $request){
    $request->validate([
        'district_id' => 'required',
        'division_id' => 'required',
        'state_name' => 'required',

    ]);

  ShipState::insert([

        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'state_name' => $request->state_name,
        'created_at' => Carbon::now(),

    ]);

    $notifcation = array(
        'message' => 'State Inserted Successfully',
        'alert-type' => 'success'
    );

    return  redirect()->back()->with($notifcation);

}

public function StateEdit($id){
    $divisions = ShipDivision::orderBy('division_name','ASC')->get();
    $district = ShipDistrict::orderBy('district_name','ASC')->get();
    $state = ShipState::findOrFail($id);
    return view('admin.backend.ship.state.edit_state',compact('divisions','district','state'));
}


public function StateUpdata(Request $request,$id){
    ShipState::findOrFail($id)->update([

        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'state_name' => $request->state_name,
        'created_at' => Carbon::now(),


    ]);

    $notifcation = array(
        'message' => 'Update Inserted Successfully',
        'alert-type' => 'info'
    );

    return  redirect()->route('Manage-state')->with($notifcation);
}

public function StateDelete($id){
    ShipState::findOrFail($id)->delete();

        $notifcation = array(
        'message' => 'State Deleted Successfully',
        'alert-type' => 'error'
    );

    return  redirect()->route('Manage-state')->with($notifcation);
}
    ///////////////////////////// End State////////////
}
