<div ng-controller="MenuController">
<div class="jumbotron">
<h1 i18n="general.NewApplicationTitle">Neue Bewerbungsmappe erstellen</h1>
<p i18n="general.ConfirmNewApp">Möchtest du wirklich eine neue Mappe erstellen?</p>
<p i18n="general.ConfirmSave">Hast du vorher gespeichert?</p>
<div class="form-group">
<button ng-click="new()" class="btn btn-primary btn-large" i18n="general.NewApplication">Neue Bewerbung</button>
<button ng-click="save()" class="btn btn-secondary btn-large" i18n="general.SaveApplication">Mappe speichern</button>
</div>


</div>