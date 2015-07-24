var ShipstationClient = (function() {

  var url = "https://ssapi.shipstation.com/";
  var apiKey = "2ea18d1a83da4519b770d1e692a88a20";
  var apiSecret = "de6f90823647437ab017107a0ec1aeae";
  var encodedString = window.btoa(apiKey + ":" + apiSecret);
  var credentials = "Basic" + " " + encodedString;
  console.log(credentials);

  var getOrders = function(success) {
    jQuery.ajax({
      url: url + "orders",
      type: "GET",
      dataType: "json",
      headers: {
        "Authorization": "Basic MmVhMThkMWE4M2RhNDUxOWI3NzBkMWU2OTJhODhhMjA6ZGU2ZjkwODIzNjQ3NDM3YWIwMTcxMDdhMGVjMWFlYWU="
      },
      success: function(data) {
        console.log("Success");
        console.log(JSON.stringify(data));
      }
    });
  };

  return {
    getOrders: getOrders,
  };

})();
console.log(jQuery.fn.jquery);
//ShipstationClient.getOrders();
var Request = new XMLHttpRequest();

Request.open('GET', 'https://ssapi.shipstation.com/orders');

Request.setRequestHeader('Authorization', 'Basic MmVhMThkMWE4M2RhNDUxOWI3NzBkMWU2OTJhODhhMjA6ZGU2ZjkwODIzNjQ3NDM3YWIwMTcxMDdhMGVjMWFlYWU=');

Request.onreadystatechange = function () {
  if (this.readyState === 4) {
    console.log('Status:', this.status);
    console.log('Headers:', this.getAllResponseHeaders());
    console.log('Body:', this.responseText);
  }
};

Request.send();

// more empty comments
//adad adadopajdopkapksads