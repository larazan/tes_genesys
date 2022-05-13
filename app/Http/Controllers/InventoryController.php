<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\InventoryRequest;

use App\Models\Inventory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['inventories'] = Inventory::orderBy('nama', 'DESC')->paginate(10);

        return view('inventory.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['inventory'] = null;

		return view('inventory.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['nama']);

        if (Inventory::create($params)) {
			Session::flash('success', 'Product has been created');
		} else {
			Session::flash('error', 'Product could not be created');
		}

		return redirect('inventories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);

		$this->data['inventory'] = $inventory;

		return view('inventory.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryRequest $request, $id)
    {
        $params = $request->except('_token');

        $inventory = Inventory::findOrFail($id);
		if ($inventory->update($params)) {
			Session::flash('success', 'Product has been updated.');
		}

		return redirect('inventories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory  = Inventory::findOrFail($id);
        if ($inventory->delete()) {
			Session::flash('success', 'Product has been deleted');
		}

		return redirect('inventories');
    }
}
