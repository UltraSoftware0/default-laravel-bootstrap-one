

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
{{--            <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">--}}
            <span class="ms-1 font-weight-bold text-white">Default Boostrap</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @foreach(config('sidemenu') as $item)
                @if(array_key_exists('children',$item) && count($item['children']) > 0)
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{$item['title']}}</h6>
                    </li>
                    @foreach($item['children'] as $child)
                        <li class="nav-item">
                            <a class="nav-link text-white @if(request()->route()->getName() === $child['route'] ) active bg-gradient-info @endif" href="{{route($child['route'])}}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">{{$child['icon']}}</i>
                                </div>
                                <span class="nav-link-text ms-1">{{$child['title']}}</span>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white @if(request()->route()->getName() === $item['route'] ) active bg-gradient-info @endif" href="{{route($item['route'])}}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">{{$item['icon']}}</i>
                            </div>
                            <span class="nav-link-text ms-1">{{$item['title']}}</span>
                        </a>
                    </li>

                @endif

            @endforeach

{{--            <li class="nav-item mt-3">--}}
{{--                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link text-white " href="../pages/profile.html">--}}
{{--                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">--}}
{{--                        <i class="material-icons opacity-10">person</i>--}}
{{--                    </div>--}}
{{--                    <span class="nav-link-text ms-1">Profile</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link text-white " href="../pages/sign-in.html">--}}
{{--                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">--}}
{{--                        <i class="material-icons opacity-10">login</i>--}}
{{--                    </div>--}}
{{--                    <span class="nav-link-text ms-1">Sign In</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link text-white " href="../pages/sign-up.html">--}}
{{--                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">--}}
{{--                        <i class="material-icons opacity-10">assignment</i>--}}
{{--                    </div>--}}
{{--                    <span class="nav-link-text ms-1">Sign Up</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>

</aside>
