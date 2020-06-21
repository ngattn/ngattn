// // Defining a function to display error message
// function printError(elemId, hintMsg) {
//     document.getElementById(elemId).innerHTML = hintMsg;
// }
//
// // Defining a function to validate form
// function validateForm() {
//     // Retrieving the values of form elements
//     var txtName = document.contactForm.txtName.value;
//     var txtKeyword = document.contactForm.txtKeyword.value;
//     var txtSKU = document.contactForm.txtSKU.value;
//     var txtPrice = document.contactForm.txtPrice.value;
//
//
//     // Defining error variables with a default value
//     var txtNameErr = true;
//     var txtKeywordErr = true;
//     var txtSKUErr = true;
//     var txtPriceErr = true;
//
//     // Validate name
//     if(name == "") {
//         printError("txtNameErr", "Tên sản phẩm không được để trống");
//     } else {
//         var regex = /^[a-zA-Z\s]+$/;
//         if(regex.test(name) === false) {
//             printError("txtNameErr", "Xin vui lòng nhập vào một tên hợp lệ");
//         } else {
//             printError("txtNameErr", "");
//             nameErr = false;
//         }
//     }
//
//     // Validate Key word
//     if(name == "") {
//         printError("txtKeywordErr", "Từ khóa không được để trống");
//     } else {
//         var regex = /^[a-zA-Z\s]+$/;
//         if(regex.test(name) === false) {
//             printError("txtKeywordErr", "Xin vui lòng nhập vào một từ khóa hợp lệ");
//         } else {
//             printError("txtKeywordErr", "");
//             nameErr = false;
//         }
//     }
//
//     // Validate sku
//     if(name == "") {
//         printError("txtSKUErr", "Mã hàng không để trống");
//     } else {
//         var regex = /^[a-zA-Z\s]+$/;
//         if(regex.test(name) === false) {
//             printError("txtSKUErr", "Xin vui lòng nhập vào một mã hàng hợp lệ");
//         } else {
//             printError("txtSKUErr", "");
//             nameErr = false;
//         }
//     }
//
//     // Validate price
//     if(name == "") {
//         printError("txtPriceErr", "Giá gốc không để trống");
//     } else {
//         var regex = /^[a-zA-Z\s]+$/;
//         if(regex.test(name) === false) {
//             printError("txtPriceErr", "Xin vui lòng nhập vào một giá hợp lệ");
//         } else {
//             printError("txtPriceErr", "");
//             nameErr = false;
//         }
//     }
//
//
//
//     // Prevent the form from being submitted if there are any errors
//     if((txtNameErr || txtKeywordErr || txtSKUErr || txtSKUErr || txtPriceErr) == true) {
//         return false;
//     }
// };
//
// $(document).ready(function() {
//     CKEDITOR.replace('txtContent');
//     $("form").submit(function (e) {
//         var total_length = CKEDITOR.instances['txtContent'].getData().replace(/<[^>]*>/gi, '').length;
//         if (!total_length) {
//             $(".results").html('');
//             $(".errortxtContent").html('Nội dung không được để trống');
//             e.preventDefault();
//         }
//     });
// });
