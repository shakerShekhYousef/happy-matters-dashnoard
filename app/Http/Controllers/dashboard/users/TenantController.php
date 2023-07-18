<?php

namespace App\Http\Controllers\dashboard\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Tenant;
use App\Models\TenantGuest;
use App\Models\TenantDocument;
use App\Models\TenantPet;
use App\Models\TenantVehicle;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


use App\Http\Resources\TenantResource;


class TenantController extends Controller
{

    public function index()
    {
        $tenants = Tenant::get();

        // return response()->json(['tenants'=>collect(TenantResource::collection($tenants))]);
        // dd(collect(TenantResource::collection($tenants)));
        return view('dashboard.tenant.listTenant', ['tenants' => collect(TenantResource::collection($tenants))]);
    }
    public function create()
    {
        $countries = Country::all();
        return view('dashboard.tenant.createTenant', ['countries' => $countries]);
    }

    public function store(Request $request)
    {
        // dd($request->toArray());
        if ($request->has('is_company')) {
            $is_company = 1;
        } else {
            $is_company = 0;
        }
        $this->validate($request, [
            'email' => 'required|email|unique:tenants,email',
            'password' => 'required|string|min:5|confirmed',
            'fname' => 'required|string|max:255',
            'lname' => 'required',
            'dob' => 'required|string',
            'documents.*' => 'mimes:pdf',
            'national_id_photo.*' => 'mimes:png,jpg,jpeg',
            'passport_photo.*' => 'mimes:png,jpg,jpeg',
            'visa_photo.*' => 'mimes:png,jpg,jpeg',
            'visa_page.*' => 'mimes:pdf'

        ]);

        if ($request->has('is_company')) {
            $this->validate($request, [
                'company_name' => 'required',
                'trade_license' => 'required',
                'trade_license_expiry' => 'required',
                'tax_registration' => 'required'
            ]);
        }

        if ($request->has('tenant_pet')) {
            $this->validate($request, [
                'pet_type.*' => 'required',
                'pet_name.*' => 'required'
            ], [
                'pet_type.required' => 'pet type value required',
                'pet_name.required' => 'pet name value required'
            ]);
        }

        if ($request->has('tenant_vehicles')) {
            $this->validate($request, [
                'vehicle_type.*' => 'required',
                'make.*' => 'required',
                'model.*' => 'required',
                'year.*' => 'required',
                'color.*' => 'required',
                'plate_no.*' => 'required'
            ], [
                'vehicle_type.required' => 'vehicle type value required',
                'make.required' => 'make value required',
                'model.required' => 'model value required',
                'year.required' => 'year value required',
                'color.required' => 'color value required',
                'plate_no.required' => 'plate no value required'
            ]);
        }

        if ($request->has('tenant_guest')) {
            $this->validate($request, [
                'guest_type.*' => 'required',
                'guest_name.*' => 'required',
                'guest_age.*' => 'required',
                'guest_nationality.*' => 'required'
            ], [
                'guest_type.required' => 'guest type value required',
                'guest_name.required' => 'guest name value required',
                'guest_age.required' => 'guest age value required',
                'guest_nationality.required' => 'guest nationality value required'
            ]);
        }

        try {
            if ($request->has('national_id_photo')) {
                $fileName_national_id = rand(0, 10000) . time() . '.' . $request->national_id_photo->extension();
                $request->national_id_photo->move(storage_path('app/public/tenants/national_id_photo'), $fileName_national_id);
            }

            if ($request->has('passport_photo')) {
                $fileName_passport_photo = rand(0, 10000) . time() . '.' . $request->passport_photo->extension();
                $request->passport_photo->move(storage_path('app/public/tenants/passport_photo'), $fileName_passport_photo);
            }
            if ($request->has('visa_photo')) {
                $fileName_visa_photo = rand(0, 10000) . time() . '.' . $request->visa_photo->extension();
                $request->visa_photo->move(storage_path('app/public/tenants/visa_photo'), $fileName_visa_photo);
            }
            if ($request->has('visa_page')) {
                $fileName_visa_page = rand(0, 10000) . time() . '.' . $request->visa_page->extension();
                $request->visa_page->move(storage_path('app/public/tenants/visa_page'), $fileName_visa_page);
            }
            // dd($request->tax_registration);
            $tenant = Tenant::firstOrCreate([
                'email' => $request->email
            ], [
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'is_company' => $is_company,
                'company_name' => $request->company_name,
                'trade_license' => $request->trade_license,
                'trade_license_expiry' => $request->trade_license_expiry,
                'tax_registration' => $request->tax_registration,
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'marital_status' => $request->marital_status,
                'phone' => $request->phone,
                'additional_phone1' => $request->additional_phone1,
                'additional_phone2' => $request->additional_phone2,
                'national_id' => $request->national_id,
                'national_id_expiry' => $request->national_id_expiry,
                'passport' => $request->passport,
                'passport_expiry' => $request->passport_expiry,
                'visa_state' => $request->visa_state,
                'home_country_id' => $request->home_country_id,
                'country_id' => $request->country_id,
                'city' => $request->city,
                'state' => $request->state,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'postcode' => $request->postcode,
                'national_id_photo' => $request->has('national_id_photo') ? ('storage/tenants/national_id_photo/' . $fileName_national_id) : null,
                'passport_photo' => $request->has('passport_photo') ? ('storage/tenants/passport_photo/' . $fileName_passport_photo) : null,
                'visa_photo' => $request->has('visa_photo') ? ('storage/tenants/visa_photo/' . $fileName_visa_photo) : null,
                'visa_page' => $request->has('visa_page') ? ('storage/tenants/visa_page/' . $fileName_visa_page) : null,

                'notes' => $request->notes,

            ]);
            if ($tenant->wasRecentlyCreated) {
                if ($request->has('tenant_guest')) {
                    for ($i = 0; $i < count($request->guest_type); $i++) {
                        TenantGuest::create([
                            'guest_type' => $request->guest_type[$i],
                            'name' => $request->guest_name[$i],
                            'age' => $request->guest_age[$i],
                            'nationality' => $request->guest_nationality[$i],
                            'tenant_id' => $tenant->id,
                        ]);
                    }
                }
                if ($request->has('tenant_pet')) {
                    for ($i = 0; $i < count($request->pet_type); $i++) {
                        TenantPet::create([
                            'pet_type' => $request->pet_type[$i],
                            'name' => $request->pet_name[$i],
                            'tenant_id' => $tenant->id,
                        ]);
                    }
                }
                if ($request->has('tenant_vehicles')) {
                    for ($i = 0; $i < count($request->vehicle_type); $i++) {
                        TenantVehicle::create([
                            'vehicle_type' => $request->vehicle_type[$i],
                            'make' => $request->make[$i],
                            'model' => $request->model[$i],
                            'year' => $request->year[$i],
                            'color' => $request->color[$i],
                            'plate_no' => $request->plate_no[$i],
                            'tenant_id' => $tenant->id,
                        ]);
                    }
                }
                if ($request->has('documents')) {
                    foreach ($request->file('documents') as $document) {
                        $fileName = rand(0, 10000) . time() . '.' . $document->extension();
                        $document->move(storage_path('app/public/tenant/documents'), $fileName);
                        $tenant_document = TenantDocument::create([
                            'name' => $document != null ? ('storage/tenant/documents/' . $fileName) : null,
                            'tenant_id' => $tenant->id,
                        ]);
                    }
                }
                return redirect()->route('web_tenants_list')->with('message', 'Tenant added');
            } else
                return redirect()->route('web_tenants_list')->withErrors('Tenant already found!');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->errorLog('TenantController@store', $th->getMessage());
        }
    }

    public function show($id)
    {
        $countries = Country::get();
        $tenant = Tenant::find($id);
        return view('dashboard.tenant.showTenant', ['tenant' => collect(new TenantResource($tenant)), 'countries' => $countries]);
    }
    /////
    public function destroy($id)
    {
        $tenant = Tenant::find($id);
        $tenant_documents = TenantDocument::where('tenant_id', $id)->get();
        foreach ($tenant_documents as $tenant_document) {
            $tenant_document->delete();
        }
        $tenant_pets = TenantPet::where('tenant_id', $id)->get();
        foreach ($tenant_pets as $tenant_pet) {
            $tenant_pet->delete();
        }
        $tenant_vehicles = TenantVehicle::where('tenant_id', $id)->get();
        foreach ($tenant_vehicles as $tenant_vehicle) {
            $tenant_vehicle->delete();
        }
        $tenant_guests = TenantGuest::where('tenant_id', $id)->get();
        foreach ($tenant_guests as $tenant_guest) {
            $tenant_guest->delete();
        }

        $tenant->delete();
        return redirect()->route('web_tenants_list')->with('message', 'Tenant deleted');
    }
    ////
    public function edit($id)
    {
        $countries = Country::get();
        $tenant = Tenant::find($id);

        // $tenant_document =TenantDocument::where('tenant_id',$id)->first();

        return view('dashboard.tenant.editTenant', ['tenant' => collect(new TenantResource($tenant)), 'countries' => $countries]);
    }
    public function update(Request $request, $id)
    {
        if ($request->is_company == "on") {
            $is_company = 1;
        } else {
            $is_company = 0;
        }

        if ($request->has('is_company')) {
            $this->validate(
                $request,
                [
                    'company_name' => 'required',
                    'trade_license' => 'required',
                    'trade_license_expiry' => 'required',
                    'tax_registration' => 'required'
                ],
                [
                    'company_name.required' => 'company name value required',
                    'trade_license.required' => 'trade license value required',
                    'trade_license_expiry.required' => 'trade license expiry value required',
                    'tax_registration.required' => 'tax registration value required',
                ]
            );
        }

        if ($request->has('tenant_pet')) {
            $this->validate($request, [
                'pet_type.*' => 'required',
                'pet_name.*' => 'required'
            ], [
                'pet_type.required' => 'pet type value required',
                'pet_name.required' => 'pet name value required'
            ]);
        }

        if ($request->has('tenant_vehicles')) {
            $this->validate($request, [
                'vehicle_type.*' => 'required',
                'make.*' => 'required',
                'model.*' => 'required',
                'year.*' => 'required',
                'color.*' => 'required',
                'plate_no.*' => 'required'
            ], [
                'vehicle_type.required' => 'vehicle type value required',
                'make.required' => 'make value required',
                'model.required' => 'model value required',
                'year.required' => 'year value required',
                'color.required' => 'color value required',
                'plate_no.required' => 'plate no value required'
            ]);
        }

        if ($request->has('tenant_guest')) {
            $this->validate($request, [
                'guest_type.*' => 'required',
                'guest_name.*' => 'required',
                'guest_age.*' => 'required',
                'guest_nationality.*' => 'required'
            ], [
                'guest_type.required' => 'guest type value required',
                'guest_name.required' => 'guest name value required',
                'guest_age.required' => 'guest age value required',
                'guest_nationality.required' => 'guest nationality value required'
            ]);
        }

        $tenant = Tenant::find($id);
        if ($request->password != null) {
            $this->validate($request, [
                'email' => 'email|unique:tenants,email,' . $tenant->id,
                'password' => 'string|min:5|confirmed',
                'fname' => 'string|max:255',
                'documents.*' => 'mimes:pdf',
                'national_id_photo.*' => 'mimes:png,jpg,jpeg',
                'passport_photo.*' => 'mimes:png,jpg,jpeg',
                'visa_photo.*' => 'mimes:png,jpg,jpeg',
                'visa_page.*' => 'mimes:pdf'
            ]);
        } else {
            $this->validate($request, [
                'email' => 'email|unique:tenants,email,' . $tenant->id,
                'fname' => 'string|max:255',
                'documents.*' => 'mimes:pdf',
                'national_id_photo.*' => 'mimes:png,jpg,jpeg',
                'passport_photo.*' => 'mimes:png,jpg,jpeg',
                'visa_photo.*' => 'mimes:png,jpg,jpeg',
                'visa_page.*' => 'mimes:pdf'
            ]);
        }

        $fileName_national_id = "";
        if ($request->has('national_id_photo')) {
            if (File::exists($tenant->national_id_photo)) {
                File::delete($tenant->national_id_photo);
            }

            $fileName_national_id = rand(0, 10000) . time() . '.' . $request->national_id_photo->extension();
            $request->national_id_photo->move(storage_path('app/public/tenants/national_id_photo'), $fileName_national_id);
        }

        $fileName_passport_photo = "";
        if ($request->has('passport_photo')) {
            if (File::exists($tenant->passport_photo)) {
                File::delete($tenant->passport_photo);
            }

            $fileName_passport_photo = rand(0, 10000) . time() . '.' . $request->passport_photo->extension();
            $request->passport_photo->move(storage_path('app/public/tenants/passport_photo'), $fileName_passport_photo);
        }

        $fileName_visa_photo = "";
        if ($request->has('visa_photo')) {
            if (File::exists($tenant->visa_photo)) {
                File::delete($tenant->visa_photo);
            }

            $fileName_visa_photo = rand(0, 10000) . time() . '.' . $request->visa_photo->extension();
            $request->visa_photo->move(storage_path('app/public/tenants/visa_photo'), $fileName_visa_photo);
        }

        $fileName_visa_page = "";
        if ($request->has('visa_page')) {
            if (File::exists($tenant->visa_page)) {
                File::delete($tenant->visa_page);
            }

            $fileName_visa_page = rand(0, 10000) . time() . '.' . $request->visa_page->extension();
            $request->visa_page->move(storage_path('app/public/tenants/visa_page'), $fileName_visa_page);
        }

        $request->email != null ? $tenant->email = $request->email : null;
        $request->password != null ? $tenant->password = Hash::make($request['password']) : null;
        $request->fname != null ? $tenant->fname = $request->fname : null;
        $request->mname != null ? $tenant->mname = $request->mname : null;
        $request->lname != null ? $tenant->lname = $request->lname : null;
        $request->is_company != null ? $tenant->is_company = $is_company : null;
        $request->company_name != null ? $tenant->company_name = $request->company_name : null;
        $request->trade_license != null ? $tenant->trade_license = $request->trade_license : null;
        $request->tax_registration != null ? $tenant->tax_registration = $request->tax_registration : null;
        $request->trade_license_expiry != null ? $tenant->trade_license_expiry = $request->trade_license_expiry : null;
        $request->dob != null ? $tenant->dob = $request->dob : null;
        $request->phone != null ? $tenant->phone = $request->phone : null;
        $request->additional_phone1 != null ? $tenant->additional_phone1 = $request->additional_phone1 : null;
        $request->additional_phone2 != null ? $tenant->additional_phone2 = $request->additional_phone2 : null;
        $request->gender != null ? $tenant->gender = $request->gender : null;
        $request->marital_status != null ? $tenant->marital_status = $request->marital_status : null;
        $request->national_id != null ? $tenant->national_id = $request->national_id : null;
        $request->national_id_expiry != null ? $tenant->national_id_expiry = $request->national_id_expiry : null;
        $request->passport != null ? $tenant->passport = $request->passport : null;
        $request->passport_expiry != null ? $tenant->passport_expiry = $request->passport_expiry : null;
        $request->visa_state != null ? $tenant->visa_state = $request->visa_state : null;
        $request->home_country_id != null ? $tenant->home_country_id = $request->home_country_id : null;
        $request->country_id != null ? $tenant->country_id = $request->country_id : null;
        $request->address1 != null ? $tenant->address1 = $request->address1 : null;
        $request->address2 != null ? $tenant->address2 = $request->address2 : null;
        $request->city != null ? $tenant->city = $request->city : null;
        $request->state != null ? $tenant->state = $request->state : null;
        $request->postcode != null ? $tenant->postcode = $request->postcode : null;
        $request->notes != null ? $tenant->notes = $request->notes : null;
        $request->national_id_photo != null ? $tenant->national_id_photo = ('storage/tenants/national_id_photo/' . $fileName_national_id) : null;
        $request->passport_photo != null ? $tenant->passport_photo = ('storage/tenants/passport_photo/' . $fileName_passport_photo) : null;
        $request->visa_photo != null ? $tenant->visa_photo = ('storage/tenants/visa_photo/' . $fileName_visa_photo) : null;
        $request->visa_page != null ? $tenant->visa_page = ('storage/tenants/visa_page/' . $fileName_visa_page) : null;

        $tenant->save();

        if ($request->has('tenant_guest')) {
            TenantGuest::truncate();
            for ($i = 0; $i < count($request->guest_type); $i++) {
                TenantGuest::create([
                    'guest_type' => $request->guest_type[$i],
                    'name' => $request->guest_name[$i],
                    'age' => $request->guest_age[$i],
                    'nationality' => $request->guest_nationality[$i],
                    'tenant_id' => $tenant->id,
                ]);
            }
        }
        if ($request->has('tenant_pet')) {
            TenantPet::truncate();
            for ($i = 0; $i < count($request->pet_type); $i++) {
                TenantPet::create([
                    'pet_type' => $request->pet_type[$i],
                    'name' => $request->pet_name[$i],
                    'tenant_id' => $tenant->id,
                ]);
            }
        }
        if ($request->has('tenant_vehicles')) {
            TenantVehicle::truncate();
            for ($i = 0; $i < count($request->vehicle_type); $i++) {
                TenantVehicle::create([
                    'vehicle_type' => $request->vehicle_type[$i],
                    'make' => $request->make[$i],
                    'model' => $request->model[$i],
                    'year' => $request->year[$i],
                    'color' => $request->color[$i],
                    'plate_no' => $request->plate_no[$i],
                    'tenant_id' => $tenant->id,
                ]);
            }
        }
        if ($request->has('documents')) {
            $documents = TenantDocument::where('tenant_id', $id)->get();
            foreach ($documents as $key => $document) {
                if (File::exists($document->name)) {
                    File::delete($document->name);
                }
            }
            TenantDocument::where('tenant_id', $id)->delete();
            foreach ($request->file('documents') as $document) {
                $fileName = rand(0, 10000) . time() . '.' . $document->extension();
                $document->move(storage_path('app/public/tenant/documents'), $fileName);
                $tenant_document = TenantDocument::create([
                    'name' => $document != null ? ('storage/tenant/documents/' . $fileName) : null,
                    'tenant_id' => $tenant->id,
                ]);
            }
        }
        return redirect()->route('web_tenants_list')->with('message', 'Tenant Updated');
    }

    public function pet($id)
    {
        $tenants = TenantPet::where('tenant_id', $id)->get();
        return view('dashboard.tenant.listpets')->with('tenants', $tenants);
    }
    public function guest($id)
    {
        $tenants = TenantGuest::where('tenant_id', $id)->get();
        return view('dashboard.tenant.listguests')->with('tenants', $tenants);
    }
    public function company($id)
    {
        $tenant = Tenant::find($id);
        return view('dashboard.tenant.listcompany')->with('tenant', $tenant);
    }

    public function vehicle($id)
    {
        $tenants = TenantVehicle::where('tenant_id', $id)->get();
        return view('dashboard.tenant.listvehicles')->with('tenants', $tenants);
    }
}
