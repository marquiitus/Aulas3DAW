<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Alunos</title>
  <style>
    table { border-collapse: collapse; width: 100%; margin: 20px 0; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    .actions a { margin-right: 10px; }
  </style>
</head>
<body>
  <h1>Gerenciamento de Alunos</h1>
  <a href="incluir.php">Adicionar Novo Aluno</a>
  <table>
    <tr>
      <th>Matrícula</th>
      <th>Nome</th>
      <th>E-mail</th>
      <th>Ações</th>
    </tr>
    
  <?php 
    $arquivo = fopen("alunos.txt", "r") or die("Arquivo não encontrado!");
    fgets($arquivo);
    
    while(!feof($arquivo)) {

      $linha = fgets($arquivo);
      $linha = trim($linha);  
      if(!empty($linha)) {

        $dados = explode(";", $linha);
          
        echo "<tr>";
        echo "<td>{$dados[0]}</td>";
        echo "<td>{$dados[1]}</td>";
        echo "<td>{$dados[2]}</td>";
        echo "<td class='actions'>";
        echo "<a href='alterar.php ? matricula={$dados[0]}'>Editar</a>";
        echo "<a href='excluir.php ? matricula={$dados[0]}' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
      }
    }

    fclose($arquivo);
  ?>
  </table>
</body>
</html>