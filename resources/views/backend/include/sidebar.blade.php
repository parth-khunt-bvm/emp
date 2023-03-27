<!--begin::Aside-->
@php

$currentRoute = Route::current()->getName();
$logodetails = getdetails();
@endphp
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand" style="background-color: white">
        <!--begin::Logo-->
        <a href="{{  route('admin-dashboard') }}" class="brand-logo">
            <img alt="Logo" src="{{ asset('public/upload/details/'.$logodetails[0]->logo) }}"
                style="width: 135px;height: 30px;" />
        </a>
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item {{ ( $currentRoute == 'admin-change-password' ||   $currentRoute == 'admin-dashboard' || $currentRoute == 'admin-my-profile' ? 'menu-item-active' : '' )  }}"
                    aria-haspopup="true">
                    <a href="{{  route('admin-dashboard') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                    <path
                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="menu-item menu-item-submenu {{ ( $currentRoute == 'admin-home-service-add' || $currentRoute == 'admin-home-service' || $currentRoute == 'admin-home-service-edit' ||
                    $currentRoute == 'admin-home-silder-add' || $currentRoute == 'admin-home-silder' || $currentRoute == 'admin-home-silder-edit'
                    || $currentRoute == 'admin-top-section' || $currentRoute == 'admin-banner-section' ||  $currentRoute == 'admin-section2'  ? 'menu-item-active menu-item-open' : '' )  }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group-chat.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8" />
                                    <polygon fill="#000000" points="23 8 12 20 1 8" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        </span>
                        <span class="menu-text">Home Page</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ ( $currentRoute == 'admin-home-silder-add' || $currentRoute == 'admin-home-silder' || $currentRoute == 'admin-home-silder-edit' ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-home-silder') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Silder Image</span>
                                </a>
                            </li>
                            <li class="menu-item {{ ( $currentRoute == 'admin-home-service-add' || $currentRoute == 'admin-home-service' || $currentRoute == 'admin-home-service-edit' ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-home-service') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Service</span>
                                </a>
                            </li>
                            <li class="menu-item {{ ( $currentRoute == 'admin-top-section'  ? 'menu-item-active' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{  route('admin-top-section') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Section 1</span>
                                </a>
                            </li>

                            <li class="menu-item {{ ( $currentRoute == 'admin-banner-section'  ? 'menu-item-active' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{  route('admin-banner-section') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Section 2  </span>
                                </a>
                            </li>

                            <li class="menu-item {{ ( $currentRoute == 'admin-section2'  ? 'menu-item-active' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{  route('admin-section2') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Section 3</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="menu-item {{ ( $currentRoute == 'admin-banner' || $currentRoute == 'admin-banner-add' || $currentRoute == 'admin-banner-edit'  ? 'menu-item-active' : '' )  }}"
                    aria-haspopup="true">
                    <a href="{{  route('admin-banner') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" fill="#000000"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Page Banners</span>
                    </a>
                </li>

                <li class="menu-item {{ ( $currentRoute == 'admin-menu-access'  ? 'menu-item-active' : '' )  }}"
                    aria-haspopup="true">
                    <a href="{{  route('admin-menu-access') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                    <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
                                    <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Menu Access Details</span>
                    </a>
                </li>



                <li class="menu-item menu-item-submenu {{ ( $currentRoute == 'admin-portfolio-category-add' || $currentRoute == 'admin-portfolio-category' || $currentRoute == 'admin-portfolio-category-edit' || $currentRoute == 'admin-portfolio-add' || $currentRoute == 'admin-portfolio' || $currentRoute == 'admin-portfolio-edit' ? 'menu-item-active menu-item-open' : '' )  }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group-chat.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        </span>
                        <span class="menu-text">
                            Portfolio Gallery
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ ( $currentRoute == 'admin-portfolio-category-add' || $currentRoute == 'admin-portfolio-category' || $currentRoute == 'admin-portfolio-category-edit' ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-portfolio-category') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Category</span>
                                </a>
                            </li>
                            <li class="menu-item {{ ( $currentRoute == 'admin-portfolio-add' || $currentRoute == 'admin-portfolio' || $currentRoute == 'admin-portfolio-edit' ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-portfolio') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Portfolio Details     </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-item {{ ( $currentRoute == 'site-details'  ? 'menu-item-active' : '' )  }}"
                    aria-haspopup="true">
                    <a href="{{  route('site-details') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                    <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
                                    <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Details</span>
                    </a>
                </li>

                <li class="menu-item menu-item-submenu {{ ( $currentRoute == 'admin-department-add' || $currentRoute == 'admin-career-details' || $currentRoute == 'admin-department-edit' || $currentRoute == 'admin-carrer-add' || $currentRoute == 'admin-carrer-list'|| $currentRoute == 'admin-carrer' || $currentRoute == 'admin-carrer-edit' ? 'menu-item-active menu-item-open' : '' )  }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group-chat.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        </span>
                        <span class="menu-text">
                            Carrer
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ ( $currentRoute == 'admin-career-details' ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-career-details') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Carrer Page Details</span>
                                </a>
                            </li>
                            <li class="menu-item {{ ( $currentRoute == 'admin-carrer-add' || $currentRoute == 'admin-carrer' || $currentRoute == 'admin-carrer-edit' ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-carrer') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Career</span>
                                </a>
                            </li>

                            <li class="menu-item {{ ( $currentRoute == 'admin-carrer-list'  ? 'menu-item-active' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-carrer-list') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Carrer Inquiry List</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu {{ ( $currentRoute == 'admin-contactus-details' || $currentRoute == 'admin-contactus-list'  ? 'menu-item-active menu-item-open' : '' )  }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group-chat.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                        fill="#000000" />
                                    <path
                                        d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        </span>
                        <span class="menu-text">Contact Us</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ ( $currentRoute == 'admin-contactus-details'  ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-contactus-details') }}" class="menu-link">

                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Details</span>
                                </a>
                            </li>

                            <li class="menu-item {{ ( $currentRoute == 'admin-contactus-list'  ? 'menu-item-active' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-contactus-list') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Request List</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="menu-item menu-item-submenu {{ ( $currentRoute == 'admin-aboutus-statistical' || $currentRoute == 'admin-aboutus-section-one' || $currentRoute == 'admin-aboutus-section-two'  ? 'menu-item-active menu-item-open' : '' )  }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group-chat.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                    <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
                                    <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        </span>
                        <span class="menu-text">About Us</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ ( $currentRoute == 'admin-aboutus-section-one'  ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-aboutus-section-one') }}" class="menu-link">

                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Section 1</span>
                                </a>
                            </li>

                            <li class="menu-item {{ ( $currentRoute == 'admin-aboutus-statistical'  ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-aboutus-statistical') }}" class="menu-link">

                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Statistical details</span>
                                </a>
                            </li>


                            <li class="menu-item {{ ( $currentRoute == 'admin-aboutus-section-two'  ? 'menu-item-active' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-aboutus-section-two') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Section 2</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-item {{ ( $currentRoute == 'admin-our-team' || $currentRoute == 'admin-our-team-add' || $currentRoute == 'admin-our-team-edit'  ? 'menu-item-active' : '' )  }}"
                    aria-haspopup="true">
                    <a href="{{  route('admin-our-team') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Our Team</span>
                    </a>
                </li>


                {{-- <li class="menu-item {{ ( $currentRoute == 'admin-our-clients-add' || $currentRoute == 'admin-our-clients' || $currentRoute == 'admin-our-clients-edit'  ? 'menu-item-active' : '' )  }}"
                    aria-haspopup="true">
                    <a href="{{  route('admin-our-clients') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Our Clients</span>
                    </a>
                </li> --}}

                <li class="menu-item menu-item-submenu {{ (  $currentRoute == 'admin-technologies' || $currentRoute == 'admin-technologies-add' || $currentRoute == 'admin-technologies-edit' || $currentRoute == 'admin-technologies-category' || $currentRoute == 'admin-technologies-category-add' || $currentRoute == 'admin-technologies-category-edit'  ? 'menu-item-active menu-item-open' : '' )  }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group-chat.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"
                                    fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    </span>
                    <span class="menu-text">
                        Technologies
                    </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ ( $currentRoute == 'admin-technologies-category' || $currentRoute == 'admin-technologies-category-add' || $currentRoute == 'admin-technologies-category-edit' ? 'menu-item-active ' : '' )  }}"
                            aria-haspopup="true">
                            <a href="{{ route('admin-technologies-category') }}" class="menu-link">
                                <span class="menu-text"><i class="far fa-hand-point-right"
                                        style="color: white"></i>&nbsp;&nbsp;Technologies Category</span>
                            </a>
                        </li>

                        <li class="menu-item {{ ( $currentRoute == 'admin-technologies' || $currentRoute == 'admin-technologies-add' || $currentRoute == 'admin-technologies-edit' ? 'menu-item-active ' : '' )  }}"
                            aria-haspopup="true">
                            <a href="{{ route('admin-technologies') }}" class="menu-link">
                                <span class="menu-text"><i class="far fa-hand-point-right"
                                        style="color: white"></i>&nbsp;&nbsp;Technology</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>



                <li class="menu-item {{ ( $currentRoute == 'admin-testimonials-add' || $currentRoute == 'admin-testimonials' || $currentRoute == 'admin-testimonials-edit'  ? 'menu-item-active' : '' )  }}"
                    aria-haspopup="true">
                    <a href="{{  route('admin-testimonials') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Layout/Layout-arrange.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                        fill="#000000"></path>
                                    <path
                                        d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                        fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Testimonials</span>
                    </a>
                </li>

                <li class="menu-item  {{ ( $currentRoute == 'admin-service-add' || $currentRoute == 'admin-service' || $currentRoute == 'admin-service-edit' ? 'menu-item-active ' : '' )  }}"
                    aria-haspopup="true">
                    <a href="{{  route('admin-service') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Layout/Layout-arrange.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                        fill="#000000"></path>
                                    <path
                                        d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                        fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Service</span>
                    </a>
                </li>
                <li class="menu-item {{ ( $currentRoute == 'admin-faqs' || $currentRoute == 'admin-faqs-add' || $currentRoute == 'admin-faqs-edit'  ? 'menu-item-active' : '' )  }}"
                    aria-haspopup="true">
                    <a href="{{  route('admin-faqs') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">FAQS</span>
                    </a>
                </li>

                <li class="menu-item menu-item-submenu {{ ( $currentRoute == 'admin-blog-category-add' || $currentRoute == 'admin-blog-category' || $currentRoute == 'admin-blog-category-edit' || $currentRoute == 'admin-blog-add' || $currentRoute == 'admin-blog' || $currentRoute == 'admin-blog-edit' ? 'menu-item-active menu-item-open' : '' )  }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group-chat.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        </span>
                        <span class="menu-text">
                          Blog
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ ( $currentRoute == 'admin-blog-category-add' || $currentRoute == 'admin-blog-category' || $currentRoute == 'admin-blog-category-edit' ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-blog-category') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Blog Category</span>
                                </a>
                            </li>
                            <li class="menu-item {{ ( $currentRoute == 'admin-blog-add' || $currentRoute == 'admin-blog' || $currentRoute == 'admin-blog-edit' ? 'menu-item-active ' : '' )  }}"
                                aria-haspopup="true">
                                <a href="{{ route('admin-blog') }}" class="menu-link">
                                    <span class="menu-text"><i class="far fa-hand-point-right"
                                            style="color: white"></i>&nbsp;&nbsp;Blog</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside-->
