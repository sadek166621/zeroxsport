<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AffiliateController extends Controller
{
    public function getOnlineHutAmount(Request $request)
    {
        $affiliateId = $request->affiliateId;

        if (!$affiliateId) {
            return response()->json([
                'success' => false,
                'message' => 'Affiliate ID is required.',
                'data' => null
            ], 422);
        }

        $user = Affiliate::where('affiliate_member_id', $affiliateId)->first();
        $affiliate=Affiliate::where('affiliate_member_id', $affiliateId)->first();

         $amount=Order::where('affiliate_id', $affiliate->id)->where('payment_status', 1)->where('delivery_status', 4)->sum('affiliate_commission');
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Affiliate user not found.',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'amount' => $amount,
            'project' => 'ONLINE HUT BD',
        ]);

    }
}
