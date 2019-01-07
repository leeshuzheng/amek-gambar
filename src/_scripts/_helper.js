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

  Webcam.set({
    width: 900,
    height: 600
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

let reset = function() {

  showPage($('.home'), '');
  $('input').val('');
  $('.amek-gambar__header').removeClass('smaller');

}

let showLoader = function() {

  $('.loader').fadeIn();

}

let hideLoader = function() {
  $('.loader').fadeOut();
}

export { showPage, initCamera, setGlobalCategory, getBase64FromCanvas, isValidEmail, getUrlParameter, reset, showLoader, hideLoader };
