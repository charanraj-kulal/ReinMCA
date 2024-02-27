var CSV_sales_REPORT = [];
/* Cancel ajax params */
var REPORT_AJAX;
var CANCELLED_REQUEST = false;
$(document).ready(function() {

   $('input[name="dateRange"]').daterangepicker({
        "maxSpan": {
        "days": 90
        },
        showDropdowns: true,
        locale: {
          format: 'DD-MM-YYYY'
        },
        "autoApply": true
   });
   
/* Append Empty Tbody Tag */ 
if($("#salesReport").length){
  $("#salesReport").append('<tbody></tbody>');
}
});

/* Cancel ajax request */
$(".cancel-request").click(function() {   
     REPORT_AJAX.abort();
     CANCELLED_REQUEST = true;
     jQuery('.progress-bar').hide();
     $('#resultado_total').empty();
     $('.frmsales button[type=submit]').prop('disabled',false);
     $(".cancel-request").addClass('d-none'); 
});

/* sales Summary  Report */
function process_sales_summary_report($self){
    $self.find('button[type=submit]').attr('disabled','disabled');
    $params = $self.serialize();
    jQuery('.progress-bar').show();
    $('.progress-shower').show();
    wid='0%';
    $progress=jQuery('.progress-width');
    $progress.width(wid );
    $progress.html(wid);
    $("#salesReport tbody").find('tr').remove();
    $('.export-btn').hide();
    CSV_sales_REPORT = [];
    $(".cancel-request").removeClass('d-none');
    // disable cancel action
    CANCELLED_REQUEST = false;
    perform_sales_summary_report_ajax($params);
}

function perform_sales_summary_report_ajax(params){ 
    // chekc cancel is activated
    if(CANCELLED_REQUEST == true){
        return;
    }
   
     last_params = params;
      REPORT_AJAX=jQuery.ajax({
                    url: Settings.base_url+'reports/payout_report',
                    type: 'POST',
                    data: params,
                    dataType: 'json',
                    
                    success: function(data) {
                        if(data.total_rows ==0){
                            swal("","No information found.","warning");
                            // hide cancel btn
                            $(".cancel-request").addClass('d-none');
                        }
                        $progress=jQuery('.progress-width');
                        var wid=(parseFloat(data.progress_per).toFixed(2)) + '%';
                        $progress.width(wid );
                        $progress.html(wid);
                        if(data.html){
                            $dom = $("<table>"+data.html+"</table>");
                            $("#salesReport tbody").append(data.html);
                             processsalesreportCsv($dom);
                        }
                        
                        
                          
                        if(data.next){
                            data.html = '';
                            perform_sales_summary_report_ajax(data);
                            
                        }else{
                            jQuery('.progress-bar').hide();
                            if(data.total_rows)
                            $('.export-btn').show();
                            $('.frmsales button[type=submit]').prop('disabled',false);
                            // hide cancel btn
                            $(".cancel-request").addClass('d-none'); 
                        }
                        
                        var sum = 0;
                        $(".subtotal").each(function(){
                            sum += parseFloat($(this).text());
                        });

                        $('#resultado_total').text(sum); 
                        
                           
                           
                    },
                    error: function(){
                         setTimeout(function(){ 
                           perform_sales_summary_report_ajax(last_params);
                         },2000);
                    }
         });
}


function processsalesreportCsv($dom){
    $dom.find("tr").each(function(x){
                                var row = [];
                                if($(this).find('td').length > 1){
                                    $(this).find("td").each(function(index){

                                            row.push($(this).text());
                                         
                                    });
                                }
                                if(row.length)
                                CSV_sales_REPORT.push(row);        
    });
}



function exportsalesXlsReport(){
        $('#salesReport a').contents().unwrap();
    	$("#salesReport").table2excel({
					exclude: ".noExl",
					name: "Report",
					filename: 'Payout_Report',
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
}

function exportPDFReport(){
    $("#salesReport").tableHTMLExport({type:'pdf',filename:'Payout_Report.pdf',name:"Report",orientation:"l"});
    
}


/*function calc_sum(){
    var sum = 0;
    $(".subtotal").each(function(){
        sum += parseFloat($(this).text());
    });
    
    $('#resultado_total').text(sum);
    
    var foot = $(".table-border-style").find('tfoot');
    if (!foot.length)
    { foot = $('<tfoot>').prependTo(".table-border-style"); 
    foot.append($('<tr class="export-pdf"><td colspan="3"></td><td><strong>Total </strong></td><td><strong>'+parseFloat(sum).toFixed(2)+'</strong></td><td></td><td></td></tr>'));

}*/