<h1 i18n="design.Design">Gestaltung</h1>
<p i18n="design.DesignDescription">Du kannst hier alle Designeinstellungen deiner Bewerbung vornehmen.</p>
<div ng-controller="DesignController">
  
  
    <div class="panel panel-primary">
      <div class="panel-heading" i18n="design.PDF">PDF Einstellungen</div>
      <div class="panel-body">
      <div class="form-group">
        <label for="font" i18n="design.Font">Schriftart:</label>
		    <select ng-options="obj.name for obj in Fonts" ng-model="Font" name="font">
				<option value="" i18n="design.ChooseFont">-- Schriftart wählen --</option>
		   </select>
        </div>
      </div>
    </div>
  
  
    <div class="panel panel-primary">
      <div class="panel-heading" i18n="design.eApplication">eBewerbung</div>
      <div class="panel-body">
       <div class="form-group">
		<label for="theme" i18n="design.Theme">Theme:</label>
		    <select ng-options="obj.name for obj in Themes" ng-model="Theme" name="theme">
				<option value="" i18n="design.ChooseTheme">-- Theme wählen --</option>
		   </select>
		<p></p>
		<label for="sitetemplate" i18n="design.SiteTemplate">Site Template:</label>
		   <select ng-model="sitetemplate" name="sitetemplate">
			   <option value="template_1">template_1</option>
		 </select>
		   <label for="mailtemplate" i18n="design.MailTemplate">Mail Template:</label>
		   <select ng-model="mailtemplate" name="mailtemplate">
			   <option value="template_1">template_1</option>
		   </select>
		  </div>
      </div>
    </div>
  
		 
	   	
		  <button ng-click="setDesignData(theme,sitetemplate,mailtemplate,usecdn)" class="btn btn-default" i18n="general.SaveChanges">Änderungen speichern</button>
		  </div>