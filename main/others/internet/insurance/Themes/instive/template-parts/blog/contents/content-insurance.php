
	<div class="post-body clearfix">
     <!-- Article content -->
		<div class="entry-content clearfix">

         <?php
         
            if ( is_search() ) {
               the_excerpt();
            } else {
               the_content( esc_html__( 'Continue reading &rarr;', 'instive' ) );
               
            }
			
			?>
 
        <?php
            if ( is_user_logged_in() && is_single() ) {
         ?>

                  <p style="float:left;margin-top:20px;">
                  <?php
                  edit_post_link( 
                     esc_html__( 'Edit', 'instive' ), 
                     '<span class="meta-edit">', 
                     '</span>'
                  );
                  ?>
            
           </p>
         <?php
            }
         ?>
		</div> <!-- end entry-content -->
   </div> <!-- end post-body -->
