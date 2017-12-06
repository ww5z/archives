
<!-- view content start -->
    <footer class="main-footer">
        <p>&copy; برنامج توثيق2017، كل الحقوق محفوظة.</p>
    </footer>



    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    
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
