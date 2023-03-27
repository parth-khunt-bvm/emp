@php
$currentRoute = Route::current()->getName();

$logodetails = getdetails();

$menuaccessList = menuaccessList();
$menu = [];
foreach ($menuaccessList as $key => $value) {
    array_push($menu,$value['menu']);
}
@endphp
<!-- TOP HEADER START -->
<div class="top-header-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="top-contact text-left">
                    <li class="phone"><span class="tel-no"><a href="tel:{{ $logodetails[0]->phoneno }}">+91 {{ $logodetails[0]->phoneno }}</a></span>
                    </li>
                    <li class="email"><a href="mailto:{{ $logodetails[0]->email }}">{{ $logodetails[0]->email }}</a></li>
                </ul>
            </div>
            <div class="col-md-6 text-right">
                <div class="top-social">
                    <ul class="social-list">
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

                        <li class="m-0"><a class="btn quote-btn" href="{{ route('contact-us') }}" role="button">GET A
                                QUOTE</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TOP HEADER END -->

<!-- NAV START -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand"><img src="{{ asset('public/upload/details/'.$logodetails[0]->logo) }}" alt=""></a>

        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="menu-icon-bar"></span>
            <span class="menu-icon-bar"></span>
            <span class="menu-icon-bar"></span>
        </button>

        <div id="main-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li><a href="{{ route('home') }}" class="nav-item nav-link last-link-item {{ ( $currentRoute == 'home'  ? 'my-select-menu' : '' )  }} ">Home</a></li>

                @if(in_array("Services",$menu))
                    <li><a href="{{ route('services') }}" class="nav-item nav-link last-link-item {{ ( $currentRoute == 'services' || $currentRoute == 'service-details'  ? 'my-select-menu' : '' )  }}">Services</a></li>
                @endif

                @if(in_array("Portfolio",$menu))
                    <li><a href="{{ route('portfolio') }}" class="nav-item nav-link last-link-item {{ ( $currentRoute == 'portfolio'  ? 'my-select-menu' : '' )  }}">Portfolio</a></li>
                @endif

                @if(in_array("Blog",$menu))
                    <li><a href="{{ route('blog') }}" class="nav-item nav-link last-link-item {{ ( $currentRoute == 'blog' || $currentRoute == 'blogs' || $currentRoute == 'blogdetail' ? 'my-select-menu' : '' )  }}">Blog</a></li>
                @endif



                @if(in_array("About us",$menu))
                    <li><a href="{{ route('about-us') }}" class="nav-item nav-link last-link-item {{ ( $currentRoute == 'about-us'  ? 'my-select-menu' : '' )  }}">About us</a></li>
                @endif

                @if(in_array("Career",$menu))
                    <li><a href="{{ route('career') }}" class="nav-item nav-link last-link-item {{ ( $currentRoute == 'career'  || $currentRoute == 'careerdetail' ? 'my-select-menu' : '' )  }}">Career</a></li>
                @endif

                @if(in_array("Contact us",$menu))
                    <li><a href="{{ route('contact-us') }}" class="nav-item nav-link last-link-item {{ ( $currentRoute == 'contact-us'  ? 'my-select-menu' : '' )  }}">Contact us</a></li>
                @endif

            </ul>
        </div>
    </div>
</nav>
<!-- NAV END -->
