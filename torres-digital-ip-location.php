<?php /* The Silence is Gold!

Plugin Name: Torres Digital IP and Geolocation
Plugin URI: http://torresdigital.com.br/
Description: This plugin is a simple options to display on post or page a Geolocalization of visitants. <strong>Use the ShortCode to Display informations: [geolocation]</strong>
Version: 1.o
Author: Torres Digital -Sites → Lojas Virtuais e e-Commerce
Author URI: https://facebook.com/torresdigital */

     /**
        *IP and GEO Location By Torres Digital !
        *
        */
function torres_digital_geo_location_shortcode( $atts, $content) {

 $user_ip = getenv('REMOTE_ADDR');
 $geo = json_decode(file_get_contents("http://extreme-ip-lookup.com/json/$user_ip"));
 $country = $geo->country;
 $city = $geo->city;
 $ipType = $geo->ipType;
 $businessName = $geo->businessName;
 $businessWebsite = $geo->businessWebsite;
 $continent = $geo->continent;
    $countryCode = $geo->countryCode;
    $region = $geo->region;
    $lat = $geo->lat;
    $lon = $geo->lon;
    $ipName =$geo->ipName;
    $org = $geo->org;
    $isp = $geo->isp;
    $status = $geo->status;
    $message = $geo->message;

 echo " <div id=\"informacoes\" class=\"informacoes\">
 <p>Seu IP $user_ip..</p>
 <p>Cidade: $city.</p>
 <p>País $country</p>
 <p>Continente:$continent.</p>
 <p>Latitude $lat.</p>
 <p>Pretadora do Serviço de Internet: $ipName.</p>
<p>Códido do País $countryCode.</p>
<p>Região $region.</p>
<p>Região $org.</p>
 <p>Região $isp</p>
 <p>Região $status.</p>
 <p>Mensagen / Statu $menssage</p>
 </div>";

    }

add_shortcode( 'torresdigital-geolocation', 'torres_digital_geo_location_shortcode' );

/* Style */
add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts');
function callback_for_setting_up_scripts() {
    wp_register_style( 'torres_digital_geo_location_shortcode', '/css/style.css' );
    wp_enqueue_style( 'torres_digital_geo_location_shortcode' );
    wp_enqueue_script( 'torres_digital_geo_location_shortcode', 'http://locationofscript.com/myscript.js', array( 'jquery' ) );
}
