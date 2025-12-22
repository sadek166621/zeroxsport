<?php

namespace App\Http\Controllers\Api;

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

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Affiliate user not found.',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'amount' => $user->total_earning,
            'project' => 'ONLINE HUT BD',
        ]);

    }
}
