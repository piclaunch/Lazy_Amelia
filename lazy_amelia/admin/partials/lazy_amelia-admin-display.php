<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/piclaunch
 * @since      1.0.0
 *
 * @package    Lazy_amelia
 * @subpackage Lazy_amelia/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<div class="wrap" style="float: left; width: 70%;">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>    

    <form method="post" name="picana_options" action="options.php">

    <?php
        //Grab all options
        $options = get_option($this->plugin_name);

        // Cleanup
            
        
        $_lazy_open = $options['_lazy_open'];  
        $_lazy_debug =  $options['_lazy_debug'];    
        $_lazy_BeforeBookingLoaded = $options['_lazy_BeforeBookingLoaded'];
        $_lazy_BeforeConfirmBookingLoaded =  $options['_lazy_BeforeConfirmBookingLoaded'];
        $_lazy_RemoveColon =   $options['_lazy_RemoveColon'];
        
    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>

<style>
.accordion {
    background-color: #0073aa;
    color: #fff;
    cursor: pointer;
    padding: 18px;
    margin-bottom: 0px;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
    -webkit-appearance: menulist;
}

.active, .accordion:hover {
    background-color: #0073aa4d; 
}

.panel {
    padding: 0 18px 10px 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
</style>

      <div  class="container" >
      <div class="row" style=" border-bottom: thick solid #00b7f9;">
        <div class="span6" style="font-size: 20px;margin-left: 1px;color: #28bbf0;font-weight: bolder; ">
          <a href="http://piclaunch.com/" rel="home"  target="_blank"><img src="<?php echo plugins_url( 'asset/lazy_amelia.png', __FILE__ ); ?>" alt="Lazy Amelia" style="width:150px;vertical-align: middle;padding-right: 10px;margin-bottom: 0.75em;border-right: thick solid #00b7f9"> Amelia Controller </a>
          <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-mention-button twitter-mention-button-rendered twitter-tweet-button" style="position: static; visibility: visible; width: 133px; height: 20px;" title="Twitter Tweet Button" src="http://platform.twitter.com/widgets/tweet_button.d7c36168330549096322ed9760147cf7.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fpiclaunch.com%2Fpinq%2F&amp;screen_name=piclaunch&amp;size=m&amp;time=1510593489908&amp;type=mention" data-screen-name="piclaunch"></iframe><script async="" src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
          <style>.bmc-button img{width: 27px !important;margin-bottom: 1px !important;box-shadow: none !important;border: none !important;vertical-align: middle !important;}.bmc-button{line-height: 36px !important;height:37px !important;text-decoration: none !important;display:inline-flex !important;color:#ffffff !important;background-color:#FF813F !important;border-radius: 3px !important;border: 1px solid transparent !important;padding: 1px 9px !important;font-size: 23px !important;letter-spacing: 0.6px !important;box-shadow: 0px 1px 2px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 1px 2px 2px rgba(190, 190, 190, 0.5) !important;margin: 0 auto !important;font-family:'Cookie', cursive !important;-webkit-box-sizing: border-box !important;box-sizing: border-box !important;-o-transition: 0.3s all linear !important;-webkit-transition: 0.3s all linear !important;-moz-transition: 0.3s all linear !important;-ms-transition: 0.3s all linear !important;transition: 0.3s all linear !important;}.bmc-button:hover, .bmc-button:active, .bmc-button:focus {-webkit-box-shadow: 0px 1px 2px 2px rgba(190, 190, 190, 0.5) !important;text-decoration: none !important;box-shadow: 0px 1px 2px 2px rgba(190, 190, 190, 0.5) !important;opacity: 0.85 !important;color:#ffffff !important;}</style><link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet"><a class="bmc-button" target="_blank" href="https://www.paypal.me/PINQ"><img src="https://www.buymeacoffee.com/assets/img/BMC-btn-logo.svg" alt="Buy me a coffee"><span style="margin-left:5px">Buy me a coffee</span></a>
        </div>
      </div>
      </div>
  <p>Built by Piclaunch <a href="http://www.piclaunch.com/"></a>,write to us if if you have any issue at piclaunch@gmail.com or visit <a href="http://www.piclaunch.com/">Piclaunch Support</a></p>
          <?php  if($_lazy_debug == 1) { ?>
                    <p class="accordion">Debugging Info</p>
                        <div class="panel">
                              <?php print_r($options); echo "<br>"; $file = plugins_url( 'img/logo.png', __FILE__ ); echo $file;
                              ; $url = plugins_url( $path,$this->plugin_name ); echo $url."/Onc_master/img/logo.png";?>
                        </div>

            <?php  }?> 


<!-- CODE AMELIA---- -->
<p class="accordion" > Open </p>
<div class="panel">
    <fieldset>
	    	
	        <legend class="screen-reader-text">
	            <span> Enter Any HTML,CSS, JS of your choice:</span>
	        </legend>
              <span><?php esc_attr_e('Enter Any HTML,CSS, JS of your choice:)', $this->plugin_name); ?></span>
              <?php
                $contentpre = $_lazy_open;
                $settingspre = array(
                            'textarea_name' => $this->plugin_name.'[_lazy_open]',
                            'media_buttons' => false,
                            'textarea_rows' => 5,
                            'editor_height' => 10,
                            'tinymce' => array(
                                'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
                                    'bullist,blockquote,|,justifyleft,justifycenter' .
                                    ',justifyright,justifyfull,|,link,unlink,|' .
                                    ',spellchecker,wp_fullscreen,wp_adv'
                                    )
                                 );
               wp_editor( $contentpre, '_lazy_open', $settingspre);
              echo " <br />";
               ?>
	    </fieldset>


</div>
<p class="accordion" > Code For BeforeBookingLoaded </p>
<div class="panel">
    <fieldset>
	    	
	        <legend class="screen-reader-text">
	            <span> Enter just your js code without script tag:</span>
	        </legend>
              <span><?php esc_attr_e('Enter just your js code without script tag:)', $this->plugin_name); ?></span>
              <?php
                $contentBeforeBookingLoaded = $_lazy_BeforeBookingLoaded;
                $settingBeforeBookingLoaded = array(
                            'textarea_name' => $this->plugin_name.'[_lazy_BeforeBookingLoaded]',
                            'media_buttons' => false,
                            'textarea_rows' => 5,
                            'editor_height' => 10,
                            'tinymce' => array(
                                'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
                                    'bullist,blockquote,|,justifyleft,justifycenter' .
                                    ',justifyright,justifyfull,|,link,unlink,|' .
                                    ',spellchecker,wp_fullscreen,wp_adv'
                                    )
                                 );
               wp_editor( $contentBeforeBookingLoaded, '_lazy_BeforeBookingLoaded', $settingBeforeBookingLoaded);
              echo " <br />";
               ?>
	    </fieldset>


</div>

<p class="accordion" > Code For BeforeConfirmBookingLoaded </p>
<div class="panel">
    <fieldset>
	    	
	        <legend class="screen-reader-text">
	            <span> Entter JS code without script tag:</span>
	        </legend>
	          <span><?php esc_attr_e('Entter JS code without script tag:', $this->plugin_name); ?></span>
              <?php
                $contentBeforeConfirmBookingLoaded = $_lazy_BeforeConfirmBookingLoaded;
                $settingBeforeConfirmBookingLoaded = array(
                            'textarea_name' => $this->plugin_name.'[_lazy_BeforeConfirmBookingLoaded]',
                            'media_buttons' => false,
                            'textarea_rows' => 5,
                            'editor_height' => 10,
                            'tinymce' => array(
                                'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
                                    'bullist,blockquote,|,justifyleft,justifycenter' .
                                    ',justifyright,justifyfull,|,link,unlink,|' .
                                    ',spellchecker,wp_fullscreen,wp_adv'
                                    )
                                 );
               wp_editor( $contentBeforeConfirmBookingLoaded, '_lazy_BeforeConfirmBookingLoaded', $settingBeforeConfirmBookingLoaded);
              echo " <br />";
               ?>
	    </fieldset>


</div>

<p class="accordion"> Quick Function </p>
<div class="panel">
      <fieldset >
        <p> Remove All the Colons after the Label from the From ?</p>
        <legend class="screen-reader-text">
            <span>It will remove the colons at the end of the label in each field of booking froms.</span>
        </legend>
        <label for="<?php echo $this->plugin_name;?>-_lazy_RemoveColon">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-_lazy_RemoveColon" name="<?php echo $this->plugin_name; ?>[_lazy_RemoveColon]" value="1" <?php checked($_lazy_RemoveColon, 1); ?> />
            <span><?php esc_attr_e('No Colon (:) after Label ', $this->plugin_name); ?></span>
        </label>
    </fieldset>
</div>

  <!-- CODE AMELIA        -->
<!-- Debug -->
<p class="accordion">Debug Message </p>

  <fieldset>
      <p>Enable debug only to check your vlaue :</p>
        <legend class="screen-reader-text">
            <span>Show AMP Auto Ads on website</span>
        </legend>
        <label for="<?php echo $this->plugin_name;?>-_lazy_debug">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-_lazy_debug" name="<?php echo $this->plugin_name; ?>[_lazy_debug]" value="1" <?php checked($_lazy_debug, 1); ?> />
            <span><?php esc_attr_e('Debug Admin Only', $this->plugin_name); ?></span>
        </label>
    </fieldset> 


    <!-- SAVE CALL -->
    <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
    </form>
  
</div>
<div class="wrapright" style="float: right; width: 28%;">  
    <br>
    <span><?php esc_attr_e('Request for help , happy to help!', $this->plugin_name); ?></span>        
     <br>
    <?php deliver_mail();
    html_form_code(); ?>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>

<?php

function html_form_code() {
    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    echo '<p>';
    echo 'Your Name (required) <br/>';
    echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : "Admin" ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Your Email (required) <br/>';
    echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : get_option('admin_email') ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Subject (required) <br/>';
    echo '<input type="text" name="cf-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : 'Lazy Amelia Help' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Your Message (required) <br/>';
    echo '<textarea rows="10" cols="35" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
    echo '</p>';
    echo '<p><input type="submit" name="cf-submitted" value="Request Help"></p>';
    echo '</form>';
}

function deliver_mail() {

    // if the submit button is clicked, send the email
    if ( isset( $_POST['cf-submitted'] ) ) {

        // sanitize form values
        $name    = sanitize_text_field( $_POST["cf-name"] );
        $email   = sanitize_email( $_POST["cf-email"] );
        $subject = sanitize_text_field( $_POST["cf-subject"] );
        $subject .= " From: ";
        $subject .= get_site_url();
        $message = esc_textarea( $_POST["cf-message"] );
        $message .= " Email from " .  $email ;

        // get the blog administrator's email address
        $to = "piclaunch@gmail.com";

        $headers = "From: $name <$email>" . "\r\n";

        // If email has been process for sending, display a success message
        if ( wp_mail( $to, $subject, $message, $headers ) ) {
            echo '<div>';
            echo '<p>Thanks for contacting me, expect a response soon.</p>';
            echo '</div>';
        } else {
            echo 'An unexpected error occurred';
        }
    }
}
?>


