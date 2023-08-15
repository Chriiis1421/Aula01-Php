<?php

    function loadTable() {

        // Ler os arquivos e montar array
        $pessoas = array();
		$fp = fopen('pessoas.txt', 'r');

        if ($fp) {

            while(!feof($fp)) {
				$arr = array();
                $cpf = fgets($fp);
				$dados = fgets($fp);
				if(!empty($dados)) {
					$arr = explode("#", $dados);
					$pessoas[$cpf] = $arr;
				}
			}

			fclose($fp);
		}

        // Escrever o array
        foreach ($pessoas as $cpf => $dados) {

			if(!empty($dados)) {
				echo "<tr>";
					echo "<td>".$cpf."</td>";

					foreach ($dados as $valor) {
						echo "<td>".$valor."</td>";
					}

					echo "<td>";
						echo "<button type='submit' name='acao' value='alterar/'".$cpf.">";
							echo "<span class='glyphicon glyphicon-pencil'></span>";
						echo "</button>";
						echo "&nbsp";
						echo "<button type='submit' name='acao' value='remover/'".$cpf.">";
							echo "<span class='glyphicon glyphicon-remove'></span>";
						echo "</button>";
					echo "</td>";
				echo "</tr>";
			}
		}
    

		
    }

    function insertTable() {
        
        $arr = array(
            $_POST['cpf'] => array(
                "nome" => $_POST['nome'],
                "ender" => $_POST['ender'],
                "tel" => $_POST['tel']
            )

        );
    
        $fp = fopen('pessoas.txt', 'a+');
    
        if ($fp) {
            foreach($arr as $cpf => $dados) {
                if(!empty($dados)) {
                    fputs($fp, "$cpf\n");
                    $linha = $dados['nome']."#".$dados['ender']."#".$dados['tel'];
                    fputs($fp, "$linha\n");
                }
            }
            fclose($fp);
        }
    }
?>
