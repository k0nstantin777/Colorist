<!-- jQuery 2.1.4 -->
    <script src="admin/assets/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="admin/assets/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Sparkline -->
    <script src="admin/assets/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="admin/assets/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="admin/assets/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="admin/assets/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="admin/assets/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="admin/assets/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="admin/assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="admin/assets/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="admin/assets/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/assets/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="admin/assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="admin/assets/dist/js/demo.js"></script>
    <script src="admin/js/bootstrap-select.min.js"></script>
    
    <script>
        var uri = getUri(document.location.href);
        setActiveItemMenu(uri);
    
        /*
        Set Active Item Menu
        */
        
        function setActiveItemMenu(uri){

            $(".sidebar-menu").find('li').removeClass('active');
            $(".sidebar-menu a[href='"+uri+"']").parents('li').addClass('active');
        }

        /**
         * Получение текущего Uri (для главной страницы обрезаем слэш) 
         * @param {string} uri
         * @returns {string}
         */
        function getUri (uri){
            if (uri.endsWith('/')){
                return uri.substring(0, uri.lastIndexOf('/'));
            } 

            return uri;
        }
    </script>    