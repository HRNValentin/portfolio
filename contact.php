<?php
// On récupère les données envoyées en JSON
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['nom']) && !empty($data['email']) && !empty($data['message'])) {
    
    $to = "valentinhernu1@gmail.com";
    $subject = "Nouveau message de : " . htmlspecialchars($data['nom']);
    
    // Construction du corps du mail
    $body = "Nom : " . htmlspecialchars($data['nom']) . "\n";
    $body .= "Email : " . htmlspecialchars($data['email']) . "\n\n";
    $body .= "Message :\n" . htmlspecialchars($data['message']);
    
    // Headers pour l'email
    $headers = "From: webmaster@tonportfolio.fr" . "\r\n" .
               "Reply-To: " . $data['email'] . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envoi
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Message envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "L'envoi a échoué."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Veuillez remplir tous les champs."]);
}
?>