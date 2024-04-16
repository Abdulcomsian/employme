<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleItem;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class ModuleItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$id)
    {
        $moduleDetails = Module::find($id);

        if($request->ajax())
        {
            $moduleItems = ModuleItem::where('module_id',$id)->get();
            foreach ($moduleItems as $moduleItem) {
                $moduleItem->Options = '<button class="btn btn-primary Edit-Module-Item-Button m-1"   type="button" type="button" data-bs-toggle="modal" data-bs-target="#Edit-Module-Item-Modal"><i class="bi bi-pen"></i></button><button class="btn btn-danger Delete-Module-Item-Button"   type="button" type="button" ><i class="bi bi-trash"></i></button>';
            }
            $output = array(
                    "recordsTotal" => count($moduleItems),
                    "recordsFiltered" => count($moduleItems),
                    "data" => $moduleItems
            );
             return \Response::json($output);
        }
        return view('owner.modules.module-items',compact('moduleDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        $moduleDetails = Module::find($id);
        $input = $request->all();
        $createModuleItem = ModuleItem::create(array_merge($input,['user_id'=>Auth::id()]));

        return  \Response::json(['status' => 'success','msg'=>$moduleDetails->name.' Added Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $moduleId , string $moduleItemId)
    {
        $moduleDetails = Module::find($moduleId);
        $input = $request->all();
        $updateModuleItem = ModuleItem::where('id',$moduleItemId)->update($input);
        return  \Response::json(['status' => 'success','msg'=>$moduleDetails->name.' Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $moduleId, string $moduleItemId)
    {
        $moduleDetails = Module::find($moduleId);
        $deleteModuleItem = ModuleItem::where('id',$moduleItemId)->delete();
        return  \Response::json(['status' => 'success','msg'=>$moduleDetails->name.' Deleted Successfully']);
    }
}
