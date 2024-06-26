@extends('layout')
@section('content')

<style>
    @media (max-width: 992px) {
    .body {
        width: unset;
        margin: 0 auto;
    }
}
</style>

<div class="post-slider">
    <div class="post-wrapper">
        <div class="post">
            <h1 style="position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%);" class="text-white mb-5">
                Dịch vụ chăm súc thú cưng tại PetStore

                <div class="row mt-5">
                    <div class="col-lg-4 col-md-4">
                        <div class="mainServices">
                            <i class="fa fa-paw"></i>
                            <div class="mainServices__content">
                                <h3>Chăm Sóc</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="mainServices">
                            <i class="fa fa-cutlery"></i>
                            <div class="mainServices__content">
                                <h3>Ăn Uống</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="mainServices">
                            <i class="fa fa-gavel"></i>
                            <div class="mainServices__content">
                                <h3>Đồ chơi & Phụ kiện</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </h1>
            <img src="{{ asset('frontend/img/banner_5-scaled.jpg')}}" alt="">
        </div>
    </div>

</div>



        <div class="d-flex justify-content-center align-items-center">
            <img class="banner-service" src="{{ asset('frontend/img/svbg.jpg')}}" alt="">

        </div>
    </div>
</div>
@endsection