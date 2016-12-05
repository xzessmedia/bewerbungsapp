<h1>Gestaltung</h1>
<p>Du kannst hier alle Designeinstellungen deiner Bewerbung vornehmen.</p>
<div ng-controller="DesignController">
  
  
    <div class="panel panel-primary">
      <div class="panel-heading">PDF Einstellungen</div>
      <div class="panel-body">
      <div class="form-group">
        <label for="font">Schriftart:</label>
		    <select ng-options="obj.name for obj in Fonts" ng-model="Font" name="font">
				<option value="">-- Schriftart wählen --</option>
		   </select>
        </div>
      </div>
    </div>
  
  
    <div class="panel panel-primary">
      <div class="panel-heading">eBewerbung</div>
      <div class="panel-body">
       <div class="form-group">
		<label for="theme">Theme:</label>
		    <select ng-options="obj.name for obj in Themes" ng-model="Theme" name="theme">
				<option value="">-- Theme wählen --</option>
		   </select>
		<p></p>
		<label for="sitetemplate">Site Template:</label>
		   <select ng-model="sitetemplate" name="sitetemplate">
			   <option value="template_1">template_1</option>
		 </select>
		   <label for="mailtemplate">Mail Template:</label>
		   <select ng-model="mailtemplate" name="mailtemplate">
			   <option value="template_1">template_1</option>
		   </select>
		  </div>
      </div>
    </div>
  
		 
	   	
		  <button ng-click="setDesignData(theme,sitetemplate,mailtemplate,usecdn)" class="btn btn-default">Änderungen speichern</button>
		  </div>