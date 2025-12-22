<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CommissionStructure;

class CommissionController extends Controller
{

    public function commissionIndex()
    {
        $commissions = CommissionStructure::latest()->get();
        return view('backend.commission.index', compact('commissions'));
    }

    public function commissionCreate()
    {
        $categories = Category::where('parent_id', 0)->latest()->get();
        return view('backend.commission.create', compact('categories'));
    }

    public function commissionStore(Request $request)
    {
        $request->validate([
            'category_id'      => 'required|exists:categories,id|unique:commission_structures,category_id',
            'commission_rate'  => 'required|numeric|min:0',
            'mode'             => 'required|in:percentage,fixed',
            'status'           => 'nullable|boolean'
        ], [
            'category_id.required' => 'Please select a category.',
            'category_id.exists'   => 'Selected category does not exist.',
            'category_id.unique'   => 'Commission for this category already exists.',

        ]);

        CommissionStructure::create([
            'category_id'     => $request->category_id,
            'commission_rate' => $request->commission_rate,
            'mode'            => $request->mode,
            'status'          => $request->status ?? 0,
        ]);

        return redirect()->back()->with('success', 'Commission created successfully!');
    }

    public function commissionEdit($id)
    {
        $commission = CommissionStructure::findOrFail($id);
        $categories = Category::where('parent_id', 0)->latest()->get();

        return view('backend.commission.edit', compact('commission', 'categories'));
    }

    public function commissionUpdate(Request $request, $id)
    {
        $commission = CommissionStructure::findOrFail($id);

        $request->validate([
            'category_id'      => 'required|exists:categories,id|unique:commission_structures,category_id,' . $commission->id,
            'commission_rate'  => 'required|numeric|min:0',
            'mode'             => 'required|in:percentage,fixed',
            'status'           => 'nullable|boolean'
        ], [
            'category_id.required' => 'Please select a category.',
            'category_id.exists'   => 'Selected category does not exist.',
            'category_id.unique'   => 'Commission for this category already exists.',

        ]);

        $commission->update([
            'category_id'     => $request->category_id,
            'commission_rate' => $request->commission_rate,
            'mode'            => $request->mode,
            'status'          => $request->status ?? 0,
        ]);

        return redirect()->route('commission.index')->with('success', 'Commission updated successfully!');
    }

    public function commissionDestroy($id)
    {
        $commission = CommissionStructure::findOrFail($id);
        $commission->delete();

        return redirect()->back()->with('success', 'Commission deleted successfully!');
    }
}
