<?php get_header(); ?>	

    <body>  
    	<div class="timeline">
			<div class="content-area">
				<main id="main" class="site-main" role="main">
       				 <div id="timeline-embed"></div>
				        <?php if(have_posts()): while(have_posts()): the_post(); ?>
				           <?php 
				          	 $post_id = get_the_ID();
				          	 $content = json_encode(get_the_content($post_id));          	
				          	 ?>	          	 		
						<?php endwhile; endif;?>

				         <script type="text/javascript">
							
						 var the_json =  {
							"title": {
							"media": {
							"url": "<?php echo $featured_img_url = get_the_post_thumbnail_url( $post_id, 'full'); ?>",
							"caption": "",
							"credit": ""
							},
							"text": {
							"headline": "<?php echo get_the_title($post_id);?>",
							"text": <?php echo $content;?>
							}
							},
							"events": 
							<?php echo makeTheEvents ($post_id);?>
							};

						    window.timeline = new TL.Timeline('timeline-embed', the_json);     
						</script>

				</main><!-- #main -->
			</div><!-- .content-area -->
		</div><!-- .timeline -->
	</body>
<?php get_footer();