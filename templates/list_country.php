<?php
/*
Template Name: List By Country
*/
get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns">
		<header>
			<h1 class="entry-title">Countries</h1>
		</header>
		<?php
		global $wpdb;
		$results = $wpdb->get_results( "SELECT ID, country, country_id FROM radio_station_list" );
		?>
		<div class="row">
			<div class="small-12 columns">
			<?php
			echo '<br /><br />';
			echo '<ul>';
			foreach ($results as $row) {
				if (empty($countryID) || ($row->country_id != $countryID)) {
					$countryID = $row->country_id;
					$country = $row->country;
					$count = $wpdb->get_var( "SELECT COUNT(*) FROM radio_station_list WHERE country_id = '$countryID'" );
					$link = 'http://top-radio.org/'.$countryID.'/';
					echo "<li><a href=$link>".$country.' ('.$count.')'."</a></li><br />";
				}
			}
			echo '</ul>';
			?>
			</div>
		</div>
		<footer>
			<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php comments_template(); ?>


	</div>
</div>

<?php get_footer(); ?>