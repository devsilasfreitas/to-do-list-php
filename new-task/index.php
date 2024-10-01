<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $connection = new PDO('mysql:host=localhost;dbname=to_do_list', 'root', '');
        if (isset($_POST['title']) && isset($_POST['description'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $insert = $connection->exec("INSERT INTO tarefas (titulo, descricao, status) VALUES ('$title', '$description', 'pendente')");
            header('Location: ../');
        } else {
            header('Location: ./?error=Faltando campos obrigatórios');
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Tarefa | To Do List</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../">
        <h1>To Do List</h1>
    </a>
    <h2>Nova Tarefa</h2>
    <form action="" method="post">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" required>
        <label for="description">Descrição</label>
        <textarea name="description" id="description" required rows="10"></textarea>
        <button type="submit">Criar</button>
        <?php if (isset($_GET['error'])) { ?>
            <p><?= $_GET['error'] ?></p>
        <?php } ?>
    </form>
</body>
</html>