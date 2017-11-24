
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Pharmnet4.0</title>


<!-- CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.2.0/sandstone/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
<script type="text/javascript" src="AngularJS/Angular.js"></script>


</head>
<body>



  <div class="container" ng-app="sortApp" ng-controller="mainController">
  <input type="text" class="form-control" placeholder="Търси" ng-model="search.GP_SupName">
    <table class="table table-bordered table-striped" >

      <thead>
        <tr>
          <td>
            <a href="#" ng-click="sortType = 'GPID'; sortReverse = !sortReverse">
          Доставчик
              <span ng-show="sortType == 'GPID' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'GPID' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>
          <td>
            <a href="#" ng-click="sortType = 'Article'; sortReverse = !sortReverse">
            Код
              <span ng-show="sortType == 'Article' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'Article' && sortReverse" class="fa fa-caret-up"></span>
            </a>
            <br>
          </td>
          <td>
            <a href="#" ng-click="sortType = 'DocNum'; sortReverse = !sortReverse">
            Номер Д.
              <span ng-show="sortType == 'DocNum' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'DocNum' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>

          <td>
            <a href="#" ng-click="sortType = 'DocVolume15C'; sortReverse = !sortReverse">
          Сума
              <span ng-show="sortType == 'DocVolume15C' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'DocVolume15C' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>
          <td>
            <a href="#" ng-click="sortType = 'DocNum'; sortReverse = !sortReverse">
            Валута
              <span ng-show="sortType == 'DocNum' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'DocNum' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>
          <td>
            <a href="#" ng-click="sortType = 'DocVolume15C'; sortReverse = !sortReverse">
            Дата на въвеждане
              <span ng-show="sortType == 'DocVolume15C' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'DocVolume15C' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>
          <td>
            <a href="#" ng-click="sortType = 'Density'; sortReverse = !sortReverse">
          Потребител
              <span ng-show="sortType == 'Density' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'Density' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>
          <td>
            <a href="#" ng-click="sortType = 'Density'; sortReverse = !sortReverse">
      Коментар
              <span ng-show="sortType == 'Density' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'Density' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>
          <td>
            <a href="#" ng-click="sortType = 'DocNum'; sortReverse = !sortReverse">
            Банка
              <span ng-show="sortType == 'DocNum' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'DocNum' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>
          <td>
            <a href="#" ng-click="sortType = 'DocNum'; sortReverse = !sortReverse">
        Дата на плащане
              <span ng-show="sortType == 'DocNum' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'DocNum' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>

      </thead>

      <tbody>
        <tr ng-repeat="roll in sushi | orderBy:sortType:sortReverse | filter:search">
          <td>{{ roll.GPID}}</td>
            <td>{{ roll.GP_SupName}}</td>
              <td>{{ roll.GPID}}</td>
                <td>{{ roll.GPID}}</td>
                  <td>{{ roll.GPID}}</td>
                    <td>{{ roll.GPID}}</td>
                      <td>{{ roll.GPID}}</td>
        </tr>
      </tbody>

    </table>

  </div>
</body>
</html>
