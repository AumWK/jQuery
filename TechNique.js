#number_format [
  function number_format(number,decimal) {
      var options = { roundingPriority: "lessPrecision", minimumFractionDigits: decimal, maximumFractionDigits: decimal };
      var formatter = new Intl.NumberFormat("en",options);
      return formatter.format(number)
  }
  number_format(5004.235,2); 
  => 5,004.23
]

#selectpicker [
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
  <select class="form-control form-control-sm selectpicker" name="ItemCode" id="ItemCode" data-live-search="true"></select>
  $("#ItemCode").html(inval["ItemCode"]);
  $("#ItemCode").selectpicker("refresh");
  ล้างข้อมูล
  $("#ItemCode").selectpicker("destroy");
  ให้เลือก
  $("#ItemCode").val(Item).change(); 
  $("#ItemCode").selectpicker();
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
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

#การตรวจจับ เช็คขนาด หน้าจอที่ใช้งาน [
  try{ document.createEvent("TouchEvent"); var isMobile = true; }
  catch(e){ var isMobile = false; }
  การใช้
  switch(isMobile) {
      case true: var PageLength = 5; break;
      case false: var PageLength = 15; break;
      default: var PageLength = 10; break;
  }
]

#การส่งค่าไปหน้าอื่นและรับค่า [
  ส่ง
  window.location.replace("loadlist.php?IDLogi="+inval['lastid']+"");
  รับ
  $_GET['IDLogi'];
]

#Datatable [
  setTimeout(function(){
      switch(isMobile) {
          case true: var PageLength = 5; break;
          case false: var PageLength = 15; break;
          default: var PageLength = 10; break;
      }
      $('#TableDATA').DataTable({
          destroy: true,
          "bAutoWidth": false,
          "ordering": false,
          "pageLength": PageLength,
          dom: 'frtip'
      });
  }, 1000);
]

#การทำปุ่มค้นหา [
  $("#FilterBox").on("keyup", function(){
      var kwd = $(this).val().toLowerCase();
      $("#Tbody tr").filter(function(){
          $(this).toggle($(this).text().toLowerCase().indexOf(kwd) > -1)
      });
  });
]

#การใส่ไอคอน icon, PopUp, popover [
  HTML
  <a href="javascript:void(0);" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="bottom">
      <i class="fas fa-info-circle"></i> คำอธิบายสถานะ
  </a>
  jQuery
  $(document).ready(function(){
      $('[data-bs-toggle="popover"]').popover({
          html:true,
          content:function(){
              var Text =  "<div class='row'>
                              "<div class='col-sm'>"+
                                  "<i class='fas fa-hourglass-half'></i> = รอโหลดสินค้า"+
                              "</div>"+
                          "</div>";
              return (Text);
          },
      });   

      CallData();
  });
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
