$(function() {

//  $('.dropdown').dropdown();

$('#example2').calendar({
  type: 'date',
   formatter: {
        date: function (date, settings) {
            if (!date) return '';
            var day = date.getDate() + '';
            if (day.length < 2) {
                day = '0' + day;
            }
            var month = (date.getMonth() + 1) + '';
            if (month.length < 2) {
                month = '0' + month;
            }
            var year = date.getFullYear();
            return year + '-' + month + '-' + day;
        }
    }
});

$('#example4').calendar({
  type: 'date',
   formatter: {
        date: function (date, settings) {
            if (!date) return '';
            var day = date.getDate() + '';
            if (day.length < 2) {
                day = '0' + day;
            }
            var month = (date.getMonth() + 1) + '';
            if (month.length < 2) {
                month = '0' + month;
            }
            var year = date.getFullYear();
            return year + '-' + month + '-' + day;
        }
    }
});

  $('#rangestart').calendar({
   type: 'date',
   endCalendar: $('#rangeend'),
   formatter: {
        date: function (date, settings) {
            if (!date) return '';
            var day = date.getDate() + '';
            if (day.length < 2) {
                day = '0' + day;
            }
            var month = (date.getMonth() + 1) + '';
            if (month.length < 2) {
                month = '0' + month;
            }
            var year = date.getFullYear();
            return year + '-' + month + '-' + day;
        }
    }
 });
 $('#rangeend').calendar({
   type: 'date',
   formatter: {
       date: function (date, settings) {
           if (!date) return '';
           var day = date.getDate() + '';
           if (day.length < 2) {
               day = '0' + day;
           }
           var month = (date.getMonth() + 1) + '';
           if (month.length < 2) {
               month = '0' + month;
           }
           var year = date.getFullYear();
           return year + '-' + month + '-' + day;
       }
   }
 });


$('#example1').calendar();
$('#IdDocSem').on('input',function(e){
$("#FinalIdDoc").text($('#IdDocSem').val());
});

$('#NDocSem').on('input',function(e){
$("#FinalNDoc").text($('#NDocSem').val());
});

$('.TotalSem').on('input',function(e){
$("#FinalTotal").text($('#FromTotalSem').val() + "_ " + $('#ToTotalSem').val());
});

$('.DatePayClass').on('click',function(e){
$("#FinalDatePay").text($('#DatePayStartSem').val() + "_ " + $('#DatePayEndSem').val());
});
$('.DatePayClass').on('click',function(e){
$("#FinalDateDue").text($('#DateDueStartSem').val() + "_ " + $('#DateDueEndSem').val());
});

$('#FromTo').on('click',function(e){
  if($('#FromDate').val() != '' && $('#ToDate').val() != ''){
    $(".PutDate.active").text($('#FromDate').val() + "_ " + $('#ToDate').val());
  }
else{
    $(".PutDate.active").text('');
}
//
});

$('#PayFilter').on('click',function(e){
$('.PutDate').removeClass('active');
$('#PayDateFilter').addClass('active');
});

$('#PutFilter').on('click',function(e){
$('.PutDate').removeClass('active');
$('#FillDateText').addClass('active');
});

$('#PadejFilter').on('click',function(e){
$('.PutDate').removeClass('active');
$('#PadejDateFilter').addClass('active');
});


});
