<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista PHP</title>
</head>
<body>
  <h1>Lista de Alunos</h1>
  <table>
    <tr>
      <th>Matrícula</th>
      <th>Nome</th>
      <th>E-mail</th>
    </tr>
  
  
  <?php 
    $arquivo = fopen("alunos.txt", "r") or die ("Arquivo não encontrado!");

    if($arquivo) {

      $linha = fgets($arquivo);
      while(!feof($arquivo)) {

        $linha = fgets($arquivo);
        $dados = explode(";", $linha);

        echo "<tr>";
        echo "<td>$dados[0]</td>";
        echo "<td>$dados[1]</td>";
        echo "<td>$dados[2]</td>";
        echo "</tr>";
      }
    }

    fclose($arquivo);
  ?>

  </table>
</body>
</html>