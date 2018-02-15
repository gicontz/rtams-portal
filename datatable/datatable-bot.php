<script src="table/js/jquery.js"></script>
<script src="table/js/dataTables.bootstrap.js"></script>
<script src="table/js/jquery.dataTables.js"></script>

<!--print-->
<script src="table/js/buttons.dataTables.min.js"></script>
<script src="table/buttons.flash.min.js"></script>
<script src="table/js/buttons.html5.min.js"></script>
<script src="table/js/buttons.print.min.js"></script>
<script src="table/js/jszip.min.js"></script>
<script src="table/js/pdfmake.min.js"></script>
<script src="table/js/vfs_fonts.js"></script>
<script src="table/js/buttons.print.js"></script>
<script src="table/js/dataTables.buttons.js"></script>
<script src="table/js/buttons.colVis.min.js"></script>


<!--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>-->

<script>      
$(document).ready(function() {
    var table = $('#datatable').DataTable( {
        
    scrollX: 300,
    scrollX: true,
    pagingType: "full_numbers",
        
   dom: 'Bfrtip',
        
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
            
            
        buttons: [
           'pageLength',
            
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                 exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'EXCEL',
                 exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV',
                 exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend:    'print',
                titleAttr: 'PRINT',
                
                exportOptions: {
                columns: ':visible',
 
                }
                
            },
            
          
            {
                extend: 'colvis',
                collectionLayout: 'fixed two-column'
            }
        ],
            columnDefs: [ {
            visible: false
        } ],
        
      

    } );
    
} );
   
</script>

<!--"scrollX": 300,
       autoPrint: false,
        "scrollX": true,
        "pagingType": "full_numbers",
        
        -->