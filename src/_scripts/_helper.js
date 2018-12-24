import $ from 'jquery';
import Webcam from './webcam';

let showPage = function(page, string) {

  $('.page').removeClass('show');

  if (string.length) {
    page.data('info', string);
  }

  page.addClass('show');

}

let initCamera = function() {

  Webcam.attach('#camera');

}

let setGlobalCategory = function(category) {

  window.category = category;

}

let getBase64FromCanvas = function(canvas) {

  let base64 = canvas.toDataURL('image/png');

  return base64;

}

// let handleIdle = function() {
//
//   let idleTimer;
//
//   $('*').bind('click touchstart', function (e) {
//     clearTimeout(idleTimer);
//
//     idleTimer = setTimeout(function () {
//
//       reset();
//
//     }, idleWait);
//
//   });
//
// }

export { showPage, initCamera, setGlobalCategory, getBase64FromCanvas };
