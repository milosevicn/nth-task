<div class="blog-post">
	<h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2>
	<p class="blog-post-meta"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>

	<?php if (has_post_thumbnail()) { ?>
		<div class="row">
			<div class="col-md-12">
				<?php the_post_thumbnail('thumbnail'); ?>
			</div>
			<div class="col-md-12">
				<?php the_content(); ?>
			</div>
		</div>
	<?php } else { ?>
		<?php the_content(); ?>
	<?php } ?>

</div><!-- /.blog-post -->