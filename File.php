<?php
include_once("Header.class.php");
include_once("Footer.class.php");

?>


<?= Header::NewHeader() ?>
<div class="container">
</div>
<!--  Scripts-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="materialize/js/materialize.min.js"></script>
  <script src="materialize/js/init.js"></script>
  <script type="text/javascript">
  		$(document).ready(function(){


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
