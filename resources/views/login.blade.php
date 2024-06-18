@extends('layouts.template')
@section('title','Asmaraloka Coffe | Login')

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
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-4">
                <div class="text-center mb-5"><span class="h2 font-weight-bold" style="color:#8B6843;">My Account</span></div>
                @if(count($errors)>0)
                @foreach($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align: left !important;">
                    <span class="alert-text">{{$error}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach
                @endif
                <span class="h4 font-weight-bold">Masuk</span>
                <form action="{{url ('/postlogin')}}" id="form-login" method="POST">
                    {{csrf_field()}}
                    <div class="mt-10">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Masukan Username / Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Username / Email'" required="" class="single-input">
                    </div>
                    <div class="mt-10">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Masukan Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Password'" required="" class="single-input">
                    </div>
                    <div class="mt-10">
                        <button type="submit" class="genric-btn primary btn-block" style="background-color:#8B6843; font-size:16px !important; ">Masuk</button>
                    </div>
                </form>
                <div class="mb-5 mt-3 text-center">
                    <span>Belum mempunyai akun ? <a href="{{URL::to('/register')}}" class="font-weight-bold text-dark mb-5">Register</a></span>
                </div>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
