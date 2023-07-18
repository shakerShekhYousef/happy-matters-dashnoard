<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InventoryItems;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InventoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventoryItems = InventoryItems::get();
        return view('dashboard.inventory.listInventory', ['inventory_items' => $inventoryItems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::get();
        return view('dashboard.inventory.createInventory', ['units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'item_location' => 'required',
            'item_qty' => 'required|numeric',
            'unit' => 'required|exists:units,id',
            'photo' => 'required|mimes:png,jpg,jpeg'
        ]);
        try {
            $fileName = "";
            if ($request->has('photo')) {
                $fileName = rand(0, 10000) . time() . '.' . $request->photo->extension();
                $request->photo->move(storage_path('app/public/InventoryItem'), $fileName);
            }
            InventoryItems::create([
                'item_name' => $request->item_name,
                'item_location' => $request->item_location,
                'item_qty' => $request->item_qty,
                'unit_id' => $request->unit,
                'photo' => "storage/InventoryItem/" . $fileName,
            ]);
            return redirect()->route('web_inventory_list');
        } catch (\Throwable $th) {
            $this->errorLog("InventoryItemController@store", $th->getMessage());
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
        $inventoryItem = InventoryItems::find($id);
        return view('dashboard.inventory.showInventory', ['inventory_item' => $inventoryItem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventoryItem = InventoryItems::find($id);
        $units = Unit::get();
        return view('dashboard.inventory.editInventory', ['inventory_items' => $inventoryItem, 'units' => $units]);
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
            'item_qty' => 'numeric',
            'unit' => 'exists:units,id',
            'photo' => 'mimes:png,jpg,jpeg'
        ]);
        try {
            $inventoryItem = InventoryItems::find($id);
            $fileName = "";
            if ($request->has('photo')) {
                if (File::exists($inventoryItem->photo)) {
                    File::delete($inventoryItem->photo);
                }
                $fileName = rand(0, 10000) . time() . '.' . $request->photo->extension();
                $request->photo->move(storage_path('app/public/InventoryItem'), $fileName);
                $inventoryItem->photo =  "storage/InventoryItem/" . $fileName;
            }

            $request->item_name != null ? $inventoryItem->item_name = $request->item_name : null;
            $request->item_location != null ? $inventoryItem->item_location = $request->item_location : null;
            $request->item_qty != null ? $inventoryItem->item_qty = $request->item_qty : null;
            $request->unit != null ? $inventoryItem->unit_id = $request->unit : null;
            $inventoryItem->save();
            return redirect()->route('web_inventory_list')->with('message', 'Inventory item updated');
        } catch (\Throwable $th) {
            $this->errorLog("InventoryItemController@store", $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $inventoryItem = InventoryItems::find($id);
            if (File::exists($inventoryItem->photo)) {
                File::delete($inventoryItem->photo);
            }
            $inventoryItem->delete();
            return redirect()->route('web_inventory_list')->with('message', 'Inventory itemd deleted');
        } catch (\Throwable $th) {
            return $this->errorLog("InventoryItemController@destroy", $th->getMessage());
        }
    }
}
