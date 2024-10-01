<?php
    $connection = new PDO('mysql:host=localhost;dbname=to_do_list', 'root', '');
    $select = $connection->query('SELECT * FROM tarefas');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <section>
            <h1>To Do List</h1>
            <a href="./new-task" class="btn">Nova tarefa</a>
        </section>
        <section>
            <?php while ($task = $select->fetch(PDO::FETCH_ASSOC)) { ?>
                <article>
                    <h2><?= $task['titulo'] ?></h2>
                    <p>Status: <?= $task['status'] ?></p>
                    <p><?= $task['descricao'] ?></p>
                </article>
            <?php } ?>
        </section>
    </main>
</body>
</html>