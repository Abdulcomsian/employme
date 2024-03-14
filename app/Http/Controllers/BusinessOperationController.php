<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessOperation;

class BusinessOperationController extends Controller
{
    public function manageBusinessOperation(){
          $businessOperationDetails = BusinessOperation::where('employer_id',\Auth::id())->first();
          return view('employer.business-operation.index',compact('businessOperationDetails'));
    }
    public function updateBusinessOperation(Request $request)
    {
         $updateBusinessOperation = BusinessOperation::where('employer_id',\Auth::id());
         if($updateBusinessOperation->exists())
         {
            $updateBusinessOperation->update($request->except('_token'));
         }else
         {
            $updateBusinessOperation->create(array_merge($request->except('_token'),['employer_id'=>\Auth::id()]));
         }
         toastr('Details Saved Successfully');
         return redirect()->back();
    }
}
