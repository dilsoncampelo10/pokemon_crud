<?php
session_start();
require_once "templates/header.php";

if($_SESSION["alert"]){
    echo $_SESSION["alert"];
    $_SESSION["alert"] = "";
}
?>

<form action="config/create_action.php" method="POST">
    <div>
        <label for="idname">Digite o nome do pokémon: </label>
        <input type="text" name="name" id="idname" placeholder="Nome do pokémon">
    </div>
    <div>
        <label for="idtype">Digite o tipo do pokémon: </label>
        <input type="text" name="type" id="idtype" placeholder="Tipo do pokémon">
    </div>
    <div>
        <label for="idregion">Digite a região do pokémon: </label>
        <input type="text" name="region" id="idregion" placeholder="Região do pokémon">
    </div>
    <div>
        <label for="iddescription">Digite uma descrição para o pokémon: </label>
        <textarea name="description" id="iddescription" placeholder="Descrição do pokémon"></textarea>
    </div>
    <div>
        <input type="submit" value="Adicionar">
    </div>

</form>

<?php
require_once "templates/footer.php";
?>