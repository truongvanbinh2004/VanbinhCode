<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý cửa hàng thú cưng</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/img/logo.jpg')}}"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('frontend/css/bsgrid.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />

    <style>
        .footer__map-container {
            position: relative;
            width: 300px;
            height: 300px;
            border: none;
            overflow: hidden;
            margin: 0 auto;
        }
        .footer__info-content {
            flex: 1;
            padding: 10px;
        }
        .footer__info {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="navbar">
            <div class="navbar__left">
                <a href="{{ URL::to('/')}}" class="navbar__logo">
                    <img src="{{ asset('frontend/img/logo.jpg') }}" alt="">
                </a>
                <div class="navbar__menu">
                    <i id="bars" class="fa fa-bars" aria-hidden="true"></i>
                    <ul>
                        <li><a href="{{ URL::to('/')}}">Trang chủ</a></li>
                        <li><a href="{{ URL::to('/congiong')}}">Con giống</a></li>
                        <li><a href="{{ URL::to('/services')}}">Dịch vụ</a></li>
                        <li><a href="{{ URL::to('/donhang')}}">Đơn hàng</a></li>
                        <li><a href="{{ URL::to('/contact') }}">Liên Hệ</a></li> 
                    </ul>
                </div>
            </div>
            <div class="navbar__center">
                <form action="{{route('search')}}" method="GET" class="navbar__search">
                    <input type="text" value="" placeholder="Nhập để tìm kiếm..." name="tukhoa" class="search" required>
                    <i class="fa fa-search" id="searchBtn"></i>
                </form>
            </div>
            <div class="navbar__right">
                @if (Auth::check())
                <span class="mr-2">{{Auth::user()->hoten}}</span>
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
@method('DELETE')
                        <button style="border: none;" type="submit"><i class="fas fa-sign-out-alt text-primary"></i></button>
                    </form>
                </div>
                @else
                    <div class="login">
                        <a href="{{ URL::to('login')}}"><i class="fa fa-user"></i> </a>
                    </div>
                @endif
                <a href="{{ route('cart') }}" class="navbar__shoppingCart">
                    <img src="{{ asset('frontend/img/shopping-cart.svg')}}" style="width: 24px;" alt="">
                    @if (session('cart'))
                        <span>{{ count((array) session('cart')) }}</span>
                    @else
                        <span>0</span>
                    @endif
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    @yield('content')

    <div class="go-to-top"><i class="fas fa-chevron-up"></i></div>

    <footer>
        <div class="footer">
            <div class="footer__title">
                <span>Liên hệ</span>
                <div class="footer__social">
                    <a href="https://m.me/datyeuems1" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                </div>
            </div>
        </div>
        
        <div class="footer__info">
        <div class="beta-map">
            <div class="abs-fullwidth beta-map wow flipInX" style="position: relative; overflow: hidden; width: 300px; height: 300px; margin: 0 auto;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1139.8913587857562!2d108.24316574802995!3d16.059145789209605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142177f2ced6d8b%3A0xe282c779264f7088!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIE5naOG7gSDEkMOgIE7hurVuZw!5e0!3m2!1svi!2s!4v1718189728177!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

            <div class="footer__info-content">
                <h3>Giới thiệu</h3>
                <p>Website quản lý, mua bán thú cưng</p>
            </div>
            <div class="footer__info-content">
                <h3>Liên hệ</h3>
                <p>Địa chỉ: 99 Tô Hiến Thành</p>
                <p>Email: abc@gmail.com</p>
                <p>Sđt: 0123456789</p>
            </div>
        </div>

        <div class="footer__copyright">
            <center> 2024 All rights reserved.</center>
        </div>
    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        //Slider using Slick
        $(document).ready(function () {
            $('.post-wrapper').slick({
                slidesToScroll: 1,
                autoplay: true,
                arrow: true,
                dots: true,
                autoplaySpeed: 5000,
                prevArrow: $('.prev'),
nextArrow: $('.next'),
                appendDots: $(".dot"),
            });
        });

        // Slick mutiple carousel
        $('.post-wrapper2').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: $('.prev2'),
            nextArrow: $('.next2'),
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    
    <script src="{{ asset('frontend/script/script.js') }}"></script>
</body>
</html>