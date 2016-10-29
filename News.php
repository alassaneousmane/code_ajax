
<?php

include_once("Controller/Header.class.php");
include_once("Controller/Nav.class.php");
include_once("Controller/Footer.class.php");

?>
<?= Header::Head(); ?>

<?= Navbar::Nav(); ?>
<div class="container">
    <h1 class="header center orange-text">Ilouane Services Apps</h1>
    <div class="row center">
        <h5 class="header col s12 light">BeeTreeSocial est la messagerie instantanée de BeeTree permettant
            de rendre beaucoup plus réactives ses collaborateurs!</h5>
    </div>
    <div class="row center">
        <a href="#" id="download-button" class="btn-large waves-effect waves-light blue">Commencer dès à présent</a>
    </div>
    <br><br>
</div>


<!--  Scripts-->
<script src="assets/js/jquery.min.js"></script>
<script src="materialize/js/materialize.min.js"></script>
<script src="materialize/js/init.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $('#textarea1').val('New Text');
        $('#textarea1').trigger('autoresize');
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
