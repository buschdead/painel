<h1><?php echo TITLE; ?></h1>
<br />
<a href="index.php?secao=pages/<?php echo TABLE; ?>&acao=inserir&tipo=<?php echo $tipoPub; ?>" role="button" class="btn btn-info">INSERIR</a> 
<br />
<br />
<?php 
	if(@$_GET["acao"] == "lista"):
		$sql = mysql_query("SELECT * FROM ".TABLE." ORDER BY ID DESC");
	if(mysql_num_rows($sql) == false):
		echo '<div style="text-align:center;" class="alert alert-info">Nenhum registro encontrado</div>';
	else:
?>
    <table class="table table-hover" style="width:100%;">
		<thead>
			<tr>
				<?php 
					foreach($listagem["labels"] as $chave => $valLabels){
				?>
				<th width="<?php echo $ln->$listagem['tamanho'][$chave]; ?>" style="text-align:left;">
					<?php echo $valLabels ?>
				</th>
				<?php 
					}
				?>
				<th width="10%" style="text-align:left;">A&ccedil;&atilde;o</th>
			</tr>
		</thead>
		<tbody>
        <?php 
		while($ln = mysql_fetch_object($sql)):
		
		?>
		<tr>
			<?php 
				foreach($listagem["campos"] as $chave => $valLabels){
			?>
			<td>
				<?php

					switch ($listagem["tipoCampo"][$chave]) {
						case 'relacionamento':
							$explode = explode('|',$listagem["relacionamento"][$chave]);
							$lnRel = mysql_fetch_object(mysql_query("SELECT ID,".$explode[0]." FROM ".$explode[1]." WHERE ID = ".$ln->$listagem["campos"][$chave]));
							echo $lnRel->$explode[0];
							break;

						case 'date':
							echo date('d/m/Y',strtotime($ln->$listagem["campos"][$chave]));
							break;

						case 'imagem':
							echo '<img src="../thumb.php?tipo=nor&img=uploads/'.TABLE.'/'.$ln->$listagem["campos"][$chave].'&amp;w=100&amp;h=80" alt="" width="100" height="80">';
							break;

						default:
							echo $ln->$listagem["campos"][$chave];
							break;
							
					}
				?>
			</td>
			<?php 
				}
			?>
            <td>
				<div class="btn-group">
					<a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">A&ccedil;&atilde;o<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?secao=pages/<?php echo TABLE; ?>&acao=editar&ID=<?php echo $ln->ID; ?>&tipo=<?php echo $tipoPub; ?>">Editar</a></li>
						<li><a href="index.php?secao=pages/<?php echo TABLE; ?>&acao=deletar&ID=<?php echo $ln->ID; ?>" onClick="return confirm('Deseja deletar?');">Deletar</a></li>
					</ul>
				</div>
           </td>
		</tr>
        <?php 
		endwhile; 
		?>
		</tbody>
    </table>
<?php 
	endif;
	endif;
?>


<?php 
	if(@$_GET["acao"] == "inserir"): 
?>
<form name="inserir" method="post" action="index.php?secao=pages/<?php echo TABLE; ?>&acao=inserir&tipo=<?php echo $tipoPub; ?>" enctype="multipart/form-data">
	<?php 
		foreach($insert["labels"] as $chave => $valLabels){
			echo '<div>'.$valLabels.'</div>'."\n";


			include('modulos/confcampos.php');

		}
	?>
  <br />
  <input type="submit" id="enviar" name="enviar" class="btn btn-primary" value="ENVIAR" />
</form>
<?php 

	if(@$_POST){


		$camposVar = '';
		$camposPost = '';

		$count = 1;

		foreach($insert['campos'] as $chave => $NomeCampos){

			if($insert['tipoCampo'][$chave] == 'arquivo'){

				if(@$_FILES[$NomeCampos]["name"] == true){
					$fotoForm = $_FILES[$NomeCampos];
					
					if(pegaExt($fotoForm["name"]) <> "jpg" and pegaExt($fotoForm["name"]) <> "JPG" and pegaExt($fotoForm["name"]) <> "JPEG" and pegaExt($fotoForm["name"]) <> "jpeg" and pegaExt($fotoForm["name"]) <> "png"){
						echo '
						<div class="alert alert-block alert-error fade in">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							Use apenas <strong>JPG</strong> ou <strong>PNG</strong>.
						</div>
						';
						exit;
					}

					$tipoImagem = explode(':',$insert['imagemTam'][$chave]);

					if($tipoImagem[0] == 'crop'){
						$valorImagem = explode('/',$tipoImagem[1]);
						$fotoToSql = enviaFoto($fotoForm, TABLE, "crop", $posicao = 'center', "", $larguraFixa = $valorImagem[0], $alturaFixa = $valorImagem[1]);
					} else {
						$valorImagem = explode('/',$tipoImagem[1]);
						$fotoToSql = enviaFoto($fotoForm, TABLE, "resize", $posicao = '', $valorImagem[0], $larguraFixa = '', $alturaFixa = '');
					}
				}
			}

			if($count == 1){
				$camposVar .= $NomeCampos;

				if($insert['tipoCampo'][$chave] != 'arquivo'){
					$camposPost .= '"'.$_POST[$NomeCampos].'"';
				} else if($insert['tipoCampo'][$chave] == 'editor' or $insert['tipoCampo'][$chave] == 'texto') {
					$camposPost .= '"'.urldecode($fotoToSql).'"';
				} else {
					$camposPost .= '"uploads/'.TABLE.'/'.$fotoToSql.'"';
				}

			} else {
				$camposVar .= ','.$NomeCampos;

				if($insert['tipoCampo'][$chave] != 'arquivo'){
					$camposPost .= ',"'.$_POST[$NomeCampos].'"';
				} else if($insert['tipoCampo'][$chave] == 'editor' or $insert['tipoCampo'][$chave] == 'texto'){
					$camposPost .= ',"'.urldecode($fotoToSql).'"';
				} else {
					$camposPost .= ',"uploads/'.TABLE.'/'.$fotoToSql.'"';
				}

			}

			$count ++;
		}

		$runSql = insert($camposVar, $camposPost, TABLE);

		if($runSql == true){
			echo '
				<div class="alert alert-success fade in">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Registro cadastrado com sucesso. <a href="index.php?secao=pages/'.TABLE.'&acao=inserir&tipo='.$tipoPub.'"><strong>Inserir outro</strong></a> ou <a href="index.php?secao=pages/'.TABLE.'&acao=lista&tipo='.$tipoPub.'"><strong>Listar todos</strong></a>
				</div>
			';
		}
		
	}
	
	endif; //End GET inserir
		
?>



<?php 
	if(@$_GET["acao"] == "editar"):

		$IDGeral = $_GET["ID"];
?>
<form name="inserir" method="post" action="index.php?secao=pages/<?php echo TABLE; ?>&acao=editar&ID=<?php echo $_GET["ID"]; ?>&tipo=<?php echo $tipoPub; ?>" enctype="multipart/form-data">
	<?php 
		foreach($insert["labels"] as $chave => $valLabels){
			echo '<div>'.$valLabels.'</div>'."\n";


			include('modulos/confcampos.php');

		}
	?>
  <br />
  <br />
  <input type="submit" id="enviar" name="enviar" class="btn btn-primary" value="ENVIAR" />
</form>
<?php 

	if(@$_POST){


		$valorUpdate = '';

		$count = 1;

		foreach($insert['campos'] as $chave => $NomeCampos){
			if($insert['tipoCampo'][$chave] == 'arquivo'){

				if(@$_FILES[$NomeCampos]["name"] == true){
					if(pegaExt($_FILES[$NomeCampos]["name"]) <> "jpg" and pegaExt($_FILES[$NomeCampos]["name"]) <> "JPG" and pegaExt($_FILES[$NomeCampos]["name"]) <> "png" and pegaExt($_FILES[$NomeCampos]["name"]) <> "gif"){
						echo '
						<div class="alert alert-block alert-error fade in">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							Use apenas imagens nos formatos <strong>JPG</strong>, <strong>PNG</strong> ou <strong>GIF</strong>.
						</div>
						';
						exit;
					}

					unlink("../uploads/".TABLE."/".$_POST[$NomeCampos]);
					$fotoForm = $_FILES[$NomeCampos];

					$tipoImagem = explode(':',$insert['imagemTam'][$chave]);
					
					if($tipoImagem[0] == 'crop'){
						$valorImagem = explode('/',$tipoImagem[1]);
						$foto = enviaFoto($fotoForm, TABLE, "crop", $posicao = 'center', "", $larguraFixa = $valorImagem[0], $alturaFixa = $valorImagem[1]);
					} else {
						$valorImagem = explode('/',$tipoImagem[1]);
						$foto = enviaFoto($fotoForm, TABLE, "resize", $posicao = '', $valorImagem[0], $larguraFixa = '', $alturaFixa = '');
					}


					if($count == 1){
						$valorUpdate .= $NomeCampos.'="uploads/'.TABLE.'/'.$foto.'"';

					} else {

						$valorUpdate .= ','.$NomeCampos.'="uploads/'.TABLE.'/'.$foto.'"';

					}
				}

			} else {

				if($count == 1){

					if($insert['tipoCampo'][$chave] == 'editor' or $insert['tipoCampo'][$chave] == 'texto'){
						$valorUpdate .= $NomeCampos.'="'.urldecode($_POST[$NomeCampos]).'"';
					} else {
						$valorUpdate .= $NomeCampos.'="'.$_POST[$NomeCampos].'"';
					}

				} else {
					if($insert['tipoCampo'][$chave] == 'editor' or $insert['tipoCampo'][$chave] == 'texto'){
						$valorUpdate .= ','.$NomeCampos.'="'.urldecode($_POST[$NomeCampos]).'"';
					} else {
						$valorUpdate .= ','.$NomeCampos.'="'.$_POST[$NomeCampos].'"';
					}

				}
			}

			$count ++;
		}

		//$update1 = update($camposVar, $camposPost, TABLE, "WHERE ID = '".$IDGeral."'");

		$update1 = mysql_query("update ".TABLE." set ".$valorUpdate." WHERE ID = ".$IDGeral);		
			
			if($update1 == true){
				echo '
					<div class="alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						Registro atualizado com sucesso. <a href="index.php?secao=pages/'.TABLE.'&acao=lista&tipo='.$tipoPub.'"><strong>Listar todos</strong></a>
					</div>
				';
			}
		
	}
	
	endif; 
		
?>

<?php 
	if($_GET["acao"] == "deletar"){
		delete(TABLE, "WHERE ID = '".$_GET["ID"]."'");
		header("Location: index.php?secao=pages/".TABLE."&acao=lista&tipo=$tipoPub");
	}
?>
