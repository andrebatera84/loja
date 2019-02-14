<?php
    echo "<h3> Mensagem enviada</h3>";

    echo "<p>Email: ".$_POST['email']."</p>";
    echo "<p>Assunto: ".$_POST['assunto']."</p>";
    echo "<p>Mensagem: ".$_POST['mensagem']."</p>";

    $emaildestinatario = $_POST['email'];
    $headers = "From: andrebatera84@hotmail.com\n";
    $emailsender = "From: andrebatera84@hotmail.com\n";
    $assunto = $_POST['assunto'];
    $mensagemHTML = $_POST['mensagem'];

    if(!mail($emaildestinatario, $assunto, $mensagemHTML, $headers .= "-r".$emailsender)){

        $headers .= "Return-Path: " . $emailsender;
        mail($emaildestinatario, $assunto, $mensagemHTML, $headers );
    }
?>