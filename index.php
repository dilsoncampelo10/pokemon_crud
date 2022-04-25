<?php
require_once "config/connect.php";
require_once "templates/header.php";
session_start();

$list = [];
$sql = $conn->query("SELECT * FROM pokemons");
if($sql->rowCount()>0){
    $list = $sql->fetchAll(PDO::FETCH_ASSOC);
}

if($_SESSION["sucess"]){
    echo $_SESSION["sucess"];
    $_SESSION["sucess"] = "";
}
?>




<section>
<?php if(count($list)>0): ?>
    <table border="1px" width=100%>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Região</th>
                <th>Descrição</th>
                <th>Atualizações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $poke): ?>
            <tr>
                <td></td>
                <td><?=$poke["name"]?></td>
                <td><?=$poke["type"]?></td>
                <td><?=$poke["region"]?></td>
                <td><?=$poke["description"]?></td>
                <td>
                    <a href="edit.php?id=<?=$poke["id"]?>">Editar</a>
                    <a href="config/delete.php?id=<?=$poke["id"]?>" onclick="return confirm('Tem certeza que deseja excluir esse pokémon?')">Deletar</a>
                </td>
               
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else:?>
    <div class="void">
        <h1>Não há nenhum pokémon registrado</h1>
    </div>
<?php endif?>
</section>



<?php
require_once "templates/footer.php";
?>
