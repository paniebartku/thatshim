  <footer class="footer">
      <div class="footer-main">
          <div class="container">
              <div class="row">
                  <div class="col-xl-6 col-md-6 col-sm-12 col-12">
                  <?php if( is_active_sidebar( 'footer-sidebar-1' ) ){ 
                    dynamic_sidebar( 'footer-sidebar-1' );
                    }else {echo '';}?>
                  </div>
                  <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                      <?php if( is_active_sidebar( 'footer-sidebar-2' ) ){ 
                    dynamic_sidebar( 'footer-sidebar-2' );
                    }else {echo '';}?>
                  </div>
                  <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                      <?php if( is_active_sidebar( 'footer-sidebar-3' ) ){ 
                    dynamic_sidebar( 'footer-sidebar-3' );
                    }else {echo '';}?>
                  </div>
              </div>
          </div>
      </div>
  <?php wp_footer(); ?>
  </footer> 
</body>
</html>