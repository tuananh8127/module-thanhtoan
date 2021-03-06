<?php 
/**
 * Template name: Single Campaign
 */

get_header() ?>

	<?php $campaign_id = get_post_meta( get_the_ID(), '_franklin_single_campaign_id', true ) ?>

	<?php $campaign_query = new ATCF_Campaign_Query( array( 'p' => $campaign_id ) ) ?>	

	<?php if ( $campaign_query->have_posts() ) : ?>

		<?php while( $campaign_query->have_posts() ) : ?>

			<?php $campaign_query->the_post() ?>
		
			<?php $campaign = new ATCF_Campaign( $campaign_id ) ?>

			<?php do_action( 'atcf_campaign_before', $campaign ) ?>

			<?php get_template_part('campaign', 'blurb') ?>			

			<div class="content-wrapper">

				<?php echo franklin_campaign_video( $campaign ) ?>
				
				<div class="content">
	
					<!-- Campaign content -->					
					<?php get_template_part('content', 'campaign') ?>
					<!-- End campaign content -->

					<!-- "Campaign Below Content" sidebar -->
					<?php dynamic_sidebar('campaign_after_content') ?>
					<!-- End "Campaign Below Content" sidebar -->

					<?php comments_template('/comments-campaign.php', true) ?>

				</div>

				<?php get_sidebar( 'campaign' ) ?>
			
			</div>

		<?php endwhile ?>

	<?php endif ?>

	<!-- Support modal -->
	<div id="campaign-form-<?php echo $campaign_id ?>" class="campaign-form reveal-modal content-block block">
        <a class="close-reveal-modal icon"><i class="icon-remove-sign"></i></a>
        <?php echo edd_get_purchase_link( array( 'download_id' => $campaign_id ) ); ?>
    </div>
    <!-- End support modal -->

<?php get_footer() ?>