<?php get_header(); ?>

<div class="row">
<div class="col-9">
<h1>Últimos Posts</h1>





<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1>
                <a href="<?php echo get_attachment_link(); ?>">
                    <?php the_title(); ?>
                </a>
            </h1>
            <p><?php the_content(); ?></p>

            <?php endwhile; else : ?>
                <p><?php _e( 'Nenhum post encontrado!' ); ?></p>
            <?php endif; ?>
        
        </div>
        <div class="col-3">
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>
