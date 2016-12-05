<form>
  <input type="text" placeholder="Artikel suchen.."  ng-model="search" style="width:100%">
  <p ng-show="search">Suchergebnis: {{search}}</p>
</form>


<div class="col-md-8">
	<table class="table" ng-controller="ArticlesCtrl">
	  <tr ng-repeat="article in articles | filter:search">
		<td>{{article.id}}</td>
		<td>{{article.name}}</td>
		<td align="right"><input ng-bind="article.amount" type="number" value="1" min="0" max="250" style="max-width: 40px"> <a href class="btn btn-default btn-sm" ng-click="cart.addArticle(article);">Hinzufügen</a></td>
	  </tr>
	</table>
</div>
<div class="col-md-4"><span class="pull-right">
	<div ng-controller="CartCtrl">
	<div class="jumbotron">
		<h2>Warenkorb:</h2>
	  <div ng-hide="cart.getItems().length" class="alert alert-info">Der Warenkorb ist leer.</div>
	  <table ng-show="cart.getItems().length" class="table">
		
		<tr ng-repeat="item in cart.getItems() track by
			$index" class="cart-item">
		  <td align="right">{{item.amount}}x{{item.name}} <a href class="btn btn-default btn-sm" ng-click="cart.removeArticle(article);">X</a></td>
		</tr>
	  </table>
	  </div>
	</div>
</span></div>

