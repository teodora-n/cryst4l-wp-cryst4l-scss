<?php 
/*
* Social links
*/
?>
<ul class="c-social-icons">
<?php //Facebook
$facebook = get_option('fb_link'); 
if($facebook) { ?>
    <li class="c-social-icons__item c-social-icons__item--facebook"><a href="<?php echo esc_attr( get_option('fb_link') ); ?>" target="_blank">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
width="18.004px" height="18.004px" viewBox="0 0 18.004 18.004" enable-background="new 0 0 18.004 18.004" xml:space="preserve">
<path fill="#FFFFFF" d="M17.008,0H0.996C0.445,0,0,0.445,0,0.996v16.012c0,0.551,0.445,0.996,0.996,0.996h8.615v-6.975H7.268V8.311
h2.344V6.306c0-2.321,1.431-3.587,3.505-3.587c0.984,0,1.84,0.07,2.086,0.105v2.427l-1.43,0.012c-1.137,0-1.348,0.527-1.348,1.313
v1.735h2.684l-0.352,2.719h-2.332v6.975h4.583c0.551,0,0.996-0.445,0.996-0.996V0.996C18.004,0.445,17.559,0,17.008,0z"/>
</svg></a></li>
<?php }
//Twitter 
$twitter = get_option('twitter_link'); 
if($twitter) { ?>
    <li class="c-social-icons__item c-social-icons__item--twitter"><a href="<?php echo esc_attr( get_option('twitter_link') ); ?>" target="_blank"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
width="18.473px" height="15.004px" viewBox="0 0 18.473 15.004" enable-background="new 0 0 18.473 15.004" xml:space="preserve">
<path fill="#FFFFFF" d="M18.473,1.781c-0.68,0.293-1.418,0.504-2.18,0.586c0.785-0.469,1.383-1.207,1.664-2.086
c-0.727,0.434-1.547,0.75-2.402,0.914C14.863,0.457,13.878,0,12.788,0C10.69,0,9.002,1.699,9.002,3.786
c0,0.293,0.035,0.586,0.094,0.867C5.955,4.489,3.153,2.989,1.289,0.691C0.961,1.254,0.773,1.898,0.773,2.603
c0,1.313,0.668,2.473,1.688,3.152C1.84,5.731,1.254,5.556,0.75,5.274c0,0.012,0,0.035,0,0.047c0,1.841,1.301,3.364,3.036,3.716
C3.47,9.119,3.13,9.166,2.79,9.166c-0.246,0-0.48-0.023-0.715-0.059c0.48,1.5,1.875,2.591,3.539,2.626
c-1.301,1.02-2.93,1.617-4.7,1.617c-0.316,0-0.609-0.012-0.914-0.047c1.676,1.078,3.669,1.7,5.814,1.7
c6.962,0,10.771-5.768,10.771-10.772c0-0.164,0-0.328-0.012-0.492C17.313,3.2,17.957,2.531,18.473,1.781z"/>
</svg></a></li>
<?php } 
//Linkedin
$linkedin = get_option('in_link'); 
if($linkedin) { ?>
    <li class="c-social-icons__item c-social-icons__item--linkedin"><a href="<?php echo esc_attr( get_option('in_link') ); ?>" target="_blank"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
width="18.004px" height="17.207px" viewBox="0 0 18.004 17.207" enable-background="new 0 0 18.004 17.207" xml:space="preserve">
<path fill="#FFFFFF" d="M4.091,5.591H0.223v11.616h3.868V5.591z M4.337,2.004C4.325,0.867,3.505,0,2.181,0C0.867,0,0,0.867,0,2.004
c0,1.113,0.832,2.005,2.134,2.005h0.023l0,0C3.505,4.009,4.349,3.117,4.337,2.004z M18.004,10.549c0-3.563-1.898-5.228-4.442-5.228
c-2.086,0-3,1.16-3.505,1.957h0.024V5.591H6.224c0,0,0.047,1.09,0,11.616l0,0h3.857v-6.482c0-0.352,0.034-0.691,0.129-0.949
c0.281-0.691,0.914-1.406,1.98-1.406c1.395,0,1.957,1.066,1.957,2.625v6.213h3.856V10.549z"/>
</svg></a></li>
<?php } 
//Google Plus
$google = get_option('gplus_link'); 
if($google) { ?>
    <li class="c-social-icons__item c-social-icons__item--google_plus"><a href="<?php echo esc_attr( get_option('gplus_link') ); ?>" target="_blank"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
width="27px" height="17.18px" viewBox="0 0 27 17.18" enable-background="new 0 0 27 17.18" xml:space="preserve">
<g>
<path fill="#FFFFFF" d="M16.84,8.789c0,1.625-0.34,3.072-1.02,4.342s-1.648,2.262-2.906,2.977S10.215,17.18,8.59,17.18
c-1.164,0-2.277-0.227-3.34-0.68s-1.977-1.063-2.742-1.828s-1.375-1.68-1.828-2.742S0,9.754,0,8.59s0.227-2.277,0.68-3.34
s1.063-1.977,1.828-2.742S4.188,1.133,5.25,0.68S7.426,0,8.59,0c2.234,0,4.152,0.75,5.754,2.25l-2.332,2.238
C11.098,3.605,9.957,3.164,8.59,3.164c-0.961,0-1.85,0.242-2.666,0.727S4.461,5.033,3.984,5.865S3.27,7.605,3.27,8.59
s0.238,1.893,0.715,2.725s1.123,1.49,1.939,1.975s1.705,0.727,2.666,0.727c0.648,0,1.244-0.09,1.787-0.27s0.99-0.404,1.342-0.674
s0.658-0.576,0.92-0.92s0.453-0.668,0.574-0.973s0.205-0.594,0.252-0.867H8.59V7.359h8.109C16.793,7.852,16.84,8.328,16.84,8.789z
M27,7.359V9.82h-2.449v2.449H22.09V9.82h-2.449V7.359h2.449V4.91h2.461v2.449H27z"/>
</g>
</svg></a></li>
<?php } ?>
</ul>       