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
$(".btn__card").hover(function (event) {
    event.preventDefault();
    var cart_item = document.getElementsByClassName("cart__product")[0];
    var cart_rows = cart_item.getElementsByClassName("cart__product-item");
    var total = 0;
    for (var i = 0; i < cart_rows.length; i++) {
        var cart_row = cart_rows[i]
        var price_item = cart_row.getElementsByClassName("cart__price")[0]
        var quantity_item = cart_row.getElementsByClassName("cart__quantity")[0]
        var price = parseFloat(price_item.innerText.replace(/,/g, ""))
        var quantity = parseInt(quantity_item.innerText)
        total = total + (price * quantity)
    }
    document.getElementsByClassName("cart__total-price")[0].innerText = total
    $('.cart__price').formatCurrency({symbol: ''});
    $('.cart__total-price').formatCurrency({symbol: ''});
}
);
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
//format currency
$(document).ready(function(){
    $('.cardGia').formatCurrency({symbol: ''});
    $('.cartGG').formatCurrency({symbol: ''});
    $('.GT').find('span').formatCurrency({symbol: ''});
    $('.GT').next().find('b').formatCurrency({symbol: ''});
    $('#othanhtien').formatCurrency({symbol: ''});
    $('.G').find('b').formatCurrency({symbol: ''});
});