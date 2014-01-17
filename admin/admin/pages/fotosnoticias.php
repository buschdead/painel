<h1>FOTOS NOTÍCIAS</h1>

<br />
<br />
<a style="margin-top:5px;" href="index.php?secao=pages/fotosnoticias&acao=inserir" role="button" class="btn btn-info">INSERIR FOTOS</a>
<br />
<br />
<?php 
	if(@$_GET["acao"] == "lista"):
		$sql = mysql_query("SELECT * FROM fotosnoticias ORDER BY ID DESC");

		if(mysql_num_rows($sql) == false):
?>

    <br />
    <br />	
	<div style="text-align:center;" class="alert alert-info">Nenhuma foto cadastrada</div>;
<?php
	else:
?>
    <br />
    <br />
    <?php 
	while($ln = mysql_fetch_object($sql)):
		$sqlNome = mysql_fetch_object(mysql_query("SELECT * FROM noticias WHERE ID =".$ln->noticiaID));
	?>
    <div style="float:left; width:100px; height:130px; text-align:center; margin-right:30px; margin-bottom:35px;">
    	<img src="../thumb.php?tipo=nor&amp;img=uploads/fotosnoticias/<?php echo $ln->foto; ?>&amp;w=100&amp;h=80" width="100" height="80"  alt="" />
        <p>
    		<?php echo $sqlNome->nome; ?>
    	</p>
        <a style="margin-top:5px;" href="index.php?secao=pages/fotosnoticias&acao=deletar&fotoID=<?php echo $ln->ID; ?>&file=<?php echo $ln->foto; ?>" class="btn btn-danger" onClick="return confirm('Deseja deletar?');">Deletar</a>
    </div>   
<?php 
	endwhile;
?>    
<div style="clear:both;"></div>
<?php 
	endif;
	endif;
?>

<?php 
	if(@$_GET["acao"] == "inserir"):
		$sql_produtos = mysql_query("SELECT * FROM noticias ORDER BY nome ASC");
?>
<form name="inserir" method="post" action="index.php?secao=pages/fotosnoticias&acao=inserir" enctype="multipart/form-data">

	<div>Serviços</div>
	<select name="noticiaID", "credito" required>
		<?php
			while($lnProdutos = mysql_fetch_object($sql_produtos)){
		?>
		<option value="<?php echo $lnProdutos->ID; ?>"><?php echo $lnProdutos->titulo; ?></option>
		<?php
			}
		?>
	</select>

	<div>Foto 01 (800px Minimo Largura)</div>
    <div>
    	Legenda: <input type="text" name="legenda1">
    	<br />
    	Credito: <input type="text" name="credito1">
    	<br />
    	<input required type="file" name="foto1" id="foto1">
    </div>
    <br />

    <div>Foto 02 (800px Minimo Largura)</div>
    <div>
    	Legenda: <input type="text" name="legenda2">
    	<br />
    	Credito: <input type="text" name="credito2">
    	<br />
    	<input type="file" name="foto2" id="foto2">
    </div>
    <br />

    <div>Foto 03 (800px Minimo Largura)</div>
    <div>
    	Legenda: <input type="text" name="legenda3">
    	<br />
    	Credito: <input type="text" name="credito3">
    	<br />
    	<input type="file" name="foto3" id="foto3">
    </div>
    <br />

   	<div>Foto 04 (800px Minimo Largura)</div>
    <div>
    	Legenda: <input type="text" name="legenda4">
    	<br />
    	Credito: <input type="text" name="credito4">
    	<br />
    	<input type="file" name="foto4" id="foto4">
    </div>
    <br />

    <div>Foto 05 (800px Minimo Largura)</div>
    <div>
    	Legenda: <input type="text" name="legenda5">
    	<br />
    	Credito: <input type="text" name="credito5">
    	<br />
    	<input type="file" name="foto5" id="foto5">
    </div>
    <br />

    <div>Foto 06 (800px Minimo Largura)</div>
    <div>
    	Legenda: <input type="text" name="legenda6">
    	<br />
    	Credito: <input type="text" name="credito6">
    	<br />
    	<input type="file" name="foto6" id="foto6">
    </div>
    <br />

    <div>Foto 07 (800px Minimo Largura)</div>
    <div>
    	Legenda: <input type="text" name="legenda7">
    	<br />
    	Credito: <input type="text" name="credito7">
    	<br />
    	<input type="file" name="foto7" id="foto7">
    </div>
    <br />

    <div>Foto 08 (800px Minimo Largura)</div>
    <div>
    	Legenda: <input type="text" name="legenda8">
    	<br />
    	Credito: <input type="text" name="credito8">
    	<br />
    	<input type="file" name="foto8" id="foto8">
    </div>
    <br />

    <div>Foto 09 (800px Minimo Largura)</div>
    <div>
    	Legenda: <input type="text" name="legenda9">
    	<br />
    	Credito: <input type="text" name="credito9">
    	<br />
    	<input type="file" name="foto9" id="foto9">
    </div>
    <br />

    <div>Foto 10 (800px Minimo Largura)</div>
    <div>
    	Legenda: <input type="text" name="legenda10">
    	<br />
    	Credito: <input type="text" name="credito10">
    	<br />
    	<input type="file" name="foto10" id="foto10">
    </div>
    <br />

    <div><input type="submit" id="enviar" name="enviar" class="btn btn-primary" value="ENVIAR" /></div>
</form>
<?php 
	
	if(@$_POST){
		
		extract($_POST);

		if(@$_FILES["foto1"]["name"] == true){
			$foto1 = enviaFoto($_FILES["foto1"], "fotosnoticias", "resize", $posicao="", "800", $larguraFixa="", $alturaFixa="");
			insert(array("legenda", "foto", "noticiaID", "credito"), array($legenda1, $foto1, $noticiaID, $credito1), "fotosnoticias");
		}
		
		if(@$_FILES["foto2"]["name"] == true){
			$foto2 = enviaFoto($_FILES["foto2"], "fotosnoticias", "resize", $posicao="", "800", $larguraFixa="", $alturaFixa="");
			insert(array("legenda", "foto", "noticiaID", "credito"), array($legenda2, $foto2, $noticiaID, $credito2), "fotosnoticias");
		}
		
		if(@$_FILES["foto3"]["name"] == true){
			$foto3 = enviaFoto($_FILES["foto3"], "fotosnoticias", "resize", $posicao="", "800", $larguraFixa="", $alturaFixa="");
			insert(array("legenda", "foto", "noticiaID", "credito"), array($legenda3, $foto3, $noticiaID, $credito3), "fotosnoticias");
		}
		
		if(@$_FILES["foto4"]["name"] == true){
			$foto4 = enviaFoto($_FILES["foto4"], "fotosnoticias", "resize", $posicao="", "800", $larguraFixa="", $alturaFixa="");
			insert(array("legenda", "foto", "noticiaID", "credito"), array($legenda4, $foto4, $noticiaID, $credito4), "fotosnoticias");
		}

		if(@$_FILES["foto5"]["name"] == true){
			$foto5 = enviaFoto($_FILES["foto5"], "fotosnoticias", "resize", $posicao="", "800", $larguraFixa="", $alturaFixa="");
			insert(array("legenda", "foto", "noticiaID", "credito"), array($legenda5, $foto5, $noticiaID, $credito5), "fotosnoticias");
		}

		if(@$_FILES["foto6"]["name"] == true){
			$foto6 = enviaFoto($_FILES["foto6"], "fotosnoticias", "resize", $posicao="", "800", $larguraFixa="", $alturaFixa="");
			insert(array("legenda", "foto", "noticiaID", "credito"), array($legenda6, $foto6, $noticiaID, $credito6), "fotosnoticias");
		}

		if(@$_FILES["foto7"]["name"] == true){
			$foto7 = enviaFoto($_FILES["foto7"], "fotosnoticias", "resize", $posicao="", "800", $larguraFixa="", $alturaFixa="");
			insert(array("legenda", "foto", "noticiaID", "credito"), array($legenda7, $foto7, $noticiaID, $credito7), "fotosnoticias");
		}

		if(@$_FILES["foto8"]["name"] == true){
			$foto8 = enviaFoto($_FILES["foto8"], "fotosnoticias", "resize", $posicao="", "800", $larguraFixa="", $alturaFixa="");
			insert(array("legenda", "foto", "noticiaID", "credito"), array($legenda8, $foto8, $noticiaID, $credito8), "fotosnoticias");
		}

		if(@$_FILES["foto9"]["name"] == true){
			$foto9 = enviaFoto($_FILES["foto9"], "fotosnoticias", "resize", $posicao="", "800", $larguraFixa="", $alturaFixa="");
			insert(array("legenda", "foto", "noticiaID", "credito"), array($legenda9, $foto9, $noticiaID, $credito9), "fotosnoticias");
		}

		if(@$_FILES["foto10"]["name"] == true){
			$foto10 = enviaFoto($_FILES["foto10"], "fotosnoticias", "resize", $posicao="", "800", $larguraFixa="", $alturaFixa="");
			insert(array("legenda", "foto", "noticiaID", "credito"), array($legenda10, $foto10, $noticiaID, $credito10), "fotosnoticias");
		}
		
			echo '
			<div class="alert alert-success fade in">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			Fotos enviadas com sucesso. <a href="index.php?secao=pages/fotosnoticias&acao=inserir"><strong>Inserir mais</strong></a> ou <a href="index.php?secao=pages/fotosnoticias&acao=lista"><strong>Listar todas</strong></a>
			</div>
			';
		
	}
	
	endif;
?>

<?php 
	if($_GET["acao"] == "deletar"){
		unlink("../uploads/fotosnoticias/".$_GET["file"]."");
		delete("fotosnoticias", "WHERE ID = '".$_GET["fotoID"]."'");
		header("Location: index.php?secao=pages/fotosnoticias&acao=lista&eventoID=".$_GET["eventoID"]."");
	}
?>
