<?php
/**
 * @package   USGS Steam Flow Data
 * @author    Chris Kindred <Chris@kindredwebconsulting.com>
 * @license   GPL-2.0+
 * @link      http://www.kindredwebconsulting.com
 * @copyright 2013 Kindred Web Consulting
 */
?>
<?php  
if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
}
$tabs = array( 'home-settings' => 'Usage', 'search' => 'Search Site Codes', 'credits' => 'Credits' );
$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'home-settings';  
?>
<div class="wrap">

	<div id="icon-plugins" class="icon32"><br></div>
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
    <div id="icon-options-general" class="icon32"><br></div>
    <h2 class="nav-tab-wrapper"> 
    <?php 
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $active_tab ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=kwcusgs&tab=$tab'>$name</a>";
    }
    ?>
    </h2>  	
    <?php

        switch ( $active_tab ){
            case 'search':
                $state_values=array(
                        'AL' => "Alabama",
                        'AK' => "Alaska",
                        'AZ' => "Arizona",
                        'AR' => "Arkansas",
                        'CA' => "California",
                        'CO' => "Colorado",
                        'CT' => "Connecticut",
                        'DE' => "Delaware",
                        'DC' => "District Of Columbia",
                        'FL' => "Florida",
                        'GA' => "Georgia",
                        'HI' => "Hawaii",
                        'ID' => "Idaho",
                        'IL' => "Illinois",
                        'IN' => "Indiana",
                        'IA' => "Iowa",
                        'KS' => "Kansas",
                        'KY' => "Kentucky",
                        'LA' => "Louisiana",
                        'ME' => "Maine",
                        'MD' => "Maryland",
                        'MA' => "Massachusetts",
                        'MI' => "Michigan",
                        'MN' => "Minnesota",
                        'MS' => "Mississippi",
                        'MO' => "Missouri",
                        'MT' => "Montana",
                        'NE' => "Nebraska",
                        'NV' => "Nevada",
                        'NH' => "New Hampshire",
                        'NJ' => "New Jersey",
                        'NM' => "New Mexico",
                        'NY' => "New York",
                        'NC' => "North Carolina",
                        'ND' => "North Dakota",
                        'OH' => "Ohio",
                        'OK' => "Oklahoma",
                        'OR' => "Oregon",
                        'PA' => "Pennsylvania",
                        'RI' => "Rhode Island",
                        'SC' => "South Carolina",
                        'SD' => "South Dakota",
                        'TN' => "Tennessee",
                        'TX' => "Texas",
                        'UT' => "Utah",
                        'VT' => "Vermont",
                        'VA' => "Virginia",
                        'WA' => "Washington",
                        'WV' => "West Virginia",
                        'WI' => "Wisconsin",
                        'WY' => "Wyoming"
            );
    ?>
            <h3>Search Site Codes</h3>
            <p class="">You can search for a site by selecting a state and pressing the 'Get Stations' button.  The stations come up in code order directly from USGS.  Once you are showing a states stations the easiest way to find the one you are looking for is to use the browswers built in search.  The search can take as long as two minutes to contact USGS and bring back the data in some cases.</p>
            <p class="">Click the Site Name link to go directly to the site on the USGS website.</p>
            <p class="">Click the Latitude / Longitude link to view the site location in google maps.  The location in google maps is an aproximation.</p>
            <label>Select State:</label>
            <?php 
                echo "<select id='state' class='state' name='state'>";
                if ( !empty( $state_values ) ) {
                    $blnfirst = true;
                    foreach( $state_values as $state_short => $state_full ) {
                        if ( true == $blnfirst ){
                            echo "<option value='$state_short' SELECTED >$state_full</option>";
                            $blnfirst = false;
                        } else {
                            echo "<option value='$state_short' >$state_full</option>";
                        }
                    }
                }
                echo "</select>";
            ?>
            <input type='submit' value='<?php _e('Get Stations'); ?>' class='button-secondary' />
            <br /><br />
            <div class="" id="results"></div>
<?php
                break;

            case 'home-settings':
?>
                <h3 class="">Using USGS Steam Flow Data</h3>
                <p class="">This plugin uses short codes to allow you to include the USGS infromation for a location on any post or in a Text Widget.</p>
                <p class="">You can copy and paste the shortcode below to get started.<br />
                <br />
                [USGS location='09080400' title='Great Place To Fish' graph='show'] <br />
                <br />
                <h4 class="">Location</h4>
                The location is the Site Code for the location you want to show. You can get the Site Code by using the Search tab or by finding it on the USGS website.<br />
                <h4 class="">Title</h4>
                The title is what you would like to use as a title for the location information.  The title defaults to the Site Name if you leave it blank. <br />
                <h4 class="">Graph</h4>
                Graph is for showing graphs with the information (true) or not (false).  If you leave Graph blank it will default to false.
 </p>
<?php
                break;

            default:
?>
                <a href="http://www.kindredwebconsulting.com/"><img src="<?php echo plugins_url( '../assets/kwclogo.png', __FILE__ ) ?>" alt="Kindred Web Consulting Logo" height="75px" width="350px" border="0" /></a>
                <div class="clearfix">&nbsp;</div>
                <div class="sidebar">
                    <h2 class="">Support</h2>
                    <p class="">Thanks for using our plugin.  We are happy to address any bugs you might find and address suggestions you have by either posting on the plugin page at WordPress.org or through the <a href="http://www.kindredwebconsulting.com/contactus/">Contact Us</a> at our website.</p>
                    <p class="">
                        <a href="http://www.facebook.com/kindredwebconsulting/" ><img src="<?php echo plugins_url( '../assets/facebook.png', __FILE__ ) ?>" alt="Kindred Web Consulting on Facebook" width="" height="32px" border="" align="" /></a>
                        <a href="http://www.twitter.com/KindredWeb"><img src="<?php echo plugins_url( '../assets/twitter.png', __FILE__ ) ?>" alt="Kindred Web Consulting on Twitter" width="" height="32" border="" align="" /></a>
                        <a href="http://www.google.com/+KindredWebConsulting"><img src="<?php echo plugins_url( '../assets/google.png', __FILE__ ) ?>" alt="Kindred Web Consulting on Google+" width="" height="32px" border="" align="" /></a>
                        <a href="http://www.kindredwebconsulting.com/"><img src="<?php echo plugins_url( '../assets/kwc.png', __FILE__ ) ?>" alt="Kindred Web Consulting" width="" height="32px" border="" align="" /></a>
                        </p>
                    <h2 class="">Donations</h2>
                    <p class="">If you are interested in helping us to add new features and fix bugs please consider donating a few dollars. 
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="BUFMZVZ6L358J">
                    <table>
                    <tr><td><input type="hidden" name="on0" value="Donation"></td></tr><tr><td><select name="os0">
                        <option value="Buy Us a Drink">Buy Us a Drink $5.00 USD</option>
                        <option value="Buy Us a Meal">Buy Us a Meal $25.00 USD</option>
                        <option value="Be The Coolest Person We Know">Be The Coolest Person We Know $100.00 USD</option>
                    </select> </td></tr>
                    </table>
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form></p>

                </div>
                <h2 class="">About the Plugin</h2>
                <p class="">We are avid fly fishermen.  We wanted an easier way to find out what the rivers and streams were flowing at besides to going to the USGS website and looking each one up individually every day.  We decided the easiest way would be to write our own plugin to get the data.  We hope you enjoy using it and if you have any suggestions please let us know!</p>
                <h2 class="">USGS</h2>
                <p class="">We are dependent on the <a href="http://www.usgs.gov/water/">USGS website</a> for the data that this plugin uses.  They do a good job of notifying developers of any updates.  We will quickly update the plugin any time there are updates that effect the API calls.</p>
                <a href="http://www.usgs.gov/water/"><img src="<?php echo plugins_url( '../assets/usgs.jpg', __FILE__ ) ?>" alt="USGS" border="0" height="32px" /></a>
<?php
                break;
        } 
?>
</div>