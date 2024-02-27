/** VERSION 3.0.0 */
var FV_patterns = {
    phoneno : /^\d{10}$/,
    emailReg: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
    pincode : /^(?:\s*\d{6}\s*(?:,|$))+$/
}
function c_submit_validation($t){
      
      var error = 0;
      var focus_element = '';
      $self=$t;
      $self.find('.error-message').remove();
      
      $self.find(".required").each(function() {
           $field=$(this);
           // Required
           if($field.hasClass("required")){
                if(form_required($field)){
                 error = 1;
                 if (focus_element == '') focus_element = $field;
               }
                
           }
           // Custom field validatation eg. data-fvalidate="function_name"
            if (typeof $field.data('fvalidate') !== 'undefined')
            {
                     $fun=$field.data("fvalidate");  
                     if($fun){
                           $fun=$fun.replace(/-/g, '_');
                           $out=window[$fun]($field);
                           if($out.error){
                                 error = 1;
                                 if (focus_element == '') focus_element = $out.focus;
                           }else{
                              errorMessageRemove($out.focus);
                           }
                     }
            }
           
      });
      // to check max file size
       $self.find("[data-max-size]").each(function() {
           $field=$(this);
           
           if(form_filesize_validation($field)){
             error = 1;
             if (focus_element == '') focus_element = $field;
           }
            
      });
      
      // to check mobile value validation
      $self.find(".mobile").each(function() {
           $field=$(this);
           if(form_mobile_validation($field)){
             error = 1;
             if (focus_element == '') focus_element = $field;
           }
           
      });
      
      // to check non empty values
      $self.find(".non-empty").each(function() {
          $field=$(this);
           
           
           if(form_check_zero_filled($field)){
             error = 1;
             if (focus_element == '') focus_element = $field;
           }
      });
      
      // to check email value validation
      $self.find(".email").each(function() {
            $field=$(this);
             form_email_validation($field);
             if(form_email_validation($field)){
             error = 1;
             if (focus_element == '') focus_element = $field;
           }
             
            
      });
      
      $self.find(".pincode").each(function() {
             $field=$(this);
             form_pincode_validation($field);
             if(form_pincode_validation($field)){
             error = 1;
             if (focus_element == '') focus_element = $field;
           }    
      });
      // to check the numeric value validation
      $self.find(".numeric").each(function() {
           $field=$(this);
           
           if(form_numeric_validation($field)){
             error = 1;
             if (focus_element == '') focus_element = $field;
           }
            
      });
      
      // to check minlength
      $self.find("[data-vminlength]").each(function() {
           $field=$(this);
           
           if(form_min_length_validation($field)){
             error = 1;
             if (focus_element == '') focus_element = $field;
           }
            
      });
      
      // to check images file
      $self.find(".images-only").each(function() {
           $field=$(this);
           
           if(form_images_validation($field)){
             error = 1;
             if (focus_element == '') focus_element = $field;
           }
            
      });
      
       // to check file size
      $self.find(".file-size").each(function() {
           $field=$(this);
           
           if(form_filesize_validation($field)){
             error = 1;
             if (focus_element == '') focus_element = $field;
           }
            
      });
      
      // to check pdf file
      $self.find(".pdf-only").each(function() {
           $field=$(this);
           
           if(form_pdf_validation($field)){
             error = 1;
             if (focus_element == '') focus_element = $field;
           }
            
      });
      
      // Global Custom validatation eg. data-gvalidate="i-function_name"
      $self.find("[data-gvalidate^='i-']").each(function(){
           $addt=$(this);
           $fun=$addt.data("gvalidate");
           if($fun){
               $fun=$fun.replace(/-/g, '_');
               $out=window[$fun]($addt);
               if($out.error){
                     error = 1;
                     if($out.focus)
                     if (focus_element == '') focus_element = $out.focus;
               }
           }
      });
      if (error) {
            //if(focus_element)
			//$self.find(focus_element).focus();
            errorHtml=$self.find(".error-message:first");
			var input=errorHtml.siblings('input[type=text]');
            
            var select=errorHtml.closest("div").find('select.select2');
            if(input.length){
			     input.focus();
			}else if(select.length){
			     select.select2('open');
			}else{
			    if(focus_element){
			        $self.find(focus_element).focus(); 
			    }
			}
            return false;
		}
      // Check if ajax submit exists 
      if(typeof($self.attr("data-ajaxSubmit"))!=="undefined")
      {
         $fun=$self.attr("data-ajaxSubmit");
         window[$fun]($self);
         return false;
      }
     // check any user confirmation added
      if(typeof($self.attr("data-formConfirmBox"))!=="undefined")
      {
        $self.find('#RconfirmBtn').val(0);
         var msg=$self.attr("data-formConfirmBox");
         var btn = $(document.activeElement);
         if(btn.attr('name') == 'confirm'){
             $self.find('#RconfirmBtn').val(1);
             swal({
                title: "Are you sure?",
                text: msg,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText:'Confirm',
                closeOnConfirm: false
            },
            function (val) {
                   if(val){
                            swal.close();
                            $self.toggleClass('sk-loading');
                            $self.off("submit").submit();

                   }
                }
            );
            return false;
         }
         
      }
     if($self.find('.sk-spinner').length){
        $self.toggleClass('sk-loading');
     }else
     $self.find("[type=submit]").addClass("disabled").val("Please wait...").css('pointer-events','none');
     
     
     return true;
      

}

/** Form Required Validation **/
function form_required($field,focus_element=''){
    var error = 0 ;
    var label='val-required';
    if($.trim($field.val())=="" || $.trim($field.val()) ==null){
                $chosen=$field.hasClass("select2"); // styled dropdown
                if($chosen){
                    $ch_field=$field.parent().find(".select2-container");
                    formAlert($ch_field,'',label);
                    
                }else
                formAlert($field,'',label);
                error=1;
                
     }else{
        errorMessageRemove($field,label);
     }
     return error;
     
}

/**  check zero filled values **/

function form_check_zero_filled($field,focus_element=''){
   var error = 0 ;
   var label='non-empty';
    $is_zero = parseFloat($field.val());
            if($is_zero <= 0){
                formAlert($field,'This field cannot be zero.',label);
                error=1;
            }else{
                errorMessageRemove($field,label);
            }
            
    return error;
     
}

function form_email_validation($field,focus_element=''){
   var error = 0 ;
   var label='val-email';
    if($field.val()!="" && !FV_patterns.emailReg.test($field.val())){
                      formAlert($field,'Enter valid email id.',label);
                      error = 1;
                }else{
                    errorMessageRemove($field,label);
                }
                
    return error;
     
}

function form_pincode_validation($field,focus_element=''){
   var error = 0 ;
   var label='val-pincode';
    if($field.val()!="" && !FV_patterns.pincode.test($field.val())){
                      formAlert($field,'Enter valid pincode.',label);
                      error = 1;
                }else{
                    errorMessageRemove($field,label);
                }
                
    return error;
     
}

function form_mobile_validation($field,focus_element=''){
   var error = 0 ;
    var label='val-mobile';
    if($field.val()!="" && !FV_patterns.phoneno.test($field.val())){
                      formAlert($field,'Enter valid mobile number.',label);
                      error = 1;
           }else{
                    errorMessageRemove($field,label);
                }
    return error;
}


function form_numeric_validation($field,focus_element=''){
   var error = 0 ;
   var label='val-number'
    if($field.val()!="" && isNaN($field.val())){
                      formAlert($field,'Enter valid number.',label);
                      error = 1;
           }else{
                    errorMessageRemove($field,label);
                }
     return error;
}

function form_min_length_validation($field,focus_element=''){
   var error = 0 ;
   var label='val-minlength';
   var minLength = parseInt($field.attr('data-vminlength'));
    if($field.val().length < minLength){
                      formAlert($field,'Enter minimum '+minLength+' characters.',label);
                      error = 1;
           }else{
                    errorMessageRemove($field,label);
                }
     return error;
}


function form_images_validation($field,focus_element=''){
   var error = 0 ;
   var label='val-fileImages';
  //var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
  var fileExtension = ['jpeg', 'jpg', 'pdf', 'docx'];      
    if($field.val()){
        if ($.inArray($field.val().split('.').pop().toLowerCase(), fileExtension) == -1) {
           
            formAlert($field,"Only formats are allowed : "+fileExtension.join(', '),label);
                      error = 1;
                }else{
                    errorMessageRemove($field,label);
                }
                      
    }else{
                    errorMessageRemove($field,label);
    }
     return error; 
}

function form_pdf_validation($field,focus_element=''){
   var error = 0 ;
   var label='val-filePdf';
   var fileExtension = ['pdf'];
        
    if($field.val()){
        if ($.inArray($field.val().split('.').pop().toLowerCase(), fileExtension) == -1) {
           
            formAlert($field,"Only formats are allowed : "+fileExtension.join(', '),label);
                      error = 1;
                }else{
                    errorMessageRemove($field,label);
                }
                      
    }else{
                    errorMessageRemove($field,label);
    }
     return error; 
}

function form_filesize_validation($field,focus_element=''){
   var error = 0 ;
   var maxsize = $field.attr('data-max-size');
   var label='val-fileSize';
   
    if($field.get(0).files.length){ 
         if(fileSize = $field.get(0).files[0].size>maxsize){
            const i = parseInt(Math.floor(Math.log(maxsize) / Math.log(1024)), 10)
            formAlert($field,'File size cannot be more then ' + i + 'MB');
            error = 1;
            }else{
                    errorMessageRemove($field,label);
                }
    }
    else{
                    errorMessageRemove($field,label);
    }            
    return error; 
}



$(function(){
   // FORM BUTTON WISE HANDLER
   $("form.validate").submit(function(e){
      return c_submit_validation($(this));
   });
   
   // INPUT WISE FORM VALIDATION HANDLER
    $('body').on('keyup change', "form.validate .required", function() {
        $field=$(this);
        form_required($field);
    });
    
    // INPUT WISE FORM VALIDATION HANDLER
    $('body').on('keyup change', "form.validate .email", function() {
        $field=$(this);
        form_email_validation($field);
    });
    
     // INPUT WISE FORM VALIDATION HANDLER
    $('body').on('keyup change', "form.validate .mobile", function() {
        $field=$(this);
        form_mobile_validation($field);
    });

    // INPUT WISE FORM VALIDATION HANDLER
    $('body').on('keyup change', "form.validate .numeric", function() {
        $field=$(this);
        form_numeric_validation($field);
    });
    
    // INPUT WISE FORM VALIDATION HANDLER
    $('body').on('keyup change', "form.validate .non-empty", function() {
        $field=$(this);
        form_check_zero_filled($field);
    });
    
    // INPUT WISE FORM VALIDATION HANDLER
    $('body').on('keyup change', "[data-vminlength]", function() {
        $field=$(this);
        form_min_length_validation($field);
    });
    
    // INPUT WISE FORM VALIDATION HANDLER
    $('body').on('change', "form.validate .images-only", function() {
        $field=$(this);
        form_images_validation($field);
    });
    
    
    // INPUT WISE FORM VALIDATION HANDLER
    $('body').on('change', "form.validate .pdf-only", function() {
        $field=$(this);
        form_pdf_validation($field);
    });
    
    // INPUT WISE FORM VALIDATION HANDLER
    $('body').on('change', "form.validate .file-size", function() {
        $field=$(this);
        form_filesize_validation($field);
    });


});
 
// ERROR TOOLTIP REMOVE
function errorMessageRemove($field,$label='val-custom'){
   if($field){
   
       $parent = $field.closest(".form-group");
       $parent.find('.error-message.'+$label).remove();
       if($parent.find('.error-message').length ===0)
       $parent.removeClass('has-error');
   }
   
}

// ADD ERROR TOOLTIP
function formAlert($field,$msg='',$label='val-custom'){
    if($field){
        $parent = $field.closest(".form-group");
        if($parent.find('.error-message').length ===0){
            $parent.find('.error-message.'+$label).remove();
            $parent.addClass('has-error');
            $field.after('<span class="error-message text-danger '+$label+' help-block fadeInRight m-t-xs"><small>'+($msg ? $msg : 'This field is required.')+'</small></span>');
            
        }
    }
    
}

/* Sampe Developing custom functions */
function i_password($self){
    var validate={error:0,focus:""};
    $val=$self.val();
    if($self.val()!="" && $val.length < 5){
        formAlert($self,'Password must be 5 or more characters long.');
                      validate.error = 1;
                      if (validate.focus == '') validate.focus = $self;
    }
    return validate;
}

function i_confirm($self){
    var validate={error:0,focus:""};
    $val=$self.val();
    $pass=$("#password").val();
    if($self.val()!=$pass){
        formAlert($self,'Password are not matching');
                      validate.error = 1;
                      if (validate.focus == '') validate.focus = $self;
    }

    return validate;
}

function i_name_valid($self){
    var validate={error:0,focus:""};
    if($self.val()!="" && $self.length < 5){
        formAlert($self,'Name must be 5 or more characters long.');
                      validate.error = 1;
                      if (validate.focus == '') validate.focus = $self;
    }
    return validate;
}

