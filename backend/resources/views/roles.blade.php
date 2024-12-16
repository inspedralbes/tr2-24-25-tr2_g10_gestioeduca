<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Roles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Gestión de Roles</h1>

    <!-- Mostrar mensajes de éxito -->
    <?php if (session('success')): ?>
        <div class="alert alert-success">
            <?php echo session('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Listado de roles -->
    <h2>Lista de Roles</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?php echo $role->id; ?></td>
                    <td><?php echo $role->name; ?></td>
                    <td><?php echo $role->description; ?></td>
                    <td>
                        <!-- Botón para Editar -->
                        <button class="btn btn-warning btn-sm" onclick="editRole(<?php echo htmlspecialchars(json_encode($role)); ?>)">Editar</button>

                        <!-- Formulario para Eliminar -->
                        <form action="<?php echo route('roles.destroy', $role->id); ?>" method="POST" style="display:inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulario para Crear/Editar Roles -->
    <h2 id="form-title">Crear Nuevo Rol</h2>
    <form id="role-form" action="<?php echo route('roles.store'); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" id="role-id" name="id">

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Rol</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>
        
        <button type="submit" class="btn btn-success" id="form-button">Guardar</button>
        <button type="button" class="btn btn-secondary" onclick="resetForm()">Cancelar</button>
    </form>
</div>

<!-- Script para manejar el formulario dinámico -->
<script>
    function editRole(role) {
        // Cambia el título del formulario
        document.getElementById('form-title').innerText = 'Editar Rol';

        // Actualiza los campos del formulario con los datos del rol
        document.getElementById('role-id').value = role.id;
        document.getElementById('name').value = role.name;
        document.getElementById('description').value = role.description;

        // Cambia la acción del formulario al método PUT
        const form = document.getElementById('role-form');
        form.action = `<?php echo url('roles'); ?>/${role.id}`;
        if (!document.querySelector('input[name="_method"]')) {
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';
            form.appendChild(methodInput);
        }

        // Cambia el texto del botón
        document.getElementById('form-button').innerText = 'Actualizar';
    }

    function resetForm() {
        // Restablece el formulario al estado inicial
        document.getElementById('form-title').innerText = 'Crear Nuevo Rol';
        document.getElementById('role-id').value = '';
        document.getElementById('name').value = '';
        document.getElementById('description').value = '';
        const form = document.getElementById('role-form');
        form.action = '<?php echo route('roles.store'); ?>';
        document.getElementById('form-button').innerText = 'Guardar';

        // Elimina el campo _method si existe
        const methodInput = document.querySelector('input[name="_method"]');
        if (methodInput) methodInput.remove();
    }
</script>
</body>
</html>
