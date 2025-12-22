<!DOCTYPE html>
<html>
<head><title>Test Ref</title></head>
<body>
    <h1>Test Affiliate Referral</h1>

    @if(session('affiliate_ref'))
        <p style="color: green;">Referral Code: {{ session('affiliate_ref') }}</p>
    @else
        <p style="color: red;">No referral code found.</p>
    @endif
</body>
</html>
