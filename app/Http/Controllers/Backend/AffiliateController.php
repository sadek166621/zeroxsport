<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Affiliate;

class AffiliateController extends Controller
{
    public function index()
    {
        $affiliates = Affiliate::latest()->get();
        return view('backend.affiliate.index', compact('affiliates'));
    }

    public function create()
    {
        return view('backend.affiliate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:affiliates,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        Affiliate::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('affiliate.index')->with('success', 'Affiliate created successfully.');
    }

    public function edit($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        return view('backend.affiliate.edit', compact('affiliate'));
    }

    public function update(Request $request, $id)
    {
        $affiliate = Affiliate::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:affiliates,email,' . $affiliate->id,
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
        ]);

        $affiliate->update($request->only('name', 'email', 'phone','password'));

        return redirect()->route('affiliates.index')->with('success', 'Affiliate updated successfully.');
    }

    public function show($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        return view('backend.affiliate.show', compact('affiliate'));
    }

    public function destroy($id)
    {
        Affiliate::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Affiliate deleted successfully.');
    }

    public function earning()
    {
        $affiliates = Affiliate::with('orders')->get();
        return view('backend.affiliate.earning', compact('affiliates'));
    }
}
