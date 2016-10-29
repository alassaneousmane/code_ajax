<?php
include_once("Header.class.php");


?>


<?= Header::NewHeader() ?>
<div class="container">


 	<?php


	$row = 1;
	$array_all = [];
if (($handle = fopen("file.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
        	$array = explode(";", $data[$c]);
        	for($k = 0; $k < count($array); $k++){
        	 array_push($array_all, $array[$k]);
        	}
        	
            echo $data[$c] . "<br />\n";
        }
    }
    echo '<pre>';
   var_dump((($array_all)); echo "</pre><br/>";
    var_dump('Array all count data:'.count($array_all));

    fclose($handle);
}
	?>
</div>
<?php
//Source:https://openclassrooms.com/forum/sujet/import-csv-via-php-dans-bdd-mysql-61877
//http://php.net/manual/fr/function.explode.php
//https://openclassrooms.com/forum/sujet/creer-un-fichier-csv-en-php-1
// http://www.supinfo.com/articles/single/1087-importer-fichier-csv-mysql-avec-php5
//https://www.youtube.com/watch?v=xppyP5ibbYM
//GOOD::http://www.developpez.net/forums/d1184103/php/php-sgbd/php-mysql/importer-csv-php-bdd/
//http://www.clubic.com/forum/programmation/php/importer-un-tableau-csv-vers-une-base-de-donnees-mysql-en-php-id632558-page1.html
//http://www.commentcamarche.net/forum/affich-28892852-importer-contenu-de-fichier-csv-dans-base-de-donnees-mysql
//http://www.infres.enst.fr/~danzart/mysql/mysqlimporte.php
//http://creersonsiteweb.net/page-php-import-export-csv
//http://www.chicoree.fr/w/Importer_des_donn%C3%A9es_dans_une_base_MySQL
//http://forum.wampserver.com/read.php?1,49716,49722
//https://itx-technologies.com/blog/189-creer-un-fichier-csv-depuis-les-donnees-de-mysql


