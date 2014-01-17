<h1>COMENT&Aacute;RIOS AGUARDANDO LIBERA&Ccedil;&Atilde;O</h1>
<?php 
	$sql = mysql_query("SELECT * FROM comentariosnoticias WHERE status = 'AGUARDANDO' ORDER BY ID DESC");	
	if(mysql_num_rows($sql) == false):
		echo '<br /><div style="text-align:center;" class="alert alert-info">Nada a ser liberado por aqui</div>';
	else:
?>
	<br>
	<br>

    <table class="table table-hover" style="width:100%;">
		<thead>
			<tr>
				<th width="30%" style="text-align:left;">Noticia</th>
				<th width="20%" style="text-align:left;">Usuário</th>
				<th width="25%" style="text-align:left;">Comentário</th>
				<th width="15%" style="text-align:left;">Data</th>
				<th width="20%" style="text-align:left;">A&ccedil;&atilde;o</th>
			</tr>
		</thead>
		<tbody>
        <?php 
		while($ln = mysql_fetch_object($sql)):
			$lnSubsecoes = mysql_fetch_object(mysql_query("SELECT * FROM noticias WHERE ID = ".$ln->noticiaID));
		?>
		<tr>
			<td><?php echo $lnSubsecoes->titulo; ?></td>
			<td><?php echo $ln->usuarioID; ?></td>
			<td>
				<a href="#verMsg<?php echo $ln->ID; ?>" role="button" class="btn" data-toggle="modal" role="button">ver mensagem</a>
				<div id="verMsg<?php echo $ln->ID; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				    <h3 id="myModalLabel"><?php echo $ln->nome; ?></h3>
				  </div>
				  <div class="modal-body">
				    <p><?php echo $ln->msg; ?></p>
				  </div>
				  <div class="modal-footer">
				    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Fechar</button>
				  </div>
				</div>
			</td>
			<td><?php echo date('d/m/Y', strtotime($ln->data)); ?></td>
            <td>
              <div class="btn-group">
				  <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
				    A&ccedil;&atilde;o
				    <span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu">
				    <li><a href="index.php?secao=pages/home&acao=liberar&tbl=comentariosnoticias&ID=<?php echo $ln->ID; ?>">Liberar</a></li>
				    <li><a href="index.php?secao=pages/home&acao=deletar&tbl=comentariosnoticias&ID=<?php echo $ln->ID; ?>&foto=<?php echo $ln->foto; ?>" onClick="return confirm('Deseja deletar?');">Deletar</a></li>
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
?>
<div><a href="index.php?secao=pages/comentarios&amp;tbl=comentarios&amp;acao=lista">Veja todos</a></div>
<br />
<br />

<?php 

	if(@$_GET["acao"] == "liberar"){
		update("status", "LIBERADO",$_GET["tbl"], "WHERE ID = '".$_GET["ID"]."'");
		header("Location: index.php?secao=pages/home");
	}

	if(@$_GET["acao"] == "deletar"){
		unlink("../uploads/comentarios/".$_GET["foto"]."");
		delete($_GET["tbl"], "WHERE ID = '".$_GET["ID"]."'");
		header("Location: index.php?secao=pages/home");
	}

?>
