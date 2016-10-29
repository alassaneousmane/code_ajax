 <link rel="stylesheet" href="assets/css/styleTeaser.css"/>

<div id="container">
			<h1>Mon super chat</h1>
			<!-- Statut
			//////////////////////////////////////////////////////// -->
			<table class="status"><tr>
			<td>
			<span id="statusResponse"></span>
			<select name="status" id="status" style="width:200px;"
			onchange="setStatus(this)">
			<option value="0">Absent</option>
			<option value="1">Occup&eacute;</option>
			<option value="2" selected>En ligne</option>
			</select>
			</td>
			</tr></table>
				<table class="chat"><tr>
				<!-- zone des messages -->
				<td valign="top" id="text-td">
				<div id="annonce"></div>
				<div id="text">
				<div id="loading">
				<center>
				<span class="info" id="info">Chargement du chat en
				cours...</span><br />
				<img src="ajax-loader.gif" alt="patientez...">
				</center>
				</div>
				</div>
				</td>
				<!-- colonne avec les membres connectés au chat -->
				<td valign="top" id="users-td"><div
				id="users">Chargement</div></td>
			</tr></table>


 <!--  Scripts-->
  <script src="assets/js/jquery.min.js"></script>

      <script type="text/javascript" src="assets/js/js_teaser.js"></script>
  
  <script type="text/javascript">
  	
  </script>