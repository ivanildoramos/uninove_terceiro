<?php 
  require 'pages/header.php';

  if(isset($_GET['id']) && !empty($_GET['id'])) {
     $usuario->apagar($_GET['id']);
  }
  
  $resposta = $usuario->getUsuarios();

?>


<div class="container">

    
    <?php if($usuario->estou_logado()): ?>
			<div class="row">

			<table class="table table-striped table-dark">
		  <thead>
			<tr>
		  
			  <th scope="col">Nome</th>
			  <th scope="col">Rua </th>
			  <th scope="col">Bairro</th>
			  <th scope="col">Telefone</th>
			  <th scope="col">Email</th>
			</tr>
		  </thead>
		  <tbody>
			<?php foreach($resposta as $usuario): ?>
			
			<tr>
			  <td><?php echo $usuario['nome']; ?></td>
			  <td><?php echo $usuario['rua']; ?></td>
			  <td><?php echo $usuario['bairro']; ?></td>
			  <td><?php echo $usuario['telefone']; ?></td>
			  <td><?php echo $usuario['email']; ?></td>
			  <td>
				<button type="button" class="btn btn-info"><a href="editar.php?id=<?php echo $usuario['id'];?>">Editar</a></button>
				<button type="button" class="btn btn-danger"><a href="index.php?id=<?php echo $usuario['id'];?>">Excluir</a></button>
			  </td>
			</tr>
		 <?php endforeach; ?>
			 </tbody>
		</table>
		</div>
    <?php else: ?>
		<div class="alert alert-info">
			Para visualizar oconteúdo <a href="login.php" class="alert-link">Faça o login agora</a>
		</div>
	<?php endif; ?>
</div>






<?php require 'pages/footer.php';?>