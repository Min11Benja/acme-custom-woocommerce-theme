/*  Wizard */
jQuery(function ($) {
  "use strict";

  $("form#wrapped").attr("action", "");
  $("#wizard_container")
    .wizard({
      stepsWrapper: "#wrapped",
      submit: ".submit",
      beforeSelect: function (event, state) {
        if ($("input#website").val().length != 0) {
          return false;
        }
        if (!state.isMovingForward) return true;
        var inputs = $(this).wizard("state").step.find(":input");
        return !inputs.length || !!inputs.valid();
      },
    })
    .validate({
      errorPlacement: function (error, element) {
        if (element.is(":radio") || element.is(":checkbox")) {
          error.insertBefore(element.next());
        } else {
          error.insertAfter(element);
        }
      },
    });
  //  progress bar
  $("#progressbar").progressbar();
  $("#wizard_container").wizard({
    afterSelect: function (event, state) {
      $("#progressbar").progressbar("value", state.percentComplete);
      $("#location").text(
        "(" + state.stepsComplete + "/" + state.stepsPossible + ")"
      );
    },
  });
  // Validate select
  $("#wrapped").validate({
    ignore: [],
    rules: {
      select: {
        required: true,
      },
    },
    errorPlacement: function (error, element) {
      if (element.is("select:hidden")) {
        error.insertAfter(element.next(".nice-select"));
      } else {
        error.insertAfter(element);
      }
    },
  });
});
/* File upload validate size and file type - For details: https://github.com/snyderp/jquery.validate.file*/
$("form#wrapped").validate({
  rules: {
    fileupload: {
      fileType: {
        types: ["jpg", "jpeg", "gif", "png", "pdf"],
      },
      maxFileSize: {
        unit: "MB",
        size: 5,
      },
      minFileSize: {
        unit: "KB",
        size: "2",
      },
    },
  },
});
// Summary
function getVals(formControl, controlType) {
  switch (controlType) {
    case "question_1":
      // Get the value for a radio - type of sticker
      var value = $(formControl).val();
      $("#question_1").text(value);
      break;

    case "question_2":
      // Get the value for a input text - Quantity of stickers
      var value = $(formControl).val();
      $("#question_2").text(value);
      break;

    case "question_3":
      // Get the value for a input text - Size of stickers - width
      var value = $(formControl).val();
      $("#question_3").text(value);
      break;

    case "question_4":
      // Get the value for a input text -Size of stickers - heigth
      var value = $(formControl).val();
      $("#question_4").text(value);
      break;

    case "fileupload":
      // Get the value for a textarea
      var value = $(formControl).val();
      $("#fileupload").text(value);
      break;

    case "url-img":
      // Get the value for a textarea
      var value = $(formControl).val();
      $("#url-img").text(value);
      break;

    case "email":
      // Get the value for a input text - email
      var value = $(formControl).val();
      $("#email").text(value);
      break;
  }
}

function generateUrlWithData() {
  const urlEmail = $("#email").text();
  console.log(`urlEmail: ${urlEmail}`);

  const urlCategory = $("#question_1").text();
  console.log(`urlCategory: ${urlCategory}`);

  const urlQty = $("#question_2").text();
  console.log(`urlQty: ${urlQty}`);

  const urlWidth = $("#question_3").text();
  console.log(`urlWidth: ${urlWidth}`);

  const urlHeigth = $("#question_4").text();
  console.log(`urlHeigth: ${urlHeigth}`);

  const urlImg = $("#url-img").text();
  console.log(`urlImg: ${urlImg}`);
  $("#manual-form-img").each(function () {
    $(this).attr("src", urlImg);
  });

  //clan up rul only need the ast part i guess
  const urlImgClean = urlImg.substring(urlImg.lastIndexOf("/") + 1);
  console.log(`urlImgClean: ${urlImgClean}`);

  const localurl =
    "https://acmestickers.com/proof-feedback-form";

  const urlWithData =
    localurl +
    "?" +
    "urlEmail=" +
    urlEmail +
    "&" +
    "urlCategory=" +
    urlCategory +
    "&" +
    "urlQty=" +
    urlQty +
    "&" +
    "urlWidth=" +
    urlWidth +
    "&" +
    "urlHeigth=" +
    urlHeigth +
    "&" +
    "urlImgClean=" +
    urlImgClean;
  console.log(`urlWithData: ${urlWithData}`);
  //paste value for preview on form

  $("#url-user").text(urlWithData);
  //change a tag url with new form feedback with data url for preview
  $("#preview-proof").each(function () {
    $(this).attr("href", urlWithData);
  });

  $("#preview-proof").each(function () {
    $(this).attr("href", urlWithData);
  });

  $("#urlwithdata-field").val(urlWithData);
}
