  <!-- Modal Structure --> 

<div id="modal1" class="modal">
    <div class="modal-content">
		<div class="row">
		  <h4 class="col s11">Neuer Benutzer</h4>
		  <a href="#!" class="modal-close waves-effect waves-green btn-flat right col s1"><i class="material-icons prefix inline-icon">close</i>Close</a>
		</div>
		  <div class="row">
			  <div class="row">
				<div class="input-field col s6">
				  <i class="material-icons prefix">account_circle</i>
				  <input id="usr" type="text" class="validate" name="username">
				  <label for="usr">Benutzername</label>
				</div>
				 <div class="input-field col s6">
				  <i class="material-icons prefix">account_circle</i>
				  <input id="pw" type="password" class="validate" name="pw">
				  <label for="pw">Passwort</label>
				</div>
			  </div>
				
			  <div class="row">
				 <div class="input-field col s6">
					<i class="material-icons prefix">group</i>
					<select name="gruppe" id="group">
					  <option value="Schüler" selected>Schüler</option>
					  <option value="Lehrer">Lehrer</option>
					  <option value="Andere">Andere</option>
					</select>
					<label>Gruppe wählen</label>
				 </div>
			  </div>
			  <div class="row center">
				<div class="col s12">
				  <a href="#!" class="btn modal-close" onClick="do_insert()">Hinzufügen</a>
				</div>
			  </div>
		  </div>
    </div>
  </div>