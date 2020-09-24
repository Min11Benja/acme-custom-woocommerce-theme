//generate url with values
var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined
        ? true
        : decodeURIComponent(sParameterName[1]);
    }
  }
};

function constructorFromUrl() {
  const urlEmail = getUrlParameter("urlEmail");
  if (validateVariableWasPassed(urlEmail)) {
    $("#usr-email").val(urlEmail);
  }
  let urlCategory = getUrlParameter("urlCategory");
  if (validateVariableWasPassed(urlCategory)) {
    urlCategory = urlCategory + " sticker";
    $("#proof-cat").text(urlCategory);
  }

  const urlQty = getUrlParameter("urlQty");
  if (validateVariableWasPassed(urlQty)) {
    $("#proof-qty").text(urlQty);
  }
  const urlWidth = getUrlParameter("urlWidth");
  if (validateVariableWasPassed(urlWidth)) {
    $("#proof-width").text(urlWidth);
  }
  const urlHeigth = getUrlParameter("urlHeigth");
  if (validateVariableWasPassed(urlHeigth)) {
    $("#proof-heigth").text(urlHeigth);
  }
  let urlImgClean = getUrlParameter("urlImgClean");
  if (validateVariableWasPassed(urlImgClean)) {
    urlImgClean =
      "https://acmestickers.com/wp-content/uploads/" +
      urlImgClean;
    $("#proof-img-preview").each(function () {
      $(this).attr("src", urlImgClean);
    });
  }

  /*
  console.log(validateVariableWasPassed(urlEmail));
  console.log(validateVariableWasPassed(urlCategory));
  console.log(validateVariableWasPassed(urlQty));
  console.log(validateVariableWasPassed(urlWidth));
  console.log(validateVariableWasPassed(urlHeigth));
  console.log(validateVariableWasPassed(urlImgClean));*/

  function validateVariableWasPassed(variableToValidate) {
    if (variableToValidate === undefined || variableToValidate === null) {
      //console.log("undefined");
      return false;
    } else {
      //console.log(variableToValidate);
      return true;
    }
  }
}
$(document).ready(function () {
  constructorFromUrl();
});

/* 
file:///C:/Users/min11/Desktop/acme-proof-form/proof-feedback-form.html?urlEmail=min11benja@gmail.com&urlCategory=die-cut&urlQty=44&urlWidth=4&urlHeigth=3&urlImgClean=Love.png
*/
