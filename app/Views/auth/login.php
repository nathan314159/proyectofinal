<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>login</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <div class="contenedor">
        <form action="<?= base_url('login') ?>" method="POST">
            <div class="usu_email">
                <label for="usu_email">Email</label>
                <input type="text" name="usu_email" id="usu_email" require>
            </div>
            <div class="usu_password">
                <label for="usu_password">Password</label>
                <input type="text" name="usu_password" id="usu_password" require>
            </div>
            <button type="submit">Ingresar</button>
        </form>
        <div class="link">
            <a href="<?= base_url('register') ?>">Registrarse</a>
        </div>
    </div>
</body>

</html>