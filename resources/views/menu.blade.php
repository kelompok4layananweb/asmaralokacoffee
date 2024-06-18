@extends('layouts.template')
@section('title','Asmaraloka Coffe | Menu')

@section('menu')
<nav>
    <ul id="navigation">
        <li><a href="#produk">Produk</a></li>
        <li><a href="#minuman">Minuman</a></li>
        <li><a href="#makanan">Makanan</a></li>
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
    <div class="w-100 MT-3">
        <span class="h1 font-weight-bold" style="border-bottom: 3px solid #000; color:#8B6843">MENU</span><br>
        <span class="h4">Menu Kami</span>
        <p style="font-size: 18pt" class="mt-3">Produk Pilihan untuk Teman Asmaraloka ...</p>
    </div>

    <div class="w-100 mt-5 pt-5" id="produk">
        <span class="h3" style="border-bottom: 3px solid #000; color:#8B6843">PRODUK</span><br>
        <div class="row mt-3" id="produklist">

        </div>
    </div>

    <div class="w-100 mt-5 pt-5" id="minuman">
        <span class="h3" style="border-bottom: 3px solid #000; color:#8B6843">MINUMAN</span><br>
        <div class="row mt-3" id="minumanlist">

        </div>
    </div>

    <div class="w-100 my-5 pt-5" id="makanan">
        <span class="h3" style="border-bottom: 3px solid #000; color:#8B6843">MAKANAN</span><br>
        <div class="row mt-3" id="makananlist">

        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $.ajax({
                url : "{{url('/api/v1/getproduct')}}",
                type: "GET",
                success : function(res){
                    if(res["success"]){
                        $("#produklist").empty();
                        $("#minumanlist").empty();
                        for (let i = 0; i < res["data"].length; i++) {
                            if(res["data"][i]["category"]=="Produk"){
                                $("#produklist").append('\
                                    <div class="col-lg-4 p-5">\
                                        <div class="card" style="width: 18rem;">\
                                            <img src="{{asset("/assets/img/product")}}/'+res["data"][i]["picture"]+'" class="card-img-top">\
                                            <div class="card-body">\
                                                <span class="h4">'+res["data"][i]["name"]+'</span>\
                                            </div>\
                                            <div class="card-footer bg-white border-0">\
                                                <button class="btn p-3" onClick=\'addtocart("'+res["data"][i]["id"]+','+res["data"][i]["name"]+','+res["data"][i]["price"]+','+res["data"][i]["picture"]+'")\'>Buy</button>\
                                                <span class="float-right h3">'+rupiah(res["data"][i]["price"])+'</span>\
                                            </div>\
                                        </div>\
                                    </div>\
                                ');
                            }
                        }

                        $("#minumanlist").empty();
                        for (let i = 0; i < res["data"].length; i++) {
                            if(res["data"][i]["category"]=="Minuman"){
                                $("#minumanlist").append('\
                                    <div class="col-lg-4 p-5">\
                                        <div class="card" style="width: 18rem;">\
                                            <img src="{{asset("/assets/img/product")}}/'+res["data"][i]["picture"]+'" class="card-img-top">\
                                            <div class="card-body">\
                                                <span class="h4">'+res["data"][i]["name"]+'</span>\
                                            </div>\
                                            <div class="card-footer bg-white border-0">\
                                                <button class="btn p-3" onClick=\'addtocart("'+res["data"][i]["id"]+','+res["data"][i]["name"]+','+res["data"][i]["price"]+','+res["data"][i]["picture"]+'")\'>Buy</button>\
                                                <span class="float-right h3">'+rupiah(res["data"][i]["price"])+'</span>\
                                            </div>\
                                        </div>\
                                    </div>\
                                ');
                            }
                        }

                        $("#makananlist").empty();
                        for (let i = 0; i < res["data"].length; i++) {
                            if(res["data"][i]["category"]=="Makanan"){
                                $("#makananlist").append('\
                                    <div class="col-lg-4 p-5">\
                                        <div class="card" style="width: 18rem;">\
                                            <img src="{{asset("/assets/img/product")}}/'+res["data"][i]["picture"]+'" class="card-img-top">\
                                            <div class="card-body">\
                                                <span class="h4">'+res["data"][i]["name"]+'</span>\
                                            </div>\
                                            <div class="card-footer bg-white border-0">\
                                                <button class="btn p-3" onClick=\'addtocart("'+res["data"][i]["id"]+','+res["data"][i]["name"]+','+res["data"][i]["price"]+','+res["data"][i]["picture"]+'")\'>Buy</button>\
                                                <span class="float-right h3">'+rupiah(res["data"][i]["price"])+'</span>\
                                            </div>\
                                        </div>\
                                    </div>\
                                ');
                            }
                        }
                    }
                },
                error : function(err){
                    console.log(err);
                }
            })
        });

        function addtocart(data) {
            if(localStorage.getItem("asmaralokacart")!=null){
                var old = localStorage.getItem("asmaralokacart");
                localStorage.setItem("asmaralokacart",old+"|"+data);
            }else{
                localStorage.setItem("asmaralokacart",data);
            }
            location.reload()
        }
    </script>
@endsection
