<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="wp-toolbar" role="main">

	<?php do_action( 'expert_carpenter_above_slider' ); ?>

	<?php if( get_theme_mod('expert_carpenter_slider_hide_show') != ''){ ?>
		<section id="slider">
		  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $expert_carpenter_slider_pages = array();
			      	for ( $count = 1; $count <= 4; $count++ ) {
				        $mod = intval( get_theme_mod( 'expert_carpenter_slider' . $count ));
				        if ( 'page-none-selected' != $mod ) {
				          	$expert_carpenter_slider_pages[] = $mod;
				        }
			      	}
			      	if( !empty($expert_carpenter_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $expert_carpenter_slider_pages,
			          	'orderby' => 'post__in'
			        );
			        $query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
			          $i = 1;
			    ?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
			          	<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail image"/>
			          	<div class="carousel-caption">
				            <div class="inner_carousel">
				            	<hr>
				              	<h1><?php the_title(); ?></h1>	
				            </div>
				            <div class="read-btn">
			            		<a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'READ MORE', 'expert-carpenter' ); ?>" alt="<?php the_title(); ?>"><?php esc_html_e('READ MORE','expert-carpenter'); ?><i class="fas fa-chevron-right"></i><span class="screen-reader-text"><?php the_title(); ?></span></a>
					       	</div>
			          	</div>
			        </div>
			      	<?php $i++; endwhile; 
			      	wp_reset_postdata();?>
			    </div>
			    <?php else : ?>
			    <div class="no-postfound"></div>
			      <?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		      		<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
		      		<span class="screen-reader-text"><?php esc_html_e( 'Previous','expert-carpenter' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		      		<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
		      		<span class="screen-reader-text"><?php esc_html_e( 'Next','expert-carpenter' );?></span>
			    </a>
		  	</div>  
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('expert_carpenter_below_slider'); ?>

	<?php /*--- Our services ---*/ ?>
	<?php if( get_theme_mod('expert_carpenter_services_title') != '' || get_theme_mod( 'expert_carpenter_services_cat' )!= ''){ ?>
		<section id="our_service">
			<div class="container">
				<div class="services-head">
					<?php if( get_theme_mod('expert_carpenter_services_title') != ''){ ?>
			        	<h2><?php echo esc_html(get_theme_mod('expert_carpenter_services_title','')); ?></h2>
			        <?php }?>
			    </div>
				<div class="row">
					<?php $expert_carpenter_catData1=  get_theme_mod('expert_carpenter_services_cat'); 
					if($expert_carpenter_catData1){ 
			  			$args = array(
							'post_type' => 'post',
							'category_name' => esc_html($expert_carpenter_catData1 ,'expert-carpenter')
				        );
		      		$page_query = new WP_Query($args);?>
					<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
						<div class="col-lg-4 col-md-6 services">
							<div class="services-box">
								<div class="servicesbox-img">
									<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?>
									<?php } ?>
								</div>
								<div class="service-content">
							      	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							      	<p><?php $excerpt = get_the_excerpt(); echo esc_html( expert_carpenter_string_limit_words( $excerpt,15 ) ); ?></p>
							      	<div class="read-more">
				            			<a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'Read More', 'expert-carpenter' ); ?>"><?php esc_html_e('Read More','expert-carpenter'); ?><i class="fas fa-long-arrow-alt-right"></i><span class="screen-reader-text"><?php the_title(); ?></span></a>
						       		</div>
						       	</div>
						    </div>	
						</div>
			  		<?php endwhile; 
			      	wp_reset_postdata();
			      	}?>
		        </div>
			</div>
		</section>
	<?php }?>

	<?php do_action('expert_carpenter_below_services_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	        <?php the_content(); ?>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>