<?php
// Verifica se il form è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Recupera i dati del form
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Valida i dati
  $errors = array();
  if (empty($name)) {
    $errors[] = 'Il nome è obbligatorio.';
  }
  if (empty($email)) {
    $errors[] = 'L\'indirizzo email è obbligatorio.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'L\'indirizzo email non è valido.';
  }
  if (empty($message)) {
    $errors[] = 'Il messaggio è obbligatorio.';
  }

  // Se ci sono errori, restituisci un messaggio di errore
  if (!empty($errors)) {
    $error_message = implode('<br>', $errors);
    echo '<p style="color: red;">' . $error_message . '</p>';
  } else {
    // Invia l'email di notifica
    $to = 'coduttigabriele@gmail.com';
    $subject = 'Nuovo messaggio dal form di contatto';
    $body = "Nome: $name\nEmail: $email\nMessaggio:\n$message";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    if (mail($to, $subject, $body, $headers)) {
      echo '<p style="color: green;">Grazie per averci contattato. Ti risponderemo al più presto.</p>';
    } else {
      echo '<p style="color: red;">Errore nell\'invio del messaggio.</p>';
    }
  }
}
?>