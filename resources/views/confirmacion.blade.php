<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5 text-center">
        <div class="card shadow p-5">
            
            <h1 class="text-success mb-4">Fichero Generado</h1>
            
            <p class="lead">El archivo <strong>{{ $fichero }}</strong> se ha creado correctamente.</p>
            
            <div class="mt-4">
                <a href="{{ route('animal.ver', $fichero) }}" class="btn btn-primary">Abrir en el Navegador</a>

                <a href="{{ route('animal.index') }}" class="btn btn-outline-secondary">Volver al Inicio</a>
            </div>
        </div>
    </div>
</body>
</html>