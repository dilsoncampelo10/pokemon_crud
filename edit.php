<?php
session_start();
require_once "config/connect.php";
require_once "templates/header.php";

$id = filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);

if($id){
    $sql = $conn->prepare("SELECT * FROM pokemons WHERE id = :id");
    $sql->bindValue(":id",$id);
    $sql->execute();

    $list = $sql->fetch(PDO::FETCH_ASSOC);
}

if($_SESSION["alert"]){
    echo $_SESSION["alert"];
    $_SESSION["alert"] = "";
}
?>

<form action="config/edit_action.php" method="POST">
    <input type="hidden" name="id" value="<?=$id?>">
    <div>
        <label for="idname">Digite o nome do pokémon: </label>
        <input type="text" name="name" id="idname" placeholder="Nome do pokémon" value="<?=$list["name"]?>">
    </div>
    <div>
        <label for="idtype">Digite o tipo do pokémon: </label>
        <input type="text" name="type" id="idtype" placeholder="Tipo do pokémon" value="<?=$list["type"]?>">
    </div>
    <div>
        <label for="idregion">Digite a região do pokémon: </label>
        <input type="text" name="region" id="idregion" placeholder="Região do pokémon" value="<?=$list["region"]?>">
    </div>
    <div>
        <label for="iddescription">Digite uma descrição para o pokémon: </label>
        <textarea name="description" id="iddescription" placeholder="Descrição do pokémon"><?=$list["description"]?></textarea>
    </div>
    <div>
        <input type="submit" value="Editar">
    </div>

</form>

<?php
require_once "templates/footer.php";
?>