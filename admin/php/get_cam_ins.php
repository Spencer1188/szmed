	  <div class="row">
    		<div class="col s12">
			  <div class="row">
					<div class="input-field col s12 m6 l6">
					  <input id="inr" type="text" class="validate" value="" required>
					  <label for="inr">Inventar Nummer</label>
					</div>
				</div>			
				<div class="row">
				  	<div class="input-field col s12 m6 l6">
					  <input id="name" type="text" class="validate" value="" required>
					  <label for="name">Name</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input id="marke" type="text" class="validate" value="" required>
					  <label for="marke">Marke</label>
					</div>
				</div>
				<div class="row">
				    <div class="input-field col s12">
						<textarea id="beschreibung" class="materialize-textarea" data-length="120" required></textarea>
						<label for="beschreibung">Beschreibung</label>
				  	</div>
				</div>
			  <div class="row">
					<div class="input-field col s12 m6 l6">
				  	  <input id="typ" type="text" class="validate" value="" required>
					  <label for="typ">Kameratyp</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input id="afl" type="text" class="validate" value="" required>
					  <label for="afl">Auflösung</label>
					</div>
			 </div>
				<div class="row">
				    <div class="input-field col s12 m6 l6">
				  	  <input id="akl" type="text" class="validate" value="" required>
					  <label for="akl">Akkulaufzeit</label>
				  	</div>
					<div class="input-field col s12 m6 l6">
					  <input id="spmed" type="text" class="validate" value="" required>
					  <label for="spmed">Speicherkarte</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6 l6">
					  <input id="vsz" type="text" class="validate" value="" required>
					  <label for="vsz">Verschlusszeit</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input id="iso" type="text" class="validate" value="" required>
					  <label for="iso">ISO</label>
					</div>
				  </div>
				<div class="row">
					<div class="input-field col s12 m6 l6">
					  <input id="gewicht" type="text" class="validate" value="" required>
					  <label for="gewicht">Gewicht</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input id="dim" type="text" class="validate" value="" required>
					  <label for="dim">Dimension</label>
					</div>
				  </div>
				<div>
				</div>
		 	 </div>
		  </div>		 
				
					<div class="row center">
						<button class="inline-icon btn waves-effect" onClick="insert()">
							<i class="material-icons inline-icon">add</i>
							Hinzufügen
						</button>
					</div>
