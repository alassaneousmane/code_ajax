<?php
session_start();
require("includes/init.php");
include('filters/auth_filter.php');

/*
 * empty() verifie d'abord si la variable existe, puis son contenu
 * Parce qu'il faut d'abord que la variable existe, ensuite verifez son contenu
 */
if(!empty($_GET['id'])) {
    //Recupérons les informations sur l'user en base de données en utilisant son id


    $user = find_user_by_id($_GET['id']);
    $number_micropost_by_user = number_micropost_by_user($_GET['id']);

    $q = $db->prepare("SELECT U.id user_id, U.name, U.city, U.pseudo, U.email, U.avatar,M.id m_id, M.like_count, M.content, M.created_at
                       FROM users U, microposts M, friends_relationships F
                       WHERE M.user_id = U.id
                       AND
                       CASE
                       WHEN F.user_id1 = :user_id
                       THEN F.user_id2 = M.user_id
                        WHEN F.user_id2 = :user_id
                        THEN F.user_id1 = M.user_id
                        END
                        AND F.status > 0
                        ORDER BY M.id DESC");
    $q->execute([
        'user_id'=> $_GET['id']
    ]);
    $microposts = $q->fetchAll(PDO::FETCH_OBJ);

} else {
    redirect('profile.php?id='.get_session('user_id'));
}


?>
<?php



require("views/profile.view.php");

?>