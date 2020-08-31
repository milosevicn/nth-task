<?php

/**
 *@package NthCalcPlugin
 **/
/** 
 * Plugin Name: NthCalc Plugin 
 * Plugin URI: /
 * Description: Display Calculator Plugin for NTH task
 * Version: 1.0.0 
 * Author: Nikola Milosevic
 * Author URI: /
 */

defined('ABSPATH') or die('Undefined file');

//Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/nthcalc-scripts.php');

//Load Class
require_once(plugin_dir_path(__FILE__).'/includes/nthcalc-class.php');

//Register Widget
function register_nthcalcplugin() {
    register_widget('Nth_Calc_Widget');
}

//Hook in function
add_action('widgets_init', 'register_nthcalcplugin');

//Return string for shortcode
function func_wp_vue() {
    //Add VueJS
    wp_enqueue_script('wpvue_vuejs');
    //Add my code to it
    wp_enqueue_script('vue_calculator');

    $result = '
    <div id="calculator" class="container text-center">
        <div class="card bg-light">
            <div class="card-body">
                <input v-model="value_displayed" class="input" disabled>
            </div>
        
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <tbody>
                        <tr>
                            <td><button v-on:click="selectDigit(7)" class="btn btn-lg btn-dark">7</button></td>
                            <td><button v-on:click="selectDigit(8)" class="btn btn-lg btn-dark">8</button></td>
                            <td><button v-on:click="selectDigit(9)" class="btn btn-lg btn-dark">9</button></td>
                            <td><button v-on:click="selectOperation(\'/\')" class="btn btn-primary btn-lg">/</button></td>
                        </tr>
                        <tr>
                            <td><button v-on:click="selectDigit(4)" class="btn btn-lg btn-dark">4</button></td>
                            <td><button v-on:click="selectDigit(5)" class="btn btn-lg btn-dark">5</button></td>
                            <td><button v-on:click="selectDigit(6)" class="btn btn-lg btn-dark">6</button></td>
                            <td><button v-on:click="selectOperation(\'*\')" class="btn btn-primary btn-lg">*</button></td>
                        </tr>
                        <tr>
                            <td><button v-on:click="selectDigit(1)" class="btn btn-lg btn-dark">1</button></td>
                            <td><button v-on:click="selectDigit(2)" class="btn btn-lg btn-dark">2</button></td>
                            <td><button v-on:click="selectDigit(3)" class="btn btn-lg btn-dark">3</button></td>
                            <td><button v-on:click="selectOperation(\'-\')" class="btn btn-primary btn-lg">-</button></td>
                        </tr>
                        <tr>
                            <td><button v-on:click="clear" class="btn btn-danger btn-lg">C</button></td>
                            <td><button v-on:click="selectDigit(0)" class="btn btn-lg btn-dark">0</button></td>
                            <td><button v-on:click="selectOperation(\'=\')" class="btn btn-success btn-lg">=</button></td>
                            <td><button v-on:click="selectOperation(\'+\')" class="btn btn-primary btn-lg">+</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    ';

    //Return to display
    return $result;
}

//Add shortcode to WordPress
add_shortcode('wpvue', 'func_wp_vue');
add_filter('widget_text', 'do_shortcode');