<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;
class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            
            $modules = Module::all();
            foreach ($modules as $module) {
                $module->Options = '<button class="btn btn-primary Edit-Module-Button"   type="button" type="button" data-bs-toggle="modal" data-bs-target="#Edit-Module-Modal"><i class="bi bi-pen"></i></button><button class="btn btn-danger Delete-Module-Button"   type="button" type="button" ><i class="bi bi-trash"></i></button>';
            }
            $output = array(
                    "recordsTotal" => count($modules),
                    "recordsFiltered" => count($modules),
                    "data" => $modules
            );
             return \Response::json($output);
        }
        return view('owner.modules.index');
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
    public function store(Request $request)
    {
        $input = $request->all();
        $createModule = Module::create(array_merge($input,['user_id'=>Auth::id()]));

        return  \Response::json(['status' => 'success','msg' => __('Module Added successfully')]);
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
    public function update(Request $request, string $id)
    {
        $input = $request->except('id');
        $updateModules = Module::where('id',$id)->update($input);
        return  \Response::json(['status' => 'success','msg' => __('Module Updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteModule = Module::where('id',$id)->delete();
        return  \Response::json(['status' => 'success','msg' => __('Module Deleted successfully')]);
    }
}
