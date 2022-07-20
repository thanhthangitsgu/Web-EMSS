$(document).ready(function() {
    $.post(
        `http://localhost/emss/quyen/getChiTietQuyen`,
        function(response) {
            if (response.thanhcong) {
                let quyens = response.data;
                quyens.forEach((data) => {
                    let id = "#" + data.ma_chuc_nang;
                    $(id).removeClass("d-none");
                });
            }
        }
    );
    $.post(

        `http://localhost/emss/auth/checkLogin`,
        function(response) {
            console.log(response);
            if (response.thanhcong) {
                let id = "#dangnhap";
                $(id).addClass("d-none");
                //$('#thongtincanhan').removeClass('d-none');
            }
        }
    );
});