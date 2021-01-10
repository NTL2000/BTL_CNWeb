function ktraHoTen(){
    var hoten = document.getElementById("hoten").value;
    var regexHoten = /^[a-zA-Z]./;
    if(regexHoten.test(hoten)==false){
        document.getElementById("er1").innerHTML = "(*) Họ tên sai (chữ cái đầu phải viết In Hoa)"
        return false;
    }else{
        document.getElementById("er1").innerHTML = "";
        return true;
    }
}
function ktraSDT(){
    var sodienthoai = document.getElementById("sodienthoai").value;
    var regexsdt = /^[0-9]{8,}$/;
    if(regexsdt.test(sodienthoai)==false){
        document.getElementById("er2").innerHTML = "(*) Số điện thoại không hợp lệ"
        return false;
    }else{
        document.getElementById("er2").innerHTML = "";
        return true;
    }

}
function ktraEmail(){
    var email = document.getElementById("email").value;
    var regexemail =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 

    if(regexemail.test(email)==false){
        document.getElementById("er3").innerHTML = "(*) Email không hợp lệ"
        return false;
    }else{
        document.getElementById("er3").innerHTML = "";
        return true;
    }

}
function ktraMatKhau(){
    var matkhau = document.getElementById("matkhau").value;
    var regexmatkhau = /^\w{8,16}$/;

    if(regexmatkhau.test(matkhau)==false){
        document.getElementById("er4").innerHTML = "(*) Mật khẩu không chứa kí tự đặc biệt và khoảng trắng (8-16 ký tự)"
        return false;
    }else{
        document.getElementById("er4").innerHTML = "";
        return true;
    }
}
function xacnhanMatKhau(){
    var confirm = document.getElementById("xacnhanmatkhau").value;
    var matkhau = document.getElementById("matkhau").value;

    if(ktraMatKhau()){
        if(confirm == matkhau){
            document.getElementById("er5").innerHTML = "";
            return true;
        }else{
            document.getElementById("er5").innerHTML = "Mật khẩu xác nhận không khớp";
            return false;
        }
    }
}
// background img
$(document).ready(function () {
    $(".container-fluid").css({"background-image": "url(mockup/images/dangky/hinh-nen-Galaxy-Wallpaper-23.jpg)",  "margin-top": "0.7%"})
});


