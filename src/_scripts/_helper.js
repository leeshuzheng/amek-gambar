import $ from 'jquery';
import Webcam from './webcam';

let showPage = function(page, string) {

  $('.page').removeClass('show');

  if (string && string.length) {
    page.data('info', string);
  }

  page.addClass('show');

}

let initCamera = function(category) {

  let height, width;

  if (category === '3-4') {
    // Webcam.attach('.camera__tall')

    height = 915;
    width = 520;

  } else {

    height = 520;
    width = 915;

    // Webcam.attach('.camera');

  }

  Webcam.set({
    width: width,
    height: height
  });

  Webcam.attach('.camera');

}

let setGlobalCategory = function(category) {

  window.category = category;

}

let getBase64FromCanvas = function(canvas) {

  let base64 = canvas.toDataURL('image/png');

  return base64;

}

let isValidEmail = function(e) {
  var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
  return String(e).search (filter) != -1;
}

let getUrlParameter = function(sParam) {
  var sPageURL = window.location.search.substring(1),
  sURLVariables = sPageURL.split('&'),
  sParameterName,
  i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
    }
  }
};

export { showPage, initCamera, setGlobalCategory, getBase64FromCanvas, isValidEmail, getUrlParameter };
