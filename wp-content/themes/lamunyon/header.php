<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lamunyon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- =============================================================== -->
<header id="header" class="">
	<section class="header-top">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="quick-contact">
						<ul>
							<?php if (get_field('telephone_number', 'option')) :?>
									<li><a href="tel:<?php the_field('telephone_number', 'option');?>"><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo get_field('telephone_number', 'option');?></a></li>
							<?php endif;?>
						    <?php if (get_field('email', 'option')) :?>
									<li><a href="mailto:<?php the_field('email', 'option');?>"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo get_field('email', 'option');?></a></li>
							<?php endif;?>
						</ul>
					</div>
				</div>
				<?php $social_media = get_field('social_media_settings','option');?>
				<div class="col-sm-12 col-md-6">
					<div class="social-links">
						<ul>
							<?php if ($social_media['facebook_url']) :?>
									<li><a href="<?php echo esc_url($social_media['facebook_url']);?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
							<?php endif;?>
							<?php if ($social_media['instagram_url']) :?>
									<li><a href="<?php echo esc_url($social_media['instagram_url']);?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<?php endif;?>
							<?php if ($social_media['linkedin_url']) :?>
									<li><a href="<?php echo esc_url($social_media['linkedin_url']);?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
							<?php endif;?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="head-main">
		<div class="container-fluid clearfix">
			<div class="company-logo">
			  <?php if ( function_exists( 'the_custom_logo' ) ) {
              			  the_custom_logo();
    			 }?>
			</div>
			<div class="main-menu">
			<?php
    			wp_nav_menu(
    			array(
    		  'theme_location' => 'menu-1',
              'container'       => false, 
              'menu_id'  => false)
    				
    			);
			  ?>
			</div>
		</div>
	</section>
</header>
<!-- /header -->