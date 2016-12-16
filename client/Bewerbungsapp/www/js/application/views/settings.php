<div ng-controller="SettingsController">
<h1>{{ 'general.Settings' | i18n }}:</h1>

    <div class="table-responsive">
        
<table class="table">
    <tr>
        <td><b>{{ 'general.Language' | i18n }}:</b></td>
        <td><div align="center">
            <div class="btn-group dropup">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <i ng-class="flagClass"></i>
                  <span>{{ 'general.Language' | i18n }}</span>
                  <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-right" role="menu">
                  <li>
                      <a ng-click="SetLanguage('en-US')">
                          <i class="flag-us"></i>
                          <span>{{ 'general.English' | i18n }}</span>
                      </a>
                  </li>
                  <li>
                      <a ng-click="SetLanguage('de-DE')">
                          <i class="flag-de"></i>
                          <span>{{ 'general.German' | i18n }}</span>
                      </a>
                  </li>
              </ul>
            </div>
</div></td>
    </tr>
</table>
<hr>
            <table ng-show="loggedIn" class="table">
                <tr>
                    <td><b>{{ 'personal.FirstName' | i18n }}:</b></td>
                    <td>{{userdata.firstname}}</td>
                </tr>
                <tr>
                    <td><b>{{ 'personal.LastName' | i18n }}:</b></td>
                    <td>{{userdata.lastname}}</td>
                </tr>
                <tr>
                    <td><b>{{ 'personal.EMailAdress' | i18n }}:</b></td>
                    <td>{{userdata.email}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td><button ng-click="Logout()">Logout</button></td>
            </table>
            <table ng-hide="loggedIn">
                <tr>
                    <td></td>
                    <td><button ng-click="Login()">Login</button></td>
            </table>

</div>
</div>