<?php

    require_once ('functions.php');

    //test of er op de knop is gedrukt
    if(isset($_POST['btn_ins'])){

            InsertBier($_POST);
            echo '<script>alert("Biernaam: ' . $_POST['naam'] . ' is toegevoegd")</script>';


    }

?>
<html>
<body>
        <h1>Insert Beer Info</h1>
    <h2>This is the place where you can make your own beerstuff</h2>
    
    <form method="post">

<br>

        <label for="naam">Naam:</label>
        <br>
        <input type="text" id="naam" name="naam" required>
<br>


        <label for="soort">Soort:</label>
        <br>
        <input type="text" id="soort" name="soort" required>

<br>

        <label for="stijl">Stijl:</label>
        <br>
        <input type="text" id="stijl" name="stijl" required>

<br>

        <label for="alcohol">Alcohol:</label>
        <br>
        <input type="number" id="alcohol" name="alcohol" step="0.1" required>


<br>
    
        <label for="brouwcode">Brouwcode:</label>
        <br>
        <input type="text" id="brouwcode" name="brouwcode" required>

<br>

        <button type="submit" name="btn_ins"">Create NOW!!!</button>
    </form>
    <form action="oefening1.php"><button type="submit">HOME</button></form>
</body>
</html>

<style>
    body {
        text-align: center;
        color: darkcyan;
        font-size: 20px;
        

    }
    input {
        margin-bottom: 15px;
        border-color: darkcyan;
        padding: 3px;
        text-align: center;
        font-size: 15px;
        width: 500px;
        border-radius: 30px;
        margin-top: 5px;
        color: darkcyan;
    }
    label {
        background-color: black;
        border-style: solid;
        border-width: 2px;
        border-color: darkcyan;
        color: white;
        border-radius: 30px;
        padding: 3px;
    }
    button{
        background-color: darkcyan;
        color: white;
        border-style: solid;
        border-width: 2px;
        border-color: black;
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 30px;
        width: 150px;
        height: 30px;
        cursor: pointer;
        font-size: 20px;
    }
</style>