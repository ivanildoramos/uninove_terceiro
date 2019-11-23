<?php 
  require 'pages/header.php';

  echo "<div class='container'>";

  if ($usuario->estou_logado()) {
      $resposta = $usuario->getUsuarios();
	  
	  if (isset($_GET['acao']) && isset($_GET['acao']) == 'excluir'){ 
		  if(isset($_GET['id']) && isset($_GET['email']) ) {
			if ($_SESSION['cLogin'] == $_GET['email']){
                echo "<div class='alert alert-danger'>Você não pode excluir a si próprio</div>";
			} else {
			   $usuario->apagar($_GET['id']);
			}
		  }
	  }
  }
  
?>
    
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
				<button type="button" class="btn btn-danger"><a href="index.php?id=<?php echo $usuario['id'];?>&email=<?php echo $usuario['email'];?>&acao=excluir">Excluir</a></button>
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