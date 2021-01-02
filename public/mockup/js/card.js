function capNhatTien() {
    var tien = document.getElementsByClassName('tien');
    var soluong = document.getElementsByClassName('soluong');
    var tongTien = 0;
    for (var i = 0; i < tien.length; i++) {
        tongTien += parseFloat(tien[i].innerHTML) * parseInt(soluong[i].value);
    }
    var tongTienSanPham = document.getElementById('tongTienSanPham');
    tongTienSanPham.innerHTML = tongTien + " đ";
    var tongTienThanhToan = tongTien + 50000;
    document.getElementById('othanhtien').innerHTML = tongTienThanhToan + " đ";
}
var soluong = document.getElementsByClassName('soluong');
function tru1() {
    if (soluong[0].value > 1) {
        soluong[0].value = parseInt(soluong[0].value) - 1;
        capNhatTien();
    }
}
function cong1() {
    soluong[0].value = parseInt(soluong[0].value) + 1;
    capNhatTien();
}
function tru2() {
    if (soluong[1].value > 1) {
        soluong[1].value = parseInt(soluong[1].value) - 1;
        capNhatTien();
    }
}
function cong2() {
    soluong[1].value = parseInt(soluong[1].value) + 1;
    capNhatTien();
}
function tru3() {
    if (soluong[2].value > 1) {
        soluong[2].value = parseInt(soluong[2].value) - 1;
        capNhatTien();
    }
}
function cong3() {
    soluong[2].value = parseInt(soluong[2].value) + 1;
    capNhatTien();
}
capNhatTien();

