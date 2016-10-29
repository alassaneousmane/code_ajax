<?php
include('includes/init.php');
// On verifie si l'utilisateur est connecté ou non
//include('filters/auth_filter.php');
//Si il est déjà connecté::guest_filter
//include('filters/guest_filter.php');
?>
<?php include('Partials/_header.php');
include('Partials/_nav.php');
?>
<div class="container">
    <table class="centered" >
        <thead>
        <tr>
            <th data-field="id">Idenfiant</th>
            <th data-field="name">Pseudo</th>
            <th data-field="price">Password</th>
            <th data-field="price">Compte</th>
            <th data-field="price">Avatar</th>
            <th data-field="price">Date de création</th>
        </tr>
        </thead>

        <tbody>

        </tbody>
    </table>
</div>
<div class="container" id="add_new_user" style="display: none;">

    <div class="row">
        <div class="col l4 m7 s12 offset-l4 offset-m2" >
            <div class="card-panel" >
                <div class="row">
                    <div class="col s6 offset-s3">
                        <img src="assets/pictures/admin.png" alt="Utilisateur" width="100%"/>
                    </div>
                </div>

                <h4 class="center-align">Ajouter un utilisateur</h4>
                <?php include('Partials/_errors.php'); ?>

                <form data-parsley-validate method="post" id="formLogin">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="pseudo" name="pseudo" required="required" data-parsley-trigger="change" data-parsley-minlength="3"/>
                            <label for="pseudo">Pseudo</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="password" id="password" name="password" required="required" data-parsley-trigger="change" data-parsley-minlength="6"/>
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <center>

                        <button type="submit" id="submit" name="submit" class="waves-effect waves-light btn light-blue">
                            <i class="material-icons left">perm_identity</i>
                           Ajouter
                        </button>
                        <br/><br/>

                    </center>




                </form>

            </div>
        </div>
    </div>
</div>
<!--  Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="materialize/js/materialize.min.js"></script>
<script src="materialize/js/init.js"></script>
<script type="text/javascript" src="Libraries/parsley/parsley.min.js"></script>
<script type="text/javascript" src="Libraries/parsley/i18n/fr.js"></script>
<script>

    $(document).ready(function(){

                $.ajax({
                    url: 'list_users.php',
                    success: function(data) {
                        $('tbody').html(data);
                        $('tbody tr').each(function(){
                            $(this).append('&nbsp;&nbsp;<td>&nbsp;&nbsp;<a href="edit_user.php"><i class="material-icons">mode_edit</i></a></td>');
                        });
                    }

                });
        $('<center> <button id="adduser" class="waves-effect waves-light btn light-blue"><i class="material-icons left">perm_identity</i>Ajouter un nouvel utilisateur</button> </center>').appendTo('body');

        // Si on clique sur le bouton Ajouter un nouvel utilisateur
        $('#adduser').on('click', function(){
            $('table').slideUp();
            $('#add_new_user').delay(1000).fadeIn(3000);
            $(this).hide();
        });
        $('#submit').on('click', function(e){
            e.preventDefault();
            var pseudo = $('#pseudo').val(),
                password = $('#password').val();
            $.ajax({
                url : "validate.php",
                type : "POST",
                data : "pseudo="+pseudo+"&password="+password,
                beforeSend : function () {
                    $('#submit').html('Ajout en cours...');
                },
                success : function(data){
                   // Redirige en cas de success

                    //header('Location: Chat');
                },
                error : function(){
                    console.log('Error de connexion');
                }
            });
        });
            });



</script>
</body>
</html>