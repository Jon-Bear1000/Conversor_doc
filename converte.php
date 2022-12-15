<?php
require_once('include/autoload.inc.php');


if (!empty($_FILES['inputFile']['name'])) {
   $nomeArquivo = $_FILES['inputFile']['name'];
} else {
   echo '<div class="alert alert-danger">Anexe um arquivo para carregar!</div>';
}

$caminho = 'extrato/' . $nomeArquivo;
move_uploaded_file($_FILES['inputFile']['tmp_name'], $caminho);
$linhas = file($caminho);

//  var_dump($linhas [42]);

echo '<body>';  
echo ' <div class="container">';
echo '<div class="row">'; 

$data = '01';

foreach ($linhas as $key => $item) {
    if($key < 41) {
        continue;   
    }

    if (empty(trim($item))) {  
        break;
    }

    $dia =substr($item, 0 , 2);
    if (!empty(trim($dia))) {
        $data = $dia;
    }

    $historico = substr($item, 4, 50);
    $documento = trim(substr($item, 54, 6));
    $valor = trim(substr($item, 61, 19));

    if (trim($historico) == 'SALDO NA DATA') {
        continue;
    }

    if(empty($documento)) {
        continue;
    }

    $valor = str_replace('.', '', $valor);
    $valor = str_replace(',', '.', $valor);
    $objExtrato = new Banco_extrato();
    $objExtrato->setData('2022-10-' . $data);
    $objExtrato->setHistorico($historico);
    $objExtrato->setDocumento($documento);
    $objExtrato->setValor($valor);
    if (!$objExtrato->existe()) {
        $objExtrato->insert();
    }        
}

$objExtrato = new Banco_extrato();
$resultado = $objExtrato->load();
?>

<table class="table mt-4">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data</th>
      <th scope="col">Histórico</th>
      <th scope="col">Documento</th>
      <th scope="col">Valor</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($resultado as $item) {
        $data = new DateTime($item['data']);
    ?>
    <tr>
      <th scope="row"><?=$item['id']?></th>
      <td><?=$data->format('d/m/Y')?></td>
      <td><?=$item['historico']?></td>
      <td><?=$item['documento']?></td>
      <td><?=number_format($item['valor'], 2, ',', '.')?></td>
      <td><a href="#">Excluir</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
