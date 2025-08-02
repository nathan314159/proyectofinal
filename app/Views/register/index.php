<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($errors) && !empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('register') ?>" method="POST">
        <label>Nombre:</label>
        <input type="text" name="usu_nombre" required><br>

        <label>Apellido:</label>
        <input type="text" name="usu_apellido" required><br>

        <label>Email:</label>
        <input type="email" name="usu_email" required><br>

        <label>Contraseña:</label>
        <input type="password" name="usu_password" required><br>

        <button type="submit">Registrar</button>
    </form>

</body>

</html>