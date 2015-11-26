<?php get_header(); ?>
<?php include('sidebar_left.php'); ?>
<div id="content">
	<div id="archive">
		<?php wp_reset_query();
		if (have_posts()) :	
			if (is_category()) { ?>
				<h2>ԱՐԽԻՎ` <?php single_cat_title(); ?></h2>
			<?php } elseif (is_tag()) { ?>
				<h2>ԱՐԽԻՎ` <?php single_tag_title(); ?></h2>
			<?php } elseif (is_day()) { ?>
				<h2>ԱՐԽԻՎ` <?php the_time('j'); echo ' ' . arm_month(get_the_time('n'), long) . ', '; the_time('Y'); ?></h2>
			<?php } elseif (is_month()) { ?>
				<h2>ԱՐԽԻՎ` <?php echo arm_month(get_the_time('n'), long) . ', '; the_time('Y'); ?></h2>
			<?php } elseif (is_year()) { ?>
				<h2>ԱՐԽԻՎ` <?php the_time('Y'); ?></h2>
		<?php } ?>
		<ul>
			<?php while (have_posts()) : the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
							the_post_thumbnail('thumbnail');
						} ?>
						<span><?php the_time('j'); echo ' ' . arm_month(get_the_time('n'), long) . ', '; the_time('Y'); ?></span><?php the_title(); ?>				
					</a>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php if (function_exists('pagination')) {pagination(); } ?>
		<?php else : ?>
			<h3><?php echo '...'; ?></h3>
		<?php endif; ?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>