<?php
/**
 * displays sidebar
 */
?>


<?php if ( is_active_sidebar( 'sidebar-1' ) && !is_singular('instive-case-study') ) { ?>
   <div class="col-lg-4 col-md-12">
      <aside id="sidebar" class="sidebar" role="complementary">
         <?php dynamic_sidebar( 'sidebar-1' ); ?>
      </aside> <!-- #sidebar --> 
   </div><!-- Sidebar col end -->
<?php }

if(is_singular('instive-case-study') && is_active_sidebar( 'xs_case_study' )){
    ?>
    <div class="col-lg-4 col-md-12">
        <aside id="sidebar" class="sidebar xs-case-study-sidebar" role="complementary">
            <?php dynamic_sidebar( 'xs_case_study' ); ?>
        </aside> <!-- #sidebar -->
    </div><!-- Sidebar col end -->
<?php
}
?>


