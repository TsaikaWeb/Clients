<?php
$nimed = simplexml_load_file("inimene.xml");
echo $nimed -> nimi[0] -> attributes() ->id;
function searchComputersByName($query){
    global $nimed;
    $result = array();
    foreach ($nimed -> nimi as $nimi1){
        if (substr(strtolower($nimi1 -> emakeelne), 0, strlen($query))== strtolower($query))
            array_push($result, $nimi1);
    }
    return $result;

}
function searchInimesedBySugu($query){
    global $nimed;
    $result = array();
    foreach ($nimed -> nimi as $nimi1){
        if (substr(strtolower($nimi1 -> sugu), 0, strlen($query))== strtolower($query))
            array_push($result, $nimi1);
    }
    return $result;

}
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>XML Reading</title>
    <meta charset="utf-8">
</head>
<body>
<h1 class="text-center">Nimed</h1>
<h3 class="text-center">Table</h3>
<div class="container">
    <div class="row justify-content-md-center">
<table border="1" class="table table-dark table-hover">
    <tr>
        <th width="12%">Sugu</th>
        <th width="12%">Emakeelne</th>
        <th width="12%">Võrkeelne</th>


    </tr>
    </div>
</div>
    <?php
    foreach($nimed -> nimi as $nimi1){
        echo "<tr>";
        echo "<td>".($nimi1 -> sugu)."</td>";
        echo "<td>".($nimi1 -> emakeelne)."</td>";
        echo "<td>".($nimi1 -> vorkkeelne)."</td>";
        echo "<tr>";
        //echo $arvuti -> name;
    }
    ?>
</table>
<div class="container text-center">
    <h2>Esimene Funktsioon</h2>
</div>
<div class="container text-center bg-secondary text-white">

<h3>Esimene nimi emakeelne</h3>
<?php echo $nimed -> nimi[0] -> emakeelne; ?>

</div>
<div class="container text-center ">

    <h2>Teine Funktsioon</h2>

<div class=" text-center bg-secondary text-white">

    <h3>Search</h3>
    <form action="?" method="post">
        Search: <input type="text" name="search" placeholder="Name"/>
        <input type="submit" value="Find" />
    </form>
    <table border="1" class="table table-dark table-hover">
        <tr>
            <th>Sugu</th>
            <th>Emakeelne</th>
            <th>Vorkkeelne</th>


        </tr>
        <?php
        if (!empty($_POST["search"])){
            $result = searchInimesedBySugu($_POST["search"]);
            foreach ($result as $nimi1){
                echo "<tr>";
                echo "<td>".($nimi1 -> sugu)."</td>";
                echo "<td>".($nimi1-> emakeelne)."</td>";
                echo "<td>".($nimi1-> vorkkeelne)."</td>";

                echo "<tr>";
                //echo $arvuti -> name;
            }
        }
        ?>

    </table>

</div>
</div>
<div class="container text-center">
    <h2>Kolmas Funktsioon</h2>
</div>
<div class="container text-center bg-secondary text-white">

    <h3>Esimene nimi emakeelne</h3>
    <?php echo $nimed -> nimi[0] -> emakeelne; ?>

</div>
</body>
</html>
