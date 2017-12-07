  </body>
</html>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; برنامج توثيق2017، كل الحقوق محفوظة.</p>
      </div>
    </footer>

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>

        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
    <script src="./js/empemployees.js"></script>
    
<script>
            $(document).ready(function(){
        //$('body').addClass('has-mini-sidebar');
        
        var viewportWidth = $(window).width();
        var viewportHeight = $(window).height();
            
            if (viewportWidth >= 1400){
                //alert(viewportWidth);
                $('body').removeClass('has-mini-sidebar');
            }
    

            $('#btn-sidebar-collapse').click(function(){
                if( $('body').hasClass('has-mini-sidebar') )
                    $('body').removeClass('has-mini-sidebar');
                else
                    $('body').addClass('has-mini-sidebar');
                return false;
            });
        });
        
        
</script>
</body>
