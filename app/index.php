<?php
$servername = "db";
$username = "root";
$password = "senha123";
$dbname = "minha_db";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Insere usuário no banco
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "Usuário adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form method="POST">
        Nome: <input type="text" name="nome"><br>
        Email: <input type="email" name="email"><br>
        <button type="submit">Cadastrar</button>
    </form>

    <h2>Lista de Usuários</h2>
    <?php
    $result = $conn->query("SELECT * FROM usuarios");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "Nenhum usuário cadastrado.";
    }
    ?>
</body>
</html>
