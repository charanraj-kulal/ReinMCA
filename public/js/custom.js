
/*Delete Swal Message*/
function confirmDelete(self,msg='',button=''){

    swal({
            title: "Are you sure?",
            text: msg ? msg : "You will not be able to recover the record again!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText:button ? button: "Yes, Delete!",
            closeOnConfirm: false
        },
        function () {
           window.location.href = $(self).attr('href');
        }
    );
    return false;

}

/*Confirm Swal Message*/
function confirmApprove(self,msg='',button=''){

    swal({
            /*title: "Are you sure?",
            text: msg ? msg : "You will not be able to change the status again!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#129e52",
            confirmButtonText:button ? button: "Yes, Approve!",
            closeOnConfirm: false*/
            
            title: "Are you sure?",
            text: msg ? msg : "You will not be able to change the status again!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#129e52",
            confirmButtonText:button ? button: "Yes, Approve!",
            allowOutsideClick: true,
            html: true
    
        },
        function () {
            window.location.href = $(self).attr('href');
            $('#status-approve').modal('show');
        }
    );
    return false;

}
/*Select */
$(document).ready(function() {
    $('.my-select').select2();
});   

/*Requred Star Color*/
$("form label.control-label").each(function(index) {
        $html = $(this).text();
        $(this).html($html.replace("*", "<span class='text-danger'>*</span>"));
    });
    

/*Date Picker*/
$('body').on('click', ".date-picker .input-group-addon,.date-picker input", function () {
		$input = $(this).parent().find('input');
	
        applyDatePicker($input);

	});
    function applyDatePicker(input){
        var currentDate;
		input.datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true,
			clearBtn: true,
            }).on('changeDate', function(e) {
            	currentDate = e.format();
            });
        
		
		input.focus();
    }
    
 
/* Reject With Reason*/
$(document).ready(function() {
    $('#status-reject').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget) 
          var modal = $(this)
          modal.find('.modal-body input[name="data_expid_hidden"]').val(button.data('expid'))
        })
 });

function rejectExpense($self){
    $params = $self.serialize();
    
    jQuery.ajax({
            url: Settings.base_url+'expense/reject_expense',
            type: 'POST',
            data: $params,
            dataType: 'json',
            
            success: function(data) {
                if(data.status){
                swal("","Successfully Rejected","success");
                 setTimeout(function(){ 
                   window.location.href=data.redirect;
                 },2000);
                }else{
                    swal("","Failed to Reject. Please try again.","error");
                }
                   
            },
            error: function(){
                 swal("","Failed to Reject. Please try again.","error");
            }
    });
}

 
/* Approve */
$(document).ready(function() {
    $('.approve-btn').prop('disabled', true);
    $('#status-approve').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget) 
          var modal = $(this)
          modal.find('.modal-body input[name="data_expid_hidden"]').val(button.data('expid'))
          modal.find('.modal-body input[name="data_cost_hidden"]').val(button.data('cost'))

          $("#approved_amt").on("keyup",function(){
            var data_cost = $("input[name='data_cost_hidden']").val();
            var approved_amt = $(this).val();
            
                if(Number(approved_amt) > Number(data_cost)) {
                    $(".amount-notice").remove();
                    $(this).after("<span class='text-danger m-t-xs amount-notice'><small>Approved amount cannot be more than claim amount</small></span>");
                    $('.approve-btn').prop('disabled', true);
                }
                else{
                    $(".amount-notice").remove();
                    $('.approve-btn').prop('disabled', false);
                }
          });
          
        })
 });


function approveExpense($self){
    $params = $self.serialize();
    
    jQuery.ajax({
            url: Settings.base_url+'expense/approve_expense',
            type: 'POST',
            data: $params,
            dataType: 'json',
            
            success: function(data) {
                if(data.status){
                swal("","Successfully Approved","success");
                 setTimeout(function(){ 
                   window.location.href=data.redirect;
                 },2000);
                }else{
                    swal("","Failed to Approve. Please try again.","error");
                }
                   
            },
            error: function(){
                 swal("","Failed to Approve. Please try again.","error");
            }
    });
}

/*Forward Expense*/
$(document).ready(function() {
    $('#status-forward').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget) 
          var modal = $(this)
          modal.find('.modal-body input[name="data_expid_hidden"]').val(button.data('expid'))
          $('#forwarded_group').change(function(){
            var role = $(this).val();
            
            // AJAX request
            $.ajax({
                url: Settings.base_url+'expense/get_user_list',
                method: 'post',
                data: {role: role},
                dataType: 'json',
                success: function(options){

                    // Remove options
                    $('#forwarded_to').find('option').not(':first').remove();

                    // Add options
                    if(options){
                        $.each(options,function(index, element){
                            $('#forwarded_to').append(new Option(element.name, element.user_id));
                        });
                    }
                    
                }
            });    
          })                                        
        })            
});
  
function forwardExpense($self){
    $params = $self.serialize();
    
    jQuery.ajax({
            url: Settings.base_url+'expense/forward_expense',
            type: 'POST',
            data: $params,
            dataType: 'json',
            
            success: function(data) {
                if(data.status){
                swal("","Successfully Forwarded","success");
                 setTimeout(function(){ 
                   window.location.href=data.redirect;
                 },2000);
                }else{
                    swal("","Failed to Farward. Please try again.","error");
                }
                   
            },
            error: function(){
                 swal("","Failed to Forward. Please try again.","error");
            }
    });
}

/* Drop Down Reason */

$("#title").change(function(){
    if($(this).val() == "1") {
       $('#comment').addClass('required');
    } else {
       $('#comment').removeClass('required');
       $('.error-message').addClass('d-none');
    }
});