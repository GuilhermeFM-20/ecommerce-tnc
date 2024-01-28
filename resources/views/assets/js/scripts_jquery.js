$(document).ready(function(){
  $('#btn-submit').click(function(){
    $.blockUI({
      message: ``,          
      timeout: 10000
    });
  });
});



$('.money').mask('000.000.000,00', {reverse: true});


 