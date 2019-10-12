<?php require 'pages/header.php'; ?>
<?php
if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}

require 'classes/vagas.class.php';
$a = new Vagas();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
	$titulo = addslashes($_POST['titulo']);
	$descricao = addslashes($_POST['descricao']);


	$a->addVaga($titulo, $descricao);

	?>
	<div class="alert alert-success">
		Vaga adicionado com sucesso!
	</div>
	<?php
}
?>
<div class="container">
	<h1>Minhas Vagas</h1>

	<form method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="titulo">Titulo:</label>
			<input type="text" name="titulo" id="titulo" class="form-control" />
		</div>
		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea class="form-control" name="descricao"></textarea>
		</div>
	
		<input type="submit" value="Adicionar" class="btn btn-default" />
	</form>

</div>
<?php require 'pages/footer.php'; ?>