
$(document).ready(function(){
  $.getJSON('update_file.php', function (data) {
  
    let hasil = data;
    $.each(hasil, function(i, data){
      $('.js-data-example-ajax').append(`<option value="`+ data.id_perawat +`">`+ data.nama_perawat +`</option>`)
      $('.js-data-example-ajax').select2()
    });
  });
  });


