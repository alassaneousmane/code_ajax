
<?php
session_start();
// Inclusion des differentes classes de notre Apps
//http://colours.neilorangepeel.com/
include_once("Controller/Header.class.php");
include_once("Controller/Container.class.php");
include_once("Controller/Footer.class.php");
// On verifie si l'utilisateur est connecté ou non
//include('filters/auth_filter.php');
//Si il est déjà connecté::guest_filter
//include('filters/guest_filter.php');
?>


<?= Header::HeaderIndex(); ?>

<?php include('Partials/_nav.php'); ?>


<?php include('Route/ContentTeaser.php'); ?>

  <!--  Scripts-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="materialize/js/materialize.min.js"></script>
  <script src="materialize/js/init.js"></script>
  <script type="text/javascript" src="assets/js/script.index.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
     
    });
  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );
  </script>


  </body>
</html>
