<?php
include 'conex.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verifica se o email já está em uso
$result = $conn->query("SELECT email FROM usuari WHERE email = '$email'");
if ($result->num_rows > 0) {
    echo 'email_exists';
} else {
    // Verifica se a senha tem pelo menos 8 caracteres
    if (strlen($senha) < 8) {
        echo 'A senha deve ter pelo menos 8 caracteres.';
        exit;
    }
    
    // Se o email não estiver em uso e a senha for válida, realiza o cadastro
    $sql ="INSERT INTO usuari (nome, senha, email) VALUES ('$nome','$senha','$email')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
exit;
?>
