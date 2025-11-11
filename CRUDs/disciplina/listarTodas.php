<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Disciplinas</title>
  <style>
    table { border-collapse: collapse; width: 100%; margin: 20px 0; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    .actions a { margin-right: 10px; }
    .menu { margin: 20px 0; }
  </style>
</head>
<body>
  <h1>Lista de Disciplinas</h1>
  
  <div class="menu">
    <a href="incluir.php">Adicionar Nova Disciplina</a> | 
    <a href="buscar.php">Buscar Disciplina</a>
  </div>

  <table>
    <tr>
      <th>Nome</th>
      <th>Sigla</th>
      <th>Carga Horária</th>
      <th>Ações</th>
    </tr>
  
  <?php 
  $arquivo = fopen("disciplinas.txt", "r") or die("Arquivo não encontrado!");

  fgets($arquivo);
  
  while(!feof($arquivo))
  {
    $linha = fgets($arquivo);
    $linha = trim($linha);
    
    if(!empty($linha))
    {
      $dados = explode(";", $linha);
      
      echo "<tr>";
      echo "<td>$dados[0]</td>";
      echo "<td>$dados[1]</td>";
      echo "<td>$dados[2]</td>";
      echo "<td class='actions'>";
      echo "<a href='alterar.php?sigla=$dados[1]'>Editar</a>";
      echo "<a href='excluir.php?sigla=$dados[1]' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>";
      echo "</td>";
      echo "</tr>";
    }
  }

  fclose($arquivo);
  ?>
  </table>
</body>
</html>