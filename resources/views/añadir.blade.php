<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary bg-opacity-10">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-success text-white py-3">
                        <h3 class="mb-0 text-center">Registrar Nuevo Animal</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('animal.store') }}" method="POST">
                            @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Especie</label>
                                    <select name="especie" class="form-select shadow-sm" required>
                                        <option value="" disabled {{ !$reciente ? 'selected' : '' }}>Selecciona una especie...</option>
                                        
                                        @foreach($especies as $e)
                                            <option value="{{ $e->nombre }}" 
                                                {{ $reciente == $e->nombre ? 'selected' : '' }}>
                                                {{ $e->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Cantidad Inicial</label>
                                <input type="number" name="cantidad" class="form-control" required min="1">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">Tipo de Comida</label>
                                <input type="text" name="comida" class="form-control" placeholder="Heno, Pienso..." required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg">Guardar Animal</button>
                                <a href="{{ route('animal.index') }}" class="btn btn-link text-muted">Cancelar y volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>