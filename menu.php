

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#">Sync Monitor</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="status.php">Home</a></li>
		<li><a href="#" data-toggle="modal" data-target="#hist">Historique</a></></li>
		 <li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Configuration<span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			<li><a href="#" data-toggle="modal" data-target="#histo">Connexion au serveur</a></li>
			<li><a href="#" data-toggle="modal" data-target="#gest">Gérer les utilisateurs</a></li>
			<li class="divider"></li>
			<li class="dropdown-header">Options</li>
			<li><a href="#" data-toggle="modal" data-target="#param">Paramètre de transfert</a></li>
			</ul>
		</li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li style="margin-top:7px; margin-right: 25px"><?/*<button value='yes' name='startsync' type="submit" class="btn btn-primary">Lancez une Synchronisation</button>*/?></li>
		 <li class="divider"></li>
		
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="histo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><a>Sync Settings</a></h4>
      </div>
      <div class="modal-body">
		
		<form id="form_1013408" class="appnitro"  method="post" action="/formbuilder/view.php">
			<div class="form_description">		
		</div>						
		<ul >			
		<li id="li_3" >
		<label class="description" for="element_3">Serveur distant </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_3"><small>Please enter the remote host name from where you want to initiate a sync.</small></p> 
		</li>		<li id="li_1" >
		<label class="description" for="element_1">Nom utilisateur </label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Mot de passe </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li class="section_break">
			<h3>Sync Location</h3>
			<p></p>
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Dossier Distant</label>
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Dossier Local</label>
		<div>
			<input id="element_6" name="element_6" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1013408" />
			    
				
		</li>
			</ul>
		</form>	
      </div>
      <div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Sauvegarder les changements</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="gest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Gérer les utilisateurs</h4>
      </div>
      <div class="modal-body">
		<table class='table table-striped' style="width:100%">	
			<tr>
         		<th>Utilisateur</th>
				<th>Mot de passe</th> 		
         	  </tr>	
			 <tr><td>aaa</td><td>************</td></tr>
			 <tr><td>bbb</td><td>************</td></tr>
			 <tr><td>ccc</td><td>************</td></tr>		
		</table>
      </div>
      <div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Sauvegarder les changements</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="param" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Paramètre de transfert</h4>
      </div>
      <div class="modal-body">
        <form id="form_1013408" class="appnitro"  method="post" action="/formbuilder/view.php">
			<div class="form-group">		
			</div>						
			<ul >			
			<li id="li_3" >
		<label class="description" for="element_3">Nombre de connexion par fichier(s) </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value=""/> 
		</div>
		</li>		<li id="li_1" >
		<label class="description" for="element_1">Limite de connexion </label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Nombre de téléchargement parallèle</label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>			
			<li class="buttons">
			<input type="hidden" name="form_id" value="1013408" />
			
			<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
		</ul>
		</form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Sauvegarder les changements</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="hist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-left:-180px;">
  <div class="modal-dialog">
    <div class="modal-content" style="width:800px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Historique</h4>
      </div>
      <div class="modal-body">
	  
	   <?			
			$data = getSyncHist();
			echo "<table class='table table-striped'>
						<tr><th>Fichier</th><th>Action</th></tr>";
			foreach ($data['files'] as $file){	
				echo "<tr><td>".$file['name']."</td><td><a href='javascript:sync(\"".$file['name']."\")'>Re-Sync</a></td></tr>";
			}
			echo "</table>";
		?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>





