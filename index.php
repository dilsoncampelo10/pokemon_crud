<?php
require_once "config/connect.php";
require_once "templates/header.php";

$list = [];
$sql = $conn->query("SELECT * FROM pokemons");
if($sql->rowCount()>0){
    $list = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<a href="create.php">Adicionar pokemon</a>


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
               
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else:?>
    <h1>Não há nenhum pokémon registrado</h1>
<?php endif?>
</section>



<?php
require_once "templates/footer.php";
?>
