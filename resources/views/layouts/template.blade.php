<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/cb.png')}}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/bootstrap-side-modals.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
            {{-- <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}"> --}}
            <link rel="stylesheet" href="{{asset('assets/css/toastr.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
   </head>

   <body>
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <img src="{{asset('assets/img/logo.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <header>
            <div class="header-area">
                    <div class="main-header ">
                        <div class="header-top top-bg d-none d-lg-block">
                        <div class="container-fluid">
                            <div class="col-xl-12">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="header-info-left d-flex"></div>
                                        <div class="header-info-right">
                                        <ul>
                                            @if (Auth::check())
                                            <li><span class="text-white" style="font-size: 16pt !important;"><i class="far fa-user"></i> {{auth()->user()->username}} | </span> <a href="{{URL::to('/logout')}}" style="font-size: 16pt !important;">Logout</a></li>
                                            @else
                                            <li><a href="{{URL::to('/login')}}" style="font-size: 16pt !important;"><i class="far fa-user"></i> My Account </a></li>
                                            @endif
                                        </ul>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                        <div class="header-bottom  header-sticky">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <!-- Logo -->
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                        <div class="logo">
                                        <a href="{{URL::to('/')}}"><span class="h2 font-weight-bold text-dark">Asmaraloka Coffee</span></a>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                        <!-- Main-menu -->
                                        <div class="main-menu f-right d-none d-lg-block">
                                        @yield('menu')
                                        </div>
                                    </div>
                                    <!-- Mobile Menu -->
                                    <div class="col-12">
                                        <div class="mobile_menu d-block d-lg-none"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </header>

        <main>@yield('content')</main>

        <footer>
            <div class="footer-area footer-padding p-0 m-0" style="background-color: #8B6843 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7">
                            <div class="footer-copy-right">
                                <p style="font-size: 18pt !important;" class="text-white">Created by Kelompok 4 &copy;<script>document.write(new Date().getFullYear());</script></p>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5">
                            <div class="footer-copy-right f-right">
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-instagram text-white" style="font-size: 24pt !important;"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f text-white" style="font-size: 24pt !important;"></i></a>
                                    <a href="#"><i class="fab fa-whatsapp text-white" style="font-size: 24pt !important;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="modal modal-right fade" id="right_modal_sm" tabindex="-1" role="dialog" aria-labelledby="right_modal_sm" style="z-index: 999999!important">
            <div class="modal-dialog modal-dialog-scrollable modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-auto">
                            <svg width="50" height="50" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="60" height="60" rx="30" fill="#8B6843"/>
                                <path d="M25 40C25.5523 40 26 39.5523 26 39C26 38.4477 25.5523 38 25 38C24.4477 38 24 38.4477 24 39C24 39.5523 24.4477 40 25 40Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M36 40C36.5523 40 37 39.5523 37 39C37 38.4477 36.5523 38 36 38C35.4477 38 35 38.4477 35 39C35 39.5523 35.4477 40 36 40Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17 19H21L23.68 32.39C23.7714 32.8504 24.0219 33.264 24.3875 33.5583C24.7532 33.8526 25.2107 34.009 25.68 34H35.4C35.8693 34.009 36.3268 33.8526 36.6925 33.5583C37.0581 33.264 37.3086 32.8504 37.4 32.39L39 24H22" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="col">
                            <span class="h5"> <span id="itemscart">0</span> Items</span><br>
                            <span>di keranjang anda</span>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="itemsprod"></div>
                    <div class="row border-bottom" id="sectionsubtotal">
                        <div class="col-12 text-center bg-light">
                            <span class="h3" id="subtotal">Rp. 0</span>
                        </div>
                        <button class="genric-btn danger small btn-block" id="emptycart">Kosongkan Keranjang</button>
                    </div>
                    <div class="row mt-3" id="checkoutprod">
                        {{-- @if (Auth::check()) --}}
                        <div class="col-12 p-0 m-0 text-center">
                                <span>Cutomer Detail</span>
                                <form action="#" id="formco">
                                    <div class="col-lg-12 form-group m-1">
                                        <input type="text" class="form-control form-control-sm w-100" id="custname" name="custname" placeholder="Nama Lengkap" required autocomplete="off">
                                    </div>
                                    <div class="col-lg-12 form-group m-1">
                                        <input type="text" class="form-control form-control-sm w-100" id="custemail" name="custemail" placeholder="Email" required autocomplete="off" value="{{(Auth::check()) ? auth()->user()->email : ''}}">
                                    </div>
                                    <div class="col-lg-12 form-group m-1">
                                        <input type="text" class="form-control form-control-sm w-100" id="custphone" name="custphone" placeholder="No. Telepon" required autocomplete="off">
                                    </div>
                                    <div class="col-lg-12 form-group m-1">
                                        <textarea class="form-control form-control-sm" name="custaddress" id="custaddress" cols="15" rows="2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message" autocomplete="off" required></textarea>
                                    </div>
                                    <div class="col-lg-12 form-group m-1">
                                        <button type="submit" id="cobtn" class="genric-btn small primary btn-block" style="background-color:#8B6843; font-size:16px !important; ">Checkout</button>
                                    </div>
                                </form>
                          </div>
                        {{-- @else
                        <div class="col-12 p-0 m-0 text-center"><a href="{{URL::to('/login')}}" class="btn p-3">Login</a></div>
                        @endif --}}
                    </div>
                </div>
              </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" id="paymentmodal" style="z-index: 999999999!important">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title text-white">Payment</h5>
                    </div>
                    <div class="modal-body p-3">
                        <form action="#" class="row" id="formpayment">
                            <div class="col-lg-12 form-group m-1">
                                <label for="paymenttotal">Total</label>
                                <input type="text" class="form-control" id="total" name="total" placeholder="0" value="Rp." required readonly>
                                @if (Auth::check())
                                    <input type="hidden" class="form-control" id="customer" name="customer" value="{{auth()->user()->username}}">
                                @endif
                            </div>
                            <div class="col-lg-12 form-group m-1">
                                <select class="form-control" id="payment" name="payment" required>
                                    <option value="" selected disabled>--Pilih Metode Pembayaran--</option>
                                </select>
                            </div>
                            <div class="col-lg-12 form-group m-1 text-center">
                                <img src="{{asset('assets/img/payment/default.JPG')}}" id="paymentr" alt="" srcset="" width="250" height="250" class="bg-light">
                            </div>
                            <div class="col-lg-12 form-group mt-3">
                                <button type="submit" class="btn p-4 btn-block">Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>

        <!-- JS here -->
        <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/slick.min.js')}}"></script>
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
		<script src="{{asset('assets/js/animated.headline.js')}}"></script>
        <script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
        {{-- <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script> --}}
		<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
        <script src="{{asset('assets/js/jquery.form.js')}}"></script>
        <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('assets/js/mail-script.js')}}"></script>
        <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('assets/js/toastr.js')}}"></script>
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script>


            const rupiah = (number)=>{
                return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
                }).format(number);
            }

            var prod = (localStorage.getItem("asmaralokacart")==undefined) ? [] : localStorage.getItem("asmaralokacart").split("|");
            var cartitems=prod.length;
            $("#itemscart").html(cartitems);

            if(cartitems > 0){
                $("#cartcount").html('<span class="badge badge-danger badge-pill" style="font-size: 11px">'+cartitems+'</span>');
                $("#sectionsubtotal").removeClass('d-none');
                $("#checkoutprod").removeClass('d-none');
            }else{
                $("#cartcount").empty();
                $("#sectionsubtotal").addClass('d-none');
                $("#checkoutprod").addClass('d-none');
            }

            $("#itemsprod").empty();
            var subtotal=0;
            var produkname="";
            for (let i = 0; i < prod.length; i++) {
                var item=prod[i].split(",");
                $("#itemsprod").append('\
                    <div class="col-lg-12 py-2 m-0 border-bottom">\
                        <div class="row m-0 p-0">\
                            <div class="col-auto"><img src="{{asset("assets/img/product")}}/'+item[3]+'" width="40"></div>\
                            <div class="col">'+item[1]+' <br> '+rupiah(item[2])+'</div>\
                        </div>\
                    </div>\
                ');
                subtotal+=parseInt(item[2]);
                produkname+=item[1];
                if(parseInt(i + 1) < prod.length){
                    produkname+=",";
                }
            }
            $("#subtotal").html(rupiah(subtotal));

            $("#emptycart").click(function(){
                localStorage.removeItem("asmaralokacart");
                location.reload()
            });

            $("#formco").submit(function(e){
                $.ajax({
                    url     : "{{url('/api/v1/addcustomer')}}",
                    type    : "POST",
                    data    : {
                        'username'  : $("#customer").val(),
                        'name'      : $("#custname").val(),
                        'email'     : $("#custemail").val(),
                        'phone'     : $("#custphone").val(),
                        'address'   : $("#custaddress").val()
                    },
                    success : function(res){
                        if(res["success"]){
                            $("#formco")[0].reset();
                            toastr.success('Cutomer Tersimpan');
                        }else{
                            toastr.error('Customer Gagal Tersiman');
                        }
                    },
                    error   : function(err){
                        console.log(err);
                        toastr.error(err);
                    }
                });

                e.preventDefault();
                $(this)[0].reset();
                $("#total").val(rupiah(subtotal));

                $.ajax({
                    url : "{{url('api/v1/getpayment')}}",
                    type : "GET",
                    success : function(res){
                        console.log(res["data"]);
                        $("#payment").empty();
                        $("#payment").append('<option value="" selected disabled>--Pilih Metode Pembayaran--</option>');
                        for (let i = 0; i < res["data"].length; i++) {
                            $("select#payment").append('<option value="'+res["data"][i]["pay_method"]+'">'+res["data"][i]["pay_method"]+'</option>');
                        }
                    },
                    error : function(err){
                        console.log(err);
                    }
                });

                $("#paymentmodal").modal({backdrop: 'static', keyboard: false});
                $("#paymentmodal").modal("show");
            });

            $("#payment").change(function(){
                $("#paymentr").attr("src","{{asset('assets/img/payment')}}/"+$(this).val()+".jpg")
            });

            $("#formpayment").submit(function(){
                $.ajax({
                    url     : "{{url('/api/v1/addtransaction')}}",
                    type    : "POST",
                    data    : {
                        'trans_num' : "Trans-"+Date.now(),
                        'product'   : produkname,
                        'customer'  : $("#customer").val(),
                        'payment'   : $("#payment").val()
                    },
                    success : function(res){
                        if(res["success"]){
                            $("#formco")[0].reset();
                            toastr.success('Transaksi Tersimpan');
                        }else{
                            toastr.error('Transaksi Tersiman');
                        }
                    },
                    error   : function(err){
                        console.log(err);
                        toastr.error(err);
                    }
                });
                $("#emptycart").trigger('click');
                $("#paymentmodal").modal("hide");
            });
        </script>
        @yield('js')

    </body>
</html>
