<?php require 'pages/header.php'; ?>
<div class="container">
	
	<?php
	require 'classes/usuarios.class.php';
	$u = new Usuarios();

	if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		$cep = addslashes($_POST['cep']);
		$rua = addslashes($_POST['rua']);
		$bairro = addslashes($_POST['bairro']);
		$cidade = addslashes($_POST['cidade']);
		$telefone = addslashes($_POST['telefone']);

		if(!empty($nome) && !empty($email) && !empty($senha)) {
			if($u->cadastrar($nome, $email, $senha,$cep,$rua,$bairro,$cidade , $telefone)) {
				?>
				<div class="alert alert-success">
					<strong>Parabéns!</strong> Cadastrado com sucesso. <a href="login.php" class="alert-link">Faça o login agora</a>
				</div>
				<?php
			} else {
				?>
				<div class="alert alert-warning">
					Este usuário já existe! <a href="login.php" class="alert-link">Faça o login agora</a>
				</div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-warning">
				Preencha todos os campos!
			</div>
			<?php
		}

	}
	?>
	<div class="row">
		<h1>Cadastre-se</h1>
	<form method="POST">
		<div class="form-group">
			<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" />
		</div>
		<div class="form-group">
			<input type="email" name="email" id="email" class="form-control" placeholder="Email" />
		</div>
		<div class="form-group">
			<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" />
		</div>
		<div class="form-group">
			<input type="text" name="cep" id="cep" class="form-control" placeholder="Cep" />
		</div>
		<div class="form-group">
			<input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" />
		</div>
		<div class="form-group">
			<input type="text" name="rua" id="rua" class="form-control" placeholder="Rua" />
		</div>
		<div class="form-group">
			<input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" />
		</div>
		<div class="form-group">
			<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" />
		</div>
		<input type="submit" value="Cadastrar" class="btn btn-primary"><span class=" fa fa-check"></span></input>
	</form>
	</div>

</div>

<script >
jQuery(function($){
   $("#cep").change(function(){
      var cep_code = $(this).val();
      if( cep_code.length <= 0 ) return;
      $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
         function(result){
            if( result.status!=1 ){
               alert(result.message || "Houve um erro desconhecido");
               return;
            }
            $("#cep").val( result.code );
            $("#cidade").val( result.city );
            $("#bairro").val( result.district );
            $("#rua").val( result.address );
       
         });
   });
});

</script>
<?php require 'pages/footer.php'; ?>