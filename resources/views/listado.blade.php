<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Granja de Noé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-5 text-primary"><i class="bi bi-house-door"></i> La Granja de Noé</h1>
            <div>
                <a href="{{ route('animal.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo Animal</a>
                <a href="{{ route('animal.buscar') }}" class="btn btn-danger"><i class="bi bi-search"></i> Consultas</a>
            </div>
        </div>

        @if($popular)
        <div class="card border-primary mb-4 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div>
                    <h5 class="card-title mb-0">Especie más numerosa</h5>
                    <p class="card-text h4 text-uppercase fw-bold">{{ $popular->especie }} ({{ $popular->cantidad }} unidades)</p>
                </div>
            </div>
        </div>
        @endif

        <div class="card shadow">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Especie</th>
                            <th>Cantidad</th>
                            <th>Comida</th>
                            <th class="text-center">Acción Rápida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($animales as $a)
                        <tr class="align-middle">
                            <td class="ps-4 text-muted">#{{ $a->id }}</td>
                            <td class="fw-bold">{{ $a->especie }}</td>
                            <td><span class="badge text-dark fs-6">{{ $a->cantidad }}</span></td>
                            <td>{{ $a->comida }}</td>
                            <td style="width: 250px;">
                                <form action="{{ route('animal.sumar') }}" method="POST" class="d-flex gap-2 justify-content-center">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $a->id }}">
                                    <input type="number" name="add" class="form-control form-control-sm w-50" placeholder="Cantidad" required>
                                    <button type="submit" class="btn btn-dark btn-sm px-3">Añadir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>