<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
    <title></title>
    <style>
     
        .btn-primary {
            display: inline-block;
            background-color: #fcfcfc;
            color: #FFFFFF;
            text-decoration: none;
            border:  solid #000;
        }
        
        .btn-primary:hover {
            background-color: #c0ff5c;
            color: #fff;
        }
        a {
            text-decoration: none;
            color: #ffffff;
        }
        a:hover {
            color:#0f2701;
        }
        

        
    </style>
</head>
<body>


<?php
   
//include_once('clase.php'); // Incluimos las clases definidas

require_once 'clase.php'; // Incluimos las clases definidas


function imprimirDatos($selectedCountry, $countryData, $provinces, $ciudades, $codigoPostalCiudades, $comida, $provincesObject) {
    echo "País: " . $selectedCountry . "<br>";
    echo "Bandera: " . $countryData['Bandera'] . "<br>";
    //echo "Moneda: " . $countryData['Moneda'] . "<br>";
    echo "Número de países: " . $countryData['Numero_Paises'] . "<br>";

    echo "Provincias: " . implode(", ", $provinces) . "<br>";
    echo "Ciudades: " . implode(", ", $ciudades) . "<br>";
    echo "Códigos postales de las ciudades: " . implode(", ", $codigoPostalCiudades) . "<br>";

    echo "Comidas: " . implode(", ", $comida) . "<br>";

    echo "Nombre de las provincias: " . implode(", ", $provincesObject->name) . "<br>";
    echo "Número de ciudades en las provincias: " . $provincesObject->numCities . "<br>";

    foreach ($provincesObject->cities as $city) {
        echo "Nombre de ciudad: " . $city->name . "<br>";
        echo "Código postal: " . $city->postalCode . "<br>";
    }


    echo "comida1: ".$comida[0]."<br>";
    echo "provincia1".$provinces[0]."<br>";
    echo "ciudades1".$ciudades[0]."<br>";
}

// Cargar el JSON
$jsonData = file_get_contents('datos.json');
$data = json_decode($jsonData, true);
$selectedCountry = $_POST['pais'];
// Seleccionar un país para imprimir
//$selectedCountry = 'USA';

// Obtener los datos del país seleccionado
$countryData = $data['America_Norte_central']['Conacaf'][$selectedCountry];
$provinces = $countryData['Povincias']['Nombre'];
$ciudades = $countryData['Povincias']['Ciudades']['Nombre'];
$codigoPostalCiudades = $countryData['Povincias']['Ciudades']['Codigo_postal'];
$comida = $countryData['Comida'];
$texto = $countryData['Texto'];
$bandera = $countryData['Bandera'];
$pais = $countryData['Pais'];
$moneda = $countryData['Moneda'];
 
$provincesObject = new Provincias(
    $countryData['Povincias']['Nombre'],
    $countryData['Povincias']['Num_Ciudades'],
    array_map(function ($ciudad, $codigoPostal) {
        return new Ciudad($ciudad, $codigoPostal);
    }, $ciudades, $codigoPostalCiudades)
);



$html = ' 

<header>
    <img src="../imagenes/'.$bandera.'" class="bandera"><h2 style="text-align: center;">'.$pais.'</h2>
</header>
<body>   
    <div class="carousel-container">
        <ul id="c" class="carousel">
            <li>
                <img src="../imagenes/'.$comida[0].'" alt="Imagen 2">
                <p>'.$texto[0].'</p>
            </li>
            <li>
                <img src="../imagenes/'.$comida[1].'" alt="Imagen 1">
                <p>'.$texto[1].'</p>
            </li>
            <li>
                <img src="../imagenes/'.$comida[2].'" alt="Imagen 2">
                <p>'.$texto[2].'</p>
            </li>
            <li>
                <img src="../imagenes/'.$comida[3].'" alt="Imagen 2">
                <p>'.$texto[3].'</p>
            </li>
            <li>
                <img src="../imagenes/'.$comida[4].'" alt="Imagen 1">
                <p>'.$texto[4].'</p>
            </li>
            <li>
                <img src="../imagenes/'.$comida[5].'" alt="Imagen 2">
                <p>'.$texto[5].'</p>
            </li>
        </ul>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div>
    <center>
    <table class="table"  border="1" style="color: white";>
        <thead>
            <tr style="background-color: none";>
                <th class="text-center bg-white font-weight-bold">Provincias</th>
                <th class="text-center bg-white font-weight-bold">Ciudades</th>
                <th class="text-center bg-white font-weight-bold">Códigos Postales</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-primary">
                
                <td ></br></br>
                    <ul>';
foreach ($countryData['Povincias']['Nombre'] as $provincia) {
    $html .= '</br><li>' . $provincia . '</li></br></br>';
}
$html .= '
                    </ul>
                </td>
                <td>
                    <ul>';
$counter = 0;
foreach ($countryData['Povincias']['Ciudades']['Nombre'] as $ciudad) {
    $html .= '<li>' . $ciudad . '</li>';
    $counter++;
        if ($counter % 3 == 0) {
        $html .= '</br>';
    }
}
$html .= '
                    </ul>
                </td>
                <td>
                    <ul>';
foreach ($countryData['Povincias']['Ciudades']['Codigo_postal'] as $codigo_postal) {
    $html .= '<li>' . $codigo_postal . '</li>';
    $counter++;
        if ($counter % 3 == 0) {
        $html .= '</br>';
    }
}
$html .= '
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

</div>

<div style="text-align: center;">
    <h2 >'.$moneda[0].'</h2>
    <img src="../imagenes/'.$moneda[1].' " alt="Imagen 2" class="bandera";">
    <br>
    <a href="quiz.html"></a>
</div >
<a href="quiz.html" class="styled-button">Ir al Quiz</a>

  
</body>



';

echo $html;


// Llamar a la función para imprimir los datos
//imprimirDatos($selectedCountry, $countryData, $provinces, $ciudades, $codigoPostalCiudades, $comida, $provincesObject);

?>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/animations.js"></script>

</body>
<footer>
</footer>
</html>