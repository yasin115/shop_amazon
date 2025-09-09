@extends('customer.layouts.master-one-col')


@section('head-tag')
<title>{{ $product->name }}</title>
<style>
    .color-list {
    display: flex;
    gap: 10px; /* فاصله بین رنگ‌ها */
    flex-wrap: wrap;
}

.product-info-colors {
    width: 40px;
    height: 40px;
    cursor: pointer;
    border: 2px solid #ddd;
    transition: border-color 0.3s;
}

.product-info-colors:hover {
    border-color: #333;
}

.product-info-colors:checked {
    border-color: #000;
}
.quantity-control {
    display: flex;
    align-items: center;
}

.quantity-input {
    width: 60px;
    text-align: center;
    margin: 0 10px;
}

.btn {
    border: 1px solid #ccc;
    background-color: #f8f8f8;
    padding: 10px;
    font-size: 18px;
    cursor: pointer;
}

.btn:hover {
    background-color: #e2e2e2;
}

.btn-decrease, .btn-increase {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-decrease i, .btn-increase i {
    font-size: 20px;
}

</style>
@endsection


@section('content')


 <!--single-product------------------------->
 <div class="col-12">
    <div class="product-page">
        <article class="js-product">
            <div class="product-nav-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb px-0">
                        <li class="breadcrumb-item"><a href="#">فروشگاه اینترنتی دیجی استور</a></li>
                        <li class="breadcrumb-item"><a href="#">کالای دیجیتال</a></li>
                        <li class="breadcrumb-item"><a href="#">موبایل</a></li>
                        <li class="breadcrumb-item active" aria-current="page">گوشی موبایل</li>
                    </ol>
                </nav>
                <div class="product-ext-links">
                    <a href="#" class="product-ext-link">کالای خود را در دیجی‌استور بفروشید <i
                            class="mdi mdi-storefront"></i></a>
                </div>
            </div>

            
            <div class="col-lg-4 col-md-12 col-xs-12 pull-right">
                <div class="product-gallery">
                    @php
                    $imageGalley = $product->images()->get();
                    $images = collect();
                    $images->push($product->image);
                    foreach ($imageGalley as $image) {
                        $images->push($image->image);
                    }

                @endphp


<div class="container">
    <div class="row">
        <!-- تصویر اصلی محصول -->
        <div class="col-md-12 mb-4">
            <img src="{{ asset($images->first()['indexArray']['medium']) }}" alt="" class="zoom-img img-fluid" id="img-product-zoom"
                 data-zoom-image="{{ asset($images->first()['indexArray']['medium']) }}" alt="img-slider">
        </div>

        <!-- گالری تصاویر -->
        <div class="col-md-12">
            <div class="d-flex overflow-auto" style="max-height: 150px;">
                @foreach ($images as $key => $image)
                    <div class="flex-shrink-0 me-2" style="width: 100px;">
                        <img class="product-gallery-thumb img-thumbnail w-100 cursor-pointer" 
                             src="{{ asset($image['indexArray']['medium']) }}" 
                             alt="{{ asset($image['indexArray']['medium']) . '-' . ($key + 1) }}" 
                             data-input="{{ asset($image['indexArray']['medium']) }}"
                             onclick="changeMainImage('{{ asset($image['indexArray']['medium']) }}')">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


                    <div class="gallery-item">
                        <ul class="gallery-options">
                            <li class="option-wishes">
                                <button class="btn-option btn-option-wishes">
                                    <i class="mdi mdi-heart-outline"></i>
                                    <span class="tooltip-short">افزودن به علاقه‌مندی</span>
                                </button>
                            </li>
                            <li class="option-social">
                                <button class="btn-option btn-option-social" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    <i class="mdi mdi-share-outline"></i>
                                    <span class="tooltip-short">اشتراک گذاری</span>
                                </button>
                            </li>
                            <li class="option-alarm">
                                <button class="btn-option btn-option-alarm" data-toggle="modal"
                                    data-target="#exampleModalCenteralarm">
                                    <i class="mdi mdi-bell-outline"></i>
                                    <span class="tooltip-short">اطلاع‌رسانی</span>
                                </button>
                            </li>
                            <li class="option-alarm">
                                <a href="product-comparison.html" class="btn-option btn-option-comparison">
                                    <i class="mdi mdi-compare"></i>
                                    <span class="tooltip-short">مقایسه</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modal social-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">اشتراک گذاری در شبکه های اجتماعی
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="form-share-row">
                            <div class="form-share-col">
                                <ul class="btn-group-share">
                                    <li>
                                        <a href="#" class="btn-share btn-share-twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-share btn-share-facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-share btn-share-whatsapp">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-share-title">ارسال به ایمیل</div>
                        <form for="#" class="send-to-email">
                            <div class="form-share-row">
                                <div class="form-share-col">
                                    <input name="email" class="input-send-to-email" type="email"
                                        placeholder="آدرس ایمیل را وارد نمایید.">
                                </div>
                            </div>
                            <div class="form-share-row">
                                <div class="form-share-col">
                                    <div class="btn-send-email">ارسال</div>
                                </div>
                            </div>
                        </form>
                        <div class="form-share-row">
                            <div class="form-share-col">
                                <input class="ui-url-field" type="url"
                                    value="https://www.digikala.com/product/dkp-1672478" readonly="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal social-->
            <!-- Modal alarm -->
            <div class="modal fade" id="exampleModalCenteralarm" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                به من اطلاع بده
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" class="form-notification">
                                <div class="form-notification-title">اطلاع به من در زمان:</div>
                                <div class="form-notification-row">
                                    <div class="form-notification-col">
                                        <div class="form-notification-status">
                                            پیشنهاد شگفت‌انگیز
                                        </div>
                                    </div>
                                </div>
                                <div class="form-notification-title">از طریق:</div>
                                <div class="form-notification-row">
                                    <div class="form-notification-col">
                                        <ul class="form-notification-params">
                                            <li>
                                                <div class="form-auth-row">
                                                    <label class="ui-checkbox">
                                                        <input type="checkbox" value="1" name="login"
                                                            id="remember1">
                                                        <span class="ui-checkbox-check"></span>
                                                    </label>
                                                    <label for="remember1" class="remember-me">ایمیل به
                                                        <span class="js-observed-user-email">09911234567</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-auth-row">
                                                    <label class="ui-checkbox">
                                                        <input type="checkbox" value="1" name="login"
                                                            id="remember2">
                                                        <span class="ui-checkbox-check"></span>
                                                    </label>
                                                    <label for="remember2" class="remember-me">پیامک به
                                                        <span class="js-observed-user-email">09911234567</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-auth-row">
                                                    <label class="ui-checkbox">
                                                        <input type="checkbox" value="1" name="login"
                                                            id="remember3">
                                                        <span class="ui-checkbox-check"></span>
                                                    </label>
                                                    <label for="remember3" class="remember-me">سیستم پیام شخصی
                                                        دیجی‌کالا </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer d-block text-right">
                            <button type="button" class="btn btn-primary ml-2">ثبت</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بازگشت</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal alarm -->
            <div class="col-lg-8 col-md-12 col-xs-12 pull-left px-0">
                <section class="product-info">
                    <div class="product-headline">
                        <div class="product-title-container">
                            <h2 class="content-header-title">
                                <span>{{ $product->name }}</span>
                            </h2>
                        </div>
                    </div>
                    <div class="product-attributes">
                        <div class="col-lg-8 col-md-8 col-xs-12 pull-right pr-0">
                            <div class="product-config">
                                <span class="product-title-en">{{ $product->introduction }}</span>
                                <div class="product-engagement">
                                    <div class="product-engagement-item">
                                        <div class="product-engagement-rating">۳.۷
                                            <span class="product-engagement-rating-num">
                                                (۳)
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-engagement-item">
                                        <div class="product-engagement-set"></div>
                                        <div class="product-engagement-link" data-activate-tab="comments">
                                            ۸۱
                                            دیدگاه کاربران
                                        </div>
                                    </div>
                                    <div class="product-engagement-item">
                                        <div class="product-engagement-set"></div>
                                        <div class="product-engagement-link" data-activate-tab="questions">
                                            ۱۴
                                            پرسش و پاسخ
                                        </div>
                                    </div>
                                </div>

                               {{-- sales section --}}
<div class="row">
    <div class="col-lg-8 col-md-8 col-xs-12">
        <div class="product-config-wrapper">
            <div class="product-variants">
                <form id="add_to_cart" action="{{ route('customer.sales-process.add-to-cart', ['product' => $product->slug]) }}" method="post">
                    @csrf
                    @php
                        $colors = $product->colors()->get();
                        $guarantees = $product->guarantees()->get();
                        $amazingSale = $product->activeAmazingSales(); // بررسی تخفیف فعال
                    @endphp

                    {{-- نمایش رنگ‌ها --}}
                    @if($colors->count() > 0)
                        <ul class="color-list d-flex list-unstyled">
                            @foreach ($colors as $key => $color)
                                <li class="js-c-ui-variant me-2">
                                    <label for="color_{{ $color->id }}" 
                                           style="background-color: {{ $color->color ?? '#ffffff' }};" 
                                           class="product-info-colors rounded-circle d-inline-block" 
                                           data-bs-toggle="tooltip" 
                                           data-bs-placement="bottom" 
                                           title="{{ $color->color_name }}">
                                    </label>
                                    <input class="d-none color-input" type="radio" name="color" 
                                           id="color_{{ $color->id }}" 
                                           value="{{ $color->id }}" 
                                           data-color-name="{{ $color->color_name }}" 
                                           data-color-price="{{ $color->price_increase }}" 
                                           @if($key == 0) checked @endif>
                                </li>
                            @endforeach
                        </ul>
                        <p><span>رنگ انتخاب شده : <span id="selected_color_name">{{ $colors->first()->color_name }}</span></span></p>
                    @endif
                    
                    {{-- نمایش گارانتی‌ها --}}
                    @if($guarantees->count() > 0)
                        <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> گارانتی :
                            <select name="guarantee" id="guarantee" class="p-1">
                                @foreach ($guarantees as $key => $guarantee)
                                    <option value="{{ $guarantee->id }}" 
                                            data-guarantee-price="{{ $guarantee->price_increase }}" 
                                            @if($key == 0) selected @endif>
                                        {{ $guarantee->name }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                    @endif

                    {{-- موجودی کالا --}}
                    <p>
                        @if($product->marketable_number > 0)
                            <i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span>
                        @else
                            <i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا ناموجود</span>
                        @endif
                    </p>

                    <div class="d-flex align-items-center">
                        {{-- دکمه علاقه مندی --}}
                        <section class="product-add-to-favorite position-relative" style="top: 0">
                            <button type="button" class="btn btn-light btn-sm text-decoration-none" data-url="{{ route('customer.market.add-to-favorite', $product) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="اضافه به علاقه مندی">
                                <i class="fa fa-heart"></i>
                            </button>
                        </section>
                    
                        {{-- فاصله بین دکمه علاقه مندی و تعداد محصول --}}
                        <section class="ms-4">
                            {{-- تعداد محصول --}}
                            <section class="cart-product-number d-inline-flex align-items-center">
                                <!-- دکمه کاهش تعداد -->
                                <button class="btn btn-outline-primary cart-number cart-number-down" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <!-- ورودی تعداد محصول -->
                                <input type="number" id="number" name="number" min="1" max="5" step="1" value="1" class="form-control cart-number-input d-inline-block w-auto text-center">
                                <!-- دکمه افزایش تعداد -->
                                <button class="btn btn-outline-primary cart-number cart-number-up" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </section>
                        </section>
                    </div>

                    {{-- پیام و اطلاعات خرید --}}
                    <p class="mb-3 mt-5">
                        <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد. پس از ثبت سفارش کالا بر اساس نحوه ارسال که شما انتخاب کرده اید کالا برای شما در مدت زمان مذکور ارسال می گردد.
                    </p>
                    {{-- دکمه افزودن به سبد خرید --}}
                    <form action="{{route('customer.sales-process.add-to-cart',$product->slug)}}" method="post"></form>
                    <button type="submit" class="btn-add-to-cart">
                        <span class="btn-add-to-cart-txt">افزودن به سبد خرید</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

   
                                    {{-- اطلاعات فروشنده --}}
                                    <div class="col-lg-4 col-md-4 col-xs-12 pull-left sticky-sidebar" style="padding:0">
                                        <div class="product-seller-info">
                                            <div class="js-seller-info-changable">
                                                <div class="product-seller-row">
                                                    <div class="product-seller-first-line d-inline-block">فروشنده:</div>
                                                    <a href="#" class="js-seller-count-row">
                                                        <span class="js-seller-count u-text-bold">۲</span>
                                                        <span class="u-text-bold"> فروشنده</span>
                                                        دیگر
                                                    </a>
                                                </div>
                                                <div class="product-seller-row product-seller-row-guarantee">
                                                    <div class="js-guarantee-text">گارانتی ۱۸ ماهه دیجی استور
                                                        <i class="mdi mdi-check"></i>
                                                    </div>
                                                </div>
                                                <div class="product-seller-row js-seller-info-shipment">
                                                    <div class="js-guarantee-text">
                                                        موجود در انبار فروشنده
                                                        <i class="mdi mdi-content-save-outline"></i>
                                                    </div>
                                                    <div class="product-delivery-warehouse">آماده ارسال</div>
                                                </div>
                                
                                                {{-- تخفیف کالا --}}
                                                @if($amazingSale)
                                                    @php
                                                        $endDate = \Carbon\Carbon::parse($amazingSale->end_date);
                                                        $remainingDays = intval($endDate->diffInDays(\Carbon\Carbon::now()));
                                                    @endphp
                                                    <div class="product-seller-row js-seller-info-shipment">
                                                        <div class="js-guarantee-text">
                                                            <p class="text-muted">تخفیف کالا</p>
                                                            <p class="text-danger fw-bolder" id="product-discount-price" 
                                                               data-product-discount-price="{{ ($product->price * ($amazingSale->percentage / 100) ) }}">
                                                               {{ priceFormat($product->price * ($amazingSale->percentage / 100)) }} <span class="small">تومان</span>
                                                            </p>
                                                            <p class="text-warning">تخفیف به پایان خواهد رسید در {{ $remainingDays }} روز</p>
                                                        </div>
                                                    </div>
                                                @else
                                                    <p class="text-danger fw-bolder" id="product-discount-price">تخفیف ندارد</p>
                                                @endif
                                
                                                {{-- قیمت فروشنده --}}
                                                <div class="product-seller-row">
                                                    <div class="product-seller-row-price">
                                                        <div class="product-seller-price-label">
                                                            قیمت فروشنده
                                                        </div>
                                                        <div class="product-seller-price-real">
                                                            <div class="product-seller-price-prev">
                                                                <p class="text-danger fw-bolder" id="product-price">
                                                                    {{ priceFormat($product->price) }} <span class="small">تومان</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-remaining-in-stock-parent">
                                                        <div class="cart-view-count">
                                                            <i class="mdi mdi-eye-outline"></i>
                                                            ۱۰+
                                                            نفر در حال بازدید این کالا می‌باشند.
                                                        </div>
                                                    </div>
                                                    <form method="post" action="{{route('customer.sales-process.add-to-cart',$product)}}" class="btn-add-to-cart" >
                                                        @csrf
                                                        <button class="btn-add-to-cart-txt" type="submit">افزودن به سبد خرید</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                    <div class="product-feature-body">
                        <div class="product-feature">
                            <div class="row">
                                <div class="product-feature-col">
                                    <a href="#" class="product-feature-item">
                                        <img src="assets/images/footer-svg/delivery.svg" alt="delivery">
                                        <span>امکان تحویل
                                            <br>
                                            اکسپرس
                                        </span>
                                    </a>
                                </div>

                                <div class="product-feature-col">
                                    <a href="#" class="product-feature-item">
                                        <img src="assets/images/footer-svg/contact-us.svg" alt="contact-us"
                                            style="width:35px;">
                                        <span>۷ روز هفته
                                            <br>
                                            ۲۴ ساعته
                                        </span>
                                    </a>
                                </div>

                                <div class="product-feature-col">
                                    <a href="#" class="product-feature-item">
                                        <img src="assets/images/footer-svg/payment-terms.svg" alt="payment-terms"
                                            style="width:35px;">
                                        <span>امکان
                                            <br>
                                            پرداخت در محل
                                        </span>
                                    </a>
                                </div>

                                <div class="product-feature-col">
                                    <a href="#" class="product-feature-item">
                                        <img src="assets/images/footer-svg/origin-guarantee.svg"
                                            alt="origin-guarantee" style="width:35px;">
                                        <span>ضمانت
                                            <br>
                                            اصل بودن کالا
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </article>

        <div class="box-suppliers">
            <div class="box-suppliers-headline-container">
                <div class="headline-delivery">
                    <span>لیست فروشندگان این کالا</span>
                </div>
                <a href="#" class="link-border" style="float:left;">کالای خود را در دیجی‌استور بفروشید</a>
            </div>
            <div class="table-suppliers">
                <div class="table-suppliers-body">
                    <div class="table-suppliers-row table-suppliers-row-active">
                        <div class="table-suppliers-cell table-suppliers-cell-title">
                            <div class="seller-wrapper">
                                <p class="table-suppliers-seller-name">
                                    <span><a href="#">دیجی‌استور</a></span>
                                </p>
                                <div class="table-suppliers-rating">
                                    <div class="product-seller-second-line">
                                        عملکرد:
                                        <span class="u-text-bold">۵</span>
                                        از ۵
                                        <span class="u-divider"></span>
                                        <span class="u-text-bold">۸۳٪</span>
                                        رضایت از کالا
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-no-lead-time">
                            <div class="seller-wrapper">
                                <p>آماده ارسال</p>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-guarantee">
                            <div class="seller-wrapper">
                                <span>گارانتی ۱۸ ماهه دیجی استور</span>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-price">
                            <div class="seller-wrapper">
                                <div class="price-secondary">
                                    <div class="price-value">
                                        ۳,۲۱۵,۰۰۰
                                        <span class="price-currency">تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-action">
                            <div class="seller-wrapper">
                                <a href="#" class="js-btn-add-to-cart">افزودن به سبد</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-suppliers-row">
                        <div class="table-suppliers-cell table-suppliers-cell-title">
                            <div class="seller-wrapper">
                                <p class="table-suppliers-seller-name">
                                    <span><a href="#">دیجی‌استور</a></span>
                                </p>
                                <div class="table-suppliers-rating">
                                    <div class="product-seller-second-line">
                                        عملکرد:
                                        <span class="u-text-bold">۵</span>
                                        از ۵
                                        <span class="u-divider"></span>
                                        <span class="u-text-bold">۸۳٪</span>
                                        رضایت از کالا
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-no-lead-time">
                            <div class="seller-wrapper">
                                <p>آماده ارسال</p>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-guarantee">
                            <div class="seller-wrapper">
                                <span>گارانتی ۱۸ ماهه دیجی استور</span>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-price">
                            <div class="seller-wrapper">
                                <div class="price-secondary">
                                    <div class="price-value">
                                        ۳,۲۱۵,۰۰۰
                                        <span class="price-currency">تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-action">
                            <div class="seller-wrapper">
                                <a href="#" class="js-btn-add-to-cart">افزودن به سبد</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-suppliers-row in-filter in-list">
                        <div class="table-suppliers-cell table-suppliers-cell-title">
                            <div class="seller-wrapper">
                                <p class="table-suppliers-seller-name">
                                    <span><a href="#">دیجی‌استور</a></span>
                                </p>
                                <div class="table-suppliers-rating">
                                    <div class="product-seller-second-line">
                                        عملکرد:
                                        <span class="u-text-bold">۵</span>
                                        از ۵
                                        <span class="u-divider"></span>
                                        <span class="u-text-bold">۸۳٪</span>
                                        رضایت از کالا
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-no-lead-time">
                            <div class="seller-wrapper">
                                <p>آماده ارسال</p>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-guarantee">
                            <div class="seller-wrapper">
                                <span>گارانتی ۱۸ ماهه دیجی استور</span>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-price">
                            <div class="seller-wrapper">
                                <div class="price-secondary">
                                    <div class="price-value">
                                        ۳,۲۱۵,۰۰۰
                                        <span class="price-currency">تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-action">
                            <div class="seller-wrapper">
                                <a href="#" class="js-btn-add-to-cart">افزودن به سبد</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-suppliers-row in-filter in-list">
                        <div class="table-suppliers-cell table-suppliers-cell-title">
                            <div class="seller-wrapper">
                                <p class="table-suppliers-seller-name">
                                    <span><a href="#">دیجی‌استور</a></span>
                                </p>
                                <div class="table-suppliers-rating">
                                    <div class="product-seller-second-line">
                                        عملکرد:
                                        <span class="u-text-bold">۵</span>
                                        از ۵
                                        <span class="u-divider"></span>
                                        <span class="u-text-bold">۸۳٪</span>
                                        رضایت از کالا
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-no-lead-time">
                            <div class="seller-wrapper">
                                <p>آماده ارسال</p>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-guarantee">
                            <div class="seller-wrapper">
                                <span>گارانتی ۱۸ ماهه دیجی استور</span>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-price">
                            <div class="seller-wrapper">
                                <div class="price-secondary">
                                    <div class="price-value">
                                        ۳,۲۱۵,۰۰۰
                                        <span class="price-currency">تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-suppliers-cell table-suppliers-cell-action">
                            <div class="seller-wrapper">
                                <a href="#" class="js-btn-add-to-cart">افزودن به سبد</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-suppliers-more">
                        <a href="#" class="link-border">مشاهده
                            <span class="show-more more-suppliers-count">( فروشنــــده / گارانتی بیشتـــــر)
                            </span>
                            <span class="show-less">کمتر</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-xs-12 pull-right p-0">
            <div class="row">
                <div class="col-12">
                    <div class="widget widget-product card">
                        <header class="card-header">
                            <span class="title-one">محصولات مرتبط</span>
                        </header>
                        <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2281px;">
                                    <div class="owl-item active" style="width: 315.75px; margin-left: 10px;">
                                        <div class="item">
                                            <a href="#">
                                                <img src="assets/images/product-slider-2/111460776.jpg"
                                                    class="img-fluid" alt="img-slider">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="#">
                                                    گوشی موبایل سامسونگ مدل Galaxy A50 SM-A505F/DS دو ...
                                                </a>
                                            </h2>
                                            <div class="price">
                                                <del><span>۴,۵۳۰,۰۰۰<span>تومان</span></span></del>
                                                <ins><span>۳,۳۹۵,۰۰۰<span>تومان</span></span></ins>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 315.75px; margin-left: 10px;">
                                        <div class="item">
                                            <a href="#">
                                                <img src="assets/images/product-slider-2/111474228.jpg"
                                                    class="img-fluid" alt="img-slider">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="#">
                                                    گوشی موبایل سامسونگ مدل Galaxy A10 SM-A105F/DS دو ...
                                                </a>
                                            </h2>
                                            <div class="price">
                                                <del><span>۴,۵۳۰,۰۰۰<span>تومان</span></span></del>
                                                <ins><span>۳,۳۹۵,۰۰۰<span>تومان</span></span></ins>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 315.75px; margin-left: 10px;">
                                        <div class="item">
                                            <a href="#">
                                                <img src="assets/images/product-slider-2/112145268.jpg"
                                                    class="img-fluid" alt="img-slider">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="#">
                                                    گوشی موبایل سامسونگ مدل Galaxy A70 SM-A705FN/DS دو...
                                                </a>
                                            </h2>
                                            <div class="price">
                                                <del><span>۴,۵۳۰,۰۰۰<span>تومان</span></span></del>
                                                <ins><span>۳,۳۹۵,۰۰۰<span>تومان</span></span></ins>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 315.75px; margin-left: 10px;">
                                        <div class="item">
                                            <a href="#">
                                                <img src="assets/images/product-slider-2/111475300.jpg"
                                                    class="img-fluid" alt="img-slider">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="#">
                                                    گوشی موبایل سامسونگ مدل Galaxy A30 SM-A305F/DS دو ...
                                                </a>
                                            </h2>
                                            <div class="price">
                                                <del><span>۴,۵۳۰,۰۰۰<span>تومان</span></span></del>
                                                <ins><span>۳,۳۹۵,۰۰۰<span>تومان</span></span></ins>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 315.75px; margin-left: 10px;">
                                        <div class="item">
                                            <a href="#">
                                                <img src="assets/images/product-slider-2/113542184.jpg"
                                                    class="img-fluid" alt="img-slider">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="#">
                                                    گوشی موبایل اپل مدل iPhone 11 Pro Max A2218 دو سیم...
                                                </a>
                                            </h2>
                                            <div class="price">
                                                <del><span>۴,۵۳۰,۰۰۰<span>تومان</span></span></del>
                                                <ins><span>۳,۳۹۵,۰۰۰<span>تومان</span></span></ins>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 315.75px; margin-left: 10px;">
                                        <div class="item">
                                            <a href="#">
                                                <img src="assets/images/product-slider-2/111469793.jpg"
                                                    class="img-fluid" alt="img-slider">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="#">
                                                    گوشی موبایل سامسونگ مدل Galaxy A20 SM-A205F/DS دو ...
                                                </a>
                                            </h2>
                                            <div class="price">
                                                <del><span>۴,۵۳۰,۰۰۰<span>تومان</span></span></del>
                                                <ins><span>۳,۳۹۵,۰۰۰<span>تومان</span></span></ins>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 315.75px; margin-left: 10px;">
                                        <div class="item">
                                            <a href="#">
                                                <img src="assets/images/product-slider-2/111472656.jpg"
                                                    class="img-fluid" alt="img-slider">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="#">
                                                    گوشی موبایل سامسونگ مدل Samsung Galaxy S10 Plus SM...
                                                </a>
                                            </h2>
                                            <div class="price">
                                                <del><span>۴,۵۳۰,۰۰۰<span>تومان</span></span></del>
                                                <ins><span>۳,۳۹۵,۰۰۰<span>تومان</span></span></ins>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-tabs">
            <div class="col-lg-9 col-md-12 col-xs-12 pull-right p-0 res-w">
                <div class="box-tabs-main">
                    <ul class="box-tabs">
                        <li class="box-tabs-tab active-tabs">
                            <a href="#"> نقد و بررسی</a>
                        </li>
                        <li class="box-tabs-tab">
                            <a href="#"> مشخصات</a>
                        </li>
                        <li class="box-tabs-tab">
                            <a href="#">نظرات کاربران</a>
                        </li>
                        <li class="box-tabs-tab">
                            <a href="#">پرسش و پاسخ</a>
                        </li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="tab-active-content">
                        <div class="tab content-expert" style="display:block;">
                            <article>
                                <h2 class="params-headline">
                                    نقد و بررسی اجمالی
                                    <span>Xiaomi Redmi Note 10 M2101K7AG Dual SIM 128GB And 6GB RAM Mobile
                                        Phone</span>
                                </h2>
                                <section class="content-expert-summary">
                                    <div class="is-masked">
                                        <div class="mask-text-product-summary">
                                            <p>
                                                گوشی موبایل شیائومی مدل Redmi Note 10 دو سیم‌ کارت ظرفیت 128
                                                گیگابایت با
                                                بدون فناوری NFC وارد بازار شده است. شیائومی در مارس 2021، نسل دهم از
                                                گوشی‌های Redmi Note خود را معرفی کرده است. گوشی « Redmi Note 10»
                                                مانند
                                                نسخه‌های قبلی این سری از گوشی‌های شیائومی از صفحه‌نمایش بزرگ، باتری
                                                پرقدرت، طراحی جذاب دوربین و سخت‌افزار مناسب برای اجرای بازی برخوردار
                                                است. هم با پنل IPS LCD ساخته‌شده و فاصله لبه صفحه‌نمایش در آن بسیار
                                                کم
                                                است. این نمایشگر 4.43 اینچی حدود 409 پیکسل را در هر اینچ جا داده
                                                است.
                                                بدنه و نمایشگر این محصول با استفاده از Corning Gorilla Glass 3
                                                محافظت
                                                می‌شود تا گوشی در برابر خط ‌وخش ایمن باشد. ویژگی دیگر Redmi Note 10
                                                مجهز
                                                شدن به حسگر اثرانگشت بر روی لبه کناری آن است. شیائومی برای این محصول
                                                خود
                                                از یک دوربین چهارگانه استفاده کرده است. لنزعریض 48 مگاپیکسلی، لنز
                                                فوق
                                                عریض 8 مگاپیکسلی، لنز ماکرو با کیفیت 2 مگاپیکسل و سنسور عمق 2
                                                مگاپیکسلی
                                                مجموعه دوربین Redmi Note 10 را تشکیل می‌دهد. یک دوربین سلفی 13
                                                مگاپیکسلی
                                                هم در مرکز بالای نمایشگر این گوشی به کار گرفته شده است. ازنظر
                                                سخت‌افزاری
                                                هم این گوشی از تراشه Snapdragon 678 بهره می‌برد که در آن پردازنده‌ای
                                                هشت‌هسته‌ا‌ی و قدرتمند قرارگرفته است. حافظه رم با ظرفیت 6 گیگابایت
                                                هم در
                                                کنار این مجموعه قرار گرفته است تا بتواند علاوه‌بر کارهای معمول، از
                                                قابلیت‌های جدید گوشی‌های امروزی پشتیبانی کند. باتری 5000
                                                میلی‌آمپرساعتی
                                                با پشتیبانی از شارژ سریع 33 وات، درگاه ارتباطی USB Type-C 2.0 و جک
                                                3.5
                                                میلی‌متری صدا هم از دیگر مشخصات این محصول جدید است.
                                            </p>
                                        </div>
                                        <a href="#" class="mask-handler">
                                            <span class="show-more">ادامه مطلب</span>
                                            <span class="show-less">بستن</span>
                                        </a>
                                        <div class="shadow-box"></div>
                                    </div>
                                </section>
                            </article>
                            <section class="content-expert-stats row">
                                <div class="col-8 pull-right">
                                    <div class="content-expert-stats-left">
                                        <div class="content-expert-evaluation">
                                            <div class="col-lg-5 col-md-5 col-xs-12 pull-right" style="padding:0;">
                                                <div class="content-expert-evaluation-positive">
                                                    <span>نقاط قوت</span>
                                                    <ul>
                                                        <li>صفحه نمایش AMOLED </li>
                                                        <li>طراحی چشم‎نواز قاب پشتی</li>
                                                        <li>عملکرد مطلوب تراشه Exynos 9610 </li>
                                                        <li>طول عمر بالای باتری</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-xs-12 pull-right" style="padding:0;">
                                                <div class="content-expert-evaluation-negative">
                                                    <span>نقاط ضعف</span>
                                                    <ul>
                                                        <li>مقاوم نبودن در برابر آب</li>
                                                        <li>عملکرد نه چندان خوب دوربین در شب</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="tab params" style="display:none;">
                            <article>
                                <h2 class="params-headline">
                                    مشخصات فنی
                                    <span>Xiaomi Redmi Note 10 M2101K7AG Dual SIM 128GB And 6GB RAM Mobile
                                        Phone</span>
                                </h2>
                                <section>
                                    <h3 class="params-title">مشخصات کلی</h3>
                                    <ul class="params-list">
                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">ابعاد</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">7.7 × 74.7 × 158.5 میلی‌متر</span>
                                                </div>
                                            </div>

                                        </li>
                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">توضیحات سیم کارت</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">سایز نانو (8.8 × 12.3 میلی‌متر)</span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">وزن</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">166 گرم</span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">ساختار بدنه</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">قاب جلو شیشه</span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>

                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block" style="background:#fff;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">قاب پشت پلاستیک</span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">ویژگی‌های خاص</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">مناسب عکاسی , فبلت , مجهز به حس‌گر اثرانگشت
                                                        ,
                                                        مناسب عکاسی سلفی </span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">تعداد سیم کارت</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">دو سیم کارت </span>
                                                </div>
                                            </div>

                                        </li>

                                    </ul>
                                </section>
                                <section>
                                    <h3 class="params-title">پردازنده</h3>
                                    <ul class="params-list">
                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">تراشه</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">Exynos 9610 (10nm) CPU</span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <div class="js-dk-wiki-trigger">
                                                        <a href="#" class="link-border">پردازنده‌ی مرکزی</a>
                                                        <div class="wiki-container">
                                                            <p class="c-wiki__text">
                                                                سی‌پی‌یو (به انگلیسی Central Processing Unit یا CPU)
                                                                یا
                                                                پردازنده (به انگلیسی Processor)، یکی از اجزاء رایانه
                                                                می‌باشد که فرامین و اطلاعات را مورد پردازش قرار
                                                                می‌دهد.
                                                                واحدهای پردازش مرکزی ویژگی پایه‌ای قابل برنامه‌ریزی
                                                                شدن
                                                                را در رایانه‌های رقمی فراهم می‌کنند، و یکی از
                                                                مهم‌ترین
                                                                اجزا رایانه‌ها هستند. یک پردازنده مرکزی، مداری
                                                                یکپارچه
                                                                می‌باشد که معمولا به عنوان ریزپردازنده شناخته
                                                                می‌شود.
                                                                امروزه عبارت CPU معمولا برای ریزپردازنده‌ها به کار
                                                                می‌رود. مدت زمان انجام یک کار به وسیله رایانه، به
                                                                عوامل
                                                                متعددی بستگی دارد که اولین آن‌ها، سرعت پردازشگر
                                                                رایانه
                                                                است. پردازشگر یک تراشه الکترونیکی کوچک در قلب
                                                                کامپیوتر
                                                                است و سرعت آن بر حسب مگاهرتز یا گیگاهرتز سنجیده
                                                                می‌شود.
                                                                هر چه مقدار این پارامتر بیشتر باشد، پردازشگر سریع‌تر
                                                                خواهد بود و در نتیجه قادر خواهد بود، محاسبات بیشتری
                                                                را
                                                                در هر ثانیه انجام دهد. در اصطلاح عامیانه CPU به
                                                                عنوان
                                                                مغز رایانه شناخته می‌شود.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">7.7 × 74.7 × 158.5 میلی‌متر</span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">نوع پردازنده</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">64 بیت </span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">فرکانس پردازنده‌ی مرکزی</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">2.3 و 1.7 گیگاهرتز</span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="js-dk-wiki-trigger">
                                                        <a href="#" class="link-border">پردازنده‌ی گرافیکی</a>
                                                        <div class="wiki-container">
                                                            <p class="c-wiki__text">
                                                                پردازشگر گرافیکی (به انگلیسی Graphics Processing
                                                                Unit)‏
                                                                که با نام GPU نیز شناخته می‌شود، یک مدار الکتریکی
                                                                پیشرفته است که تصاویر خروجی را برای نمایشگر تولید
                                                                می‌کند. اکثر پردازشگرهای گرافیکی، توابع مختلفی مانند
                                                                شتاب دهنده‌ی رندر صحنه‌های سه‌بعدی و دوبعدی، رمز
                                                                گشایی
                                                                کردن MPEG-2/MPEG-4، خروجی تلویزیون و حتی قابلیت
                                                                اتصال
                                                                چند مانیتور را ارائه می‌کنند.
                                                            </p>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">Mali-G72 MP3 GPU</span>
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                </section>
                                <section>
                                    <h3 class="params-title">حافظه</h3>
                                    <ul class="params-list">

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">حافظه داخلی</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">128 گیگابایت </span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">مقدار RAM</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">4 گیگابایت</span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">پشتیبانی از کارت حافظه جانبی</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">microSD</span>
                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right" style="padding:0;">
                                                <div class="params-list-key">
                                                    <span class="block">حداکثر ظرفیت کارت حافظه</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left" style="padding:0;">
                                                <div class="params-list-value">
                                                    <span class="block">1 ترابایت</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </section>
                            </article>
                        </div>
                        <div class="tab comments" style="display:none;">
                            <h2 class="comments-headline">امتیاز کاربران به:
                                <span>
                                    <span>Xiaomi Redmi Note 10 M2101K7AG Dual SIM 128GB And 6GB RAM Mobile
                                        Phone</span>
                                </span>
                            </h2>
                            <div class="comments-summary">
                                <div class="col-lg-3 col-md-3 col-xs-12 pull-right sticky-sidebar">
                                    <div class="comments-summary-box">
                                        <div class="comments-side-rating-container">
                                            <div class="comments-side-rating">
                                                <div class="comments-side-rating-main">۳.۷</div>
                                                <div class="comments-side-rating-desc">از ۵</div>
                                            </div>
                                            <div class="comments-side-rating-bottom">
                                                <div class="product-star mb-3">
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="comments-side-rating-all">
                                                    از مجموع ۸۳ امتیاز
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="comments-item-rating">
                                            <li>
                                                <div class="cell">کیفیت ساخت:</div>
                                                <div class="cell-2">
                                                    <div class="rating rating-general js-rating">
                                                        <div class="rating-rate"></div>
                                                    </div>
                                                    <span class="rating-overall-word">۳.۷</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">ارزش خرید به نسبت قیمت:</div>
                                                <div class="cell-2">
                                                    <div class="rating rating-general js-rating">
                                                        <div class="rating-rate"></div>
                                                    </div>
                                                    <span class="rating-overall-word">۳.۷</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">نوآوری:</div>
                                                <div class="cell-2">
                                                    <div class="rating rating-general js-rating">
                                                        <div class="rating-rate"></div>
                                                    </div>
                                                    <span class="rating-overall-word">۳.۷</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">امکانات و قابلیت ها:</div>
                                                <div class="cell-2">
                                                    <div class="rating rating-general js-rating">
                                                        <div class="rating-rate"></div>
                                                    </div>
                                                    <span class="rating-overall-word">۳.۷</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">سهولت استفاده:</div>
                                                <div class="cell-2">
                                                    <div class="rating rating-general js-rating">
                                                        <div class="rating-rate"></div>
                                                    </div>
                                                    <span class="rating-overall-word">۳.۷</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">طراحی و ظاهر:</div>
                                                <div class="cell-2">
                                                    <div class="rating rating-general js-rating">
                                                        <div class="rating-rate"></div>
                                                    </div>
                                                    <span class="rating-overall-word">۳.۷</span>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="comments-summary-note">
                                        <span>دیدگاه خود را درباره این کالا بیان کنید</span>
                                        <div class="parent-btn">
                                            <button class="dk-btn dk-btn-info">
                                                افزودن نظر جدید
                                                <i class="fa fa-comments sign-in"></i>
                                            </button>
                                        </div>
                                        <div class="comments-dc-touch">
                                            <div class="comments-dc-touch-title">۵ امتیاز دیجی‌کلاب</div>
                                            <div class="comments-dc-touch-desc">با بیان دیدگاه برای این کالا دریافت
                                                کنید</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-12 pull-left">
                                    <div class="comments-filter">
                                        <div class="filter-item-main">
                                            <ul class="filter-items nav nav-tabs" id="myTab" role="tablist">
                                                <li>
                                                    <span class="sort-row-text"><i class="mdi mdi-sort"></i>
                                                        مرتب‌سازی
                                                        دیدگاه‌ها بر اساس:</span>
                                                </li>
                                                <li class="filter-items-active nav-item">
                                                    <a class="nav-link active" id="Buyerscomments-tab"
                                                        data-toggle="tab" href="#Buyerscomments" role="tab"
                                                        aria-controls="Buyerscomments" aria-selected="true">نظر
                                                        خریداران</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="Usefulcomments-tab" data-toggle="tab"
                                                        href="#Usefulcomments" role="tab"
                                                        aria-controls="Usefulcomments" aria-selected="true">مفیدترین
                                                        نظرات</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="Newscomments-tab" data-toggle="tab"
                                                        href="#Newscomments" role="tab" aria-controls="Newscomments"
                                                        aria-selected="true">جدیدترین نظرات</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="product-comment-list">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Buyerscomments"
                                                role="tabpanel" aria-labelledby="Buyerscomments-tab">
                                                <ul class="comments-list">
                                                    <li>
                                                        <section>
                                                            <div class="col-lg-4 col-md-5 col-xs-12 pull-right">
                                                                <div class="aside">
                                                                    <div class="message-light">
                                                                        <span class="mdi mdi-cart"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                    <ul class="comments-user-shopping">
                                                                        <li>
                                                                            <div class="cell">رنگ خریداری شده:</div>
                                                                            <div class="color-cell">
                                                                                <span
                                                                                    class="shopping-color-value"></span>آبی
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">خریداری شده از:</div>
                                                                            <div class="color-cell">
                                                                                <span class="mdi mdi-home"></span>
                                                                                <a href="#" class="link-border">دی
                                                                                    جی لند
                                                                                    پلاس</a>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">قیمت خرید:</div>
                                                                            <div class="bought-price">۴,۳۷۵,۰۰۰تومان
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">تاریخ خرید:</div>
                                                                            <div class="bought-price">بیش از سه ماه
                                                                                پیش
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="message-light opinion-positive">
                                                                        <span class="fa fa-thumbs-o-up"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-xs-12 pull-left">
                                                                <div class="article">
                                                                    <div class="header">
                                                                        <div>
                                                                            ارسال رم 4 بجای رم 6
                                                                            <span>توسط حسن شجاعی در تاریخ ۱۳ خرداد
                                                                                ۱۳۹۸</span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        از دیجیکالا خواهش میکنم زمان ثبت مشخصات، دقت
                                                                        لازم رو
                                                                        داشته
                                                                        باشند...<br>
                                                                        این گوشی، گوشی بسیار خوبی هست، اما من زمانی
                                                                        که توی
                                                                        مشخصات
                                                                        نوشته
                                                                        بود رم 6 هست، خریدمش! اما پس از ارسال، رمش 4
                                                                        بود که
                                                                        از پست
                                                                        تحویل
                                                                        نگرفتم و مرجوعش کردم! هزینه ش فقط زمانی بود
                                                                        که از
                                                                        دست رفت!
                                                                        وقتی
                                                                        میتونستم داخل شهر رم 4ش رو با قیمتی بسیار
                                                                        کمتر
                                                                        بخرم!<br>
                                                                        انشالله سری بعد در ثبت مشخصات کالا دقت لازم
                                                                        بکار
                                                                        گرفته
                                                                        شود...
                                                                    </p>
                                                                    <div class="footer">
                                                                        <div class="comment-like-container">آیا این
                                                                            نظر
                                                                            برایتان مفید
                                                                            بود؟
                                                                            <button class="btn-like"
                                                                                data-counter="۱,۵۲۸">بله</button>
                                                                            <button class="btn-like"
                                                                                data-counter="۷۹">خیر</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <section>
                                                            <div class="col-lg-4 col-md-5 col-xs-12 pull-right">
                                                                <div class="aside">
                                                                    <div class="message-light">
                                                                        <span class="mdi mdi-cart"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                    <ul class="comments-user-shopping">
                                                                        <li>
                                                                            <div class="cell">رنگ خریداری شده:</div>
                                                                            <div class="color-cell">
                                                                                <span
                                                                                    class="shopping-color-value"></span>آبی
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">خریداری شده از:</div>
                                                                            <div class="color-cell">
                                                                                <span class="mdi mdi-home"></span>
                                                                                <a href="#" class="link-border">دی
                                                                                    جی لند
                                                                                    پلاس</a>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">قیمت خرید:</div>
                                                                            <div class="bought-price">۴,۳۷۵,۰۰۰تومان
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">تاریخ خرید:</div>
                                                                            <div class="bought-price">بیش از سه ماه
                                                                                پیش
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="message-light opinion-positive">
                                                                        <span class="fa fa-thumbs-o-up"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-xs-12 pull-left">
                                                                <div class="article">
                                                                    <div class="header">
                                                                        <div>
                                                                            ارسال رم 4 بجای رم 6
                                                                            <span>توسط حسن شجاعی در تاریخ ۱۳ خرداد
                                                                                ۱۳۹۸</span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        از دیجیکالا خواهش میکنم زمان ثبت مشخصات، دقت
                                                                        لازم رو
                                                                        داشته
                                                                        باشند...<br>
                                                                        این گوشی، گوشی بسیار خوبی هست، اما من زمانی
                                                                        که توی
                                                                        مشخصات
                                                                        نوشته
                                                                        بود رم 6 هست، خریدمش! اما پس از ارسال، رمش 4
                                                                        بود که
                                                                        از پست
                                                                        تحویل
                                                                        نگرفتم و مرجوعش کردم! هزینه ش فقط زمانی بود
                                                                        که از
                                                                        دست رفت!
                                                                        وقتی
                                                                        میتونستم داخل شهر رم 4ش رو با قیمتی بسیار
                                                                        کمتر
                                                                        بخرم!<br>
                                                                        انشالله سری بعد در ثبت مشخصات کالا دقت لازم
                                                                        بکار
                                                                        گرفته
                                                                        شود...
                                                                    </p>
                                                                    <div class="footer">
                                                                        <div class="comment-like-container">آیا این
                                                                            نظر
                                                                            برایتان مفید
                                                                            بود؟
                                                                            <button class="btn-like"
                                                                                data-counter="۱,۵۲۸">بله</button>
                                                                            <button class="btn-like"
                                                                                data-counter="۷۹">خیر</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <section>
                                                            <div class="col-lg-4 col-md-5 col-xs-12 pull-right">
                                                                <div class="aside">
                                                                    <div class="message-light">
                                                                        <span class="mdi mdi-cart"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                    <ul class="comments-user-shopping">
                                                                        <li>
                                                                            <div class="cell">رنگ خریداری شده:</div>
                                                                            <div class="color-cell">
                                                                                <span
                                                                                    class="shopping-color-value"></span>آبی
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">خریداری شده از:</div>
                                                                            <div class="color-cell">
                                                                                <span class="mdi mdi-home"></span>
                                                                                <a href="#" class="link-border">دی
                                                                                    جی لند
                                                                                    پلاس</a>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">قیمت خرید:</div>
                                                                            <div class="bought-price">۴,۳۷۵,۰۰۰تومان
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">تاریخ خرید:</div>
                                                                            <div class="bought-price">بیش از سه ماه
                                                                                پیش
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="message-light opinion-positive">
                                                                        <span class="fa fa-thumbs-o-up"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-xs-12 pull-left">
                                                                <div class="article">
                                                                    <div class="header">
                                                                        <div>
                                                                            ارسال رم 4 بجای رم 6
                                                                            <span>توسط حسن شجاعی در تاریخ ۱۳ خرداد
                                                                                ۱۳۹۸</span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        از دیجیکالا خواهش میکنم زمان ثبت مشخصات، دقت
                                                                        لازم رو
                                                                        داشته
                                                                        باشند...<br>
                                                                        این گوشی، گوشی بسیار خوبی هست، اما من زمانی
                                                                        که توی
                                                                        مشخصات
                                                                        نوشته
                                                                        بود رم 6 هست، خریدمش! اما پس از ارسال، رمش 4
                                                                        بود که
                                                                        از پست
                                                                        تحویل
                                                                        نگرفتم و مرجوعش کردم! هزینه ش فقط زمانی بود
                                                                        که از
                                                                        دست رفت!
                                                                        وقتی
                                                                        میتونستم داخل شهر رم 4ش رو با قیمتی بسیار
                                                                        کمتر
                                                                        بخرم!<br>
                                                                        انشالله سری بعد در ثبت مشخصات کالا دقت لازم
                                                                        بکار
                                                                        گرفته
                                                                        شود...
                                                                    </p>
                                                                    <div class="footer">
                                                                        <div class="comment-like-container">آیا این
                                                                            نظر
                                                                            برایتان مفید
                                                                            بود؟
                                                                            <button class="btn-like"
                                                                                data-counter="۱,۵۲۸">بله</button>
                                                                            <button class="btn-like"
                                                                                data-counter="۷۹">خیر</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="Usefulcomments" role="tabpanel"
                                                aria-labelledby="Usefulcomments-tab">
                                                <ul class="comments-list">
                                                    <li>
                                                        <section>
                                                            <div class="col-lg-4 col-md-5 col-xs-12 pull-right">
                                                                <div class="aside">
                                                                    <div class="message-light">
                                                                        <span class="mdi mdi-cart"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                    <ul class="comments-user-shopping">
                                                                        <li>
                                                                            <div class="cell">رنگ خریداری شده:</div>
                                                                            <div class="color-cell">
                                                                                <span
                                                                                    class="shopping-color-value"></span>آبی
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">خریداری شده از:</div>
                                                                            <div class="color-cell">
                                                                                <span class="mdi mdi-home"></span>
                                                                                <a href="#" class="link-border">دی
                                                                                    جی لند
                                                                                    پلاس</a>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">قیمت خرید:</div>
                                                                            <div class="bought-price">۴,۳۷۵,۰۰۰تومان
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">تاریخ خرید:</div>
                                                                            <div class="bought-price">بیش از سه ماه
                                                                                پیش
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="message-light opinion-positive">
                                                                        <span class="fa fa-thumbs-o-up"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-xs-12 pull-left">
                                                                <div class="article">
                                                                    <div class="header">
                                                                        <div>
                                                                            ارسال رم 4 بجای رم 6
                                                                            <span>توسط حسن شجاعی در تاریخ ۱۳ خرداد
                                                                                ۱۳۹۸</span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        از دیجیکالا خواهش میکنم زمان ثبت مشخصات، دقت
                                                                        لازم رو
                                                                        داشته
                                                                        باشند...<br>
                                                                        این گوشی، گوشی بسیار خوبی هست، اما من زمانی
                                                                        که توی
                                                                        مشخصات
                                                                        نوشته
                                                                        بود رم 6 هست، خریدمش! اما پس از ارسال، رمش 4
                                                                        بود که
                                                                        از پست
                                                                        تحویل
                                                                        نگرفتم و مرجوعش کردم! هزینه ش فقط زمانی بود
                                                                        که از
                                                                        دست رفت!
                                                                        وقتی
                                                                        میتونستم داخل شهر رم 4ش رو با قیمتی بسیار
                                                                        کمتر
                                                                        بخرم!<br>
                                                                        انشالله سری بعد در ثبت مشخصات کالا دقت لازم
                                                                        بکار
                                                                        گرفته
                                                                        شود...
                                                                    </p>
                                                                    <div class="footer">
                                                                        <div class="comment-like-container">آیا این
                                                                            نظر
                                                                            برایتان مفید
                                                                            بود؟
                                                                            <button class="btn-like"
                                                                                data-counter="۱,۵۲۸">بله</button>
                                                                            <button class="btn-like"
                                                                                data-counter="۷۹">خیر</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <section>
                                                            <div class="col-lg-4 col-md-5 col-xs-12 pull-right">
                                                                <div class="aside">
                                                                    <div class="message-light">
                                                                        <span class="mdi mdi-cart"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                    <ul class="comments-user-shopping">
                                                                        <li>
                                                                            <div class="cell">رنگ خریداری شده:</div>
                                                                            <div class="color-cell">
                                                                                <span
                                                                                    class="shopping-color-value"></span>آبی
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">خریداری شده از:</div>
                                                                            <div class="color-cell">
                                                                                <span class="mdi mdi-home"></span>
                                                                                <a href="#" class="link-border">دی
                                                                                    جی لند
                                                                                    پلاس</a>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">قیمت خرید:</div>
                                                                            <div class="bought-price">۴,۳۷۵,۰۰۰تومان
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">تاریخ خرید:</div>
                                                                            <div class="bought-price">بیش از سه ماه
                                                                                پیش
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="message-light opinion-positive">
                                                                        <span class="fa fa-thumbs-o-up"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-xs-12 pull-left">
                                                                <div class="article">
                                                                    <div class="header">
                                                                        <div>
                                                                            ارسال رم 4 بجای رم 6
                                                                            <span>توسط حسن شجاعی در تاریخ ۱۳ خرداد
                                                                                ۱۳۹۸</span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        از دیجیکالا خواهش میکنم زمان ثبت مشخصات، دقت
                                                                        لازم رو
                                                                        داشته
                                                                        باشند...<br>
                                                                        این گوشی، گوشی بسیار خوبی هست، اما من زمانی
                                                                        که توی
                                                                        مشخصات
                                                                        نوشته
                                                                        بود رم 6 هست، خریدمش! اما پس از ارسال، رمش 4
                                                                        بود که
                                                                        از پست
                                                                        تحویل
                                                                        نگرفتم و مرجوعش کردم! هزینه ش فقط زمانی بود
                                                                        که از
                                                                        دست رفت!
                                                                        وقتی
                                                                        میتونستم داخل شهر رم 4ش رو با قیمتی بسیار
                                                                        کمتر
                                                                        بخرم!<br>
                                                                        انشالله سری بعد در ثبت مشخصات کالا دقت لازم
                                                                        بکار
                                                                        گرفته
                                                                        شود...
                                                                    </p>
                                                                    <div class="footer">
                                                                        <div class="comment-like-container">آیا این
                                                                            نظر
                                                                            برایتان مفید
                                                                            بود؟
                                                                            <button class="btn-like"
                                                                                data-counter="۱,۵۲۸">بله</button>
                                                                            <button class="btn-like"
                                                                                data-counter="۷۹">خیر</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <section>
                                                            <div class="col-lg-4 col-md-5 col-xs-12 pull-right">
                                                                <div class="aside">
                                                                    <div class="message-light">
                                                                        <span class="mdi mdi-cart"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                    <ul class="comments-user-shopping">
                                                                        <li>
                                                                            <div class="cell">رنگ خریداری شده:</div>
                                                                            <div class="color-cell">
                                                                                <span
                                                                                    class="shopping-color-value"></span>آبی
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">خریداری شده از:</div>
                                                                            <div class="color-cell">
                                                                                <span class="mdi mdi-home"></span>
                                                                                <a href="#" class="link-border">دی
                                                                                    جی لند
                                                                                    پلاس</a>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">قیمت خرید:</div>
                                                                            <div class="bought-price">۴,۳۷۵,۰۰۰تومان
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">تاریخ خرید:</div>
                                                                            <div class="bought-price">بیش از سه ماه
                                                                                پیش
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="message-light opinion-positive">
                                                                        <span class="fa fa-thumbs-o-up"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-xs-12 pull-left">
                                                                <div class="article">
                                                                    <div class="header">
                                                                        <div>
                                                                            ارسال رم 4 بجای رم 6
                                                                            <span>توسط حسن شجاعی در تاریخ ۱۳ خرداد
                                                                                ۱۳۹۸</span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        از دیجیکالا خواهش میکنم زمان ثبت مشخصات، دقت
                                                                        لازم رو
                                                                        داشته
                                                                        باشند...<br>
                                                                        این گوشی، گوشی بسیار خوبی هست، اما من زمانی
                                                                        که توی
                                                                        مشخصات
                                                                        نوشته
                                                                        بود رم 6 هست، خریدمش! اما پس از ارسال، رمش 4
                                                                        بود که
                                                                        از پست
                                                                        تحویل
                                                                        نگرفتم و مرجوعش کردم! هزینه ش فقط زمانی بود
                                                                        که از
                                                                        دست رفت!
                                                                        وقتی
                                                                        میتونستم داخل شهر رم 4ش رو با قیمتی بسیار
                                                                        کمتر
                                                                        بخرم!<br>
                                                                        انشالله سری بعد در ثبت مشخصات کالا دقت لازم
                                                                        بکار
                                                                        گرفته
                                                                        شود...
                                                                    </p>
                                                                    <div class="footer">
                                                                        <div class="comment-like-container">آیا این
                                                                            نظر
                                                                            برایتان مفید
                                                                            بود؟
                                                                            <button class="btn-like"
                                                                                data-counter="۱,۵۲۸">بله</button>
                                                                            <button class="btn-like"
                                                                                data-counter="۷۹">خیر</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="Newscomments" role="tabpanel"
                                                aria-labelledby="Newscomments-tab">
                                                <ul class="comments-list">
                                                    <li>
                                                        <section>
                                                            <div class="col-lg-4 col-md-5 col-xs-12 pull-right">
                                                                <div class="aside">
                                                                    <div class="message-light">
                                                                        <span class="mdi mdi-cart"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                    <ul class="comments-user-shopping">
                                                                        <li>
                                                                            <div class="cell">رنگ خریداری شده:</div>
                                                                            <div class="color-cell">
                                                                                <span
                                                                                    class="shopping-color-value"></span>آبی
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">خریداری شده از:</div>
                                                                            <div class="color-cell">
                                                                                <span class="mdi mdi-home"></span>
                                                                                <a href="#" class="link-border">دی
                                                                                    جی لند
                                                                                    پلاس</a>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">قیمت خرید:</div>
                                                                            <div class="bought-price">۴,۳۷۵,۰۰۰تومان
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">تاریخ خرید:</div>
                                                                            <div class="bought-price">بیش از سه ماه
                                                                                پیش
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="message-light opinion-positive">
                                                                        <span class="fa fa-thumbs-o-up"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-xs-12 pull-left">
                                                                <div class="article">
                                                                    <div class="header">
                                                                        <div>
                                                                            ارسال رم 4 بجای رم 6
                                                                            <span>توسط حسن شجاعی در تاریخ ۱۳ خرداد
                                                                                ۱۳۹۸</span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        از دیجیکالا خواهش میکنم زمان ثبت مشخصات، دقت
                                                                        لازم رو
                                                                        داشته
                                                                        باشند...<br>
                                                                        این گوشی، گوشی بسیار خوبی هست، اما من زمانی
                                                                        که توی
                                                                        مشخصات
                                                                        نوشته
                                                                        بود رم 6 هست، خریدمش! اما پس از ارسال، رمش 4
                                                                        بود که
                                                                        از پست
                                                                        تحویل
                                                                        نگرفتم و مرجوعش کردم! هزینه ش فقط زمانی بود
                                                                        که از
                                                                        دست رفت!
                                                                        وقتی
                                                                        میتونستم داخل شهر رم 4ش رو با قیمتی بسیار
                                                                        کمتر
                                                                        بخرم!<br>
                                                                        انشالله سری بعد در ثبت مشخصات کالا دقت لازم
                                                                        بکار
                                                                        گرفته
                                                                        شود...
                                                                    </p>
                                                                    <div class="footer">
                                                                        <div class="comment-like-container">آیا این
                                                                            نظر
                                                                            برایتان مفید
                                                                            بود؟
                                                                            <button class="btn-like"
                                                                                data-counter="۱,۵۲۸">بله</button>
                                                                            <button class="btn-like"
                                                                                data-counter="۷۹">خیر</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <section>
                                                            <div class="col-lg-4 col-md-5 col-xs-12 pull-right">
                                                                <div class="aside">
                                                                    <div class="message-light">
                                                                        <span class="mdi mdi-cart"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                    <ul class="comments-user-shopping">
                                                                        <li>
                                                                            <div class="cell">رنگ خریداری شده:</div>
                                                                            <div class="color-cell">
                                                                                <span
                                                                                    class="shopping-color-value"></span>آبی
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">خریداری شده از:</div>
                                                                            <div class="color-cell">
                                                                                <span class="mdi mdi-home"></span>
                                                                                <a href="#" class="link-border">دی
                                                                                    جی لند
                                                                                    پلاس</a>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">قیمت خرید:</div>
                                                                            <div class="bought-price">۴,۳۷۵,۰۰۰تومان
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">تاریخ خرید:</div>
                                                                            <div class="bought-price">بیش از سه ماه
                                                                                پیش
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="message-light opinion-positive">
                                                                        <span class="fa fa-thumbs-o-up"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-xs-12 pull-left">
                                                                <div class="article">
                                                                    <div class="header">
                                                                        <div>
                                                                            ارسال رم 4 بجای رم 6
                                                                            <span>توسط حسن شجاعی در تاریخ ۱۳ خرداد
                                                                                ۱۳۹۸</span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        از دیجیکالا خواهش میکنم زمان ثبت مشخصات، دقت
                                                                        لازم رو
                                                                        داشته
                                                                        باشند...<br>
                                                                        این گوشی، گوشی بسیار خوبی هست، اما من زمانی
                                                                        که توی
                                                                        مشخصات
                                                                        نوشته
                                                                        بود رم 6 هست، خریدمش! اما پس از ارسال، رمش 4
                                                                        بود که
                                                                        از پست
                                                                        تحویل
                                                                        نگرفتم و مرجوعش کردم! هزینه ش فقط زمانی بود
                                                                        که از
                                                                        دست رفت!
                                                                        وقتی
                                                                        میتونستم داخل شهر رم 4ش رو با قیمتی بسیار
                                                                        کمتر
                                                                        بخرم!<br>
                                                                        انشالله سری بعد در ثبت مشخصات کالا دقت لازم
                                                                        بکار
                                                                        گرفته
                                                                        شود...
                                                                    </p>
                                                                    <div class="footer">
                                                                        <div class="comment-like-container">آیا این
                                                                            نظر
                                                                            برایتان مفید
                                                                            بود؟
                                                                            <button class="btn-like"
                                                                                data-counter="۱,۵۲۸">بله</button>
                                                                            <button class="btn-like"
                                                                                data-counter="۷۹">خیر</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <section>
                                                            <div class="col-lg-4 col-md-5 col-xs-12 pull-right">
                                                                <div class="aside">
                                                                    <div class="message-light">
                                                                        <span class="mdi mdi-cart"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                    <ul class="comments-user-shopping">
                                                                        <li>
                                                                            <div class="cell">رنگ خریداری شده:</div>
                                                                            <div class="color-cell">
                                                                                <span
                                                                                    class="shopping-color-value"></span>آبی
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">خریداری شده از:</div>
                                                                            <div class="color-cell">
                                                                                <span class="mdi mdi-home"></span>
                                                                                <a href="#" class="link-border">دی
                                                                                    جی لند
                                                                                    پلاس</a>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">قیمت خرید:</div>
                                                                            <div class="bought-price">۴,۳۷۵,۰۰۰تومان
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="cell">تاریخ خرید:</div>
                                                                            <div class="bought-price">بیش از سه ماه
                                                                                پیش
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="message-light opinion-positive">
                                                                        <span class="fa fa-thumbs-o-up"></span>
                                                                        خریدار این محصول
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-xs-12 pull-left">
                                                                <div class="article">
                                                                    <div class="header">
                                                                        <div>
                                                                            ارسال رم 4 بجای رم 6
                                                                            <span>توسط حسن شجاعی در تاریخ ۱۳ خرداد
                                                                                ۱۳۹۸</span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        از دیجیکالا خواهش میکنم زمان ثبت مشخصات، دقت
                                                                        لازم رو
                                                                        داشته
                                                                        باشند...<br>
                                                                        این گوشی، گوشی بسیار خوبی هست، اما من زمانی
                                                                        که توی
                                                                        مشخصات
                                                                        نوشته
                                                                        بود رم 6 هست، خریدمش! اما پس از ارسال، رمش 4
                                                                        بود که
                                                                        از پست
                                                                        تحویل
                                                                        نگرفتم و مرجوعش کردم! هزینه ش فقط زمانی بود
                                                                        که از
                                                                        دست رفت!
                                                                        وقتی
                                                                        میتونستم داخل شهر رم 4ش رو با قیمتی بسیار
                                                                        کمتر
                                                                        بخرم!<br>
                                                                        انشالله سری بعد در ثبت مشخصات کالا دقت لازم
                                                                        بکار
                                                                        گرفته
                                                                        شود...
                                                                    </p>
                                                                    <div class="footer">
                                                                        <div class="comment-like-container">آیا این
                                                                            نظر
                                                                            برایتان مفید
                                                                            بود؟
                                                                            <button class="btn-like"
                                                                                data-counter="۱,۵۲۸">بله</button>
                                                                            <button class="btn-like"
                                                                                data-counter="۷۹">خیر</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab js-faq-container" style="display:none;">
                            <div class="faq-headline">پرسش و پاسخ
                                <span>Xiaomi Redmi Note 10 M2101K7AG Dual SIM 128GB And 6GB RAM Mobile
                                    Phone</span>
                            </div>
                            <form action="#" class="form-faq">
                                <div class="form-faq-row">
                                    <div class="form-faq-col">
                                        <div class="ui-textarea">
                                            <textarea name="Question-Text" title="متن سوال"
                                                class="ui-textarea-field"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-faq-row">
                                    <div class="form-faq-col form-faq-col-submit">
                                        <button class="btn-tertiary">ثبت پرسش</button>
                                    </div>
                                    <div class="account-agree">
                                        <label class="checkbox-primary">
                                            <span class="checkbox-check checkbox-custom-pic"></span>
                                            <input type="checkbox" id="accountAutoLogin" class="remember-checkbox">
                                        </label>
                                        <label for="accountAutoLogin" class="remember-me">
                                        </label>

                                    </div>
                                    <div class="form-auth-row form-auth-row-product">
                                        <label class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" checked="" id="remember">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="remember" class="remember-me">
                                            اولین پاسخی که به پرسش من داده شد، از طریق ایمیل به من اطلاع دهید.
                                            <br>
                                            با انتخاب دکمه “ثبت پرسش”، موافقت خود را با
                                            <a href="#" class="link-border">قوانین انتشار محتوا</a>
                                            در دیجی
                                            کالا اعلام می کنم.
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div class="col-lg-9 col-md-9 col-xs-12 pull-left">
                                <div class="faq-filter">
                                    <div class="filter-item-main">
                                        <ul class="filter-items nav nav-tabs" id="myTab1" role="tablist">
                                            <li>
                                                <span class="sort-row-text"><i class="mdi mdi-sort"></i> مرتب‌سازی
                                                    دیدگاه‌ها
                                                    بر اساس:</span>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" id="Usefulfaqs-tab" data-toggle="tab"
                                                    href="#Usefulfaqs" role="tab" aria-controls="Usefulfaqs"
                                                    aria-selected="true">مفیدترین پرسش</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Newsfaqs-tab" data-toggle="tab"
                                                    href="#Newsfaqs" role="tab" aria-controls="Newsfaqs"
                                                    aria-selected="true">جدیدترین پرسش</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="product-questions-list">
                                    <div class="tab-content" id="myTabfaqContent">
                                        <div class="tab-pane fade show active" id="Usefulfaqs" role="tabpanel"
                                            aria-labelledby="Usefulfaqs-tab">
                                            <ul class="faq-list">
                                                <li class="is-question">
                                                    <div class="section">
                                                        <div class="faq-header-question">
                                                            <span class="fa fa-question-circle-o"></span>
                                                            <p>پرسش
                                                                <span>حسن شجاعی</span>
                                                            </p>
                                                        </div>
                                                        <p>اين دستگاه قابليت استفاده از شارژر هاي بلوتوثي رو هم
                                                            داره؟<br>
                                                            مطابق با سيستم Qr هست؟</p>
                                                        <div class="footer">
                                                            <em>۶ آذر ۱۳۹۸</em>
                                                            <a href="#" class="link-border js-add-answer-btn">به این
                                                                پرسش پاسخ
                                                                دهید </a>
                                                        </div>
                                                    </div>
                                                    <div class="section">
                                                        <div class="faq-header-question">
                                                            <span class="fa fa-question-circle-o"></span>
                                                            <p>پرسش
                                                                <span>حسن شجاعی</span>
                                                            </p>
                                                        </div>
                                                        <p>اين دستگاه قابليت استفاده از شارژر هاي بلوتوثي رو هم
                                                            داره؟<br>
                                                            مطابق با سيستم Qr هست؟</p>
                                                        <div class="footer">
                                                            <em>۶ آذر ۱۳۹۸</em>
                                                            <a href="#" class="link-border js-add-answer-btn">به این
                                                                پرسش پاسخ
                                                                دهید </a>
                                                        </div>
                                                    </div>
                                                    <div class="section">
                                                        <div class="faq-header-question">
                                                            <span class="fa fa-question-circle-o"></span>
                                                            <p>پرسش
                                                                <span>حسن شجاعی</span>
                                                            </p>
                                                        </div>
                                                        <p>اين دستگاه قابليت استفاده از شارژر هاي بلوتوثي رو هم
                                                            داره؟<br>
                                                            مطابق با سيستم Qr هست؟</p>
                                                        <div class="footer">
                                                            <em>۶ آذر ۱۳۹۸</em>
                                                            <a href="#" class="link-border js-add-answer-btn">به این
                                                                پرسش پاسخ
                                                                دهید </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="Newsfaqs" role="tabpanel"
                                            aria-labelledby="Newsfaqs-tab">
                                            <ul class="faq-list">
                                                <li class="is-question">
                                                    <div class="section">
                                                        <div class="faq-header-question">
                                                            <span class="fa fa-question-circle-o"></span>
                                                            <p>پرسش
                                                                <span>علی</span>
                                                            </p>
                                                        </div>
                                                        <p>اين دستگاه قابليت استفاده از شارژر هاي بلوتوثي رو هم
                                                            داره؟<br>
                                                            مطابق با سيستم Qr هست؟</p>
                                                        <div class="footer">
                                                            <em>۶ آذر ۱۳۹۸</em>
                                                            <a href="#" class="link-border js-add-answer-btn">به این
                                                                پرسش پاسخ
                                                                دهید </a>
                                                        </div>
                                                    </div>
                                                    <div class="section">
                                                        <div class="faq-header-question">
                                                            <span class="fa fa-question-circle-o"></span>
                                                            <p>پرسش
                                                                <span>علی</span>
                                                            </p>
                                                        </div>
                                                        <p>اين دستگاه قابليت استفاده از شارژر هاي بلوتوثي رو هم
                                                            داره؟<br>
                                                            مطابق با سيستم Qr هست؟</p>
                                                        <div class="footer">
                                                            <em>۶ آذر ۱۳۹۸</em>
                                                            <a href="#" class="link-border js-add-answer-btn">به این
                                                                پرسش پاسخ
                                                                دهید </a>
                                                        </div>
                                                    </div>
                                                    <div class="section">
                                                        <div class="faq-header-question">
                                                            <span class="fa fa-question-circle-o"></span>
                                                            <p>پرسش
                                                                <span>علی</span>
                                                            </p>
                                                        </div>
                                                        <p>اين دستگاه قابليت استفاده از شارژر هاي بلوتوثي رو هم
                                                            داره؟<br>
                                                            مطابق با سيستم Qr هست؟</p>
                                                        <div class="footer">
                                                            <em>۶ آذر ۱۳۹۸</em>
                                                            <a href="#" class="link-border js-add-answer-btn">به این
                                                                پرسش پاسخ
                                                                دهید </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-xs-12 pull-left sticky-sidebar">
                                <div class="question-side-bar">
                                    <div class="question-filter">
                                        <div class="form-auth-row d-inline-block mb-0">
                                            <label class="ui-checkbox">
                                                <input type="checkbox" value="1" name="login" id="remember1">
                                                <span class="ui-checkbox-check"></span>
                                            </label>
                                            <label for="remember1" class="remember-me">پرسش‌های پاسخ داده شده
                                            </label>
                                        </div>
                                        <div class="form-auth-row d-inline-block mt-0 mb-0">
                                            <label class="ui-checkbox">
                                                <input type="checkbox" value="1" name="login" id="remember2">
                                                <span class="ui-checkbox-check"></span>
                                            </label>
                                            <label for="remember2" class="remember-me">پرسش‌های بی‌پاسخ
                                            </label>
                                        </div>
                                        <div class="question-filter-bottom">
                                            <div class="form-auth-row d-inline-block mt-0 mb-0">
                                                <label class="ui-checkbox">
                                                    <input type="checkbox" value="1" name="login" id="remember3">
                                                    <span class="ui-checkbox-check"></span>
                                                </label>
                                                <label for="remember3" class="remember-me">پرسش‌های من
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-product-id">
                        <span>شناسه کالا :</span>
                        <span>DKP - ۱۶۷۲۴۷۸</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12 pull-left sticky-sidebar">
                <div class="mini-buy-box-fixed">
                    <div class="mini-buy-box js-mini-buy-box">
                        <div class="mini-buy-box-product-info">
                            <img src="assets/images/product-slider-2/RedmiNote-10-M2101K7AG.jpg"
                                class="mini-buy-box-product-info-img" alt="img-slider">
                            <div class="mini-buy-box-product-info-info">
                                <div class="title">گوشی موبایل شیائومی مدل Redmi Note 10 M2101K7AG دو سیم‌ کارت
                                    ظرفیت 128 گیگابایت و رم 6 گیگابایت</div>
                                <div class="colors ">
                                    <label data-color-code="#FFFFFF" class="js-variant-color"
                                        style="background-color: rgb(255, 255, 255);"></label>
                                    <span class="js-color-title">سفید</span>
                                </div>
                            </div>
                        </div>
                        <div class="mini-buy-box-row mini-buy-box-seller js-mini-not-digikala-seller">
                            <i class="mdi mdi-storefront"></i>
                            <label class="js-mini-seller-name">مارکت موبایل پایتخت</label>
                        </div>
                        <div class="mini-buy-box-row mini-buy-box-warranty">
                            <i class="mdi mdi-check"></i>
                            گارانتی ۱۸ ماهه تجارت ژاو
                        </div>
                        <div class="mini-buy-box-row mini-buy-box-stock">
                            <i class="mdi mdi-content-save-outline"></i>
                            موجود در انبار دیجی‌کالا
                        </div>
                        <div class="mini-buy-box-row mini-buy-box-best-price js-data-best-price text-success">
                            <i class="mdi mdi-information-outline"></i>
                            بهترین قیمت ۳۰ روز گذشته
                        </div>
                        <div class="product-seller-row product-seller-row-price mini-buy-box-price-row">
                            <div class="product-mini-seller-price-real">
                                <div class="product-mini-seller-price-pure js-price-value d-inline-block">۶,۲۱۵,۰۰۰
                                </div>
                                <span class="mini-buy-box-toman">تومان</span>
                            </div>
                        </div>
                        <div class="mini-buy-box-btn-row">
                            <a href="#" class="btn btn-danger product-add-to-cart-btn">
                                افزودن به سبد خرید
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--single-product------------------------->


@endsection

@section('script')

<script>
    $(document).ready(function(){
      bill();
      //input color
    $('input[name="color"]').change(function(){
        bill();
    })
    //guarantee
    $('select[name="guarantee"]').change(function(){
        bill();
    })
     //number
     $('.cart-number').click(function(){
        bill();
    })
    })

    function bill() {
        if($('input[name="color"]:checked').length != 0){
            var selected_color = $('input[name="color"]:checked');
           $("#selected_color_name").html(selected_color.attr('data-color-name'));
        }

        //price computing
        var selected_color_price = 0;
        var selected_guarantee_price = 0;
        var number = 1;
        var product_discount_price = 0;
        var product_original_price = parseFloat($('#product_price').attr('data-product-original-price'));

        if($('input[name="color"]:checked').length != 0)
        {
            selected_color_price = parseFloat(selected_color.attr('data-color-price'));
        }

        if($('#guarantee option:selected').length != 0)
        {
            selected_guarantee_price = parseFloat($('#guarantee option:selected').attr('data-guarantee-price'));
        }

        if($('#number').val() > 0)
        {
            number = parseFloat($('#number').val());
        }

        if($('#product-discount-price').length != 0)
        {
            product_discount_price = parseFloat($('#product-discount-price').attr('data-product-discount-price'));
        }

        //final price
        var product_price = product_original_price + selected_color_price + selected_guarantee_price;
        var final_price = number * (product_price - product_discount_price);
        $('#product-price').html(toFarsiNumber(product_price));
        $('#final-price').html(toFarsiNumber(final_price));
    }

    function toFarsiNumber(number)
    {
        const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        // add comma
        number = new Intl.NumberFormat().format(number);
        //convert to persian
        return number.toString().replace(/\d/g, x => farsiDigits[x]);
    }

</script>
<script>
    // تابع برای تغییر تصویر اصلی
    function changeMainImage(newImageSrc) {
        // تغییر src تصویر اصلی
        document.getElementById('img-product-zoom').src = newImageSrc;
        // تغییر data-zoom-image برای زوم (اگر از کتابخانه زوم استفاده می‌کنید)
        document.getElementById('img-product-zoom').setAttribute('data-zoom-image', newImageSrc);
    }
</script>


<script>
    $('.product-add-to-favorite button').click(function() {
       var url = $(this).attr('data-url');
       var element = $(this);
       $.ajax({
           url : url,
           success : function(result){
            if(result.status == 1)
            {
                $(element).children().first().addClass('text-danger');
                $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
            }
            else if(result.status == 2)
            {
                $(element).children().first().removeClass('text-danger')
                $(element).attr('data-original-title', 'افزودن از علاقه مندی ها');
                $(element).attr('data-bs-original-title', 'افزودن از علاقه مندی ها');
            }
            else if(result.status == 3)
            {
                $('.toast').toast('show');
            }
           }
       })
    })
    // اطمینان از بارگذاری کامل صفحه
document.addEventListener('DOMContentLoaded', function () {

// کاهش مقدار تعداد
document.getElementById('decrease-quantity').addEventListener('click', function () {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value);
    
    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }
});

// افزایش مقدار تعداد
document.getElementById('increase-quantity').addEventListener('click', function () {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value);
    
    quantityInput.value = currentQuantity + 1;
});

});

</script>

<script>


//start product introduction, features and comment
$(document).ready(function() {
    var s = $("#introduction-features-comments");
    var pos = s.position();
    $(window).scroll(function() {
        var windowpos = $(window).scrollTop();

        if (windowpos >= pos.top) {
            s.addClass("stick");
        } else {
            s.removeClass("stick");
        }
    });
});
//end product introduction, features and comment


</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const colorInputs = document.querySelectorAll('.color-input');
    const selectedColorName = document.getElementById('selected_color_name');

    colorInputs.forEach(input => {
        input.addEventListener('change', function() {
            const colorName = this.dataset.colorName;
            selectedColorName.textContent = colorName;
        });
    });
});
.quantity-control {
    display: flex;
    align-items: center;
}

.quantity-input {
    width: 60px;
    text-align: center;
    margin: 0 10px;
}

.btn {
    border: 1px solid #ccc;
    background-color: #f8f8f8;
    padding: 10px;
    font-size: 18px;
    cursor: pointer;
}

.btn:hover {
    background-color: #e2e2e2;
}

.btn-decrease, .btn-increase {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-decrease i, .btn-increase i {
    font-size: 20px;
}
document.addEventListener('DOMContentLoaded', function () {
    // پیدا کردن تمامی ورودی‌های رنگ
    const colorInputs = document.querySelectorAll('.color-input');

    // بررسی اینکه آیا رنگ‌ها موجود هستند
    if (colorInputs.length > 0) {
        colorInputs.forEach(function(input) {
            // گوش دادن به تغییرات
            input.addEventListener('change', function() {
                // دریافت نام رنگ از ویژگی data-color-name
                const colorName = input.getAttribute('data-color-name');
                
                // به روز رسانی نام رنگ در صفحه
                const colorNameElement = document.getElementById('selected_color_name');
                if (colorNameElement) {
                    colorNameElement.textContent = colorName;
                }
            });
        });
    }
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // پیدا کردن تمامی ورودی‌های رنگ
        const colorInputs = document.querySelectorAll('.color-input');

        // بررسی اینکه آیا رنگ‌ها موجود هستند
        if (colorInputs.length > 0) {
            colorInputs.forEach(function(input) {
                // گوش دادن به تغییرات
                input.addEventListener('change', function() {
                    // دریافت نام رنگ از ویژگی data-color-name
                    const colorName = input.getAttribute('data-color-name');
                    
                    // به روز رسانی نام رنگ در صفحه
                    const colorNameElement = document.getElementById('selected_color_name');
                    if (colorNameElement) {
                        colorNameElement.textContent = colorName;
                    }
                });
            });
        }
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const quantityInput = document.querySelector('#number');
    const quantityUp = document.querySelector('.cart-number-up');
    const quantityDown = document.querySelector('.cart-number-down');
    const priceElement = document.querySelector('#product-price');
    const discountPriceElement = document.querySelector('#product-discount-price');
    const colorInput = document.querySelector('input[name="color"]:checked');
    const guaranteeSelect = document.querySelector('select[name="guarantee"]');
    
    // Function to update the price based on quantity
    function updatePrice() {
        const quantity = parseInt(quantityInput.value);
        let basePrice = {{ $product->price }};
        let colorPrice = parseFloat(colorInput ? colorInput.getAttribute('data-color-price') : 0);
        let guaranteePrice = parseFloat(guaranteeSelect ? guaranteeSelect.options[guaranteeSelect.selectedIndex].getAttribute('data-guarantee-price') : 0);
        
        let totalPrice = basePrice + colorPrice + guaranteePrice;
        let discountPrice = 0;

        // If there's a discount
        @if($amazingSale)
            discountPrice = (totalPrice * ({{ $amazingSale->percentage }} / 100));
        @endif

        // Calculate the total price for the given quantity
        const finalPrice = (totalPrice - discountPrice) * quantity;
        
        // Update the displayed price
        priceElement.innerHTML = priceFormat(finalPrice);
        discountPriceElement.innerHTML = discountPrice > 0 ? priceFormat(discountPrice * quantity) : 'تخفیف ندارد';
    }

    // Event listener for quantity increase
    quantityUp.addEventListener('click', function () {
        let quantity = parseInt(quantityInput.value);
        if (quantity < 5) { // Limit the max quantity to 5
            quantityInput.value = quantity + 1;
            updatePrice();
        }
    });

    // Event listener for quantity decrease
    quantityDown.addEventListener('click', function () {
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) { // Limit the min quantity to 1
            quantityInput.value = quantity - 1;
            updatePrice();
        }
    });

    // Event listener for color change
    const colorInputs = document.querySelectorAll('input[name="color"]');
    colorInputs.forEach(function (colorInput) {
        colorInput.addEventListener('change', function () {
            updatePrice();
            document.querySelector('#selected_color_name').textContent = colorInput.getAttribute('data-color-name');
        });
    });

    // Event listener for guarantee change
    guaranteeSelect.addEventListener('change', function () {
        updatePrice();
    });

    // Initial price update
    updatePrice();
});

// Helper function to format price
function priceFormat(price) {
    return price.toLocaleString('fa-IR') + ' تومان';
}

</script>


@endsection
