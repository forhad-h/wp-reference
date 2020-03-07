!(function($) {

$(document).ready(function() {

$('form#cl-form-send-cv').on('submit', function(e) {
    e.preventDefault();
    
    var fromEmail = $(this).find('input[name=u_from_email]').val();
    var toEmail = $(this).find('input[name=u_to_email]').val();
    var message = $(this).find('textarea[name=u_msg]').val();
    var attachment = $(this).find('input[name=candidate_cv_file]').prop('files')[0];
    
    var statusElm = $(this).find('.cl_status_msg');
    var submitBtnElm = $(this).find("#ct-send-cv-submit-btn");
    
    submitBtnElm.find("[type=submit]").prop('disabled', true).css({opacity: '0.4'}).val('Sending...');
    
   
    var formData = new FormData();
   
    formData.append('from_email', fromEmail);
    formData.append('to_email', toEmail);
    formData.append('message', message);
    formData.append('attachment', attachment);
    

    $.ajax(
        {
          type: "POST",
          url: clChildAjax.url + "?action=cl_send_cv",
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
              submitBtnElm.find("[type=submit]").prop('disabled', false).css({opacity: '1'}).val('Send Now');
              statusElm.text(data);
          }
        }
    )
        
        
});


});


})(jQuery);

