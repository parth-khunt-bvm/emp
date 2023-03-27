 <!-- FOOTER START -->
 @php
    $logodetails = getdetails();
    $menuaccessList = menuaccessList();
    $menu = [];
    foreach ($menuaccessList as $key => $value) {
        array_push($menu,$value['menu']);
    }
@endphp
 <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-footer">
                <figure class="footer-logo">
                    <img src="{{ asset('public/upload/details/'.$logodetails[0]->logo) }}" alt="">
                </figure>
                <p style="text-align: justify">{{  $logodetails[0]->aboutus }}</p>
            </div>
            <div class="col-lg-4 col-footer">
                <h5>Get In Touch</h5>
                <p>{{  $logodetails[0]->address_line1 }},
                    {{  $logodetails[0]->address_line2 }}</p>
                <ul class="contact">
                    <li><a href="mailto:{{  $logodetails[0]->email }}">{{  $logodetails[0]->email }}</a></li>
                    <li><a href="tel:{{  $logodetails[0]->phoneno }}">+91 {{  $logodetails[0]->phoneno }}</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-footer">
                <h5>Quick Links</h5>
                <ul class="quick-links left-layer">
                    <li><a href="{{ route('home') }}">Home</a></li>

                    @if(in_array("About us",$menu))
                        <li><a href="{{ route('about-us') }}">About</a></li>
                    @endif

                    @if(in_array("Services",$menu))
                        <li><a href="{{ route('services') }}">Services</a></li>
                    @endif

                    @if(in_array("Portfolio",$menu))
                        <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    @endif

                </ul>
                <ul class="quick-links right-layer">

                    @if(in_array("FAQS",$menu))
                        <li><a href="{{ route('faqs') }}">FAQ</a></li>
                    @endif

                    @if(in_array("Contact us",$menu))
                        <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                    @endif

                    @if(in_array("Team",$menu))
                        <li><a href="{{ route('our-team') }}">Team</a></li>
                    @endif



                    @if(in_array("Blog",$menu))
                        <li><a href="{{ route('blog') }}">Blogs</a></li>
                    @endif

                </ul>
            </div>

        </div>
        <hr class="footer">
        <div class="bottom-footer">
            <div class="row">
                <div class="col-lg-6">
                    <p class="right">© 2020 Maxthon Technologies reserved.</p>
                </div>
                <div class="col-lg-6">
                    <ul class="footer-social">
                        @if($logodetails[0]->facebook)
                            <li><a href="{{ $logodetails[0]->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if($logodetails[0]->twitter)
                            <li><a href="{{ $logodetails[0]->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if($logodetails[0]->linkedin)
                            <li><a href="{{ $logodetails[0]->linkedin }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if($logodetails[0]->instagram)
                            <li><a href="{{ $logodetails[0]->instagram }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif
                        @if($logodetails[0]->github)
                            <li><a href="{{ $logodetails[0]->github }}" target="_blank"><i class="fab fa-github"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- FOOTER END -->
