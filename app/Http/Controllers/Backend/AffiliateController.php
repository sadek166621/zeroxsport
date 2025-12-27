<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $affiliate->update($request->only('name', 'email', 'phone', 'password'));

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


    public function AllaffiliateProduct()
    {
        $products = Product::where('is_affiliate', 1)->latest()->get();
        return view('backend.affiliate.products.affiliate-product', compact('products'));
    }
    public function vendorAffiliateProduct()
    {
        $products = Product::where('is_affiliate', 1)->where('vendor_id', '!=', null)->latest()->get();
        return view('backend.affiliate.products.vendor_affiliate_products', compact('products'));
    }
    public function adminAffiliateProduct()
    {
        $products = Product::where('is_affiliate', 1)->where('vendor_id', null)->latest()->get();
        return view('backend.affiliate.products.admin_affiliate_products', compact('products'));
    }



    public function active($id)
    {
        $product = Product::find($id);
        $product->is_affiliate = 1;
        $product->save();

        $notification = array(
            'message' => 'Product Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method

    public function inactive($id)
    {
        $product = Product::find($id);
        $product->is_affiliate = 0;
        $product->save();

        $notification = array(
            'message' => 'Product remove from Affiliate Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } // end method

    public function allProductOff()
    {
        Product::whereNotNull('vendor_id')->update(['is_affiliate' => 0]);

        return redirect()->back()->with('success', 'All vendor products updated (affiliate off)');
    }

    public function allProductOn()
    {
        Product::whereNotNull('vendor_id')->update(['is_affiliate' => 1]);
        return redirect()->back()->with('success', 'All vendor products updated (affiliate on)');
    }

    public function earning()
    {
        $affiliates = Affiliate::with('orders')->get();
        return view('backend.affiliate.earning', compact('affiliates'));
    }
}
