<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Contract;
use App\Models\ContractDocuments;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

use App\Http\Resources\contract\ContractResource;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::get();
        return view('dashboard.contract.listContracts', ['contracts' => collect(ContractResource::collection($contracts))]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::get(['unit_number','id']);
        $properties = Property::get(['name', 'id']);
        $tenants = Tenant::get(['fname','id']);
        return view('dashboard.contract.createContract', ['units' =>  $units, 'properties' => $properties ,'tenants'=>$tenants]);
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
            'total_rent' => 'required',
            'deposit' => 'required',
            'start_date' => 'string',
            'end_date' => 'string',
            'property_id'=> 'required',
            'unit_id'=> 'required',
            'tenant_id'=> 'required',

            'documents.*' => 'mimes:pdf',
            'registered_tenancy_contract.*' => 'mimes:pdf',
            'tenancy_contract.*' => 'mimes:pdf'


          
        ]);
        
        try {
            if ($request->has('registered_tenancy_contract')) {
                $fileName_registered_tenancy_contract = rand(0, 10000) . time() . '.' . $request->registered_tenancy_contract->extension();
                $request->registered_tenancy_contract->move(storage_path('app/public/contracts/registered_tenancy_contract'), $fileName_registered_tenancy_contract);
            }
            if ($request->has('tenancy_contract')) {
                $fileName_tenancy_contract = rand(0, 10000) . time() . '.' . $request->tenancy_contract->extension();
                $request->tenancy_contract->move(storage_path('app/public/contracts/tenancy_contract'), $fileName_tenancy_contract);
            }
            $contract = Contract::firstOrCreate([
          
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'is_short_term_contract' => $request->is_short_term_contract == null ? 0 : 1,
                'total_rent' => $request->total_rent,
                'deposit' => $request->deposit,
                'no_of_rent_payments' => $request->no_of_rent_payments,
                'money_held_by' => $request->money_held_by,
                'additional_terms' => $request->additional_terms,
                'remarks' => $request->remarks,
                'registered_tenancy_contract' => $request->has('registered_tenancy_contract') ? ('storage/contracts/registered_tenancy_contract/' . $fileName_registered_tenancy_contract) : null,
                'tenancy_contract' => $request->has('registered_tenancy_contract') ? ('storage/contracts/tenancy_contract/' . $fileName_tenancy_contract) : null,
                'property_id' => $request->property_id,
                'unit_id' => $request->unit_id,
                'tenant_id' => $request->tenant_id,
                'description' => $request->description

            

            ]);
            if ($contract->wasRecentlyCreated) {
            
                if ($request->has('documents')) {
                    foreach ($request->file('documents') as $document) {
                        $fileName = rand(0, 10000) . time() . '.' . $document->extension();
                        $document->move(storage_path('app/public/contract/documents'), $fileName);
                        $contract_document = ContractDocuments::create([
                            'name' => $document != null ? ('storage/contract/documents/' . $fileName) : null,
                            'contract_id' => $contract->id,
                        ]);
                    }
                }
                return redirect()->route('web_contracts_list')->with('message', 'Contract added');
            } else
                return redirect()->route('web_contracts_list')->withErrors('Contract already found!');
        } catch (\Throwable $th) {
            $this->errorLog('ContractController@store', $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::find($id);
        return view('dashboard.contract.showContract', ['contract' => collect(new ContractResource($contract))]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $units = Unit::get(['unit_number','id']);
        $properties = Property::get(['name', 'id']);
        $tenants = Tenant::get(['fname','id']);
        $contract = Contract::find($id);

        return view('dashboard.contract.editContract', [ 'contract' =>  $contract, 'units' =>  $units, 'properties' => $properties ,'tenants'=>$tenants]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    { 
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'total_rent' => 'required',
            'deposit' => 'required',
            'start_date' => 'string',
            'end_date' => 'string',
            'property_id'=> 'required',
            'unit_id'=> 'required',
            'tenant_id'=> 'required',

            'documents.*' => 'mimes:pdf',
            'registered_tenancy_contract.*' => 'mimes:pdf',
            'tenancy_contract.*' => 'mimes:pdf'
    ]);
        $contract = Contract::find($id);
        
        $fileName_registered_tenancy_contract = "";
        if ($request->has('registered_tenancy_contract')) {
            if (File::exists($contract->registered_tenancy_contract)) {
                File::delete($contract->registered_tenancy_contract);
            }
            $fileName_registered_tenancy_contract = rand(0, 10000) . time() . '.' . $request->registered_tenancy_contract->extension();
            $request->registered_tenancy_contract->move(storage_path('app/public/contracts/registered_tenancy_contract'), $fileName_registered_tenancy_contract);
            $contract->registered_tenancy_contract = 'storage/contracts/registered_tenancy_contract/' . $fileName_registered_tenancy_contract;
           
        }
        $fileName_tenancy_contract = "";
        if ($request->has('registered_tenancy_contract')) {
            if (File::exists($contract->tenancy_contract)) {
                File::delete($contract->tenancy_contract);
            }
            $fileName_tenancy_contract = rand(0, 10000) . time() . '.' . $request->tenancy_contract->extension();
            $request->tenancy_contract->move(storage_path('app/public/contracts/tenancy_contract'), $fileName_tenancy_contract);
            $contract->tenancy_contract = 'storage/contracts/tenancy_contract/' . $fileName_tenancy_contract;
           
        }
        $request->start_date != null ? $contract->start_date = $request->start_date : null;
        $request->end_date != null ? $contract->end_date = $request->end_date : null;
        $request->total_rent != null ? $contract->total_rent = $request->total_rent : null;
        $request->deposit != null ? $contract->deposit = $request->deposit : null;
        $request->no_of_rent_payments != null ? $contract->no_of_rent_payments = $request->no_of_rent_payments : null;
        $request->money_held_by != null ? $contract->money_held_by = $request->money_held_by : null;
        $request->additional_terms != null ? $contract->additional_terms = $request->additional_terms : null;
        $request->remarks != null ? $contract->remarks = $request->remarks : null;
       
        $request->is_short_term_contract != null ? $contract->is_short_term_contract = 1 : $contract->is_short_term_contract = 0;
        $request->property_id != null ? $contract->property_id = $request->property_id : null;
        $request->unit_id != null ? $contract->unit_id = $request->unit_id : null;
        $request->tenant_id != null ? $contract->tenant_id = $request->tenant_id : null;
        $request->description != null ? $contract->description = $request->description : null;
        $request->registered_tenancy_contract != null ? $contract->registered_tenancy_contract = ('storage/contracts/registered_tenancy_contract/' . $fileName_registered_tenancy_contract) : null;
        $request->tenancy_contract != null ? $contract->tenancy_contract = ('storage/contracts/tenancy_contract/' . $fileName_tenancy_contract) : null;


        $contract->save();

        if ($request->has('documents')) {
            $documents = ContractDocuments::where('contract_id', $id)->get();
            foreach ($documents as $key => $document) {
                if (File::exists($document->name)) {
                    File::delete($document->name);
                }
            }
            ContractDocuments::where('contract_id', $id)->delete();
            foreach ($request->file('documents') as $document) {
                $fileName = rand(0, 10000) . time() . '.' . $document->extension();
                $document->move(storage_path('app/public/contract/documents'), $fileName);
                $contract_document =ContractDocuments::create([
                    'name' => $document != null ? ('storage/contract/documents/' . $fileName) : null,
                    'contract_id' => $contract->id,
                ]);
            }
        }

        return redirect()->route('web_contracts_list')->with('message', 'contract updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = Contract::find($id);
        $contract_documents = ContractDocuments::where('contract_id', $id)->get();
        foreach ($contract_documents as $contract_document) {
            $contract_document->delete();
        }
      
      
      
       
        $contract->delete();
        return redirect()->route('web_contracts_list')->with('message', 'contract deleted');
    }
}
