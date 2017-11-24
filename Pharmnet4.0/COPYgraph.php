<?php

include 'Conn.php';
include 'Search.php';

$stmt = $dbh->query('SELECT * FROM GP_USERS;');

$USER = $_GET['User'];
$PASSWORD = $_GET['password'];

while ($row = $stmt->fetch()) {
    if ($row['GP_USERNAME'] == $USER && $row['GP_USERPASS'] == $PASSWORD) {
    $_SESSION['user'] = $USER;
      $_SESSION['pass'] = $PASSWORD;
      $_SESSION['UserID'] = $row['GP_USERID'];
        $UserDate = $row['GP_USERDATE'];
        $UserGroup  = $row['GP_USERGROUPID'];
        $check = 1 ;
    }
}
if($check == 0){
     header("Location: index.php");
}

echo '<div class="bs-example">';
echo '<div class="final">';
echo '<div class="well">';
echo '<div class="logo">IO Codding </div>';
echo 'Здравей, ' . $USER ;
echo '</br>';
echo 'Номер на група на потребителя: ' . $UserGroup ;
echo '</div>';
echo '</div>';
echo '</div>';


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript" src="js/datatim.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
<script type="text/javascript" src="js/semanticFilter.js"></script>
<script type="text/javascript" src="js/DeleteSearch.js"></script>
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
    <title>Pharmnet</title>
    <style type="text/css">
    .logo
    {
      text-align: left;
      color:red;
      font-family: "Times New Roman", Times, serif;
    }
    .td{
     max-width: 50px;
    }
        .final{
        text-align: center;
    		font-family: Tahoma, Geneva, sans-serif;
    		padding : 1px;
    	font-size: 30px;
    	font-style: normal;
    	font-variant: normal;
    	font-weight: 500;
    	line-height: 26.4px;;
        }
        .dropdown{
          z-index:0;
        }
        .form-control{

          margin-top:10px;
            margin-right:10px;
              margin-bottom:10px;
        }
        .btn{
          text-align:center;
        }
        .ui-datepicker {
        z-index: 9999999999999 !important;

        }
        .ui-datepicker-div {
        z-index: 9999999999999 !important;
          .menu{
  z-index: 9999999999999 !important;
          }
        }
        .modal-content{
            z-index: 0;
        }
          .modal{

          }
    </style>

    <script type="text/javascript">


$( document ).ready(function() {
document.body.style.zoom="75%"


    var nowUrl = "<?php echo '?User='. $_SESSION['user'] . '&password=' . $_SESSION['pass']; ?>"

    var SuppUrl = '';
    var Code = '';
    var IDDoc = '';
    var NDoc = '';
    var signature = '';
    var Commentt = '';
    var SuppUrl = '';
    var BankPay = '';
    var total = '';
    var Order = '';
    var DueDate ='';
    var AscDes = 0;

$("#SuplierFilter").text("<?php echo  $_SESSION['supplier']; ?>");
$("#CodeText").text("<?php  echo $_SESSION['Code']; ?>");
$("#NDocText").text("<?php  echo $_SESSION['NDoc']; ?>");
$("#total").text("<?php  echo $_SESSION['total']; ?>");

$("#CommentText").text("<?php  echo $_SESSION['Comment']; ?>");
$("#BankPayText").text("<?php  echo $_SESSION['BankPay']; ?>");

console.log("<?php echo  $_SESSION['supplier']; ?>");
console.log("<?php  echo $_SESSION['Code']; ?>");


          $('#Filter').click(function() {
              if ($('#SuplierFilter').text() != '') {
                    SuppUrl = '&Supplier=' +  $('#SuplierFilter').text();
              }
              if ($('#CodeText').text() != '') {
                    Code = '&Code=' +  $('#CodeText').text();
              }
              // if ($('#IDDocText').val() != '') {
              //       IDDoc = '&IDDoc=' +  $('#IDDocText').val();
              // }
              if ($('#NDocText').text() != '') {
                    NDoc = '&NDoc=' +  $('#NDocText').text();
              }
              if ($('#total').text() != '') {
                    total = '&total=' +  $('#total').text();
              }
              if ($('#SignatureText').text() != '') {
                    signature = '&signature=' +  $('#SignatureText').text();
              }
              // if ($('#CommentText').val() != '') {
              //       Commentt = '&Comment=' +  $('#CommentText').val();
              // }
              // if ($('#BankPayText').val() != '') {
              //       BankPay = '&BankPay=' +  $('#BankPayText').val();
              // }
              if ($('#DueText').text() != '') {
                    DueDate = '&PayDate=' +  $('#DueText').text();
              }
                  window.location.href = nowUrl +total + DueDate + SuppUrl + Code + IDDoc + NDoc + signature + Commentt + BankPay + Order;
                    console.log( nowUrl + SuppUrl + Code + IDDoc + NDoc + signature + Commentt + BankPay + Order);
          });

          $(".Order").on("click", function(){
            if ($('#SuplierFilter').text() != '') {
                  SuppUrl = '&Supplier=' +  $('#SuplierFilter').text();
            }
            if ($('#CodeText').text() != '') {
                  Code = '&Code=' +  $('#CodeText').text();
            }
            // if ($('#IDDocText').text() != '') {
            //       IDDoc = '&IDDoc=' +  $('#IDDocText').text();
            // }
            if ($('#NDocText').text() != '') {
                  NDoc = '&NDoc=' +  $('#NDocText').text();
            }
            if ($('#DueText').text() != '') {
                  PayDate = '&PayDate=' +  $('#DueText').text();
            }
            // if ($('#signatureText').text() != '') {
            //       signature = '&signature=' +  $('#signatureText').text();
            // }
            // if ($('#CommentText').text() != '') {
            //       Commentt = '&Comment=' +  $('#CommentText').text();
            // }
            // if ($('#BankPayText').text() != '') {
            //       BankPay = '&BankPay=' +  $('#BankPayText').text();
            // }

            var TypeSort = "Asc";
        //    alert(document.URL);
            var urlType = document.URL;
            urlType =  urlType.split('*');
            if (urlType[1] == "Asc") {
              TypeSort = "Desc";
            }
            else {
                TypeSort = "Asc";
            }
              // CountSort++;
              // if (CountSort % 2 != 0) {
              //   TypeSort = "Asc";
              // }
              //   if (CountSort % 2 == 0) {
              //   TypeSort = "Desc";
              // }
                Order = '&OrderBy=' +  this.id + "*" + TypeSort;

            window.location.href = nowUrl +total + DueDate + SuppUrl + Code + IDDoc + NDoc + signature + Commentt + BankPay + Order;
            console.log(nowUrl + SuppUrl + Code + IDDoc + NDoc + signature + Commentt + BankPay + Order);
          });
    });
    </script>
    <style media="screen">
      h3{
        text-align: center;
      }
    </style>
  </head>
  <body>
<div class="Store">

</div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td class="col-xs-1">
<?php
$stmt = $dbh->query('SELECT * FROM GP_SUPPLIER;');

while ($row = $stmt->fetch()) {
}
?>
          <button class="Order btn btn-default" id="GP_SupName" type="submit">Supplier</button>
<br>
       <div class="ui floating dropdown labeled icon button">
  <i class="Reply icon" id="SuppClear"></i>
  <span class="text" id="SuplierFilter"></span>
  <div class="menu">
    <div class="ui icon search input">
      <i class="search icon"></i>
      <input type="text" placeholder="Search tags...">
    </div>
    <div class="divider"></div>
    <div class="header">
      <i class="tags icon"></i>
      Фирми
    </div>
    <div class="scrolling menu">
    <?php
    $stmt = $dbh->query('SELECT * FROM GP_SUPPLIER;');
    while ($row = $stmt->fetch()) {
      ?>

      <div class="item">
        <?php echo $row['GP_SupName'] ?>
  </div>
<?php } ?>
</div>
</td>

          <td class="col-xs-1">
          <div class="input-group add-on">
          <button  class="Order btn btn-default" id="GP_InvName" type="submit">Code</button>
           </div>
			<div class="ui floating labeled icon dropdown button">
  <i class="Reply icon" id="CodeClear"></i>
  <span class="text" id="CodeText"></span>
  <div class="menu">
    <div class="header">
      <i class="tags icon"></i>
      Плащане по:
    </div>
    <?php
    $stmt = $dbh->query('SELECT * FROM GP_Inv;');
    while ($row = $stmt->fetch()) {
      ?>

      <div class="item">
        <?php echo $row['GP_InvName'] ?>
  </div>
<?php } ?>


  </div>
</div>
          </td>

          <td class="col-xs-1">
          <div class="input-group add-on">
          <button class="Order btn btn-default" id="DocNum" type="submit">№ Doc</button>
          <div class="ui floating dropdown labeled icon button">
  <i class="Reply icon" id="NClear"></i>
  <span class="text" id="NDocText"></span>
  <div class="menu">
    <div class="ui icon search input">
      <i class="search icon"></i>
      <input type="text" id="NDocSem" class="tess" placeholder="Search tags...">
    </div>
<div class="item" id="FinalNDoc">
</div>
          </td>

          <td class="col-xs-1">
          <button class="Order btn btn-default" id="DocSum"  type="submit">total</button>
          <br>
          <div class="ui floating dropdown labeled icon button">
  <i class="Reply icon" id="TotalClear"></i>
  <span class="text" id="total"></span>
  <div class="menu">
    <div class="ui icon search input">
      <i class="search icon"></i>
      <input type="text" id="FromTotalSem" class="TotalSem" placeholder="From Price">
    </div>

  <div class="divider"></div>
  <div class="ui icon search input">
      <i class="search icon"></i>
      <input type="text" id="ToTotalSem" class="TotalSem" placeholder="To Price">
    </div>
   <div class="divider"></div>
<div class="item" id="FinalTotal">
</div>
          </td>
          <td class="col-xs-1">
          <div class="input-group add-on">
          <button class="Order btn btn-default" id="DueDate"  type="submit">due date</button>
          <div class="ui floating dropdown labeled icon button">
<i class="Reply icon" id="DueClear"></i>
<span class="text" id="DueText"></span>
<div class="menu">
  <div class="ui icon search input">
    <div class="ui calendar" id="rangestart">
            <input type="text" placeholder="Start" class="DatePayClass"  id="DateDueStartSem">
    </div>
  </div>
<div class="divider"></div>
<div class="ui icon search input">
    <div class="ui calendar" id="rangeend">
          <div class="ui icon search input">
            <input type="text" placeholder="End" class="DatePayClass"  id="DateDueEndSem">
          </div>
        </div>
  </div>
 <div class="divider"></div>
<div class="item" id="FinalDateDue">
</div>
          </td>
          <td class="col-xs-1">
          <button class="Order btn btn-default" id="GP_USERNAME" type="submit">signature</button>
          <div class="ui floating dropdown labeled icon button">
     <i class="Reply icon" id="SingatureClear"></i>
     <span class="text" id="SignatureText"></span>
     <div class="menu">
       <div class="ui icon search input">
         <i class="search icon"></i>
         <input type="text" placeholder="Search tags...">
       </div>
       <div class="divider"></div>
       <div class="header">
         <i class="tags icon"></i>
         Потребители
       </div>
       <div class="scrolling menu">
       <?php
       $stmt = $dbh->query('SELECT * FROM GP_USERS;');
       while ($row = $stmt->fetch()) {
         ?>

         <div class="item" value="">
           <?php echo $row['GP_USERNAME'] . '---' . $row['GP_USERID'];?>
     </div>
   <?php } ?>
   </div>
          </td>
          <td class="col-xs-1">
          <button class="Order btn btn-default" id="Comment" type="submit">Comment</button>
          <div class="ui floating dropdown labeled icon button">
  <i class="Reply icon" id="CommentClear"></i>
  <span class="text"></span>
  <div class="menu">
    <div class="ui icon search input">
      <i class="search icon"></i>
      <input type="text" id="NDocSem" class="tess" placeholder="Search tags...">
    </div>
<div class="item" id="FinalNDoc">
</div>
          </td>
          <td class="col-xs-1">
          <button class="Order btn btn-default" id="pay_date" type="submit">Bankpay</button>
          <div class="ui floating dropdown labeled icon button">
  <i class="Reply icon" id="BankClear"></i>
  <span class="text"></span>
  <div class="menu">
    <div class="ui icon search input">
      <i class="search icon"></i>
      <input type="text" id="NDocSem" class="tess" placeholder="Search tags...">
    </div>
<div class="item" id="FinalNDoc">
</div>
          </td>
          <td class="col-xs-1">
          <button class="Order btn btn-default" id="Payment" type="submit">Date Pay</button>
          <div class="ui floating dropdown labeled icon button">
<i class="Reply icon" id="PayClear"></i>
<span class="text" id="PayText"></span>
<div class="menu">
  <div class="ui icon search input">
    <div class="ui calendar" id="rangestart">
            <input type="text" placeholder="Start" class="DatePayClass"  id="DatePayStartSem">
    </div>
  </div>

<div class="divider"></div>
<div class="ui icon search input">
    <div class="ui calendar" id="rangeend">
          <div class="ui icon search input">
            <input type="text" placeholder="End" class="DatePayClass"  id="DatePayEndSem">
          </div>
        </div>
  </div>
 <div class="divider"></div>
<div class="item" id="FinalDatePay">
</div>
          </td>
          <td class="col-xs-1">
          <div class="input-group add-on">
        <span class="table-add glyphicon glyphicon-plus" data-toggle="modal" data-target="#myModal" id="insert"></span>
		</br>
			</br>

        <button class="ui button" id="Filter">Filter</button>

          </div>
          </td>

        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $DbtSTMT->fetch()){
          $idSpan = $row['GPID'];
          ?>
        <tr>
          <td
              <?php
              echo '<p id="GP_SupName'.$idSpan.'" class="'.$row['ID_Sup'].'">';
              echo $row['GP_SupName'];
              echo '</p>';
              ?>


          </td>
          <td>
                <?php
                  echo '<p id="GP_InvName'.$idSpan.'" class="'.$row['ID_Inv'].'">';
                  echo $row['GP_InvName'];
                  echo '</p>'; ?>
          </td>
          <td>
                <?php
                  echo '<p id="DocNum'.$idSpan.'">';
                  echo $row['DocNum'];
                  echo '</p>'; ?>
          </td>
          <td>
                <?php
                  echo '<p id="DocSum'.$idSpan.'">';
                  echo $row['DocSum'];
                  echo '</p>'; ?>
          </td>
          <td>
                <?php
                echo '<p id="DueDate'.$idSpan.'">';
                $duedate = $row['DueDate'];
                $duedate = explode(" ", $duedate);
                echo $duedate[0];
                  echo '</p>';
                 ?>
          </td>
          <td>
                <?php
                  echo '<p id="GP_USERID'.$idSpan.'" value="'.$row['F_USERID_CH'].'">';
                  echo $row['GP_USERNAME'];
                  echo '</p>'; ?>
          </td>
          <td>
                <?php
                  echo '<p id="Comment'.$idSpan.'">';
                 echo $row['Comment'];
                  echo '</p>'; ?>
          </td>
          <td>
                <?php
                echo '<p id="pay_date'.$idSpan.'">';
                echo $row['pay_date'];
                  echo '</p>'; ?>
          </td>
          <td>
                <?php
                  echo '<p id="Payment'.$idSpan.'">';
                 echo $row['Payment'];
                  echo '</p>'; ?>
          </td>
          <td>
                <?php echo '<span class="table-edit glyphicon glyphicon-pencil" id="'.$idSpan.'" data-toggle="modal" data-target="#myModal"></span>'; ?>
          </td>
        </tr>
        <?php }
        ?>
      </tbody>
    </table>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="titleid"></h4>
            </div>
            <div class="modal-body" >
              <div class="container body-content span=8 offset=2">
                  <form class="form-horizontal">
             				 <div class="form-group">
                                <label for="dummyText" class="control-label col-xs-2">Supplier</label>
                                <div class="input-group col-xs-3">

<div class="ui fluid search selection dropdown" >
  <input type="hidden" name="country">
  <i class="dropdown icon"></i>
  <div class="text" id="Supplier"></div>
  <div class="menu" id="SupplierMenu">
     <div class="item"></div>
   <?php
    $stmt = $dbh->query('SELECT * FROM GP_SUPPLIER;');
    while ($row = $stmt->fetch()) {
      ?>
      <a class="item" id="SuppModal<?php echo $row['ID_Sup'];?>">
        <?php echo $row['GP_SupName'];?>
      </a>
<?php } ?>

   </div></div>
                                </div>
                            </div>
    						 <div class="form-group">
                                <label for="dummyText" class="control-label col-xs-2">Code</label>
                                <div class="input-group col-xs-3">
<div class="ui fluid search selection dropdown">
  <input type="hidden" name="country">
  <i class="dropdown icon"></i>
  <div class="text" id="Code"></div>
  <div class="menu Supp" id="CodeMenu">
     <div class="item"></div>
    <?php
    $stmt = $dbh->query('SELECT * FROM GP_Inv;');
    while ($row = $stmt->fetch()) {
      ?>

      <a class="item" id="InvModal<?php echo $row['ID_Inv']; ?>">
        <?php echo $row['GP_InvName']; ?>
      </a>
<?php } ?>
   </div></div>
                                </div>
                            </div>

                                                               <div class="form-group">
                                                                    <label for="dummyText" class="control-label col-xs-2">№ Doc</label>
                                                                    <div class="input-group col-xs-3">
                                                                        <input type="text"  id="Ndoc" class="form-control" />
                                                                    </div>
                                                                </div>
                                        						 <div class="form-group">
                                                                    <label for="dummyText" class="control-label col-xs-2">total</label>
                                                                    <div class="input-group col-xs-3">
                                                                        <input type="text"  id="Total" class="form-control" />
                                                                    </div>
                                                                </div>

                                                  <div class="form-group">
                                                                 <label for="dummyText" class="control-label col-xs-2">Comment</label>
                                                                 <div class="input-group col-xs-3">
                                                                     <input type="text"  id="Commment" class="form-control" />
                                                                 </div>
                                                             </div>
                                                  <div class="form-group">
                                                                 <label for="dummyText" class="control-label col-xs-2">Signature</label>
                                                                 <div class="input-group col-xs-3">
                                                                     <input type="text"  id="Signature" class="form-control" readonly />
                                                                 </div>
                                                             </div>
                                                             <div class="form-group">
                                                                            <label for="dummyText" class="control-label col-xs-2">BankPay</label>
                                                                            <div class="input-group col-xs-3">
                                                                                <input type="text"  id="BankPay" class="form-control" />
                                                                            </div>
                                                                        </div>
                          </form>
                        </div>
            </div>
            <div class="modal-footer">
    		  <button type="button" id="adding" class="btn btn-default">Add</button>
           <button type="button" id="Cancel" class="btn btn-default">Cancel</button>
            </div>
          </div>

        </div>
      </div>
  </body>
  <script type="text/javascript">

$( document ).ready(function() {


var addd = 0;
var edit = 0;
  $('.table-add').on('click', function(){

        // alert($("#GP_SupName6").attr('class'));
    addd = 1;
    edit = 0;
    $("#Supplier").text($('').text());
     $("#Code").text($('').text());
       $("#IDdoc").val($('').text());
         $("#Ndoc").val($('').text());
           $("#Total").val($('').text());
             $("#DueDate").val($('').text());
               $("#Signature").val('<?php echo $_SESSION['user']; ?>');
               $("#Comment").val($('').text());
                 $("#BankPay").val($('').text());
                     $("#DatePay").val($('').text());
                       $("#adding").text('Add');

    });

    $('.table-edit').on('click', function(){
      addd = 0;
      edit = 1;
        var id =  $(this).attr('id');
          var thenum = id.replace( /^\D+/g, '');
      $('.Store').prop('id', id);

  // $('#SupplierMenu').children().each(function(){
  //      $(this).removeAttr('active selected');
  // })
  $(".item").removeClass('active selected');

  var SuppNumber = $('#GP_SupName' + id).attr('class');
    $("#SuppModal" + SuppNumber).addClass('active selected');

    var CodeNumber = $('#GP_InvName' + id).attr('class');
    alert(CodeNumber);
      $("#InvModal" + CodeNumber).addClass('active selected');
            $("#Code").text($('#GP_InvName' + thenum).text());

       var supp = $('#GP_SupName' + thenum).text();
        $("#Supplier").text(supp);
            $("#Code").val($('#GP_InvName' + thenum).val());

              $("#IDdoc").val($('#DocNum' + thenum).text());
                $("#Ndoc").val($('#DocNum' + thenum).text());
                  $("#Total").val($('#DocSum' + thenum).text());
                    $("#DueDate").val($('#DueDate' + thenum).text());
                      $("#Signature").val($('#GP_USERID' + thenum).text());
                      $("#Comment").val($('#Comment' + thenum).text());
                        $("#BankPay").val($('#pay_date' + thenum).text());
                            $("#DatePay").val($('#Payment' + thenum).text());
                            $("#adding").text('Edit');

    });


$('#adding').on('click', function(){
  var GPIDd = $('.Store').attr('id');
   GPIDd = parseInt(GPIDd);

var Supplier = $("#SupplierMenu a.active").attr('id');
var Code = $("#CodeMenu a.active").attr('id');
var Ndoc = $("#Ndoc").val();
var Total = $("#Total").val();
Total = parseFloat(Total);
var DueDate = $("#DueDate").val();
var Signature = <?php echo $_SESSION['UserID']; ?>;
var Commentar = $("#Commment").val();
var BankPay = $("#BankPay").val();
var DatePay = $("#DatePay").val();

var numberPattern = /\d+/g;

Supplier = Supplier.match( numberPattern );
Code = Code.match( numberPattern );

Supplier = parseInt(Supplier);
Code = parseInt(Code);

  if (addd == 1) {

        alert(Code);
    $.ajax({
               type: "POST",
                data: {
                  Supplier:Supplier,Code:Code,Ndoc:Ndoc,Total:Total,Signature:Signature,Com:Commentar
               },
               url: "http://192.168.21.1/Pharmnet2.0/inserting.php",
               success: function(data){alert('Успешно добавяне'); location.reload();},
               error: function(e){}

     });
  }
  if (edit == 1) {
    alert(Code+ " " + Ndoc+ " " + Total+ " " + Signature+ " " + Commentar + " " + GPIDd)
    $.ajax({
               type: "POST",
                data: {
                  Supplier:Supplier,Code:Code,Ndoc:Ndoc,Total:Total,Signature:Signature,Com:Commentar,GPIDd:GPIDd
               },
               url: "http://192.168.21.1/Pharmnet2.0/updating.php",
               success: function(data){alert('Успешна смяна'); location.reload();},
               error: function(e){}

     });
   }
    });
});
  </script>
</html>
