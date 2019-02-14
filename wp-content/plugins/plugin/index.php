<?php
/*
Plugin Name: O meu puglin
Plugin URI: http://exemplo.org/o-meu-plugin
Description: Um plugin de teste didático, use shortcode [like]
Version: 1.0
Author: Aluno SENAC
Author: URI: meusite.com
License: GPLv2
*/

function example_like(){
    return "E não esqueça de curtir nossa fã page";
}

add_shortcode("like","example_like");


function form(){
    echo '
        <form method="post" action="'.plugins_url( 'admin-post.php', __FILE__ ).'">
            <div>
                <label>Email</label>
                <input name="email" type="email" size="20">
            </div>
            
            <div>    
                <label>Assunto</label>
                <input name="assunto" type="assunto" size="20">
            </div>        

            <div>
            <label>Mensagem</label>
            <textarea name="mensagem" rows"3"></textarea>
        </div>  

            <button type="submit">Submit</button>
            </form>

    ';

}

    add_shortcode("formulario","form");
?>
