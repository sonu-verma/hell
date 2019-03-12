 $(document).ready(function(){
  // alert('1');
   /*Data Table Script*/
  $('.data-table').DataTable({
    "info": false,
    "pagingType": "full_numbers",
    "dom": '<"top"i>rt<"bottom"flp><"clear">',
    "searching": false,
    "oLanguage": {
            "oPaginate": {
              "sNext": '<img src="assets/images/next.png" width="7" height="11" alt=""/>',
              "sPrevious": '<img src="assets/images/prev.png" width="7" height="11" alt=""/>',
        "sFirst": '<img src="assets/images/first-arrow.png" width="10" height="11" alt=""/>',
              "sLast": '<img src="assets/images/last-arrow.png" width="10" height="11" alt=""/>'
            }
          }
  });


// datepicker ends here
// $('.selectpicker').selectpicker(); 
  
 });