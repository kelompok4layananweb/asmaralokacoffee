@extends('layouts.template')
@section('title','Asmaraloka Coffe | Home')

@section('menu')
<nav>
    <ul id="navigation">
        <li><a href="{{URL::to('/')}}">Home</a></li>
        <li><a href="{{URL::to('/menu')}}">Menu</a></li>
        <li><a href="#aboutus">About Us</a></li>
        <li><a href="#contact">Contact</a></li>
        <li>
            <div class="shopping-card">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#right_modal_sm" data-backdrop="static" data-keyboard="false"><i class="fas fa-shopping-cart"></i><span id="cartcount"></span></a>
            </div>
        </li>
    </ul>
</nav>
@endsection
@section('content')
<div class="slider-area">
    <div class="slider-active">
        <div class="single-slider slider-height" data-background="{{asset('assets/img/Picture1.png')}}">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-between pt-5">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                        <div class="hero__caption pt-5">
                            <h1 class="text-white" style="font-size: 56pt" data-animation="fadeInRight" data-delay=".6s">Berbahagia dengan secangkir Kopi</h1>
                            <p class="text-white" data-animation="fadeInRight" data-delay=".8s">dibuat dengan biji kopi terbaik dari Tasikmalaya untuk pengalaman minum kopi terbaik anda</p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                <a href="{{URL::to('/menu')}}" class="btn hero-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="w-100 text-center mt-5 pt-5" id="aboutus">
        <span class="h1 font-weight-bold" style="border-bottom: 3px solid #000; color:#8B6843">ABOUT US</span><br>
        <span class="h4">Tentang Kami</span>
    </div>
    <div class="row mt-5 p-0">
        <div class="col-lg-6">
            <img src="{{asset('assets/img/aboutus.JPG')}}" alt="" srcset="" width="100%">
        </div>
        <div class="col-lg-6">
            <span class="h1 font-weight-bold" style="border-bottom: 3px solid #000">OUR STORY</span><br>
            <span class="h4">CERITA KITA</span>
            <p class="bg-light p-3" style="font-size: 14pt!important; text-align: justify">
                “Dimulai pada 2023, kami hadir menjadi produsen dan kedai kopi dengan harga yang terjangkau. Berawal dari niat untuk memproduksi, mengolah serta mengem bangkan biji kopi lokal dari indonesia, kini kami hadir sebagai kedai kopi lokal dengan harga yang terjangkau.”
            </p>
            <p style="font-size: 14pt!important; text-align: justify">
                Asmaraloka adalah merek kopi dan kafe asli dari indonesia. sejak 2023 kami telah menyediakan dan melayani pelanggan dengan olahan kopi terbaik yang berasal dari biji kopi asli dari Tasikmalaya. Selain menyediakan kopi Asmaraloka juga menyediakan makanan dan camilan yang tidak kalah enaknya apalagi jika datang langsung, kafe Asmaraloka menyuguhkan pemandangan yang indah serta suasana yang kalem.
            </p>
        </div>
    </div>

    <div class="w-100 text-center mt-5 pt-5" id="contact">
        <span class="h1 font-weight-bold" style="border-bottom: 3px solid #000; color:#8B6843">CONTACT</span><br>
        <span class="h4">Kontak Kami</span>
    </div>
    <div class="row my-5 p-0 text-center">
        <div class="col-lg-6 p-1">
            <span class="h2 font-weight-bold" style="border-bottom: 3px solid #000">TASIKMALAYA</span><br>
            <span class="h4"><i class="fa fa-map-marker"></i> <span id="alamate"></span></span>
            <iframe id="map" src="" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-6 text-center">
            <span class="h2 font-weight-bold" style="border-bottom: 3px solid #000">CONTACT US</span><br>
            <span class="h4">Contact Information</span>

            <form class="form-contact contact_form" action="#" method="post" id="contactForm" novalidate="novalidate" style="font-size: 16pt !important">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Nama'" placeholder="Masukan Nama" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Email'" placeholder="Email" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="phone" id="phone" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Nomor Telepon'" placeholder="Masukan Nomor Telepon" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message" cols="30" rows="5" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                phone: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                name: {
                    required: "Silahkan Masukan Nama",
                    minlength: "Minimal 2 Karakter"
                },
                phone: {
                    required: "Silahkan Masukan Nomor Telepon",
                    minlength: "Minimal 4 Karakter"
                },
                number: {
                    required: "Silahkan Masukan Nomor Telepon",
                    minlength: "Minimal 5 Karakter"
                },
                email: {
                    required: "Silahkan Masukan Email"
                },
                message: {
                    required: "Silahkan Masukan Pesan",
                    minlength: "Minimal 1 Karakter"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url : "{{url('/api/v1/addmessage')}}",
                    success: function(res) {
                        if(res["success"]){
                            $(form)[0].reset();
                            // alert("Pesan Berhasil Dikirim");
                            toastr.success('Pesan Berhasil Disimpan');
                        }else{
                            // alert("Pesan Gagal Dikirim");
                            toastr.error('Pesan Gagal Dikirim');
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        toastr.error(err);
                    }
                })
            }
        });

        $.ajax({
            url : "{{url('/api/v1/getprofile')}}",
            type: "GET",
            success : function(res){
                if(res["success"]){
                    $("#alamate").html(res["data"][0]["address"]);
                    $("#map").attr("src",res["data"][0]["map"]);
                }
            },
            error : function(err){
                console.log(err);
            }
        });
    </script>
@endsection
