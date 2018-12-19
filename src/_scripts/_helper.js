import $ from 'jquery';
import Webcam from './webcam.min';

let showPage = function(page) {

  $('.page').removeClass('show');
  page.addClass('show');

}

let initCamera = function() {

  Webcam.attach('#camera');

}

export { showPage, initCamera };
