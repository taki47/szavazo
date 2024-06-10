<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anoním szavazás</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route("sendVote") }}">
            @csrf
            <!-- Jelölt 1 -->
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jelölt 1</h5>
                    <p class="card-text">Jelölt 1 bemutatkozása...</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="candidate1" value="Jelölt 1">
                        <label class="form-check-label" for="candidate1">
                            Szavazok Jelölt 1-re
                        </label>
                    </div>
                </div>
            </div>

            <!-- Jelölt 2 -->
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jelölt 2</h5>
                    <p class="card-text">Jelölt 2 bemutatkozása...</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="candidate2" value="Jelölt 2">
                        <label class="form-check-label" for="candidate2">
                            Szavazok Jelölt 2-re
                        </label>
                    </div>
                </div>
            </div>

            <!-- Jelölt 3 -->
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jelölt 3</h5>
                    <p class="card-text">Jelölt 3 bemutatkozása...</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="candidate3" value="Jelölt 3">
                        <label class="form-check-label" for="candidate3">
                            Szavazok Jelölt 3-re
                        </label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Szavazás</button>
        </form>
    </div>
    

</body>
</html>