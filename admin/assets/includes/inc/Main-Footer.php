     <footer>Copyrights &copy; <?php echo date("Y"); ?> <a href="<?php echo SITE_URL ?>" target="_blank"><?php echo SITE_NAME ?></a> - All rights reserved. Designed and Developed by <a target="_blank" href="<?php echo DEV_URL; ?>" title="Mates Technologies - Let's Grow With US!"><?php echo DEV_NAME; ?></a></footer>
     </div>
     <!-- END Page Content -->

     </div>
     <!-- END Page Wrapper -->

     <!-- Scroll to top -->
     <a href="#" id="to-top" class="to-top"><i class="fas fa-angle-double-up"></i></a>
     <!-- JavaScript Resources -->
     <script src="<?php echo BASE_URL ?>assets/js/jquery-2.1.3.min.js"></script>
     <script src="<?php echo BASE_URL ?>assets/js/bootstrap.min.js"></script>
     <script src="<?php echo BASE_URL ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
     <script src="<?php echo BASE_URL ?>assets/js/xavier.js"></script>
     <!-- Highcharts JS Files -->
     <script src="<?php echo BASE_URL ?>assets/js/plugins/charts/highCharts/highcharts.js"></script>
     <!-- Initialize Form Validation -->
     <script src="<?php echo BASE_URL ?>assets/js/plugins/formValidation/configurationsFormsValidation.js"></script>
     <script src="<?php echo BASE_URL ?>assets/js/plugins/formValidation/jquery.validate.js"></script>
     <script>
          $(function() {
               FormsValidation.init();
          });
     </script>
     <!-- Chosen JS - https://harvesthq.github.io/chosen/ -->
     <script src="<?php echo BASE_URL ?>assets/js/plugins/chosen/chosen.js"></script>
     <script type="text/javascript">
    
 
          $(document).ready(function() {
                
     $.fn.dataTable.ext.type.detect.unshift(
    function ( d ) {
        return d === 'Present' || d === 'Upcoming' || d === 'Previous' ?
            'date' :
            null;
    }
);
 
$.fn.dataTable.ext.type.order['date-pre'] = function a ( d ) {
    switch ( d ) {
        case 'Present':    return 1;
        case 'Upcoming': return 2;
        case 'Previous':   return 3;
    }
    return 0;
};
               $.fn.dataTable.moment('DD MMMM YYYY');
               $('#data-table').dataTable({
                    "order": [[ 1, "asc" ]],
                    "columnDefs": [ {
                         "type": "date",
                         "targets": -1
                    } ]
               });
               $(".chosen-select").chosen({
                    width: '100%'
               });
               
          });
          
     </script>

     <!-- Datatables JS - https://cdn.datatables.net/ -->
     <script src="<?php echo BASE_URL ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.20/sorting/datetime-moment.js"></script>
     <script src="<?php echo BASE_URL ?>assets/js/plugins/datatables/dataTables.bootstrap.min.js"></script>
     <!-- Select2 -->
     <script src="<?php echo BASE_URL ?>assets/select2/dist/js/select2.min.js"></script>
     
     <script type="text/javascript">
     
          $(document).ready(function() {
               $(".select_group").select2();
          });
     </script>
     <script>
          function alphaOnly(event) {
               var key = event.keyCode;
               return ((key >= 48 && key <= 57) || (key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key == 8 || key == 32);
          };
     </script>
     