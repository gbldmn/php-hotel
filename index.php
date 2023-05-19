<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous' />
</head>
<body>

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

// $scegliParcheggio = $_GET['parking'];
// $scegliVoto = $_GET['vote'];

// if($scegliParcheggio == si){
//     echo $hotel['parking'];
// };

$hotelFiltrati = $hotels;

if (isset($_GET['parking'])) {
    $hotelFiltrati = array_filter($hotelFiltrati, function ($hotel) {
        return $hotel['parking'] == true;
    });
}



?>

<div class="container">
    <div class="row">
        <form method="GET" action="index.php">
        <label for="parking">Parcheggio disponibile:</label>
        <input type="checkbox" id="parking" name="parking">
        <br>
        <label for="vote">Voto minimo:</label>
        <input type="number" id="vote" name="vote" min="1" max="5">
        <br>
        <input type="submit" value="Filtra">
        </form>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Parcheggio</th>
                <th>Voto</th>
                <th>Distanza dal centro</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($hotelFiltrati as $hotel) { ?>
                    <tr>
                    <th><?php echo $hotel['name']; ?></th>
                    <td><?php echo $hotel['description']; ?></td>
                    <td><?php echo $hotel['parking'] ? 'Si' : 'No'; ?></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
  </div>


</body>
</html>