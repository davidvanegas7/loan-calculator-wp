<?php
/*
Plugin Name: Loan Calculator By davidvanegas7
Description: Loan Calculator By davidvanegas7. Put ShortCode [loan-calculator-david] 
Version: 1.0
Author: David Vanegas
Author URI: http://davidvanegasdev.co
*/

if(!defined('ABSPATH'))exit; 

function html_loan_calculator(){ 
    $str = <<<EOF
    <div class="row">
      <div class="large-12 medium-12 columns">

        <h3 class="text-center">Rate calculator</h3>
        <form>

		<div class="row">
            <div class="large-9 medium-9 columns">
              <label>Loan amount (CHF)</label>
	          <input type="number" id="range_33"></input> 
            </div>
            <div class="large-3 medium-3 columns">
              <br/><br/>
              <input type="text" value="$10000" id="loan-mount" />
            </div>
          </div>

  		<div class="row">
            <div class="large-9 medium-9 columns">
              <label>Duration (Months)</label>
	          <input type="number" id="range_34"></input> 
            </div>
            <div class="large-3 medium-3 columns">
              <br/><br/>
              <input type="text" value="24" id="loan-duration" />
            </div>
          </div>

          <div class="row">
            <div class="large-4 medium-4 columns">
              <label>Rate</label>
              <input type="number" value="9.0" id="loan-rate" />
            </div>
            <div class="large-6 medium-6 columns">
              <label>Monthly Rate (CHF)</label>
              <label id="label-monthly-rate">0.00</label>
            </div>
          </div>
          <div class="row text-center">
            <button class="button text-center">Apply Now</button>
          </div>
        </form>
      </div>

    </div>
EOF;
    echo $str;
 }

function loan_calculator_scripts(){

	wp_enqueue_style( 'foundation', plugins_url( 'css/foundation.css', __FILE__ ));
	wp_enqueue_style( 'app', plugins_url( 'css/app.css', __FILE__ ));
	wp_enqueue_style( 'ion.rangeSlider', plugins_url( 'css/ion.rangeSlider.css', __FILE__ ));
	wp_enqueue_style( 'ion.rangeSlider.skinHTML5', plugins_url( 'css/ion.rangeSlider.skinHTML5.css', __FILE__ ));
	wp_enqueue_style( 'custom', plugins_url( 'css/custom.css', __FILE__ ));

	//wp_enqueue_script('jquery', plugins_url('js/vendor/jquery.js', __FILE__ ),array(),'1.0.0',true);
	//wp_enqueue_script( 'jquery' );
	wp_enqueue_script('what-input', plugins_url('js/vendor/what-input.js', __FILE__ ),array(),'1.0.0',true);
	wp_enqueue_script('foundation', plugins_url('js/vendor/foundation.js', __FILE__ ),array(),'1.0.0',true);

	wp_enqueue_script('app', plugins_url('js/app.js', __FILE__ ),array('jquery'),'1.0.0',true);
	wp_enqueue_script('ion.rangeSlider.min', plugins_url('js/ion.rangeSlider.min.js', __FILE__ ),array('jquery'),'1.0.0',true);
	wp_enqueue_script('custom', plugins_url('js/custom.js', __FILE__ ),array('jquery'),'1.0.0',true);

}

function addMenuLoanCalculatorDavid(){
	add_menu_page("Loan Calculator", "Loan Calculator", 4, "loan-calculator", "htmlMenuPage");
}

function htmlMenuPage(){
	echo "Hello Loan Calculator";
}


add_action("admin_menu", "addMenuLoanCalculatorDavid");
add_action( 'wp_enqueue_scripts', 'loan_calculator_scripts' );
add_shortcode('loan-calculator-david', 'html_loan_calculator');
?>