<?php
//Add Scripts

function nthcalc_add_scritps() {
    //Add VueJS
    wp_register_script('wpvue_vuejs', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
    wp_register_script('vue_calculator', plugins_url().'/nthcalcplugin/vuecalculator.js', 'wpvue_vuejs', true );
    //Add Bootstrap
    wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
}

add_action('wp_enqueue_scripts', 'nthcalc_add_scritps');