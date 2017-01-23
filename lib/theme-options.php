<?php
add_action('admin_menu', 'cryst4l_create_menu');
function cryst4l_create_menu() {
	add_menu_page('Global Options', 'Global settings', 'administrator', 'global_options', 'cryst4l_settings_page', 'dashicons-admin-generic', 3);	
	add_action( 'admin_init', 'cryst4l_settings' );
}
function cryst4l_settings() {
	register_setting( 'cryst4l_seo_settings', 'ga_ID' );
	register_setting( 'cryst4l_seo_settings', 'code_snippets' );
	register_setting( 'cryst4l_global_settings', 'phone_number' );
	register_setting( 'cryst4l_global_settings', 'email_address' );
	register_setting( 'cryst4l_global_settings', 'address_line_1' );
	register_setting( 'cryst4l_global_settings', 'address_line_2' );
	register_setting( 'cryst4l_global_settings', 'address_town' );
	register_setting( 'cryst4l_global_settings', 'address_county' );
	register_setting( 'cryst4l_global_settings', 'address_post_code' );
	register_setting( 'cryst4l_global_settings', 'google_map' );
	register_setting( 'cryst4l_global_settings', 'fb_link' );
	register_setting( 'cryst4l_global_settings', 'twitter_link' );
	register_setting( 'cryst4l_global_settings', 'in_link' );
	register_setting( 'cryst4l_global_settings', 'gplus_link' ); 
}
function cryst4l_settings_page() { ?>
<div class="wrap">
    <h1>Global settings</h1>
</div>

<div class="wrap">
<h2>Theme Options :: Global Settings</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'cryst4l_global_settings' ); ?>
    <?php do_settings_sections( 'cryst4l_global_settings' ); ?>
    <table class="form-table">
    	<tr valign="top">
        <th scope="row">Phone Number</th>
        <td><input type="text" name="phone_number" value="<?php echo esc_attr( get_option('phone_number') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Email Address</th>
        <td><input type="text" name="email_address" value="<?php echo esc_attr( get_option('email_address') ); ?>" /></td>
        </tr>
    </table>
    <hr/>
    <h3>Address</h3>
    <table class="form-table">
    	<tr valign="top">
        <th scope="row">Address Line 1</th>
        <td><input type="text" name="address_line_1" value="<?php echo esc_attr( get_option('address_line_1') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Address Line 2</th>
        <td><input type="text" name="address_line_2" value="<?php echo esc_attr( get_option('address_line_2') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Post town</th>
        <td><input type="text" name="address_town" value="<?php echo esc_attr( get_option('address_town') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">County</th>
        <td><input type="text" name="address_county" value="<?php echo esc_attr( get_option('address_county') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Post code</th>
        <td><input type="text" name="address_post_code" value="<?php echo esc_attr( get_option('address_post_code') ); ?>" /></td>
        </tr>
    </table>  
    <hr/>
    <h3>Google Map</h3>
    <table class="form-table">
    	<tr valign="top">
        <th scope="row">Google map code</th>
        <td><textarea style="width:80%; height:200px;" name="google_map"><?php echo esc_attr( get_option('google_map') ); ?></textarea><br/>
        <small>Please paste Google map code above</small></td>
        </tr>
    </table>  
    <hr/> 
    <h3>Social links</h3>
    <table class="form-table">
    	<tr valign="top">
        <th scope="row">Facebook</th>
        <td><input type="text" name="fb_link" value="<?php echo esc_attr( get_option('fb_link') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Twitter</th>
        <td><input type="text" name="twitter_link" value="<?php echo esc_attr( get_option('twitter_link') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Linkedin</th>
        <td><input type="text" name="in_link" value="<?php echo esc_attr( get_option('in_link') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Google Plus</th>
        <td><input type="text" name="gplus_link" value="<?php echo esc_attr( get_option('gplus_link') ); ?>" /></td>
        </tr>
    </table>  
    <?php submit_button(); ?>  
</form>
</div>


<div class="wrap">
<hr/>
<h2>Theme Options :: SEO Settings</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'cryst4l_seo_settings' ); ?>
    <?php do_settings_sections( 'cryst4l_seo_settings' ); ?>
    <table class="form-table">
         
        <tr valign="top">
        <th scope="row">GA Account ID </th>
        <td><input type="text" name="ga_ID" value="<?php echo esc_attr( get_option('ga_ID') ); ?>" />
        <small>Enter value to enable</small></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Additional Scripts</th>
        <td><textarea style="width:80%; min-height:400px;" name="code_snippets"><?php echo esc_attr( get_option('code_snippets') ); ?></textarea><br/>
        <small>Scripts entered here will execute before all other scripts on the page, including jQuery (make sure your scripts are not jQuery dependent).</small></td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
</div>
<?php } //end cryst4l settings