$(document).ready(function(){
    $('#btn-submit').click(function(){
      $.blockUI({
        message: ``,          
        timeout: 10000
      });
    });
  });