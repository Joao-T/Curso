<!DOCTYPE html>
<!-- cadastro.html -->
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Cadastro de curso - Exclusão</title>
  <meta charset="utf-8">
  <style>
    body{
      background-color: #201b2c;
    }
  </style>
</head>

<body>

  <?php //exclusao.php
  // efetua a exclusão do curso cujo id seja informado.
  $id = $_GET["id"];

  include_once "conectabd.inc.php";

  $query = "delete from tb_curso where id_curso=$id;";
  if ($result = mysqli_query($link, $query)) {
    echo "<div style='color: white'>"."Exclusão efetuada com sucesso"."<div/>";
  }

  // fecha a conexão
  mysqli_close($link);

  ?>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <a href="consulta_curso.php" class="btn btn-outline-primary d-grid gap-2 col-6 mx-auto ">Ver cursos cadastrados</a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>