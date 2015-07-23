<?php

/**
* Template Name: Locations
*/
remove_action('genesis_loop', 'genesis_do_loop');

add_action('genesis_loop', 'location_custom_loop');

function location_custom_loop() {
global $paged;

// The Query

query_posts('post_type=locations&order=ASC');
echo '<h3 style="margin-bottom:50px;">Click a city to see venue information</h3>';
if(have_posts() ) while ( have_posts() ) : the_post();
echo '<div id="maintextmrg">';
echo '<table border="0" width="500" cellspacing="0" cellpadding="0"><tbody>';
echo '<tr valign="top"><td width="350">';
echo '<div style="margin-bottom: 10px; font-weight: bold;"><a style="color: #000; text-decoration: underline;" href="javascript:InsertContent(';
echo "'";
the_field ('identifier');
echo "');";
echo '">';
the_field ('location');
echo '</a></div></td>';
echo '<td style="font-weight: bold;" width="250">';
the_field ('dates');
echo '</td></tr>';
echo '<tr><td colspan="2">';
echo '<div id="';
the_field ('identifier');
echo '" style="display:none; margin-left:30px;">';
if (get_field ('venue_set')) :
echo '<a href="';
the_field ('venue_link');
echo '" target="_blank">';
the_field ('venue_name');
echo '</a><br>';
the_field ('venue_street_address');
echo '<br>';
the_field ('venue_city_state');
echo '&nbsp';
the_field ('venue_zip_code');
echo '<br>';
echo '<strong>Reservations: </strong>';
the_field ('venue_phone_number');
else :
echo '<span style="font-weight: bold;">';
echo 'Venue information coming soon.';
echo '</span>';
endif;
echo '<br><br>';
echo '<a href="';
the_field ('ifs_link');
echo '" target="_blank"><img src="http://www.budtoboss.com/wp-content/uploads/2013/03/rsz_register-button-red.png" alt="Register for a Bud to Boss Workshop Now!" style="margin-bottom:15px;"></a>';
echo '</div>';
echo '</td></tr></tbody></table>';
echo '</div>';
endwhile;
}

 genesis();
?>
