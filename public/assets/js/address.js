/**Trả về mảng chứa danh sách tỉnh huyện xã
 * Ví dụ: var address = $.theResponse;
 * addres[0]['name'] = Thành phố Hà Nội
 * */
$.extend({
    xResponse: function() {
        var theResponse = null;
        $.ajax({
            url: 'https://provinces.open-api.vn/api/?depth=3',
            async: false,
            success: function(respText) {
                theResponse = respText;
            }
        });
        return theResponse;
    }
});