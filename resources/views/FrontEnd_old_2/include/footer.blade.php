<footer class="footer">
    <div class="footer-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 width-25 mb-30">
            <h4 class="mb-30 color-gray-1000">Contact</h4>
            <div class="font-md mb-20 color-gray-900"><strong class="font-md-bold">Address:</strong>{{get_setting('business_name')->value}}</div>
            <div class="font-md mb-20 color-gray-900"><strong class="font-md-bold">Phone:</strong>{{ get_setting('phone')->value}}</div>
            <div class="font-md mb-20 color-gray-900"><strong class="font-md-bold">E-mail:</strong> {{ get_setting('email')->value }}</div>
            <div class="font-md mb-20 color-gray-900"><strong class="font-md-bold">Hours:</strong> {{  get_setting('business_hours')->value}}</div>
            <div class="mt-30"><a class="icon-socials icon-facebook" href="#"></a><a class="icon-socials icon-instagram" href="#"></a><a class="icon-socials icon-twitter" href="#"></a><a class="icon-socials icon-linkedin" href="#"></a></div>
          </div>
          <div class="col-lg-3 width-20 mb-30">
            <h4 class="mb-30 color-gray-1000">Make Money with Us</h4>
            <ul class="menu-footer">
              <li><a href="page-about-us.html">Mission &amp; Vision</a></li>
              <li><a href="page-about-us.html">Our Team</a></li>
              <li><a href="page-careers.html">Careers</a></li>
              <li><a href="#">Press &amp; Media</a></li>
              <li><a href="#">Advertising</a></li>
              <li><a href="#">Testimonials</a></li>
            </ul>
          </div>
          <div class="col-lg-3 width-16 mb-30">
            <h4 class="mb-30 color-gray-1000">Company</h4>
            <ul class="menu-footer">
              <li><a href="blog-2.html">Our Blog</a></li>
              <li><a href="#">Plans &amp; Pricing</a></li>
              <li><a href="#">Knowledge Base</a></li>
              <li><a href="#">Cookie Policy</a></li>
              <li><a href="#">Office Center</a></li>
              <li><a href="blog.html">News &amp; Events</a></li>
            </ul>
          </div>
          <div class="col-lg-3 width-16 mb-30">
            <h4 class="mb-30 color-gray-1000">My account</h4>
            <ul class="menu-footer">
              <li><a href="#">FAQs</a></li>
              <li><a href="#">Editor Help</a></li>
              <li><a href="#">Community</a></li>
              <li><a href="#">Live Chatting</a></li>
              <li><a href="page-contact.html">Contact Us</a></li>
              <li><a href="#">Support Center</a></li>
            </ul>
          </div>
          <div class="col-lg-3 width-23">
            <h4 class="mb-30 color-gray-1000">App &amp; Payment</h4>
            <div>
              <p class="font-md color-gray-900">Download our Apps and get extra 15% Discount on your first Order&mldr;!</p>
              <div class="mt-20"><a class="mr-10" href="#"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/appstore.png" alt="Ecom"></a><a href="#"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/google-play.png" alt="Ecom"></a></div>
              <p class="font-md color-gray-900 mt-20 mb-10">Secured Payment Gateways</p><img src="{{ asset('FrontEnd') }}/assets/imgs/template/payment-method.png" alt="Ecom">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="footer-bottom mt-20">
          <div class="row">
            <div class="col-lg-6 col-md-12 text-center text-lg-start"><span class="color-gray-900 font-sm">{{ get_setting('copy_right')->value }} | Developed By <a href="http.com/">ITBD</a></span></div>

          </div>
        </div>
      </div>

  </footer>

