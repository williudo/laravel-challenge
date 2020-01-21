$(function(){
  $('.datepicker').datepicker({
    startView: 0,
    startDate: '+0d',
    format: 'dd/mm/yyyy'
  });
  $('.datepicker').mask('99/99/9999');

  //edit event
  $('.bt_edit').click(function(e){
    e.preventDefault();
    window.location.href = $(this).data('href');
  });
  //delete event
  $('.bt_delete').click(function(e){
    $.ajax({
      url: $(this).data('href'),
      type: 'get',
      success: function (data) {
        console.log(data);
        window.location.reload();
      },
      error: function (e) {
        console.log(e);
      }
    });
  });
  var form;

  $('#file_csv').change(function(e){
    form = new FormData();
    form.append('file_csv', e.target.files[0]);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('input[name$="_token"]').val()
      },
      url: $(this).data('href'),
      data: form,
      processData: false,
      contentType: false,
      type: 'POST',
      success: function (data) {
        // utilizar o retorno
        console.log(data);
      },
      error: function (data) {
        // utilizar o retorno
        console.log(data);
      }
    });
  });

});//ready func.
