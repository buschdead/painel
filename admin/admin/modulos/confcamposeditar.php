<?php
	switch ($update["tipoCampo"][$chave]) {
		case 'titulo':
			echo "<input type='text' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."' 
				maxlength='".$update['maxlength'][$chave]."' 
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.uniqSelect("'".TABLE."'", "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'").'" ';}
			echo " />";
			break;
		
		case 'editor':
			echo "<textarea 
				class='ckeditor' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."'				
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			echo " >";
			if(@$_GET["acao"] == 'editar'){ echo uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'");}
			echo "</textarea>";
			break;

		case 'texto':
			echo "<textarea 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."' 
				maxlength='".$update['maxlength'][$chave]."' 
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			echo " >";
			if(@$_GET["acao"] == 'editar'){ echo uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'");}
			echo "</textarea>";
			break;

		case 'date':
			echo "<input type='date' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."'
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'").'" ';}
			echo " />";
			break;

		case 'dateMasc':
			echo "<input type='text' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."'
				maxlength='10' 
				onkeypress='mascara(this, datax);'
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.date('d/m/Y',strtotime(uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'"))).'" ';}
			echo " />";
			break;

		case 'url':
			echo "<input type='url' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."'
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'").'" ';}
			echo " />";
			break;

		case 'email':
			echo "<input type='email' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."'
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'").'" ';}
			echo " />";
			break;

		case 'telefone':
			echo "<input type='text' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."' 
				maxlength='14' 
				onkeypress='mascara(this, Telefone);'
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'").'" ';}
			echo " />";
			break;

		case 'telefoneSP':
			echo "<input type='text' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."' 
				maxlength='15' 
				onkeypress='mascara(this, Telefone);'
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'").'" ';}
			echo " />";
			break;

		case 'cep':
			echo "<input type='text' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."' 
				maxlength='9' 
				onkeypress='mascara(this, Cep);'
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'").'" ';}
			echo " />";
			break;

		case 'cpf':
			echo "<input type='text' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."' 
				maxlength='15'
				onkeypress='mascara(this, CPF);'
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'").'" ';}
			echo " />";
			break;

		case 'cnpj':
			echo "<input type='text' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."' 
				maxlength='20'
				onkeypress='mascara(this, cnpj);'
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'").'" ';}
			echo " />";
			break;

		case 'arquivo':
			echo "<input type='file' 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."' 
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			echo " />";

			if(@$_GET["acao"] == 'editar'){ 
				echo "
					<input type='hidden'
					name='".$update['campos'][$chave]."_atual' 
					id='".$update['campos'][$chave]."_atual' 
					value='".uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'")."'
				";
			}

			break;

		case 'selecao':
			echo "<select 
				name='".$update['campos'][$chave]."' 
				id='".$update['campos'][$chave]."'
			";
			if($update['required'][$chave] == false OR $update['required'][$chave] == 'sim'){ echo ' required';}
			echo " >";

			$option = explode(':',$update['relacionamento'][$chave]);

			$selected = uniqSelect(TABLE, "'".$update['campos'][$chave]."'", "WHERE ID = '".$_GET["ID"]."'");

			if($option[0] == 'table'){

				$names = explode('|',$option[1]);
				$sqlSelecao = mysql_query("SELECT ".$names[0]." FROM ".$names[1]." ORDER BY ".$names[0]);
				echo $sqlSelecao;
				while($lnOption = mysql_fetch_object($sqlSelecao)){
					echo "<option ".if($selected == $lnOption->ID){ echo ' selected ';}." value='".$lnOption->ID."'>".$lnOption->$names[0]."</option>";
				}

			} else if($option[0] == 'option'){

				$var1 = explode(',',$option[1]);

				foreach($var1 as $chave => $valorOption){
					$valorVar = explode('/',$valorOption);
					echo "<option ".if($selected == $valorVar[0]){ echo ' selected ';}." value='".$valorVar[0]."'>".$valorVar[1]."</option>";
				}
			}					

			echo "</select>";
			break;

	}
	
	
?>