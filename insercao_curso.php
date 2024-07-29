<!DOCTYPE html>
<!-- insercao_curso.php -->
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Cadastro de curso - Inclusão</title>
  <meta charset="utf-8">
  <style>
       body {
      background-color: #201b2c;
    }
  </style>
</head>
<body>
<?php 
// efetua inclusao do curso informado em cadastro_curso.html

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $curso = isset($_GET["ds_curso"]) ? $_GET["ds_curso"] : '';
    $carga_horaria = isset($_GET["nr_carga_horaria"]) ? $_GET["nr_carga_horaria"] : 0;
    $dt_inicio = isset($_GET["dt_inicio"]) ? $_GET["dt_inicio"] : '';
    
    include_once "conectabd.inc.php";
    
    // Formata a data para o formato aceito pelo MySQL (YYYY-MM-DD)
    $dt_inicio_formatada = date('Y-m-d', strtotime($dt_inicio));
    
    $query = "INSERT INTO tb_curso 
              (ds_curso, nr_carga_horaria, dt_inicio) 
              VALUES
              ('$curso', '$carga_horaria', '$dt_inicio_formatada');";
    
    if ($result = mysqli_query($link, $query)) {
        echo "<div style='color: white'>"."Inclusão efetuada com sucesso"."<div/>";
    } else {
        echo "Erro ao cadastrar curso: " . mysqli_error($link);
    }
    
    // fecha a conexão
    mysqli_close($link);
} else {
    echo "Método inválido. Utilize o formulário para enviar os dados.";
}
?>  
 <br><br><br><br><br><br><br>
 <a href="consulta_curso.php" class="btn btn-outline-primary d-grid gap-2 col-6 mx-auto ">Ver cursos cadastrados</a>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
 </body>
</html>
