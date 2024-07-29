<!DOCTYPE html>
<!-- consulta_curso.php 
     lista os cursos cadastrados -->
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Cadastro de curso</title>
	<meta charset="utf-8">
	<style>
		body {
			background-color: #201b2c;
			margin: 0;
		}

		.cont {
			width: 100vw;
			height: 100vh;
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
		}
		.text{
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="cont">


		<?php //cadastro.php
		// lista cursos cadastrados  

		include_once "conectabd.inc.php";

		echo "<div class='text' style='color: white'>" . "<h1 style='text-align: center;'>Cursos Cadastrados</h1><br><br>" . "<div/>";


		// lista cursos já cadastrados
		$query = "SELECT id_curso, ds_curso, nr_carga_horaria, dt_inicio FROM tb_curso;";
		if ($result = mysqli_query($link, $query)) {
			echo "<table class=' table-sm  table-bordered ' style='text-align: center; ' border='1'>";
			echo '<tr><th>id</th><th>Descrição</th><th>Carga Horária</th><th>Dt.Início</th><th colspan="2">Ações</th></tr>';
			// busca os dados lidos do banco de dados
			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row["id_curso"];
				$curso = $row["ds_curso"];
				$nr_carga_horaria = $row["nr_carga_horaria"];
				$dt_inicio = $row["dt_inicio"];

				echo "<div class='position-fixed'>" . "<tr>";
				echo "<td>" . $id . "</td>";
				echo "<td>" . $curso . "</td>";
				echo "<td>" . $nr_carga_horaria . "</td>";
				echo "<td>" . $dt_inicio . "</td>";
				// cria link para EXCLUSAO do respectivo id_curso
				echo '<td><a class="btn btn-outline-danger btn-sm " href="exclusao_curso.php?id=' . $row["id_curso"] . '">Excluir</a></td>';
				// cria link para ALTERACAO do respectivo id_curso
				echo '<td><a class="btn btn-outline-success btn-sm" href="form_alteracao_curso.php?id=' . $row["id_curso"] . '&curso=' . urlencode($curso) . '">Alterar</a></td>';

				echo "</tr>" . "<div/>";
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
		<a class="btn btn-outline-primary " href="cadastro_curso.php">Cadastrar novo curso</a>
		<br><br>
		<a class="btn btn-outline-primary" href="index.html">Menu Principal</a>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>