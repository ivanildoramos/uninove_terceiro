<?php require 'pages/header.php'; ?>
<?php require 'classes/vagas.class.php'?>
<?php
 $vagas = new Vagas();

   $resposta = $vagas->getTotaVagas();

?>


<div class="container">
	<div class="row">

	<table class="table table-striped table-dark">
  <thead>
    <tr>
  
      <th scope="col">Id</th>
      <th scope="col">Titulo</th>
      <th scope="col">Descrição</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach($resposta as $vaga): ?>
	
    <tr>
      <td><?php echo $vaga['id']; ?></td>
      <td><?php echo $vaga['titulo']; ?></td>
      <td><?php echo $vaga['descricao']; ?></td>
      <td>
        <button type="button" class="btn btn-info">Editar</button>
        <button type="button" class="btn btn-danger">Excluir</button>
      </td>
    </tr>
 <?php endforeach; ?>
     </tbody>
</table>
</div>
</div>






<?php require 'pages/footer.php';?>