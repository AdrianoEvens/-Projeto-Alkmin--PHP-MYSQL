

<?php

/* Esse código entre a tag php inclui a conexão com o banco de dados e 
  também o arquivo com a formatação do cabeçalho,  que é utilizada em todo o site.
*/

require_once("administrativo/conexao.php");
include_once("cabecalho.php");


?>

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
<main>

 <!--Os códigos abaixo são referentes aos slides que mostram as imagens do index.
 Utilizamos diversas propriedades do bootstrap para a montagem. -->

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/doacaoimg.jpg">
        <svg class="bd-placeholder-img" width="100%" height="100%" 
        xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" 
        focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

        <div class="container">
          <div class="carousel-caption text-start" style="color:black;">
            <h1>Projeto Alkmin</h1>
            <p>Conectamos pessoas pela soliedariedade</p>
            <p><a class="btn btn-lg btn-primary" href="alimentos.php">Doe agora</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/imgajuda.jpg">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
         aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

        <div class="container">
          <div class="carousel-caption">
            <h1>Escolha o que doar</h1>
            <p>Através de lojas parceiras do projeto Alkmin, você pode escolher o que doar
              para comunidades e pessoas carentes.
            </p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/doacao_de_alimentos_04.jpg">
        <svg class="bd-placeholder-img" width="100%" height="100%"
         xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" 
         focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

        <div class="container">
          <div class="carousel-caption text-end">
            <h1></h1>
            <p></p>
          </div>
        </div>
      </div>
    </div>

    
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- A div abaixo realiza a formatação das três imagens que ficam abaixo dos slides de imagens
   também utilizamos diversas propriedades do bootstrap para a montagem. -->

  <div class="container marketing">


    <div class="row">
      <div class="col-lg-4">
        <img src="img/imgalimento.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140">

        <h2>Doação de alimentos</h2>
        <p>Aqui você pode escolher o que irá doar</p>
      </div>
      <div class="col-lg-4">

        <img src="img/imglogistica.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140">
        <h2>Logística prática</h2>
        <p>Oferecemos um tipo de logística rápida e funcional.</p>
     
      </div>
      <div class="col-lg-4">
        <img src="img/imgentrega.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140">
        <h2>Acompanhamento de entrega</h2>
        <p>A entrega é acompanhada em parceria com as lojas parceiras.</p>
      </div>

     <!-- Códigos abaixos são referentes ao rodapé do index. -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2022 Resotech, Ltda. &middot; <a href="#">Privacidade</a> &middot; <a href="#">Termoss</a></p>
  </footer>
</main>



  </body>
</html>
