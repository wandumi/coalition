<?php

namespace App\Http\Controllers\Json;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class JsonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getFile = storage_path('app/json_data.json'); 
        $jsonData = [];

        if (file_exists($getFile)) { 
            $jsonData = json_decode(file_get_contents($getFile), true); 
        }

        if ($jsonData != null){
            usort($jsonData, function ($a, $b) { 
                return Carbon::parse($b['current_date'])->timestamp - Carbon::parse($a['current_date'])->timestamp; 
            });
        }

        return view('JsonFiles.index', compact('jsonData'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([ 
            'product_name' => 'required|string|max:255',
            'quantity_stock' => 'required|integer', 
            'item_price' => 'required|integer', 
        ]);

        $data = array_merge(['unique_id' => uniqid()], $data);
        $data['current_date'] = Carbon::now()->toDateTimeString();
        $data['total_value'] = $data['quantity_stock'] * $data['item_price'];

        $getFile = storage_path('app/json_data.json'); 

        $fileExist = file_exists($getFile) ? json_decode(file_get_contents($getFile), true) : []; 

        $fileExist[] = $data;

        $jsonData = json_encode($fileExist, JSON_PRETTY_PRINT);

        Storage::disk('local')->put('json_data.json', $jsonData);

        return back()->with(['message' => 'Successfully saved to a JSON file!']);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $getFile = storage_path('app/json_data.json');
        $jsonData = [];

        if (file_exists($getFile)) {
            $jsonData = json_decode(file_get_contents($getFile), true);
        }

        $json = collect($jsonData)->firstWhere('unique_id', $id);


        return view('JsonFiles.edit', compact('json'));
        
    }

    
}
