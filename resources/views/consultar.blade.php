<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 class="text-dark">Consulta de Especies</h1>
                <form action="{{ route('animal.buscar') }}" method="GET" class="mt-3">
                    <div class="input-group mb-3">
                        <input type="text" name="filter" class="form-control" placeholder="Buscar especie..." value="{{ $filter }}">
                        <button class="btn btn-primary" type="submit">Buscar ahora</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-end align-self-end">
                <form action="{{ route('animal.volcar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="dump" value="{{ $dump }}">
                    <button type="submit" class="btn btn-warning fw-bold text-uppercase shadow">
                        <i class="bi bi-file-earmark-arrow-down"></i> Volcar en Fichero
                    </button>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach($animales as $a)
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm border-start border-4 border-primary">
                    <div class="card-body">
                        <h5 class="card-title">{!! str_ireplace($filter, "<span class='bg-danger text-white rounded px-1'>$filter</span>", $a->especie) !!}</h5> <!-- !! sustituye a {{ }} para mostrar data raw -->
                        <p class="card-text text-muted">{{ $a->cantidad }} ejemplares detectados.</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-4">
            <a href="{{ route('animal.index') }}" class="btn btn-dark">Volver al Panel</a>
        </div>
    </div>
</body>
</html>