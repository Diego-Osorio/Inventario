@extends('layouts.panel')

@section('content')
<div class="card shadow-sm w-50 mx-auto mt-4">
    <div class="card-header bg-primary text-white text-center">
        <h5 class="mb-0">Editar Perfil</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

             <!-- Campo de Imagen de Perfil -->
              <!-- Imagen de perfil previa si existe -->
              <div class="form-group mb-3">
    <label for="profile_image" class="font-weight-bold">Imagen de Perfil</label>

    <!-- Botón para seleccionar imagen desde la galería -->
    <button type="button" class="btn btn-outline-primary" id="select_image_button">Seleccionar Imagen</button>

    <!-- Botón para abrir la cámara -->
    <button type="button" class="btn btn-outline-success" id="camera_button">Usar Cámara</button>

    <!-- Input oculto para seleccionar una imagen -->
    <input type="file" class="form-control rounded" id="profile_image" name="profile_image" accept="image/*" style="display: none;">

    <!-- Input oculto para capturar imagen desde la cámara -->
    <input type="file" id="camera_input" accept="camera/*" capture="camera" style="display: none;">
    
    <!-- Elemento para previsualizar la imagen -->
    <div id="preview_image" class="mt-3"></div>
</div>

<script>
    // Mostrar el selector de archivos de imagen
    document.getElementById('select_image_button').addEventListener('click', function () {
        document.getElementById('profile_image').click();  // Abrir el selector de archivos
    });

    // Mostrar la cámara para capturar una foto
    document.getElementById('camera_button').addEventListener('click', function () {
        document.getElementById('camera_input').click();  // Abrir la cámara
    });

    // Previsualizar la imagen seleccionada
    document.getElementById('profile_image').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const imgElement = `<img src="${event.target.result}" class="img-fluid rounded-circle" width="80" height="80" alt="Imagen de Perfil">`;
                document.getElementById('preview_image').innerHTML = imgElement;
            };
            reader.readAsDataURL(file);
        }
    });

    // Previsualizar la imagen capturada desde la cámara
    document.getElementById('camera_input').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const imgElement = `<img src="${event.target.result}" class="img-fluid rounded-circle" width="80" height="80" alt="Imagen de Perfil">`;
                document.getElementById('preview_image').innerHTML = imgElement;
            };
            reader.readAsDataURL(file);
        }
    });
</script>


            <!-- Campo de Nombre -->
            <div class="form-group mb-3">
                <label for="name" class="font-weight-bold">Nombre</label>
                <input type="text" class="form-control rounded" id="name" name="name" value="{{ auth()->user()->name }}" required>
            </div>

            <!-- Campo de Correo Electrónico -->
            <div class="form-group mb-3">
                <label for="email" class="font-weight-bold">Correo Electrónico</label>
                <input type="email" class="form-control rounded" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
            </div>

            

            <!-- Campo de Rol -->
            <div class="form-group mb-3">
                <label for="role" class="font-weight-bold">Rol</label>
                <input type="text" class="form-control rounded" id="role" name="role" value="{{ auth()->user()->role }}" readonly>
            </div>

            <!-- Botón de guardar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary rounded px-4 py-2 mt-3 shadow-sm">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
@endsection
