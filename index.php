<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// Filtro parcheggio e voto
if (isset($_GET['parking']) && isset($_GET['stars'])) {
    //var_dump('Filtro parcheggio e voto');
    $hotels = array_filter($hotels, function ($hotel) {
        return $hotel['parking'] && $hotel['vote'] >= $_GET['stars'];
    });

    // Filtro parcheggio
} elseif (isset($_GET['parking'])) {
    //var_dump('Filtro parcheggio');
    $hotels = array_filter($hotels, function ($hotel) {
        return $hotel['parking'];
    });

    // Filtro voto
} elseif (isset($_GET['stars'])) {
    //var_dump('Filtro voto');
    $hotels = array_filter($hotels, function ($hotel) {
        return $hotel['vote'] >= $_GET['stars'];
    });
};

?>

<!doctype html>
<html lang="en">

<head>
    <title>Php Hotels</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- My Css -->
    <link rel="stylesheet" href="./assets/style.css">

</head>

<body>

    <header class="text-center">
        <h1 class="mt-3 text-white">PHP Hotels</h1>
    </header>

    <main>
        <div class="container">
            <div class="filter pt-3">
                <form action="index.php" method="get">
                    <label for="parking" class="text-white">
                        Cerchi un Hotel con parcheggio?
                        <input type="checkbox" name="parking" id="parking">
                    </label>
                    <select name="stars" id="stars">
                        <option value="" selected hidden>Filtra in base al voto</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Invio</button>
                    <button type="reset" class="btn btn-secondary btn-sm">Pulisci</button>
                </form>
            </div>
            <div class="card-wrapper gap-4 d-flex border border-2 border-white rounded">
                <?php foreach ($hotels as $hotel) : ?>
                    <div class="card w-25">
                        <div class="card-body">
                            <h5 class="card-title my_title"><?php echo $hotel['name'] ?></h5>
                            <h6 class="card-subtitle py-2 text-muted">Voto: <?php echo $hotel['vote'] ?>/5</h6>
                            <h6 class="py-2">Parcheggio: <?php if ($hotel['parking']) {
                                                                echo 'Si';
                                                            } else {
                                                                echo 'No';
                                                            } ?></h6>
                            <h6 class="py-2"><?php echo $hotel['distance_to_center'] ?>Km dal centro</h6>
                            <p class="card-text"><?php echo $hotel['description'] ?></p>
                            <a href="#" class="card-link">Prenota Ora ></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>