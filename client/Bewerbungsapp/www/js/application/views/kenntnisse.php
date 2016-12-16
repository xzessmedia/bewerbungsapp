
<div ng-controller="KenntnisseController">

<h1>{{ 'general.PersonalData' | i18n }}:</h1>
<h2>{{ 'personal.Skills' | i18n }}</h2>

<ul class="nav nav-pills nav-justified">
  <li><a i18n="general.Person" href="#/personal">Person</a></li>
  <li><a i18n="general.Work" href="#/beruf">Beruf</a></li>
  <li class="active"><a i18n="general.Knowledge" href="#/kenntnisse">Kenntnisse</a></li>
  <li><a i18n="general.SocialMedia" href="#/sozialemedien">Soziale Medien</a></li>
</ul>
</br>
</br>

  <h2>{{ 'personal.SkillsAndKnowledge' | i18n }}:</h2>
<hr>
<!-- Nested node template -->
<script type="text/ng-template" id="nodes_renderer.html">
  <div ui-tree-handle class="tree-node tree-node-content">
	  <h3>
    <a class="btn btn-success btn-xs" ng-if="node.nodes && node.nodes.length > 0" data-nodrag ng-click="toggle(this)"><span
        class="glyphicon"
        ng-class="{
          'glyphicon-chevron-right': collapsed,
          'glyphicon-chevron-down': !collapsed
        }"></span></a>
    {{node.title}}
    <a class="pull-right btn btn-danger btn-xs" data-nodrag ng-click="remove(this)"><span
        class="glyphicon glyphicon-remove"></span></a>
    <a class="pull-right btn btn-primary btn-xs" data-nodrag ng-click="newObjectSubItem(this)" style="margin-right: 8px;"><span
        class="glyphicon glyphicon-plus"></span></a>
	</h3>
  </div>
  <ol ui-tree-nodes="" ng-model="node.nodes" ng-class="{hidden: collapsed}">
    <li ng-repeat="node in node.nodes" ui-tree-node ng-include="'nodes_renderer.html'">
    </li>
  </ol>
</script>



  
    <div ui-tree id="tree-root">
      <ol ui-tree-nodes ng-model="personaldata.skilldata">
        <li ng-repeat="node in personaldata.skilldata" ui-tree-node ng-include="'nodes_renderer.html'"></li>
      </ol>
    </div>
  <hr>
	  
  
<div class="btn-group">
  <button class="btn btn-primary" ng-click="newObjectItem(skill)">{{ 'personal.AddSkill' | i18n }}</button>
   <button ng-click="setPersonalDataKenntnissew(personaldata.skilldata)" class="btn btn-secondary" i18n="general.SaveChanges">Änderungen speichern</button>
  </div>
  
		  
		
</div>
	
	