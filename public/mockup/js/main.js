document.addEventListener("DOMContentLoaded", function () {
    var nav = document.querySelectorAll(".nabar__container");
    var nav = nav[0];
    var form=document.querySelectorAll(".form__tag");
    var form=form[0];
    var lh = document.querySelectorAll(".header__container-lh");
    var lh=lh[0];
    var head = document.querySelectorAll('header.header');
    var head = head[0];
    //Truy xuất header
    var trangthai = "duoi100";
    window.addEventListener("scroll", function () {
        var x = pageYOffset;
        if (x > 100) {
            if (trangthai == "duoi100") {
                trangthai = "tren100";
                head.classList.add('headtora');
                nav.classList.add("navtora");
                setTimeout(function () {
                    nav.classList.add("navtora__hide");
                }, 1000);
                form.classList.add("form__tora")
                lh.classList.add("lh__tora")
            }
        }
        else {
            if (trangthai == "tren100") {
                head.classList.remove('headtora');
                nav.classList.remove("navtora");
                setTimeout(function () {
                    nav.classList.remove("navtora__hide");
                }, 1001);
                nav.classList.remove("navtora__hide");
                trangthai = "duoi100";
                form.classList.remove("form__tora")
                lh.classList.remove("lh__tora")
            }
        }
    })
})
// css icon navbar
$(document).ready(function () {
    $(".nabar__container").find('i').css({ "display": "initial", "font-size": "22px", "margin-right": "0px" })

});
//menu
$(".tab__item").hover(function(){
    $(this).addClass('special');
    $("#c".concat($(this).attr('id').toString())).css({"display":"block"});
},function(){
    $(this).removeClass('special');
    $("#c".concat($(this).attr('id').toString())).css({"display":"none"});
});
$(".tab__content").hover(function(){
    $("#".concat($(this).attr('id').toString().replace('c', ''))).addClass('special');
    $(this).css({"display":"block"});
},function(){
    $("#".concat($(this).attr('id').toString().replace('c', ''))).removeClass('special');
    $(this).css({"display":"none"});
});
// update cart
$(".btn__card").hover(function () {
    var cart_item = document.getElementsByClassName("cart__product")[0];
    var cart_rows = cart_item.getElementsByClassName("cart__product-item");
    var total = 0;
    for (var i = 0; i < cart_rows.length; i++) {
        var cart_row = cart_rows[i]
        var price_item = cart_row.getElementsByClassName("cart__price")[0]
        var quantity_item = cart_row.getElementsByClassName("cart__quantity")[0]
        var price = parseFloat(price_item.innerText)
        var quantity = parseInt(quantity_item.innerText)
        total = total + (price * quantity)
    }
    document.getElementsByClassName("cart__total-price")[0].innerText = total + 'VNĐ'
    var count = 0;
    $(".cart__product-item").each(function () {
        count += parseInt($(this).find(".cart__quantity").html());
    });
    $("#lblCartCount").text(count);
}
);
$(document).ready(function () {
    var count = 0;
    $(".cart__product-item").each(function () {
        count += parseInt($(this).find(".cart__quantity").html());
    });
    $("#lblCartCount").text(count);
});
//thêm cart
$(".add__cart").click(function () {
    var label = 0;
    var name_click = $.trim($(this).closest(".h-100").find('h6').find('a').text());
    $(".cart__product-item").each(function () {
        if ($.trim($(this).find(".content__name").text()) == name_click) {
            label = 1;
            $(this).find(".cart__quantity").text((parseInt($(this).find(".cart__quantity").html()) + 1).toString());
            var count = 0;
            $(".cart__product-item").each(function () {
                count += parseInt($(this).find(".cart__quantity").html());
            });
            $("#lblCartCount").text(count);
        }
    });
    if (label == 0) {
        var img = $(this).closest(".h-100").find('img').attr('src');
        var name = $(this).closest(".h-100").find('h6').find('a').text();
        var price = $(this).closest(".row").prev().text().replace(/\./g, '');
        $(".cart__product").append('<div class="cart__product-item"><div class="cart__product-container"><div class="cpi__left"><a href="" class="cpi__left-img"><img src="' + img + '" alt=""></a><div class="cpi__left-content"><span class="content__name">' + name + '</span><span class="content__price"><span class="cart__quantity">1</span>*<span class="cart__price">' + price + '</span></span></div></div><button class="cpi__right"><i class="fas fa-trash-alt"></i></button></div></div>')
        var count = 0;
        $(".cart__product-item").each(function () {
            count += parseInt($(this).find(".cart__quantity").html());
        });
        $("#lblCartCount").text(count);
    }
});
// xóa cart
$(".cpi__right").click(function () {
    $(this).closest('.cart__product-item').remove();
});
//xoá cart mới thêm
$('.cart__product').on('click', '.cpi__right', function () {
    $(this).closest('.cart__product-item').remove();
});
// menu
//carousel Laptop bán chạy
// $(document).ready(function() {
// $('.owl-carousel').owlCarousel({
//     stagePadding: 50,
//     loop:true,
//     margin:10,
//     nav:true,
//     responsive:{
//         0:{
//             items:1
//         },
//         600:{
//             items:3
//         },
//         1000:{
//             items:5
//         }
//     }
// })});
// notify__navbar
$(".header__navbar-item--has-notify").hover(function () {
    $('.navbar__notify').css({ "display": "block", });
}, function () {
    $('.navbar__notify').css({ "display": "none" });
});
$(".header__navbar-item--has-qr").hover(function () {
    $('.header__qr').css({ "display": "block", });
}, function () {
    $('.header__qr').css({ "display": "none" });
});
// cart
$(".btn__card").hover(function () {
    $('.cart__hidden').css({ "display": "block", "z-index": "10000" });
}, function () {
    $('.cart__hidden').css({ "display": "none" });
});
//user
$('.user__tag').hover(function () {
    $('.user_hiddent').css({ "display": "block", "z-index": "10000" });
}, function () {
    $('.user_hiddent').css({ "display": "none" });
});
$('.user_hiddent').hover(function () {
    $('.user_hiddent').css({ "display": "block", "z-index": "10000" });
}, function () {
    $('.user_hiddent').css({ "display": "none" });
});