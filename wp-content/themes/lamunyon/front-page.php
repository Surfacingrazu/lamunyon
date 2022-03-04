<?php
/**
 * The template for displaying the front-page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lamunyon
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
         <?php $hero_banner_section = get_field('hero_banner_section');
            if ($hero_banner_section) :?>
                <section class="main-banner"  <?php if(has_post_thumbnail()): ?> style="background-image: url('<?php the_post_thumbnail_url();?>'); background-size: cover; background-position: 50% 50%;box-shadow: inset 0 0 0 2000px rgb(0 0 0 / 5%);"<?php endif;?>>
                    <?php $two_half = $hero_banner_section['two_half_width_content'];
                     if ($two_half): ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <?php $short_intro = $two_half['short_intro_section'];
                                        if ($short_intro) :
                                    ?>
                                        <div class="col-sm-12 col-md-6 padding-50">
                                            <div class="content-left-wrapp">
                                                <?php echo $short_intro['short_intro'];?>
                                                <div class="btn-wrapper">
                                                    <?php $btn_reps = $short_intro['button_repeater'];?>
                                                    <?php if ($btn_reps) :?>
                                                            <?php foreach ($btn_reps as $btn_rep) :?>
                                                                <?php 
                                                                    $link = $btn_rep['button_url'];
                                                                    if( $link ): 
                                                                        $link_url = $link['url'];
                                                                        $link_title = $link['title'];
                                                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                                                        ?>
                                                                        <a class="btn btn-default" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                                    <?php endif; ?>
                                                            <?php endforeach;?>
                                                    <?php endif;?>
                                                    <?php if ($short_intro['button_contact_number']) :?>
                                                            <a href="tel:<?php echo $short_intro['button_contact_number'];?>" class="btn btn-default"><?php echo $short_intro['button_contact_number'];?></a>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                    <?php $form_section = $two_half['form_section'];
                                        if ($form_section):
                                    ?>
                                        <div class="col-sm-12 col-md-6 padding-50">
                                            <div class="content-right-wrapp">
                                                <?php if ($form_section['form_title']):?>
                                                            <h2><?php echo $form_section['form_title'];?></h2>
                                                <?php endif;?>
                                                 <?php if ($form_section['choose_form_to_display']):?>
                                                    <div class="form-inner-wrapp">
                                                        <?php echo $form_section['choose_form_to_display'];?>
                                                    </div>
                                                  <?php endif;?>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                   <?php endif;?>
                </section>
            <?php endif;?>
        <?php endwhile;?>
<?php endif;?>
<?php get_footer();?>
