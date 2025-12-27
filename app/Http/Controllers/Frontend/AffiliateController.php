<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Affiliate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AffiliateController extends Controller
{
    public function pageAffiliate()
    {
        return view('FrontEnd.affiliate.index');
    }

    public function registerAffiliate()
    {
        return view('FrontEnd.affiliate.register');
    }

    public function registerAffiliateStore(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'phone' => ['required', 'regex:/(\+){0,1}(88){0,1}01(3|4|5|6|7|8|9)(\d){8}/', 'min:11', 'max:15'],
            'email' => 'required|string|email|max:255|unique:affiliates',
            'affiliate_code' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasfile('profile_image')) {
            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $directory = public_path('upload/affiliate/');
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }
            $image->move($directory, $name_gen);  // Correct method
            $profile_image = 'upload/affiliate/' . $name_gen; // Store relative path for public access
        } else {
            $profile_image = '';
        }

        if (
            Affiliate::where('email', $request->email)->exists() ||
            Affiliate::where('affiliate_member_id', $request->affiliateid)->exists()
        ) {
            return response()->json(['message' => 'অ্যাফিলিয়েট ইতিমধ্যে বিদ্যমান।'], 409);
        }


       $affiliateId = $request->affiliateid;
        $isValid = false;
        
        $responseGk = Http::withoutVerifying()->get('https://ghorkonnya.com/api/check-affiliateId', [
            'affiliateId' => $affiliateId
        ]);
        
        if ($responseGk->successful()) {
            $data = $responseGk->json();
            if (isset($data['user']) && ($data['user']['status'] == 2 || $data['user']['affiliate_status'] == 1)) {
                $isValid = true;
            }
        }
        
        if (!$isValid) {
            $responseUp = Http::withoutVerifying()->get('https://uparjok.com/api/check-affiliateId', [
                'affiliateId' => $affiliateId
            ]);
        
            if ($responseUp->successful()) {
                $data = $responseUp->json();
                if (isset($data['user']) && ($data['user']['status'] == 2 || $data['user']['affiliate_status'] == 1)) {
                    $isValid = true;
                }
            }
        }
        
        if ($isValid) {
            return response()->json(['message' => 'Invalid or inactive affiliate ID.'], 422);
        }



        $refferalCode = 'OHBD' . strtoupper(Str::random(rand(5, 6)));
        $affiliate = Affiliate::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'affiliate_member_id' => $request->affiliate_code,
            'password' => Hash::make($request->password),
            'profile_image' => $profile_image,
            'referral_code' => $refferalCode,
            'status' => 1
        ]);

        if ($affiliate) {
            $notification = array(
                'message' => 'Affiliate Registered Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('login.affiliate')->with($notification);
        }

    }

    public function loginAffiliate()
    {
        return view('FrontEnd.affiliate.login');
    }

    public function loginAffiliateSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Check if affiliate exists
        $affiliate = Affiliate::where('email', $request->email)->first();
        $isValid = false;

        if (!$affiliate) {
            $notification = [
                'message' => 'এই তথ্যের সাথে কোন একাউন্ট খুঁজে পাওয়া যায়নি।',
                'alert-type' => 'error'
            ];
            return redirect()->route('login.affiliate')->with($notification);
        }

        // Check if affiliate account is verified
        if ($affiliate->status == 0) {
            $notification = [
                'message' => 'আপনাকে আগে আপনার একাউন্ট ভেরিফাই করতে হবে।',
                'alert-type' => 'warning'
            ];
            return redirect()->route('login.affiliate')->with($notification);
        }

            $affiliateId = $affiliate->affiliate_member_id;
           $isValid = false;


            $responseGk = Http::withoutVerifying()->get('https://ghorkonnya.com/api/check-affiliateId', [
                'affiliateId' => $affiliateId
            ]);
 
            if ($responseGk->successful()) {
                $data = $responseGk->json();
                if (isset($data['user']) && $data['user']['status'] == 2) {
                    $isValid = true;
                }
            }

            if (!$isValid) {
                $responseUp = Http::withoutVerifying()->get('https://uparjok.com/api/check-affiliateId', [
                    'affiliateId' => $affiliateId
                ]);

                if ($responseUp->successful()) {
                    $data = $responseUp->json();
                    if (isset($data['user']) && $data['user']['status'] == 2) {
                        $isValid = true;
                    }
                }
            }

        if (!$isValid) {
            $notification = [
                'message' => 'অকার্যকর বা নিষ্ক্রিয় অ্যাফিলিয়েট আইডি।',
                'alert-type' => 'error'
            ];
            return redirect()->route('login.affiliate')->with($notification);
        }
        // Attempt login only if all checks passed
        if (Auth::guard('affiliate')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('affiliate.dashboard');
        } else {
            $notification = [
                'message' => 'ইমেইল অথবা পাসওয়ার্ড ভুল।',
                'alert-type' => 'error'
            ];
            return redirect()->route('login.affiliate')->with($notification);
        }
    }


    public function dashboard()
    {
        $affiliate = auth('affiliate')->user();
        $products = Product::where('status', 1)->where('is_affiliate', 1)->latest()->get();

        // Example dummy data, replace with real queries
        $totalReferrals = Order::where('affiliate_id', $affiliate->id)->where('payment_status', 1)->count();
        $totalCommissions = $affiliate->total_earning;
        $pendingReferrals = Order::where('affiliate_id', $affiliate->id)->where('payment_status', 0)->count();
        $totalEarnings = Order::where('affiliate_id', $affiliate->id)->where('payment_status', 1)->where('delivery_status', 4)->sum('affiliate_commission');

        return view('FrontEnd.affiliate.dashboard', compact('totalReferrals', 'totalCommissions', 'pendingReferrals','totalEarnings', 'products', 'affiliate'));
    }

    public function profile()
    {
        $affiliate = auth('affiliate')->user();
        return view('FrontEnd.affiliate.profile', compact('affiliate'));
    }

    public function profileEdit()
    {
        $affiliate = auth('affiliate')->user();
        return view('FrontEnd.affiliate.update-profile', compact('affiliate'));
    }

    public function profileUpdate(Request $request)
    {
        // Check incoming data
        //   dd($request->all());

        $request->validate([
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|numeric|digits:11',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:6',
            'confirm_password' => 'nullable|same:new_password'
        ], [
            'name.string' => 'নাম অবশ্যই অক্ষর হতে হবে।',
            'phone.numeric' => 'ফোন নম্বর অবশ্যই সংখ্যা হতে হবে।',
            'phone.digits' => 'ফোন নম্বর ১১ সংখ্যার হতে হবে।',
            'address.string' => 'ঠিকানা অবশ্যই অক্ষর হতে হবে।',
            'address.max' => 'ঠিকানার দৈর্ঘ্য সর্বোচ্চ ২৫৫ অক্ষর।',
            'avatar.image' => 'ফাইলটি একটি বৈধ ছবি হতে হবে।',
            'avatar.mimes' => 'ছবির ফরম্যাট: jpeg, png, jpg, gif, svg।',
            'new_password.min' => 'নতুন পাসওয়ার্ড কমপক্ষে ৬  অক্ষর।',
            'confirm_password.same' => 'নতুন পাসওয়ার্ড মিলছে না।',
        ]);


        $affiliate = auth('affiliate')->user();
        if (!$affiliate) {
            return back()->withErrors(['error' => 'User not authenticated']);
        }

        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $affiliate->password)) {
                return back()->withErrors(['current_password' => 'বর্তমান পাসওয়ার্ড সঠিক নয়।']);
            }
            $affiliate->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/avatars'), $filename);
            $affiliate->profile_image = 'uploads/avatars/' . $filename;
        }

        $affiliate->name = $request->name ?? $affiliate->name;
        $affiliate->phone = $request->phone ?? $affiliate->phone;
        $affiliate->address = $request->address ?? $affiliate->address;

        $saved = $affiliate->save();

        if (!$saved) {
            return back()->withErrors(['error' => 'Failed to save profile.']);
        }

        return redirect()->route('affiliate.profile')->with([
            'message' => 'আপনার প্রোফাইল আপডেট হয়েছে।',
            'alert-type' => 'success'
        ]);
    }



    public function orders()
    {
        $affiliate = auth('affiliate')->user();
        $orders = Order::where('affiliate_id', $affiliate->id)->latest()->get();
        return view('FrontEnd.affiliate.orders', compact('orders'));
    }


    public function orderDetails($id){
        $order = Order::find($id);
        return view('FrontEnd.affiliate.order-details', compact('order'));
    }

    public function logout()
    {
        Auth::guard('affiliate')->logout();
        return redirect()->route('page.affiliate');
    }

}
