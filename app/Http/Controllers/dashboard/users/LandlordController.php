<?php

namespace App\Http\Controllers\dashboard\users;

use App\Http\Controllers\Controller\dashboard;
use App\Http\Controllers\Controller;
use App\Http\Resources\users\landlord\LandlordResource;
use App\Models\Landlord;
use App\Models\Contract;
use App\Models\LandlordDocuments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class LandlordController extends Controller
{
    public function index()
    {
        $Landlords = Landlord::get();
        return view('dashboard.landlord.listLandlords', ['landlords' => collect(LandlordResource::collection($Landlords))]);
    }


    public function create()
    {


        return view('dashboard.landlord.createLandlord');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'fname' => 'required|string|max:255',
            'lname' => 'required',
            'email' => 'required|email|unique:landlords,email',
            'mobile' => 'required',
            'documents.*' => 'mimes:pdf'
        ]);
        try {
            $landlord = landlord::firstOrCreate([
                'fname' => $request->fname
            ], [
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'tax_registration' => $request->tax_registration,
                'mobile' => $request->mobile,
                'national_id' => $request->national_id,
                'national_id_expiry' => $request->national_id_expiry,
                'passport_no' => $request->passport_no,
                'passport_expiry' => $request->passport_expiry,
                'visa_state' => $request->visa_state,
                'name_on_contract' => $request->name_on_contract,
                'email_on_contract' => $request->email_on_contract,
                'phone_on_contract' => $request->phone_on_contract,
                'bank_name' => $request->bank_name,
                'bank_address' => $request->bank_address,
                'iban' => $request->iban,
                'swift' => $request->swift,
                'notes' => $request->notes,

                'options' => $request->options,


            ]);

            if ($landlord->wasRecentlyCreated) {

                if ($request->has('documents')) {
                    foreach ($request->file('documents') as $document) {
                        $fileName = rand(0, 10000) . time() . '.' . $document->extension();
                        $document->move(storage_path('app/public/landlord/documents'), $fileName);
                        $landlord_document = LandlordDocuments::create([
                            'name' => $document != null ? ('storage/landlord/documents/' . $fileName) : null,
                            'landlord_id' => $landlord->id,
                        ]);
                    }
                }

                return redirect()->route('web_landlords_list')->with('message', 'landlord added');
            } else
                return redirect()->route('web_landlords_list')->withErrors('errors', 'landlord already found!');
        } catch (\Throwable $th) {
            $this->errorLog('landlordController@store', $th->getMessage());
        }
    }

    ///////////////////////
    public function show($id)
    {

        $landlord = Landlord::find($id);

        return view('dashboard.landlord.showLandlord', ['landlord' => collect(new LandlordResource($landlord))]);
    }

    /////////////////////////
    public function edit($id)
    {
        $landlord = landlord::find($id);
        return view('dashboard.landlord.editLandlord', ['landlord' => $landlord]);
    }
    ////////
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'documents.*' => 'mimes:pdf'
        ]);
        $landlord = landlord::find($id);
        $request->fname != null ? $landlord->fname = $request->fname : null;
        $request->lname != null ? $landlord->lname = $request->lname : null;
        $request->email != null ? $landlord->email = $request->email : null;
        $request->tax_registration != null ? $landlord->tax_registration = $request->tax_registration : null;
        $request->mobile != null ? $landlord->mobile = $request->mobile : null;
        $request->national_id != null ? $landlord->national_id = $request->national_id : null;
        $request->national_id_expiry != null ? $landlord->national_id_expiry = $request->national_id_expiry : null;
        $request->passport_no != null ? $landlord->passport_no = $request->passport_no : null;
        $request->passport_expiry != null ? $landlord->passport_expiry = $request->passport_expiry : null;
        $request->visa_state != null ? $landlord->visa_state = $request->visa_state : null;
        $request->name_on_contract != null ? $landlord->name_on_contract = $request->name_on_contract : null;
        $request->email_on_contract != null ? $landlord->email_on_contract = $request->email_on_contract : null;
        $request->phone_on_contract != null ? $landlord->phone_on_contract = $request->phone_on_contract : null;
        $request->bank_name != null ? $landlord->bank_name = $request->bank_name : null;
        $request->bank_address != null ? $landlord->bank_address = $request->bank_address : null;
        $request->iban != null ? $landlord->iban = $request->iban : null;
        $request->country != null ? $landlord->country_id = $request->country : null;
        $request->swift != null ? $landlord->swift = $request->swift : null;
        $request->options != null ? $landlord->options =$request->options : null;
        $request->notes != null ? $landlord->notes = $request->notes : null;
        $request->landlord != null ? $landlord->landlord_id = $request->landlord : null;

        $landlord->save();

        if ($request->has('documents')) {
            $documents = LandlordDocuments::where('landlord_id', $id)->get();
            foreach ($documents as $key => $document) {
                if (File::exists($document->name)) {
                    File::delete($document->name);
                }
            }
            LandlordDocuments::where('landlord_id', $id)->delete();
            foreach ($request->file('documents') as $document) {
                $fileName = rand(0, 10000) . time() . '.' . $document->extension();
                $document->move(storage_path('app/public/landlord/documents'), $fileName);
                $landlord_document = LandlordDocuments::create([
                    'name' => $document != null ? ('storage/landlord/documents/' . $fileName) : null,
                    'landlord_id' => $landlord->id,
                ]);
            }
        }

        return redirect()->route('web_landlords_list')->with('message', 'landlord updated');
    }
    //////////////
    public function destroy($id)
    {
        $landlord = Landlord::find($id);
        $landlord_documents = LandlordDocuments::where('landlord_id', $id)->get();
        foreach ($landlord_documents as $landlord_document) {
            $landlord_document->delete();
        }
        $landlord->delete();
        return redirect()->route('web_landlords_list')->with('message', 'landlord deleted');
    }
}
