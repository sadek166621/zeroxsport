<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Terms & Conditions - Online Hut BD</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        .header {
            background: linear-gradient(135deg, #036243 0%, #024a33 100%);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.95;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .intro-box {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(3, 98, 67, 0.1);
            margin-bottom: 2rem;
            border-left: 5px solid #036243;
        }

        .intro-box p {
            font-size: 1.05rem;
            line-height: 1.8;
        }

        .section {
            background: white;
            margin-bottom: 2rem;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .section:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(3, 98, 67, 0.15);
        }

        .section-header {
            background: #036243;
            color: white;
            padding: 1.5rem 2rem;
            font-size: 1.4rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-content {
            padding: 2rem;
        }

        .section-content h3 {
            color: #036243;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .section-content h3:first-child {
            margin-top: 0;
        }

        .section-content p, .section-content li {
            margin-bottom: 0.75rem;
            line-height: 1.8;
        }

        .section-content ul {
            list-style: none;
            padding-left: 0;
        }

        .section-content ul li {
            padding-left: 1.75rem;
            position: relative;
        }

        .section-content ul li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #036243;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .warning-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1rem 1.5rem;
            margin: 1rem 0;
            border-radius: 4px;
        }

        .danger-box {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 1rem 1.5rem;
            margin: 1rem 0;
            border-radius: 4px;
        }

        .success-box {
            background: #d4edda;
            border-left: 4px solid #28a745;
            padding: 1rem 1.5rem;
            margin: 1rem 0;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background: #036243;
            color: white;
            font-weight: 600;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .metric-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .metric-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 1.5rem;
            border-radius: 8px;
            border-left: 4px solid #036243;
        }

        .metric-card h4 {
            color: #036243;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .final-note {
            background: linear-gradient(135deg, #036243 0%, #024a33 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: 12px;
            text-align: center;
            margin-top: 3rem;
            box-shadow: 0 8px 20px rgba(3, 98, 67, 0.3);
        }

        .final-note h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .final-note p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }

        .benefits {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .benefit-item {
            background: rgba(255,255,255,0.15);
            padding: 1rem 2rem;
            border-radius: 8px;
            backdrop-filter: blur(10px);
        }


        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8rem;
            }
            
            .section-header {
                font-size: 1.1rem;
                padding: 1rem 1.5rem;
            }
            
            .section-content {
                padding: 1.5rem;
            }

            .metric-grid {
                grid-template-columns: 1fr;
            }

            .benefits {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    @include('FrontEnd.include.header')

    <div class="header">
        <h1>Online Hut BD</h1>
        <p>Seller Policy & Compliance</p>
    </div>

    <div class="container">
        <div class="intro-box">
            <p>এই Seller Policy তৈরি করা হয়েছে Online Hut BD–এর মার্কেটপ্লেসকে বিশ্বাসযোগ্য, কাস্টমার–ফ্রেন্ডলি ও স্কেলেবল করার জন্য। প্রতিটি Seller এই নীতিমালা মেনে চলতে বাধ্য।</p>
        </div>

        <div class="section">
            <div class="section-header">
                1️⃣ Seller Eligibility & Required Documents
            </div>
            <div class="section-content">
                <p>প্রতিটি Seller–কে রেজিস্ট্রেশনের সময় নিচের তথ্য ও ডকুমেন্ট প্রদান করতে হবে:</p>
                <ul>
                    <li>জাতীয় পরিচয়পত্র (NID) – বাধ্যতামূলক</li>
                    <li>মোবাইল নম্বর (OTP verified)</li>
                    <li>ব্যাংক একাউন্ট তথ্য (Payout এর জন্য)</li>
                    <li>ট্রেড লাইসেন্স (ব্যবসায়িক Seller হলে)</li>
                    <li>Pickup Address (পূর্ণ ঠিকানা)</li>
                </ul>
                <div class="danger-box">
                    <strong>❌ ভুয়া বা ভুল তথ্য প্রদান করলে একাউন্ট স্থগিত করা হবে।</strong>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-header">
                2️⃣ Product Listing Policy
            </div>
            <div class="section-content">
                <p>Seller শুধুমাত্র নিম্নলিখিত শর্তে প্রডাক্ট আপলোড করতে পারবে:</p>
                <ul>
                    <li>প্রডাক্টের আসল ছবি (নিজস্ব বা supplier-provided)</li>
                    <li>সঠিক Title, Description ও Price</li>
                    <li>Stock available থাকতে হবে</li>
                    <li>Misleading / Clickbait তথ্য নিষিদ্ধ</li>
                </ul>
                
                <h3>❌ Restricted / Prohibited Products</h3>
                <ul>
                    <li>অবৈধ পণ্য</li>
                    <li>নকল বা কপিরাইট ভঙ্গকারী পণ্য</li>
                    <li>ব্যাটারি, লিকুইড, কেমিক্যাল (Admin অনুমতি ছাড়া)</li>
                    <li>মেডিসিন, অস্ত্র, অ্যালকোহল</li>
                </ul>
                
                <div class="warning-box">
                    <strong>Online Hut BD যেকোনো সময় প্রডাক্ট Remove করার অধিকার রাখে।</strong>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-header">
                3️⃣ Order Processing & SLA (Service Level Agreement)
            </div>
            <div class="section-content">
                <div class="metric-grid">
                    <div class="metric-card">
                        <h4>Order Accept</h4>
                        <p>সর্বোচ্চ 24 ঘন্টার মধ্যে</p>
                    </div>
                    <div class="metric-card">
                        <h4>Order Pack</h4>
                        <p>Accept করার পর 24 ঘন্টার মধ্যে</p>
                    </div>
                    <div class="metric-card">
                        <h4>Pickup Request</h4>
                        <p>Pack সম্পন্ন হওয়ার সাথে সাথে</p>
                    </div>
                </div>
                
                <h3>❗ SLA ভঙ্গ করলে:</h3>
                <ul>
                    <li>Warning</li>
                    <li>Penalty</li>
                    <li>Campaign Ban</li>
                    <li>Repeated হলে Account Suspend</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <div class="section-header">
                4️⃣ Courier & Delivery Policy
            </div>
            <div class="section-content">
                <ul>
                    <li>Seller শুধুমাত্র Online Hut BD অনুমোদিত Courier ব্যবহার করতে পারবে</li>
                    <li>নিজস্ব Courier ব্যবহার করা যাবে না</li>
                    <li>Tracking Number বাধ্যতামূলক</li>
                    <li>Tracking ছাড়া Order "Shipped" করা যাবে না</li>
                </ul>
                <div class="warning-box">
                    <strong>Courier Charge ও Rate Card Online Hut BD নির্ধারণ করবে।</strong>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-header">
                5️⃣ Return, Refund & RTO Policy
            </div>
            <div class="section-content">
                <h3>Return গ্রহণযোগ্য যখন:</h3>
                <ul>
                    <li>Wrong product delivered</li>
                    <li>Damaged product</li>
                    <li>Product not as described</li>
                </ul>

                <h3>RTO Responsibility:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>কারণ</th>
                            <th>দায়িত্ব</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Customer Reject</td>
                            <td>Seller</td>
                        </tr>
                        <tr>
                            <td>Wrong / Defective Product</td>
                            <td>Seller</td>
                        </tr>
                        <tr>
                            <td>Courier Damage</td>
                            <td>Courier</td>
                        </tr>
                    </tbody>
                </table>

                <div class="warning-box">
                    <strong>Return/Refund এর ক্ষেত্রে Seller সহযোগিতা করতে বাধ্য।</strong>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-header">
                6️⃣ Commission & Payment Policy
            </div>
            <div class="section-content">
                <ul>
                    <li>Commission Category-wise নির্ধারিত</li>
                    <li>Courier charge Seller থেকে কাটা হবে</li>
                    <li>RTO penalty প্রযোজ্য হতে পারে</li>
                </ul>

                <h3>Payment Cycle:</h3>
                <ul>
                    <li>COD Orders: 7–14 Working Days</li>
                    <li>Bank Transfer only</li>
                    <li>Invoice & Statement Dashboard থেকে ডাউনলোডযোগ্য</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <div class="section-header">
                7️⃣ Seller Rating & Performance
            </div>
            <div class="section-content">
                <h3>Seller Performance মাপা হবে:</h3>
                <ul>
                    <li>On-time shipment</li>
                    <li>Cancellation rate</li>
                    <li>RTO percentage</li>
                    <li>Customer rating</li>
                </ul>

                <h3>Low performance হলে:</h3>
                <div class="danger-box">
                    <ul style="margin-bottom: 0;">
                        <li>Visibility কমে যাবে</li>
                        <li>Campaign access বন্ধ হবে</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-header">
                8️⃣ Policy Violation & Penalty
            </div>
            <div class="section-content">
                <p>নিম্নলিখিত ক্ষেত্রে কঠোর ব্যবস্থা নেওয়া হবে:</p>
                <ul>
                    <li>Fake product / Brand copy</li>
                    <li>Order cancel after accept</li>
                    <li>Customer harassment</li>
                    <li>Repeated SLA miss</li>
                </ul>
                
                <div class="danger-box">
                    <strong>Penalty → Temporary Hold → Permanent Ban (severity অনুযায়ী)</strong>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-header">
                9️⃣ Policy Update & Acceptance
            </div>
            <div class="section-content">
                <ul>
                    <li>Online Hut BD যেকোনো সময় এই Policy update করার অধিকার রাখে।</li>
                    <li>Seller Dashboard–এ Policy Acceptance বাধ্যতামূলক।</li>
                </ul>
            </div>
        </div>

        <div class="final-note">
            <h2>✅ Final Note</h2>
            <p>Online Hut BD–তে Seller হওয়া মানে শুধুমাত্র বিক্রি নয়, Customer Trust রক্ষা করার দায়িত্ব নেওয়া।</p>
            <p><strong>Policy মেনে চললে—</strong></p>
            <div class="benefits">
                <div class="benefit-item">✔ বেশি Sales</div>
                <div class="benefit-item">✔ বেশি Visibility</div>
                <div class="benefit-item">✔ দীর্ঘমেয়াদি ব্যবসা</div>
            </div>
        </div>
    </div>

    @include('FrontEnd.include.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>