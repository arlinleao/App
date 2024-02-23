<?php 
	include('lib/biblioteca.php');
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <head>
        <title><?php echo titulo_browser; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Automação Turma Elns-108" />
		    <link rel="stylesheet" href="css/styles.css" type="text/css" media="screen"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/dinamica.js"></script>
         <link href='http://fonts.googleapis.com/css?family=Roboto:300,700,400' rel='stylesheet' type='text/css'>
        
        
    </head>

  <body>
    
    <div class="demo"></div>
    <div class="content">
      
      <div class="grade"></div>

      <div class="menu-lateral">
        <div class="turma">
          <p><?php echo titulo_pagina; ?></p>
          <span><?php echo subtitulo_pagina; ?></span>
        </div>
        
        <div class='opcoes'>
          <ul>
            <li style="border-top: 1px solid #555;" id="0">
              <a href="#" ><?php echo menu_1; ?></a>
            </li>
            <li id="1">
              <a href="#"><?php echo menu_2; ?></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="ponteiro">
          <img src="images/icon-ponteiro.png" alt="" />
      </div>
    
      <div class="dashboard">
               <ul id="gallery-ilumin" class="gallery">
                    <li id="00" value="0">
                      <img src="images/icones/lampada.png"  >
                      <h5 class=""><?php echo menu_1_item_1; ?></h5>
                    </li>
                    <li id="01" value="0">
                      <img src="images/icones/lampada.png"  >
                      <h5 class=""><?php echo menu_1_item_2; ?></h5>
                    </li>
                    <li id="02" value="0">
                      <img src="images/icones/lampada.png"  >
                      <h5 class=""><?php echo menu_1_item_3; ?></h5>
                    </li>
                    <li id="03" value="0">
                      <img src="images/icones/lampada.png"  >
                      <h5 class=""><?php echo menu_1_item_4; ?></h5>
                    </li>
              </ul>
              <ul id="gallery-ventila" class="gallery">
                    <li id="04" value="0">
                      <img src="images/icones/ventilador.png"  >
                      <h5 class=""><?php echo menu_2_item_1; ?></h5>
                    </li>
                    <li id="05" value="0">
                      <img src="images/icones/ventilador.png"  >
                      <h5 class=""><?php echo menu_2_item_2; ?></h5>
                    </li>
                    <li id="06" value="0">
                      <img src="images/icones/ventilador.png"  >
                      <h5 class=""><?php echo menu_2_item_3; ?></h5>
                    </li>
                    <li id="07" value="0">
                      <img src="images/icones/ventilador.png"  >
                      <h5 class=""><?php echo menu_2_item_4; ?></h5>
                    </li>
              </ul>
      </div>
     <!--  <div class="apresentacao">
          <h1><?php echo texto_1; ?></h1>
          <h2><?php echo texto_2; ?></h2>
          <br />
          <p><?php echo texto_3; ?></p>
          
      </div> -->
      <div class="titulo-nav" id="geral">
            <span><?php echo titulo_flutuante; ?></span>
      </div>
      <!-- <div class="title-lateral"></div> -->
      </div>
         <div class="load">
            <img src="images/ajax-loade.gif" alt="" />
            <span>Atualizando...</span>       
      </div> 
  </body>
  <script>

      

  </script>
</html>