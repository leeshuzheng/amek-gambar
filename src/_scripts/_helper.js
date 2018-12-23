import $ from 'jquery';
import Webcam from './webcam';

let showPage = function(page) {

  $('.page').removeClass('show');
  page.addClass('show');

}

let initCamera = function() {

  Webcam.attach('#camera');

}

let setGlobalCategory = function(category) {

  window.category = category;

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

export { showPage, initCamera, setGlobalCategory };
