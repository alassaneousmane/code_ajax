<?php
session_start();
include('includes/functions.php');
include_once("Controller/Header.class.php");
include_once("Controller/Footer.class.php");
include_once("Controller/Formulaire.class.php");
// On verifie si l'utilisateur est connecté ou non
include('filters/auth_filter.php');
//Si il est déjà connecté::guest_filter
//include('filters/guest_filter.php');

?>


<?= Header::Head(); ?>
 <!-- <meta http-equiv="refresh" content="55" /> --><!-- Refresh each 5 second -->
<?php require('Partials/_nav.php'); ?>
<?php //include('ajax/chat-robotic.php'); ?>
<?php //include('Route/ContentTeaserChat.php'); ?>

<?= Formulaire::FormFile();?>



  <div class="col s5 chat-sidebar" style="font-family: Candara">
           

  </div>
  <div id="robot_chat"><p><a href="#">Discutez avec moi</a></p></div>
  <?php include('Partials/robot_body.html'); ?>
   <?php //require "assets/Chat/Bundle.php"; ?>
  
<?php /*

    <div class="chat" style="display: none">
        <header class="chat-header">             
                    
                        <a href="#" >
                        Ousmane ALASSANE
                      </a>
                      <i class="material-icons" id="chat-content-closer">close</i>
            
        </header>
        <div class="chat-content-message">
         
        </div>
        */
        ?>
        <?php /*
          <form method="post" id="sendData" action="Posts.php">
          <textarea id="textarea1" class="chat-content-input" autofocus name="chat-content-input" placeholder="Remember, be nice!" cols="30" rows="15" wrap="on"></textarea>
          </form>
          ***/
          ?>

  </div>








 <!--  Scripts-->
  <script src="assets/js/jquery.min.js"></script>
   <script type="text/javascript" src="assets/js/popup_chat.js"></script>
  <script src="materialize/js/materialize.min.js"></script>
  <script src="materialize/js/init.js"></script>
  <script type="text/javascript" src="assets/js/script.js"></script>
  <script type="text/javascript" src="Libraries/jquery-ui/jquery-ui.min.js"></script>
   <script type="text/javascript" src="Libraries/jquery.nicescroll.340/jquery.nicescroll.min.js"></script>
   <script type="text/javascript" src="assets/js/script_robot.js"></script>
   <script type="text/javascript" src="Libraries/sweetalert/sweetalert.min.js"></script>
  <script type="text/javascript">
  
  // Un peu de JavaScript ici
  /*getElementsByTagName permet de récuperer dans un array des éléments appartenant à la même famille
  var divs = document.getElementsByTagName('div');
  for(var i = 0, c = divs.length; i < c; i++){
  	console.log('Div n°'+(i+1)+': '+divs[i]);
  }
  console.log('Nombres de divs de cette page:'+divs.length);

  function changeStyle(element, backgroundColor, textColor){
            element.style.backgroundColor = backgroundColor;
            element.style.color= textColor;     
            if(textColor == "") {
              element.style.color = '#FFF';
            }    
             }
             */
  $(document).ready(function(){
    $('select').material_select();
    $('#robot_chat').css({
        'display': 'none',
       'position' : 'fixed',
       'color': 'black',
       'left' : '1500px',
       'top': '800px'
    });
    $('#robot_chat').on('click', function(){
    swal("Vous voulez vraiment discutez?", "Les messages que je vous donne ne sont encore contextualisés");
    });
      $('.dropdown-button').dropdown({
      inDuration: 200,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );
    
    $("html").niceScroll();
     $("popup-box .messages").niceScroll();
    //$("#thisdiv").niceScroll({cursorcolor:"#00F"});
   
 //$('#textarea1').autoResize();
  
 // On appelle la fonction, on la relance pour une premiere fois
    //Requete AJAX pour recupérer les messages
   
       //Je prend tous les liens qui ont l'attibut data-background-color  a[data-background-color]
    //$('a[data-background-color]).on('click', function(){

    //});
 
     // Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();
          $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );

      
   });
    
  </script>

  </body>
</html>
