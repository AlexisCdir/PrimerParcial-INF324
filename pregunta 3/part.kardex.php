<!-- clients -->
      <div class="clients">
         <div class="container">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="titlepage">
                     <h2>Bienvenido a Kardex</h2>
                     <span></span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="clients_box">
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                  <div class="jonu">
                     <img src="images/cross_img.png" alt="#"/>
                     <?php 
                        echo "<h3>".$_SESSION["user"]."</h3>";
                        echo "<strong>(ROL = ".$_SESSION["rol"].")</strong>"
                     ?>
                     <a class="read_more" href="#">Reservado Docente</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end clients -->