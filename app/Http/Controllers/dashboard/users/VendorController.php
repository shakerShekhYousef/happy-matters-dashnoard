<?php

namespace App\Http\Controllers\dashboard\users;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Http\Resources\users\vendor\VendorResource;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::get();
        return view('dashboard.vendor.listVendors', ['vendors' => collect(VendorResource::collection($vendors))]);
    }

    public function create()
    {
        $countries = Country::pluck('name', 'id');

        return view('dashboard.vendor.createVendor', ['countries' => $countries]);
    }

    public function store(Request $request)
    {
       $request->validate( [
            'email' => 'required|email|unique:vendors,email',
            'password' => 'required|string|min:5|confirmed',
            'company_name' => 'required',
            'contact_name' => 'required',
            'category' => 'required|string',
            'tax_registration' => 'required|string',
            'mobile' => 'required|string',
            'country' => 'required'
        ]);
        try {
            $vendor = Vendor::firstOrCreate([
                'email' => $request->email
            ], [
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'company_name' => $request->company_name,
                'contact_name' => $request->contact_name,
                'category' => $request->category,
                'tax_registration' => $request->tax_registration,
                'mobile' => $request->mobile,
                'country_id' => $request->country,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'postcode' => $request->postcode,
                'notes' => $request->notes,
               'auto_assigned' => $request->auto_assigned == null ? 0 : 1,

            ]);
            if ($vendor->wasRecentlyCreated) {

                return redirect()->route('web_vendors_list')->with('message', 'Vendor added');
            } else
                return redirect()->route('web_vendors_list')->withErrors('Vendor already found!');
        } catch (\Throwable $th) {
            $this->errorLog('VendorController@store', $th->getMessage());
        }
    }

    ///////////////////////
    public function show($id)
    {
        $vendor = Vendor::find($id);
        return view('dashboard.vendor.showVendor', ['vendor' => collect(new VendorResource($vendor))]);
    }

    /////////////////////////
    public function edit($id)
    {
        $countries = Country::pluck('name', 'id');
        $vendor = Vendor::find($id);
        return view('dashboard.vendor.editVendor', ['vendor' => $vendor, 'countries' => $countries]);
    }
    ////////
    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        if($request->get('password') != null)
        {
            $request->validate( [
                'email' => 'email',
                'password' => 'required|string|min:5|confirmed',
                'company_name' => 'required',
                'contact_name' => 'required',
                'category' => 'required|string',
                'tax_registration' => 'required|string',
                'mobile' => 'required|string',
                'country' => 'required'
            ]);
        }
        else
        {
            $request->validate( [
                'email' => 'email',
                'company_name' => 'required',
                'contact_name' => 'required',
                'category' => 'required|string',
                'tax_registration' => 'required|string',
                'mobile' => 'required|string',
                'country' => 'required'
            ]);
        }

        $request->email != null ? $vendor->email = $request->email : null;
        $request->password != null ? $vendor->password = Hash::make($request['password']) : null;
        $request->company_name != null ? $vendor->company_name = $request->company_name : null;
        $request->contact_name != null ? $vendor->contact_name = $request->contact_name : null;
        $request->category != null ? $vendor->category = $request->category : null;
        $request->tax_registration != null ? $vendor->tax_registration = $request->tax_registration : null;
        $request->mobile != null ? $vendor->mobile = $request->mobile : null;
        $request->country != null ? $vendor->country_id = $request->country : null;
        $request->address1 != null ? $vendor->address1 = $request->address1 : null;
        $request->address2 != null ? $vendor->address2 = $request->address2 : null;
        $request->city != null ? $vendor->city = $request->city : null;
        $request->state != null ? $vendor->state = $request->state : null;
        $request->postcode != null ? $vendor->postcode = $request->postcode : null;
        $request->notes != null ? $vendor->notes = $request->notes : null;
        $request->auto_assigned != null ? $vendor->auto_assigned = 1 : $vendor->auto_assigned = 0;
        $vendor->save();
        return redirect()->route('web_vendors_list')->with('message', 'Vendor updated');
    }
    //////////////
    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->route('web_vendors_list')->with('message', 'Vendor deleted');
    }
}
