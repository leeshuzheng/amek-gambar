'use strict';

import $ from 'jquery';
import Webcam from '../../../_scripts/webcam';

export default class TakePhoto {
  constructor() {

    let takePhotoCountdown = $('.take-photo__countdown'),
    countdownInterval,
    count,
    audio = $('audio');

    window.prototype = false;

    let countdown = function() {

      count--;

      if (count < 1) {

        $(window).trigger('stopCountdown');

      } else {
        takePhotoCountdown.html(count);
      }

    };

    $(window).on('startCountdown', function() {

      takePhotoCountdown.html('');

      count = 1100;

      countdownInterval = setInterval(countdown, 1000);

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
