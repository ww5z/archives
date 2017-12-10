  </body>
</html>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; برنامج توثيق2017، كل الحقوق محفوظة.</p>
      </div>
    </footer>


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
