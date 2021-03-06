<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['assunto'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$assunto = strip_tags(htmlspecialchars($_POST['assunto']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'contato@infobiojr.com.br'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_sender = 'contato@infobiojr.com.br';
$email_subject = "Site da EJ:  $assunto";
$email_body = "Você recebeu um email do site da EJ via formulario de contato.\n\n"."Aqui estao os detalhes:\n\nNome: $name\n\nEmail: $email_address\n\nAssunto: $assunto\n\nMensage:\n$message";
$headers = "From: contato@infobiojr.com.br'\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers, "-r".$to);
return true;         
?>