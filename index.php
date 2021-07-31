<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- 1. Sukurkite funkciją, kurią iškvietus, masyvą galima papildyti norimu elementu. Masyvas išsaugomas į COOKIE.
Informacija paimama iš input laukelio. Funkcija iškviečiama paspaudus mygtuką. -->

<p>1 uzduotis</p>
<form action="index.php" method="get">
    <input type="text" name="elementas"/>
    <button type="submit" name="patvirtink">Patvirtink</button>
</form>
        
<?php

function elementoPridejimas() {
    if(isset($_GET["elementas"]) && !empty($_GET["elementas"])) {
        $elementas= $_GET["elementas"];
        if(isset($_COOKIE["elementas"])){
            $masyvas = explode("|", $_COOKIE["elementas"]);
            echo $_COOKIE["elementas"];
        } else { 
            $masyvas = array();
        }
        array_push($masyvas, $elementas);
        setcookie("elementas", implode("|", $masyvas), time() + 3600, "/");
    }
}

if(isset($_GET["patvirtink"])) {
    elementoPridejimas();
}

// su destytojo pagalba
    
?>

<!-- 2. Sukurkite funkciją, kuri mygtuko paspaudimu, sukuria div elementą su klase "elementas-{index}". {index} = elemento numeris -->
<p>2 uzduotis</p>
<form action="index.php" method="get">
    <button type="submit" name="divas">Patvirtink</button>
</form>

<?php

function divoSukurimas() { 
    
        if(!isset($_COOKIE["skaitiklis"])) {
        $skaitiklis = 1;
        echo "<div class='elementas0'>";
        echo "Elementas0";
        echo "</div>"; 
    } else {
        $skaitiklis = intval($_COOKIE["skaitiklis"]);
        $skaitiklis++;

        for($i = 0; $i< $skaitiklis; $i++) {
            echo "<div class='elementas".$i."'>";
            echo "Elementas".$i;
            echo "</div>"; 
        }
    }

    setcookie("skaitiklis", $skaitiklis , time() + 3600, "/");
    
}

if(isset($_GET["divas"])) {
    divoSukurimas();
}

// su destytojo pagalba

?>

<!-- 3. Susikurti asociatyvų masyvą "Klientai".
Kintamieji:
vardas
pavarde
asmens kodas
prisijungimo data
adresas
elpastas.

Masyve turi būti 200 klientų. Duomenis užpildyti savo nuožiūrą.
Visą "Klientai" objektų masyvą atvaizduoti lentelėje <table>.
Visas klientų masyvas saugomas COOKIE.


Papildomai: Sukurti galimybę pridėti klientą į masyvą bei ištrinti. -->

<?php


$klientai = array();
        
for ($i=0; $i<200; $i++) {   
    
    array_push($klientai, ["klientas".($i+1)], "vardas".($i+1), "pavarde".($i+1),"asmenskodas: ". rand(11111111111, 99999999999),"data".($i+1),"adresas".($i+1),"elpastas".($i+1)."@pastas.lt");
    
    }
var_dump($klientai);

// $klientai = array(
//     "vardas" => "",
//     "pavarde" => "",
//     "asmens kodas" => "",
//     "prisijungimo data" => "",
//     "adresas" => "",
//     "elpastas" => "",
// );

// for($j = 0; $j<200; $j++) {
//     $klientai["vardas"] = "vardas".($j+1);
//     $klientai["pavarde"] = "pavarde".($j+1);
//     $klientai["asmens kodas"] = rand(11111111111, 99999999999);
//     $klientai["prisijungimo data"] = "data".($j+1);
//     $klientai["adresas"] = "adresas". ($j+1);
//     $klientai["elpastas"] = "elpastas".($j+1)."@pastas.lt";
//     array_push($klientai, "vardas");
// }





?>
</body>
</html>