$(function() {
    var provinceObject = $('#province');
    var amphureObject = $('#amphure');
    var districtObject = $('#districts');
    var zipcodeObject = $('#zipcode');

    // on change province
    provinceObject.on('change', function() {
        var provinceId = $(this).val();

        amphureObject.html('<option value="">เลือกอำเภอ</option>');
        districtObject.html('<option value="">เลือกตำบล</option>');

        $.get('get_amphure.php?province_id=' + provinceId, function(data) {
            var result = JSON.parse(data);
            // console.log(data);
            $.each(result, function(index, item) {
                amphureObject.append(
                    $('<option></option>').val(item.id).html(item.name_th)
                );
            });
        });
    });

});