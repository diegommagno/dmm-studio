<?php
   $terms = get_the_terms(get_the_ID(),'tags');
   $terms_slg = '';


   if(is_array($terms) && '' != $terms){

      $terms_slg = $terms[0]->slug;
   }

   $related_args = array(
         'post_type' => 'instive-insurance',
         'posts_per_page' => 3,
         'post__not_in' => [get_the_ID()],
         'post_status' => 'publish',
         'post__not_in' => array( get_the_ID() ),
         'orderby' => 'rand',
         'ignore_sticky_posts'=>1,
         'tax_query' => array(
            array(
            'taxonomy' => 'tags',
            'field' => 'slug',
            'terms' => $terms_slg
            )
         )
   );




   $related_posts = new WP_Query($related_args);

   if($related_posts->have_posts()) :
   ?>
      <div class="row insurance-related-post">
         <div class="col-lg-5">
               <div class="insurance-page-headding">
                  <h2><?php echo esc_html__('Related case', 'instive') ?></h2>
               </div>
         </div>
      </div>
   <div class="row insurance_related_content">

   <?php

      while ($related_posts->have_posts()) : $related_posts->the_post(); ?>

         <div class="col-sm-4">
            <div class="insurance-case-box">
                  <?php if(has_post_thumbnail()): ?>
                         <div class="case-thumb">
                              <?php the_post_thumbnail(); ?>
                         </div>
                  <?php endif; ?>
                  <div class="case-content">
                     <h3 class="case-title"> 
                        <a href="<?php the_permalink(); ?>" > <?php the_title() ?> </a> 
                     </h3>
                  </div><!-- ./insurance content -->
            </div>
         </div>

      <?php
      endwhile;
   endif;
?>
</div>
