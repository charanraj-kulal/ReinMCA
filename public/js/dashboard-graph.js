$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();
    
    var params;
    
    function cb(start, end) {
        
        $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
        params={
            start: start.format('YYYY-MM-DD'),
            end: end.format('YYYY-MM-DD')
        };
        

        // COUNTER PART
        get_expense_count(params);
        get_expense_pending(params);
        get_expense_approved(params);
        get_expense_rejected(params);
        get_user_count(params);
    }
    
    //Sorting Date wise
    $( ".dashboard-icon-link" ).click(function() {
      var href=$(this).attr("href");
      var c=href.indexOf("?") == -1 ? "?": "&" ;
      $url = href+c+"start_date="+params.start+"&end_date="+params.end;
      $(this).attr("href",$url); 
    });
    
    
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
        
    }, cb);

    cb(start, end);
    
    function get_expense_count(params){
        jQuery.ajax({
                    url: Settings.base_url+'performance/expense_count',
                    type: 'POST',
                    data: params,
                    dataType: 'json',
                    
                    success: function(data) {
                        
                        if(typeof(data)=='object'){
                            $('#ExpCount').find('h2').html(Math.round(data.current_sales));
                        }
                    }
                  });
    }
    
    function get_expense_pending(params){
        jQuery.ajax({
                    url: Settings.base_url+'performance/expense_pending',
                    type: 'POST',
                    data: params,
                    dataType: 'json',
                    
                    success: function(data) {
                        
                        if(typeof(data)=='object'){
                            $('#ExpPending').find('h2').html(Math.round(data.current_sales));
                        }
                    }
                  });
    }
    
    function get_expense_approved(params){
        jQuery.ajax({
                    url: Settings.base_url+'performance/expense_approved',
                    type: 'POST',
                    data: params,
                    dataType: 'json',
                    
                    success: function(data) {
                        
                        if(typeof(data)=='object'){
                            $('#ExpApproved').find('h2').html(Math.round(data.current_sales));
                        }
                    }
                  });
    }
    
    function get_expense_rejected(params){
        jQuery.ajax({
                    url: Settings.base_url+'performance/expense_rejected',
                    type: 'POST',
                    data: params,
                    dataType: 'json',
                    
                    success: function(data) {
                        
                        if(typeof(data)=='object'){
                            $('#ExpRejected').find('h2').html(Math.round(data.current_sales));
                        }
                    }
                  });
    }
    
    function get_user_count(params){
        jQuery.ajax({
                    url: Settings.base_url+'performance/user_count',
                    type: 'POST',
                    data: params,
                    dataType: 'json',
                    
                    success: function(data) {
                        
                        if(typeof(data)=='object'){
                            $('#UserCount').find('h2').html(Math.round(data.current_sales));
                        }
                    }
                  });
    }
   
});