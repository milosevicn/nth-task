<?php get_header(); ?>
<div class="row">
    <div class="col-sm-8 blog-main">

        <?php
        $query = new WP_Query([
            'post_type'            => 'post',
            'posts_per_page'    => -1,
            'meta_key'            => 'rating_meta_key',
            'orderby'            => 'meta_value',
            'order'                => 'DESC'
        ]);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('content', get_post_format());
            endwhile;
        endif;
        ?>
    </div> <!-- /.blog-main -->

    <?php get_sidebar(); ?>
</div> <!-- /.row -->
<?php get_footer(); ?>