<?php

    


    function loadTable() {
        
        $pessoas = array();
		$fp = fopen('pessoas.txt', 'r');

		if ($fp) {

			while(!feof($fp)) {
				$arr = array();
				$cpf = fgets($fp);
				$dados = fgets($fp);
				if(!empty($dados)) {
					$arr = explode("#", $dados);
                    // print_r($arr);
					$pessoas[$cpf] = $arr;
				}
			}

			fclose($fp);
		}

		foreach ($pessoas as $cpf => $dados) {

			if(!empty($dados)) {
				echo "<tr>";
					echo "<td>".$cpf."</td>";

					foreach ($dados as $valor) {
						echo "<td>".$valor."</td>";
					}
				echo "</tr>";
			}
		}
    }

?>