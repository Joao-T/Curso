<!DOCTYPE html>
<!-- alteracao.php -->
<html>
	<head>
	  <title>Cadastro de aluno - Alteração</title>
	  <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
            body{
      background-color: #201b2c;
    }
    </style>
	</head>
	<body>
<?php 
// efetua alteração do aluno informado em form_alteracao_aluno.php
  $id_aluno = $_GET["id_aluno"];
  $ds_aluno = $_GET["ds_aluno"];
  $id_curso = $_GET["id_curso"];
  
  include_once "conectabd.inc.php";

  $query = "UPDATE tb_aluno 
            SET ds_aluno = '$ds_aluno'
              , id_curso = $id_curso
	  WHERE id_aluno = $id_aluno;";
	 // echo $query.'<br>';
  if ($result = mysqli_query($link, $query)) {
	  echo "<div style='color: white'>"."Alteração efetuada com sucesso"."<div/>";
  } else {
	  echo mysqli_error($link);
  }
  
  // fecha a conexão
  mysqli_close($link);
?>  
 <br><br><br><br><br><br><br><br>
 <a href="consulta_aluno.php " class="btn btn-outline-primary d-grid gap-2 col-6 mx-auto">Ver alunos cadastrados</a>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

 </body>
</html>

