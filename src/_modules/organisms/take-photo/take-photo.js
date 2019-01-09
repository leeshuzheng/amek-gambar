'use strict';

import $ from 'jquery';
import Webcam from '../../../_scripts/webcam';

import { showPage } from '../../../_scripts/_helper';

export default class TakePhoto {
  constructor() {

    let takePhotoCountdown = $('.take-photo__countdown'),
    backBtn = $('.take-photo__back'),
    countdownInterval,
    count,
    audio = $('audio');


    backBtn.on('click touchstart', function(event) {
      event.preventDefault();

      showPage($('.choose-past'));

      clearInterval(countdownInterval);
    })

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

      count = 21;

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
