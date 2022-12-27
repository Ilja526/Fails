<?php
$pdo = require_once 'lib/connection.php';
$selectStatement = $pdo->prepare('SELECT * FROM `singup`;');
$selectStatement->execute();
$singup = $selectStatement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservations</title>
    <link href="../static/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <table class="table table-bordered table-stripped">
        <thead>
        <tr>
            <th>Email</th>
            <th>Password</th>
            <th>RepeatPassword</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($singup as $singup): ?>
            <tr>
                <td><?= htmlspecialchars($singup['Email']) ?></td>
                <td><?= htmlspecialchars($singup['Password']) ?></td>
                <td><?= htmlspecialchars($singup['RepeatPassword']) ?></td>
                <td class="text-center"><a href="EditSingUp.php?id=<?= htmlspecialchars($singup['SingUpID']) ?>" class="btn btn-primary">Edit</a></td>
                <td class="text-center"><a href="DeleteSingUp.php?id=<?= htmlspecialchars($singup['SingUpID']) ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>