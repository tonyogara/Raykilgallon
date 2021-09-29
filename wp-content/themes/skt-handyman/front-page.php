<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Handyman
 */
get_header(); 

$hideslide = get_theme_mod('hide_slides', 1);
$secwithcontent = get_theme_mod('hide_home_secwith_content', 1);
$hide_sectiontwo = get_theme_mod('hide_sectiontwo', 1);
$hide_home_third_content = get_theme_mod('hide_home_third_content', 1);
$hide_sectionfour = get_theme_mod('hide_sectionfour', 1);
$hide_home_five_content = get_theme_mod('hide_home_five_content', 1);

if (!is_home() && is_front_page()) { 
if( $hideslide == '') { ?>
<!-- Slider Section -->
<?php 
$pages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $pages[] = $mod;
    }	
} 
if( !empty($pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $skt_handyman_slideno[] = $i;
          $skt_handyman_slidetitle[] = get_the_title();
		  $skt_handyman_slidedesc[] = get_the_excerpt();
          $skt_handyman_slidelink[] = esc_url(get_permalink());
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $skt_handyman_slideno as $skt_handyman_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $skt_handyman_sln ); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo esc_html($skt_handyman_slidetitle[$k] ); ?></h2>
        <p><?php echo esc_html($skt_handyman_slidedesc[$k] ); ?></p>
        <div class="clear"></div>
        <a class="slide_more" href="<?php echo esc_url($skt_handyman_slidelink[$k] ); ?>">
          <?php esc_html_e('View All Services', 'skt-handyman');?>
          </a>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } 
?>
<?php
	if(!is_home() && is_front_page()){ 
	if( $secwithcontent == '') {
?>
 <section id="sectionone">
 	<div class="container">
      <div class="home_section1_content">
		 <div class="section1-columns-row-2column">
            <div class="section1-columns-content">
                <div class="section1top-block-area">
				<?php 
                if( get_theme_mod('sec-one-first',false)) {
                $sectiononetopquery = new WP_query('page_id='.get_theme_mod('sec-one-first',true)); 
                while( $sectiononetopquery->have_posts() ) : $sectiononetopquery->the_post(); ?>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
                <?php endwhile;
                wp_reset_postdata(); 
                } ?>
                </div>
               <div class="feature-list-area">
				<?php 
					for($l=1; $l<5; $l++) { 
					if( get_theme_mod('sec-column-left'.$l,false)) {
					$section1block = new WP_query('page_id='.get_theme_mod('sec-column-left'.$l,true)); 
					while( $section1block->have_posts() ) : $section1block->the_post(); 
                ?>
                <div class="section1-features-list">
                	<?php if( has_post_thumbnail() ) { ?>	
                    <div class="section1-service-img"><?php the_post_thumbnail('full'); ?></div>
                    <?php } ?>
                    <div class="section1-service-content">
                    <h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                    </div>
                </div>
				<?php endwhile; wp_reset_postdata(); 
                   }} 
                ?>
                <div class="clear"></div>
                </div>  
            </div>
         </div>
      </div>
    </div>
 </section>
<?php }} ?>
<?php
if (!is_home() && is_front_page()) { 
if( $hide_sectiontwo == '') { ?>
<section class="hometwo_section_area">
    	<div class="center">
            <div class="hometwo_section_content">
			  <?php
                $section2_title = get_theme_mod('section2_title');
                if(!empty($section2_title)){
              ?>	
         	  <h2><?php echo esc_attr($section2_title); ?></h2>
              <?php } ?>
              <div class="service-columns-row">
			  <?php 
                for($t=1; $t<7; $t++) { 
                if( get_theme_mod('page-column'.$t,false)) {
                $servicequery = new WP_query('page_id='.get_theme_mod('page-column'.$t,true)); 
                while( $servicequery->have_posts() ) : $servicequery->the_post(); 
              ?>
              <div class="service-column">
                <div class="service-box-outer">
                  <div class="service-box">
                  	<?php if( has_post_thumbnail() ) { ?>
                    <div class="service-box-img"><?php the_post_thumbnail('full'); ?></div>
                    <?php } ?>
                  </div>
                  <h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
                </div>
              </div>
              <?php endwhile; wp_reset_postdata(); 
               }} 
            ?> 
              <div class="clear"></div>
			  </div>
              <div class="clear"></div>
            </div>
        </div>
    </section>
<?php } } ?>

<?php if (!is_home() && is_front_page()) {
	  if( $hide_home_third_content == '' ){	
?>
<section class="home3_section_area">
  <div class="center">
    <div class="home_section3_content">
    <?php
    	$section3_title = get_theme_mod('section3_title');
		if(!empty($section3_title)){
	?>
      <div class="center-title">
        <h2><?php echo esc_attr($section3_title); ?></h2>
      </div>
      <?php } ?>
      <div class="row_area">
			<?php 
			for($j=1; $j<4; $j++) { 
	  		if( get_theme_mod('third-column-left'.$j,false)) {
			$thirdblockbox = new WP_query('page_id='.get_theme_mod('third-column-left'.$j,true)); 
			while( $thirdblockbox->have_posts() ) : $thirdblockbox->the_post(); 
			?>
             <div class="perfectbox"> <a href="<?php echo esc_url( get_permalink() ); ?>">
              <div class="perfectborder">
                 <?php if( has_post_thumbnail() ) { ?>	
                <div class="perf-thumb"><?php the_post_thumbnail('full'); ?></div>
                <?php } ?>
                <div class="perf-title">
                  <h3><?php the_title(); ?></h3>
                </div>
                <div class="perf-description"><?php the_excerpt(); ?></div>
              </div>
              </a> </div>
			<?php endwhile; wp_reset_postdata(); 
               }} 
            ?>  
	        <div class="clear"></div>
      </div>
    </div>
  </div>
</section>
<?php } } ?>
<div class="clear"></div>
<div class="container">
     <div class="page_content">
      <?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
    ?>
    <section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-handyman' ),
							'next_text' => esc_html__( 'Next', 'skt-handyman' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
    <?php
} else {
    ?>
	<section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
							 ?>
                             <header class="entry-header">           
            				<h1><?php the_title(); ?></h1>
                    		</header>
                             <?php
                            the_content();
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-handyman' ),
							'next_text' => esc_html__( 'Next', 'skt-handyman' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
	<?php
}
	?>
    <?php get_sidebar();?>
    <div class="clear"></div>
  </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>