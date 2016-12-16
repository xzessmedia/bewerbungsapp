

<div ng-controller="BewerbungenController">
<h1>Bewerbungen:</h1>

<div align="right"><button class="btn btn-secondary btn-xs"  ng-csv="bewerbungen" filename="bewerbungen.csv">Download CSV</button></div>

    <div class="table-responsive">
        
    <table class="table">
        <tr>
            <td class="info">Firma</td>
            <td class="info">Ansprechpartner</td>
            <td class="info">Bewerbungsdatum</td>
            <td class="info">Antwortdatum</td>
            <td class="info">Status</td>
            <td class="info">Aktion</td>
        </tr>
        <tr ng-repeat="bewerbung in bewerbungen">
            <td>{{bewerbung.company}}</td>
            <td>{{bewerbung.name}}</td>
            <td>{{bewerbung.bewerbungsdatum}}</td>
            <td>{{bewerbung.responsedatum}}</td>
            <td>{{bewerbung.status}}</td>
            <td><button class="btn btn-primary btn-xs">Vorstellungsgespräch</button><button class="btn btn-secondary btn-xs">Absage</button></td>
        </tr>
    </table>
    </div>
<hr>
<button class="btn btn-primary btn-md">Bewerbung eintragen</button>
</div>