<?php 
require_once './vendor/autoload.php';
use ExemploPDOMySQL\MySQLConnection; //PDO;

$bd = new MySQLConnection(); //PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd -> prepare('SELECT * FROM generos');
$comando -> execute();
$generos = $comando -> fetchAll (PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>

</head>
<body>
   <a href="insert.php">Novo Genêro</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>&nbsp;</th>
           
        </tr>
<?php foreach($generos as $g): ?>   
    <tr> 
        <td><?= $g['id'] ?></td>
        <td><?= $g['nome'] ?></td>
        <td>
            <a href="update.php?id=<?= $g['id'] ?>">Editar</a>
            <a href="delete.php?id=<?= $g['id'] ?>">Excluir</a>
        </td>
    </tr>
<?php endforeach ?>
</table> 
</main>
</body>
</html>