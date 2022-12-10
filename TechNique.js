#number_format [
  function number_format(number,decimal) {
      var options = { roundingPriority: "lessPrecision", minimumFractionDigits: decimal, maximumFractionDigits: decimal };
      var formatter = new Intl.NumberFormat("en",options);
      return formatter.format(number)
  }
  number_format(5004.235,2); 
  => 5,004.23
]

#substring or replace [
  var number = "5,004.23";
  number.replace(/,/g, "") 
  => 5004.23
]

#format_date [
  var Date = "2022-12-10";
  var [Y, M, D] = Date.split('-');
  var Format_Date = ""+D+"/"+M+"/"+Y+"";
  => 10/12/2022
]



#การส่งข้อมูลไปหลังบ้าน ajax [
  $.ajax({
    url: "menus/ajax/ajaxdata.php?a=TEST",
    type: "POST",
    data: { Year : $("#filt_year").val(), },
    success: function(result) { 
      var obj = jQuery.parseJSON(result);
      $.each(obj,function(key,inval) {
        console.log(inval['output']);
      });
    }
  })
  
  หลังบ้าน PHP
  <?php
    include('../../../../core/config.core.php');
    include('../../../../core/functions.core.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $resultArray = array();
    $arrCol = array();
    $output = "";

    if($_GET['a'] == 'TEST') {
      echo $_POST['Year'];
    }

    $arrCol['output'] = $output;

    array_push($resultArray,$arrCol);
    echo json_encode($resultArray);
    ?>
]
