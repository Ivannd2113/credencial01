<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("content-Type: text/html; charset=UTF-8");

$textBuscador = isset($_POST['textBuscador']) ? $_POST['textBuscador'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>ejecred</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        .credenF{
            width: 488px;
            height: 311px;
            background-image: url('img/frentergb.jpg');
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            margin: 0px auto;
        }
        .credenv{
            width: 488px;
            height: 311px;
            background-image: url('img/vueltargb.jpg');
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            margin: 0px auto;
        }
        .caja{
            font-family: Arial, Helvetica, sans-serif;
            position: absolute; 
            width: 293px;           
            margin-top: 130px;            
                         
            text-align: right;
            font-weight: bold;
            font-size: 1.2em;
            color: #7C7A7E;
        }
    
        .caja2{
            font-family: Arial, Helvetica, sans-serif;
            position: absolute; 
            width: 293px;           
            margin-top: 215px;            
                        
            text-align: right;
            font-weight: bold;
            font-size: .8em;
            color: #7C7A7E;
        }
        .caja3{
            font-family: Arial, Helvetica, sans-serif;
            position: absolute; 
            width: 293px;           
            margin-top: 275px;            
                        
            text-align: right;
            font-weight: bold;
            font-size: .8em;
            color: #7C7A7E;
        }
        .caja4{
            position:absolute;
            margin-top:130px ;
            margin-left:325px;
        }
        .vigenciav{
            position: absolute;
            font-weight: bold;
            font-size: .8em;
            color: #7C7A7E;
            
            margin-top: 90px;
            margin-left: 380px;
        }
        .matriculav{
            position: absolute;
            font-weight: bold;
            text-align: center;
            font-size: .9em;
            color: #7C7A7E;
             
            margin-top: 250px;
            width: 488px;
        }
        .codigoBarras{
            position: absolute;
            margin-top: 175px;
            text-align: center;            
            width: 480px;            
            /*background-color: rgba(255, 255, 100, .5); */          
           
        }
        
        .barras{
            height: 40px;
        }

       


    </style> 
</head>
<body>
</body>
<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("content-Type: text/html; charset=UTF-8");
$con = new SQLite3("base1.db") or die("Problemas para conectar");
$cs = $con -> query("SELECT * FROM vDatacrednciales WHERE comodin LIKE '%$textBuscador%'");
while ($resul = $cs -> fetchArray()) {

    
    
    $maticula = $resul['maticula'];
    $apelledo = $resul['apelledo'];    
    $nombre = $resul['nombre'];
    $carrera =$resul['carrera'];
    $vigencia =$resul['vigencia'];
    $grupo =$resul['grupo'];
    $cuat =$resul['cuat'];
    
    echo '
        <div class="credenF">
         <div class="caja">
         <p>'.$nombre.' </p>
         <p> '.$apelledo.' </p>
         </div> 
         <div class="caja2">
          <p>'.$maticula.'</p>
          </div>
          <div class="caja3">
          <p>'.$carrera.' </p>
          </div>
          <div class="caja4">
              <img src="https://utfv.net/credencialesUtfv/imgAlumnos/'.$maticula.'.jpg" width="125" >
          </div>
          <div class="matricula">

          </div>
        </div>

          <div class="credenv">
            <div class="vigenciav">
                <p>2019-1/2021-1</p>
            </div>
            <div class="codigoBarras">
            <img src="barcode.php?text=testing" class="barras" />
            </div>
            <div class="matriculav">
            <p>'.$maticula.'</p>
            </div>
          </div>  


        

    ';
}

$con -> close();
      
      
      ?>


</body>
</html>