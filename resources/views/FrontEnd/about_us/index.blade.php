@extends('FrontEnd.master')
@section('title')
About Us
@endsection
@section('content')

<style>
    .about-section {
        max-width: 1000px;
        margin: 0 auto;
        padding: 50px 20px;
    }

    .page-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .page-title h1 {
        font-size: 2.5rem;
        color: #006A4E;
        margin-bottom: 10px;
    }

    .page-title p {
        font-size: 1.1rem;
        color: #666;
    }

    .content-section {
        background: white;
        padding: 40px;
        margin-bottom: 30px;
        border-left: 4px solid #006A4E;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .content-section h2 {
        font-size: 1.8rem;
        color: #006A4E;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f0f0f0;
    }

    .content-section p {
        font-size: 1rem;
        color: #555;
        line-height: 1.8;
        margin-bottom: 15px;
        text-align: justify;
    }

    .content-section ul {
        margin: 15px 0;
        padding-left: 30px;
    }

    .content-section ul li {
        font-size: 1rem;
        color: #555;
        margin-bottom: 10px;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .page-title h1 {
            font-size: 2rem;
        }

        .content-section {
            padding: 25px;
        }

        .content-section h2 {
            font-size: 1.5rem;
        }

        .content-section p,
        .content-section ul li {
            font-size: 0.95rem;
        }
    }
</style>

<div class="about-section">
    <!-- Page Title -->
    <div class="page-title">
        <h1>About Us</h1>
        <p>Learn more about who we are and what we stand for</p>
    </div>

    <!-- Who We Are -->
    <div class="content-section">
        <h2>Who We Are</h2>
        <p>Welcome to our online store, your trusted destination for quality products and exceptional service. We are a dedicated team of professionals passionate about bringing you the finest selection of products at competitive prices. Since our establishment, we have been committed to creating a seamless shopping experience that prioritizes customer satisfaction above all else.</p>
        <p>Our journey began with a simple vision: to make online shopping easy, reliable, and enjoyable for everyone. Today, we serve thousands of satisfied customers across the region, and we continue to grow by staying true to our core values of integrity, quality, and customer care.</p>
    </div>

    <!-- Mission -->
    <div class="content-section">
        <h2>Our Mission</h2>
        <p>Our mission is to provide our customers with an outstanding shopping experience by offering high-quality products, competitive pricing, and excellent customer service. We strive to be more than just an online store – we aim to be your trusted partner in finding exactly what you need, when you need it.</p>
        <p>We are committed to continuously improving our services, expanding our product range, and leveraging technology to make your shopping journey as smooth and enjoyable as possible. Customer satisfaction is at the heart of everything we do, and we work tirelessly to exceed your expectations with every order.</p>
    </div>

    <!-- What We Offer -->
    <div class="content-section">
        <h2>What We Offer</h2>
        <p>We pride ourselves on offering a comprehensive selection of products carefully curated to meet your diverse needs. Our catalog includes:</p>
        <ul>
            <li>High-quality products from trusted brands and manufacturers</li>
            <li>Competitive prices with regular discounts and special offers</li>
            <li>Fast and reliable shipping to your doorstep</li>
            <li>Secure payment options for your peace of mind</li>
            <li>Easy returns and exchange policy</li>
            <li>Responsive customer support available to assist you</li>
            <li>Detailed product descriptions and customer reviews</li>
            <li>Regular updates on new arrivals and trending products</li>
        </ul>
    </div>

    <!-- Our Commitment to Quality -->
    <div class="content-section">
        <h2>Our Commitment to Quality</h2>
        <p>Quality is not just a promise – it's our guarantee. We understand that when you shop with us, you're placing your trust in our ability to deliver products that meet the highest standards. That's why we have implemented rigorous quality control measures at every step of our process.</p>
        <p>Every product in our inventory is carefully selected and inspected before it reaches you. We partner only with reputable suppliers and brands that share our commitment to excellence. Our team continuously monitors product quality, customer feedback, and industry standards to ensure that we maintain the level of quality you deserve.</p>
        <p>Beyond product quality, we are also committed to providing quality service. From the moment you browse our website to the delivery of your purchase, we ensure that every interaction reflects our dedication to your satisfaction. Our customer service team is trained to handle your queries promptly and professionally, making your shopping experience as pleasant as possible.</p>
    </div>
</div>
@endsection