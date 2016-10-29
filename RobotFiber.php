<?php
include_once("Controller/Header.class.php");
include_once("Controller/Nav.class.php");
include_once("Controller/Footer.class.php");

?>


<?= Header::Head(); ?>


<?= Navbar::Nav(); ?>
<div class="col s3" id="div_list_users">
    <?= Header::getChip(); ?>
</div>



<ul class="collection">
    <li class="collection-item avatar">
        <img src="assets/pictures/Ousmane ALASSANE.jpg" class="circle" height="50px" width="50px" alt="Contact Person">
        <span class="title">Title</span>
        <p>First Line <br>
            Second Line
        </p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
</ul>
<div class="chat">
    <header class="chat-header">

        <a href="#">
            Ousmane ALASSANE
        </a>
        <i class="material-icons" id="chat-content-closer">close</i>

    </header>
    <div class="chat-content-message">

    </div>
    <textarea id="textarea1" class="chat-content-input" autofocus name="chat-content-input"></textarea>
</div>








<!--  Scripts-->
<script src="assets/js/jquery.min.js"></script>
<script src="materialize/js/materialize.min.js"></script>
<script src="materialize/js/init.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
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
        $('.collection').hide();
        //Creation du hover()
        var $each_user = $('.chip');

        $each_user.click(function(e){
            e.preventDefault();
            $('form').fadeOut();

        });

        var $not_seen_message = $('.not_seen_message');
        $not_seen_message.html('');
        // Recuperons les messages non-lues toutes les 5 secondes
        function  charger(){
            setTimeout(function(){
                // On lance une requete AJAX
                $.ajax({
                    url: 'count_not_seen_message.php',
                    success: function(data){
                        $not_seen_message.html(data);
                    },
                    error: function(){
                        alert('Error....');
                    }
                });
                charger(); // On relance la fonction en boucle
            }, 5000);
        }
        charger(); // On appelle la fonction, on la relance pour une premiere fois
        //Requete AJAX pour recupérer les messages

        //Je prend tous les liens qui ont l'attibut data-background-color  a[data-background-color]
        //$('a[data-background-color]).on('click', function(){

        //});
        var backgroundColor;
        $('#textarea1').val('');
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
