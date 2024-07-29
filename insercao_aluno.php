<!DOCTYPE html>
<!-- insercao_aluno.php -->
<html>
	<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	  <title>Cadastro de aluno - Inclusão</title>
	  <meta charset="utf-8">
    <style>
      body {
      background-color: #201b2c;
    }
    </style>
	</head>
	<body>
<?php 
// efetua inclusao do aluno informado em cadastro_aluno.php

  $aluno = $_GET["aluno"];
  $id_curso = $_GET["id_curso"];
  
  include_once "conectabd.inc.php";
  $query = "INSERT INTO tb_aluno 
            (ds_aluno, id_curso) 
	    VALUES
            ('$aluno', $id_curso);";
  if ($result = mysqli_query($link, $query)) {
	  echo "<div style='color: white'>"."Inclusão efetuada com sucesso"."<div/>";
  }
  
  // fecha a conexão
  mysqli_close($link);
?>  
 <br><br><br><br><br><br><br>
 <a href="consulta_aluno.php" class="btn btn-outline-primary d-grid gap-2 col-6 mx-auto ">Ver alunos cadastrados</a>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
 </body>
</html>

