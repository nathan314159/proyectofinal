<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        #btnEliminar{
            height: 35px;
            width: 80px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 10px;

        }
    </style>
</head>

<body>

    <h2>Lista de Usuarios</h2>
    <?php if (session('success')): ?>
        <div style="color:green;"><?= session('success') ?></div>
    <?php endif; ?>
    <?php if (session('error')): ?>
        <div style="color:red;"><?= session('error') ?></div>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['usu_id']) ?></td>
                        <td><?= esc($user['usu_nombre']) ?></td>
                        <td><?= esc($user['usu_apellido']) ?></td>
                        <td><?= esc($user['usu_email']) ?></td>
                        <td>
                            <form action="<?= base_url('register/delete') ?>" method="post" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                <input type="hidden" name="usu_id" value="<?= esc($user['usu_id']) ?>">
                                <button id="btnEliminar" type="submit">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No hay usuarios.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>