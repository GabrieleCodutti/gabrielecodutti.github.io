
<?php
// Verifica se il form è stato inviato
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recupera i dati dal form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Verifica che tutti i campi siano stati compilati
    if(empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Costruisce l'email
    $to = "coduttigabriele@gmail.com"; // Inserisci qui il tuo indirizzo email
    $subject = "New message from your website";
    $body = "Name: $name\nEmail: $email\n\n$message";

    // Invia l'email
    if(mail($to, $subject, $body)) {
        echo "Your message has been sent.";
    } else {
        echo "There was an error sending your message. Please try again.";
    }

} else {
    // Il form non è stato inviato correttamente
    echo "There was an error processing your request.";
}
?>
