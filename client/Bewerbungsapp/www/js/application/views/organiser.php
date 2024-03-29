<div ng-controller="OrganiserController">

<!-- Nested node template -->
<script type="text/ng-template" id="nodes_renderer.html">
  <div ui-tree-handle class="tree-node tree-node-content">
    <a class="btn btn-success btn-xs" ng-if="node.nodes && node.nodes.length > 0" data-nodrag ng-click="toggle(this)"><span
        class="glyphicon"
        ng-class="{
          'glyphicon-chevron-right': collapsed,
          'glyphicon-chevron-down': !collapsed
        }"></span></a>
    {{node.title}}
    <a class="pull-right btn btn-danger btn-xs" data-nodrag ng-click="remove(this)"><span
        class="glyphicon glyphicon-remove"></span></a>
    <a class="pull-right btn btn-primary btn-xs" data-nodrag ng-click="newSubItem(this)" style="margin-right: 8px;"><span
        class="glyphicon glyphicon-plus"></span></a>
  </div>
  <ol ui-tree-nodes="" ng-model="node.nodes" ng-class="{hidden: collapsed}">
    <li ng-repeat="node in node.nodes" ui-tree-node ng-include="'nodes_renderer.html'">
    </li>
  </ol>
</script>

<div class="row">
  <div class="col-sm-12">
    <h3>Basic Example</h3>

    <button ng-click="NewItem()">Neues Objekt</button>
    <button ng-click="expandAll()">Aufklappen</button>
    <button ng-click="collapseAll()">Zuklappen</button>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div ui-tree id="tree-root">
      <ol ui-tree-nodes ng-model="data">
        <li ng-repeat="node in data" ui-tree-node ng-include="'nodes_renderer.html'"></li>
      </ol>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="info">
      {{info}}
    </div>
    <pre class="code">{{ data | json }}</pre>
  </div>
</div>

</div>