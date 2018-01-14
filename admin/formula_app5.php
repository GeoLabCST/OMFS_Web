<!DOCTYPE html>
<html lang="en" ng-app="isnre">
<?php 
$hostname_db = "119.59.125.189";
$database_db = "isnre";
$username_db = "postgres";
$password_db = "##isnre@postgis##";

$db = pg_connect("host=$hostname_db user=$username_db password=$password_db dbname=$database_db") or die("Can't Connect Server");

pg_query("SET client_encoding = 'utf-8'"); 
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="https://www.egov.go.th/upload/eservice-thumbnail/img_8c680d72898d7ec72e34c1385a815925.png">
  <title>ISNRE2</title>
  <!-- Bootstrap Core CSS -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Menu CSS -->
  <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
  <!-- toast CSS -->
  <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
  <!-- morris CSS -->
  <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
  <!-- chartist CSS -->
  <link href="../plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
  <link href="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
  <!-- animation CSS -->
  <link href="css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <!-- color CSS -->
  <link href="css/colors/default.css" id="theme" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  

  <div>


    <div>
      <div class="">
        <div class="row" ng-controller="formula">
          <div class="col-md-12 col-xs-12">
            <div class="">

              <div class="" id='formula'>
                
            
               <div >
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-left">ลำดับ</th>
                        <th class="text-left">ประเภทหลอด/บัลลาสต์เดิม</th>
                        <th class="text-left">จำนวนหลอดเดิม (ชุด)</th>
                        <th class="text-left">กำลังไฟฟ้าของหลอดไฟและบัลลาสต์เดิม (วัตต์)</th>
                        <th class="text-left">จำนวนหลอดใหม่เปลี่ยน (ชุด)</th>
                        <th class="text-left">กำลังไฟฟ้าของหลอดใหม่และบัลลาสต์ที่เปลี่ยน (วัตต์)</th>
                        <th class="text-left">ชั่วโมงการใช้งาน (ชั่วโมง)</th>
                        <th class="text-left"> ปริมาณการปล่อยก๊าซเรือนกระจกกรณีฐาน (kgCO2e) </th>
                        <th class="text-left"> ปริมาณการปล่อยก๊าซเรือนกระจกจากการดำเนินโครงการ (kgCO2e) </th>
                        <th class="text-left"> ปริมาณการลดการปล่อยก๊าซเรือนกระจก (kgCO2e) </th>
                      </tr>
                    </thead>
                    <tbody class="table-hover">
                      <tr ng-repeat="(key, value) in f5">
                        <td class="text-left">
                          <% key+1  %>
                        </td>
                        <td class="text-left"> <input class="form-control form-control-line" ng-change="formula5()" ng-model="value.name" type="text" /></td>
                        <td class="text-left"> <input class="form-control form-control-line" ng-change="formula5()" ng-model="value.a" type="number" min="0" /></td>
                        <td class="text-left"> <input class="form-control form-control-line" ng-change="formula5()" ng-model="value.b" type="number" min="0" /></td>
                        <td class="text-left"> <input class="form-control form-control-line" ng-change="formula5()" ng-model="value.c" type="number" min="0" /></td>
                        <td class="text-left"> <input class="form-control form-control-line" ng-change="formula5()" ng-model="value.d" type="number" min="0" /></td>
                        <td class="text-left"> <input class="form-control form-control-line" ng-change="formula5()" ng-model="value.e" type="number" min="0" /> </td>
                        <td class="text-left">
                          <% value.x %>
                        </td>
                        <td class="text-left">
                          <% value.y %>
                        </td>
                        <td class="text-left">
                          <% value.sum %>
                        </td>
                      </tr>
                    </tbody>
                  </table> <br/> <br/> 
                  <button data-html2canvas-ignore="true" style="margin:10px;" type="button" ng-click="addf5()" class="btn btn-success"> <i >&nbsp;เพิ่มข้อมูล </i></button>
                  <button data-html2canvas-ignore="true" style="margin:10px;" type="button" ng-click="deletef5()" class="btn btn-danger"><i >&nbsp;ลบข้อมูล </i></button>
                   <br/>
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-left">รายการผลลัพธ์</th>
                        <th class="text-left"> ผลลัพธ์ </th>
                      </tr>
                    </thead>
                    <tbody class="table-hover">
                      <tr>
                        <td class="text-left">ปริมาณการลดการปล่อยก๊าซเรือนกระจก </td>
                        <td class="text-left">
                          <%  f5carbon %> ตันคาร์บอนไดออกไซด์เทียบเท่า (ton CO2e) </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
    
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- jQuery -->
  <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Menu Plugin JavaScript -->
  <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
  <!--slimscroll JavaScript -->
  <script src="js/jquery.slimscroll.js"></script>
  <!--Wave Effects -->
  <script src="js/waves.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="js/custom.min.js"></script>
  <script src="http://119.59.123.61:81/isnre2/js/vendor/angular/all.js"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/media/jui/js/jquery.min.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/media/jui/js/jquery-noconflict.js" type="text/javascript"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/media/system/js/core.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/media/system/js/punycode.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/media/system/js/validate.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/media/system/js/html5fallback.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/media/system/js/frontediting.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/media/jui/js/jquery-migrate.min.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/media/jui/js/jquery.ui.sortable.min.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/plugins/system/ef4_jmframework/includes/assets/template/js/layout.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/templates/jm-renewable-energy-ef4/js/scripts.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/modules/mod_djmegamenu/assets/js/jquery.djmegamenu.js" type="text/javascript" defer="defer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ol3/3.7.0/ol.js"></script>
  <script>
    //angularjs
    var angularapp = angular.module('isnre', [], function($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
    });
  </script>
  <script src="http://119.59.123.61:81/isnre2/asset/libraries/html2canvas.min.js" type="text/javascript"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/libraries/jspdf.min.js" type="text/javascript"></script>
  <!--
<script src="http://119.59.123.61:81/isnre2/formula_asset/bundle.js" type="text/javascript"></script>
<script src="http://119.59.123.61:81/isnre2/formula_asset/common.js" type="text/javascript"></script>-->
  <script>
    //data-html2canvas-ignore="true";
    function Print() {
      //Rhtml2canvas(document.body,{
      // onrendered : function(canvas){
      //     canvas.font = '18px serif';
      //   let img = canvas.toDataURL("image/png");
      //   let doc = new jsPDF();
      //   doc.addImage(img,'png', -30, -20, -90, -110);
      //   doc.save('formula.pdf');
      // }})
      window.print();
    }

    function createBreadCrumb(label, callback) {
      var canvas = document.body;
      // canvas.width = 25;
      // canvas.height = 30;
      var img = new Image;
      var ctx = canvas.getContext("2d");
      img.onload = function() {
        ctx.drawImage(img, 0, 0);
        ctx.font = "11px Arial";
        ctx.textAlign = "center";
        ctx.fillText(label, 12, 16);
        callback(canvas.toDataURL());
      };
      img.src = 'map-pin-breadcrumb.png';
    }
  </script>
  <script src="http://119.59.123.61:81/isnre2/asset/anijs/anijs.js"></script>
  <script src="http://119.59.123.61:81/isnre2/asset/anijs/anijs-helper-dom.js"></script>
  <script>
    angularapp.controller('formula', function formula($scope) {
      $scope.f1weight = 0;
      $scope.f1carbon = 0;
      $scope.f1a = 0;
      $scope.f1b = 0;
      $scope.f1c = 0;
      $scope.f1d = 0;
      $scope.f2weight = 0;
      $scope.f2carbon = 0;
      $scope.f2a = 0;
      $scope.f2b = 0;
      $scope.f2c = 0;
      $scope.f2d = 0;
      $scope.f2e = 0;
      $scope.f2f = 0;
      $scope.f3weight = 0;
      $scope.f3carbon = 0;
      $scope.f3a1 = 0;
      $scope.f3b1 = 0;
      $scope.f3c1 = 0;
      $scope.f3d1 = 0;
      $scope.f3e1 = 0;
      $scope.f3a2 = 0;
      $scope.f3b2 = 0;
      $scope.f3c2 = 0;
      $scope.f3d2 = 0;
      $scope.f3e2 = 0;
      $scope.f4weight = 0;
      $scope.f4carbon = 0;
      $scope.f4 = [{
        range: 1,
        name: '',
        m: 0,
        cm: 0,
        sum: 0
      }];
      $scope.f5weight = 0;
      $scope.f5carbon = 0;
      $scope.f5 = [{
        name: '',
        a: 0,
        b: 0,
        c: 0,
        d: 0,
        e: 0,
        x: 0,
        y: 0,
        sum: 0
      }];
      $scope.f6weight = 0;
      $scope.f6carbon = 0;
      console.log('controller work');
      $scope.formula1 = function() {
        var A1 = ($scope.f1a * 0.45 * 2.53) - ($scope.f1a * 0.45 * 0.05);
        var B1 = ($scope.f1b * 0.45 * 2.53) - ($scope.f1b * 0.45 * 0.4288);
        var C1 = ($scope.f1c * 0.45 * 3.33) - ($scope.f1c * 0.45 * 0.4288);
        var D1 = ($scope.f1d * 0.45 * 2.53) - ($scope.f1d * 0.45 * 0.4288);
        $scope.f1weight = (A1 + B1 + C1 + D1) / 1000;
        $scope.f1carbon = (A1 + B1 + C1 + D1) / 10;
      };
      $scope.formula2 = function() {
        var A1 = $scope.f2a * 2.93;
        var B1 = $scope.f2b * 0.49;
        var C1 = $scope.f2c * 0.7;
        var D1 = $scope.f2d * 0.63;
        var E1 = $scope.f2e * 0.43;
        var F1 = $scope.f2f * 0.79;
        $scope.f2weight = (A1 + B1 + C1 + D1 + E1 + F1) / 1000;
        $scope.f2carbon = (A1 + B1 + C1 + D1 + E1 + F1) / 10;
      };
      $scope.formula3 = function() {
        var Ax = $scope.f3a1 * 2.75 * 1000;
        var Bx = $scope.f3b1 * 2.16 * 1000;
        var Cx = $scope.f3c1 * 0.95 * 1000;
        var Dx = $scope.f3d1 * 1.47 * 1000;
        var Ex = $scope.f3e1 * 1.21 * 1000;
        var Ay = $scope.f3a2 * 2.75 * 1000 / 1600;
        var By = $scope.f3b2 * 2.16 * 1000 / 1600;
        var Cy = $scope.f3c2 * 0.95 * 1000 / 1600;
        var Dy = $scope.f3d2 * 1.47 * 1000 / 1600;
        var Ey = $scope.f3e2 * 1.21 * 1000 / 1600;
        $scope.f3weight = (($scope.f3a1 + $scope.f3b1 + $scope.f3c1 + $scope.f3d1 + $scope.f3e1) + ($scope.f3a2 + $scope.f3b2 + $scope.f3c2 + $scope.f3d2 + $scope.f3e2) / 1000);
        $scope.f3carbon = ((Ax + Bx + Cx + Dx + Ex) + (Ay + By + Cy + Dy + Ey)) / 10;
      };
      $scope.addf4 = function() {
        $scope.f4.push({
          range: 1,
          name: '',
          m: 0,
          cm: 0,
          sum: 0
        });
      }
      $scope.deletef4 = function() {
        $scope.f4.pop();
      }
      $scope.formula4 = function() {
        var log = [];
        var i = 0;
        var sum = 0;
        var range = 0;
        angular.forEach($scope.f4, function(value, key) {
          //this.push(key + ': ' + value);
          value.sum = (((0.0509 * (((value.cm / 3.14) ^ 2) * value.m) ^ 0.919) + (0.00893 * (((value.cm / 3.14) ^ 2) * value.m) ^ 0.977) + (0.014 * (((value.cm / 3.14) ^ 2) * value.m) ^ 0.669)) * 0.5) * 44 / 12;
          sum += value.sum;
          range += value.range;
          i++;
          //console.log('test',value,'sum test',i);
        }, log);
        $scope.f4weight = range;
        $scope.f4carbon = ((sum / i) * range) / 1000;
      };
      $scope.addf5 = function() {
        $scope.f5.push({
          name: '',
          a: 0,
          b: 0,
          c: 0,
          d: 0,
          e: 0,
          x: 0,
          y: 0,
          sum: 0
        });
      }
      $scope.deletef5 = function() {
        $scope.f5.pop();
      }
      $scope.formula5 = function() {
        var log = [];
        var i = 0;
        var sum = 0;
        var range = 0;
        angular.forEach($scope.f5, function(value, key) {
          //this.push(key + ': ' + value);
          value.x = (value.b / 1000) * value.a * value.c * 0.5897;
          value.y = (value.e / 1000) * value.d * value.c * 0.5897;
          value.sum = value.x - value.y;
          sum += value.sum;
          i++;
          // console.log('value.e',value.f,'value.d',value.d);
        }, log);
        $scope.f5carbon = sum;
      };
      $scope.formula6 = function() {
        var A1 = $scope.f2a * 2.93;
        var B1 = $scope.f2b * 0.49;
        var C1 = $scope.f2c * 0.7;
        var D1 = $scope.f2d * 0.63;
        var E1 = $scope.f2e * 0.43;
        var F1 = $scope.f2f * 0.79;
        $scope.f2weight = (($scope.f2a + $scope.f2b + $scope.f2c + $scope.f2d + $scope.f2e + $scope.f2f) / 6) / 1000;
        $scope.f2carbon = (($scope.f2a + $scope.f2b + $scope.f2c + $scope.f2d + $scope.f2e + $scope.f2f) / 6) / 10;
      };
    });
  </script>
</body>

</html>