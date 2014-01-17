<?php
	
	if(@$_GET["acao"] == 'editar'){
		$lnValue = mysql_fetch_object(mysql_query("SELECT ".$insert['campos'][$chave]." FROM ".TABLE." WHERE ID = ".$IDGeral));

		$value = $lnValue->$insert['campos'][$chave];
	}
	
	switch ($insert["tipoCampo"][$chave]) {
		case 'titulo':
			echo "<input type='text' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
				maxlength='".$insert['maxlength'][$chave]."' 
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.$value.'" ';}
			echo " />";
			break;
		
		case 'editor':
			echo "<textarea 
				class='ckeditor' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."'				
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			echo " >";
			if(@$_GET["acao"] == 'editar'){ echo $value;}
			echo "</textarea>";
			break;

		case 'texto':
			echo "<textarea 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
				maxlength='".$insert['maxlength'][$chave]."' 
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			echo " >";
			if(@$_GET["acao"] == 'editar'){ echo $value;}
			echo "</textarea>";
			break;

		case 'date':
			echo "<input type='date' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.date('Y-m-d',strtotime($value)).'" ';}
			echo " />";
			break;

		case 'dataCadastro':
			$valueDate = date("Y-m-d H:i:s");
			echo "<input type='hidden' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
				value='".$valueDate."'";
			echo " />";
			break;

		case 'dateMasc':
			echo "<input type='text' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."'
				maxlength='10' 
				onkeypress='mascara(this, datax);'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.date('d/m/Y',strtotime($value)).'" ';}
			echo " />";
			break;

		case 'url':
			echo "<input type='url' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.$value.'" ';}
			echo " />";
			break;

		case 'email':
			echo "<input type='email' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.$value.'" ';}
			echo " />";
			break;

		case 'telefone':
			echo "<input type='text' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
				maxlength='14' 
				onkeypress='mascara(this, Telefone);'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.$value.'" ';}
			echo " />";
			break;

		case 'telefoneSP':
			echo "<input type='text' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
				maxlength='15' 
				onkeypress='mascara(this, Telefone);'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.$value.'" ';}
			echo " />";
			break;

		case 'valor':
			echo "<input type='text' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
				maxlength='14' 
				onkeypress='mascara(this, dinheiro);'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.$value.'" ';}
			echo " />";
			break;

		case 'cep':
			echo "<input type='text' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
				maxlength='9' 
				onkeypress='mascara(this, Cep);'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.$value.'" ';}
			echo " />";
			break;

		case 'cpf':
			echo "<input type='text' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
				maxlength='15'
				onkeypress='mascara(this, CPF);'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.$value.'" ';}
			echo " />";
			break;

		case 'cnpj':
			echo "<input type='text' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
				maxlength='20'
				onkeypress='mascara(this, cnpj);'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.$value.'" ';}
			echo " />";
			break;

		case 'arquivo':
			echo "<input type='file' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			echo " />";

			if(@$_GET["acao"] == 'editar' && $insert['tipoCampo'][$chave] == 'arquivo'){ 
				echo "
					<input type='hidden'
					name='".$insert['campos'][$chave]."_atual' 
					id='".$insert['campos'][$chave]."_atual' 
					value='".$value."' 
					/>
				";
			}

			break;

		case 'senha':
			echo "<input type='password' 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."' 
				required 
			";
			if(@$_GET["acao"] == 'editar'){ echo ' value ="'.$value.'" ';}
			echo " />";
			break;

		case 'selecao':

			echo "<select 
				name='".$insert['campos'][$chave]."' 
				id='".$insert['campos'][$chave]."'
			";
			if($insert['required'][$chave] == false OR $insert['required'][$chave] == 'sim'){ echo ' required';}
			echo " >";

			$option = explode(':',$insert['relacionamento'][$chave]);

			

			if($option[0] == 'table'){

				$names = explode('|',$option[1]);
				$sqlSelecao = mysql_query("SELECT ID,".$names[0]." FROM ".$names[1]." ORDER BY ".$names[0]);

				while($lnOption = mysql_fetch_object($sqlSelecao)){
					echo "<option ".($value == $lnOption->ID ? ' selected ': '')." value='".$lnOption->ID."'>".$lnOption->$names[0]."</option>";
				}

			} else if($option[0] == 'option'){

				$var1 = explode(',',$option[1]);

				foreach($var1 as $chave => $valorOption){
					$valorVar = explode('/',$valorOption);
					echo "<option ".($value == $valorVar[0] ? ' selected ': '')." value='".$valorVar[0]."'>".$valorVar[1]."</option>";
				}
			}					

			echo "</select>";
			break;

	}
	
	
?>