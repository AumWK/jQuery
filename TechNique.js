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
