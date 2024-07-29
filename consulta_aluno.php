<!DOCTYPE html>
<!-- consulta_aluno.php 
     lista os alunos cadastrados -->
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Cadastro de Aluno</title>
	<meta charset="utf-8">
	<style>
		body {
			background-color: #201b2c;
		}
		.cont{
			width: 100vw;
			height: 100vh;
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
			text-align: center;
		}
	</style>
	</style>
</head>

<body>
	<div class="cont">
		<?php //consulta_aluno.php
		// lista alunos cadastrados  

		include_once "conectabd.inc.php";

		echo "<div style='color: white'>" . "<h1 style='text-align: center;'>Alunos Cadastrados</h1><br>" . "<div/>";

		// lista alunos já cadastrados
		$query = "SELECT id_aluno, ds_aluno, ds_curso
            FROM tb_aluno a,
                 tb_curso c
            WHERE a.id_curso = c.id_curso;";
		if ($result = mysqli_query($link, $query)) {
			echo "<table  class='table-sm table-bordered' border='1'>";
			echo '<tr><th>id</th><th>Nome do Aluno</th><th>Curso</th><th colspan="2">Ações</th></tr>';
			// busca os dados lidos do banco de dados
			while ($row = mysqli_fetch_assoc($result)) {
				$id_aluno = $row["id_aluno"];
				$ds_aluno = $row["ds_aluno"];
				$ds_curso = $row["ds_curso"];

				echo "<tr>";
				echo "<td>" . $id_aluno . "</td>";
				echo "<td>" . $ds_aluno . "</td>";
				echo "<td>" . $ds_curso . "</td>";
				// cria link para EXCLUSAO do respectivo id_curso
				echo '<td><a class="btn btn-outline-danger btn-sm" href="exclusao_aluno.php?id=' . $row["id_aluno"] . '">Excluir</a></td>';
				// cria link para ALTERACAO do respectivo id_curso
				echo '<td><a class="btn btn-outline-success btn-sm" href="form_alteracao_aluno.php?id=' . $row["id_aluno"] . '">Alterar</a></td>';

				echo "</tr>";
				// ou
				// printf("<tr><td>%s</td><td>%s</td></tr>", $row["id_curso"], $row["ds_curso"] );
			}
			echo "</table>";
			// libera a área de memória onde está o resultado
			mysqli_free_result($result);
		}
		// fecha a conexão
		mysqli_close($link);
		?>
		<br>
		<a class="btn btn-outline-primary" href="cadastro_aluno.php">Cadastrar novo aluno</a>
		<br><br>
		<a class="btn btn-outline-primary" href="index.html">Menu Principal</a>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>