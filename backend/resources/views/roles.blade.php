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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?php echo $role->id; ?></td>
                    <td><?php echo $role->name; ?></td>
                    <td>
                        <!-- Botón para Editar -->
                        <button class="btn btn-warning btn-sm" onclick="editRole(<?php echo htmlspecialchars(json_encode($role)); ?>)">Editar</button>

                        <!-- Formulario para Eliminar -->
                        <form action="<?php echo route('roles.destroy', $role->id); ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este rol?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulario para Crear Nuevo Rol -->
    <h2 id="create-form-title" style="display: none;">Crear Nuevo Rol</h2>
    <form id="create-role-form" action="{{ route('roles.store') }}" method="POST" style="display: none;">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Rol</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

    <!-- Formulario para Editar Rol -->
    <h2 id="edit-form-title" style="display: none;">Editar Rol</h2>
    <form id="edit-role-form" action="{{ route('roles.update', 'role_id') }}" method="POST" style="display: none;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Rol</label>
            <input type="text" class="form-control" id="edit-name" name="name" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>

</div>

<!-- Script para manejar el formulario dinámico -->
<script>
    function editRole(role) {
        // Ocultar formulario de creación y mostrar formulario de edición
        document.getElementById('create-role-form').style.display = 'none';
        document.getElementById('create-form-title').style.display = 'none';

        document.getElementById('edit-role-form').style.display = 'block';
        document.getElementById('edit-form-title').style.display = 'block';

        // Llenar el formulario de edición con los datos del rol
        document.getElementById('edit-name').value = role.name;

        // Actualizar la acción del formulario con la URL del rol correspondiente
        const editForm = document.getElementById('edit-role-form');
        editForm.action = `{{ url('roles') }}/${role.id}`;
    }

    // Función para mostrar el formulario de creación
    function showCreateForm() {
        // Ocultar formulario de edición y mostrar formulario de creación
        document.getElementById('edit-role-form').style.display = 'none';
        document.getElementById('edit-form-title').style.display = 'none';

        document.getElementById('create-role-form').style.display = 'block';
        document.getElementById('create-form-title').style.display = 'block';
    }

    // Mostrar el formulario de creación cuando se carga la página
    window.onload = showCreateForm;
</script>

</body>
</html>
