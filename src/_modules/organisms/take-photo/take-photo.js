'use strict';

import $ from 'jquery';
import Webcam from '../../../_scripts/webcam';

export default class TakePhoto {
  constructor() {

    let takePhotoCountdown = $('.take-photo__countdown'),
    count = 9,
    countdownInterval,
    audio = $('audio');

    window.prototype = true;

    if (window.prototype) {
      count = 3;
    }

    let fuck = function() {

      count--;

      if (count < 1) {

        $(window).trigger('stopCountdown');

      } else {
        takePhotoCountdown.html(count);
      }

    };

    $(window).on('startCountdown', function() {

      countdownInterval = setInterval(fuck, 1000);

    });


    $(window).on('stopCountdown', function() {

      clearInterval(countdownInterval);

      takePhoto();
    });

    function takePhoto() {

      Webcam.snap(function(data_uri) {
        document.querySelector('.show-photo__image').innerHTML = '<img src="'+data_uri+'"/>';
      });

      audio[0].play();

      $(window).trigger('showPhoto');

    }


  }
}
