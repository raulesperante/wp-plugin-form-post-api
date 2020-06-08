<?php
/**
 * Plugin Name:       Formulario a API Json
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Este plugin es un shortcode, inserta un formulario en Wordpress que envía datos a una API REST   por el metodo POST.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Raul Gustavo Esperante
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       api-rest-json-form-post
 * Domain Path:       /languages
 */


function rgeformapi_scripts()  { 

    wp_register_style( 'form-api-css',  plugin_dir_url( __FILE__ ) . 'index.css' );
    wp_enqueue_style( 'form-api-css' );
    
    wp_enqueue_script( 'form-api-js', plugin_dir_url( __FILE__ ) . 'index.js', array(), '', true );

	
}
add_action( 'wp_enqueue_scripts', 'rgeformapi_scripts' );

function rgeformapi_main() {
    
    $form = '<div class="form-container"><form class="display-flex form">
        <p id="form-title">Editar Post</p>
        <div class="display-flex form-item">
            <label class="label-item" for="title">Título</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div class="display-flex form-item">
            <label class="label-item" for="body">Contenido</label>
            <input type="text" name="body" id="body" required>
        </div>

        <div class="display-flex form-item">
            <label class="label-item" for="userId">Id usuario</label>
            <select name="userId" id="userId">
                <option value="one">1</option>
                <option value="two">2</option>
                <option value="three">3</option>
                <option value="four">4</option>
            </select>
        </div>

        <div class="buttom-container">
            <button id="send">Enviar</button>
        </div>
    </form></div>
    <div id="jsonResponse" style="width:100%;margin: 0px auto;"><p style="text-align: center; margin-top: 20px;">Respuesta desde la api JsonPlaceHolder: </p>
        <pre id="insertJson" style="width:50%; margin: 0 auto;">
    </pre></div>';

    return $form;
 }
 add_shortcode('form-post-api', 'rgeformapi_main');
