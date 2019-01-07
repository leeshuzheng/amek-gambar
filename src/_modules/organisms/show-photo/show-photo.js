'use strict';

import $ from 'jquery';
import html2canvas from 'html2canvas';

import { showPage, getBase64FromCanvas, showLoader, hideLoader } from '../../../_scripts/_helper';

export default class ShowPhoto {
  constructor() {

    let showPhoto = $('.show-photo'),
    takePhoto = $('.take-photo'),
    showPhotoFrame = $('.show-photo__frame'),
    retakePhotoBtn = $('.show-photo__retake'),
    submitPhotoBtn = $('.show-photo__submit'),
    submitPhoto = $('.submit-photo'),
    base64string;

    $(window).on('showPhoto', function() {

      // show container
      showPage(showPhoto, '');

      // hide all show-photo__frame
      showPhotoFrame.removeClass('show');

      $(`.show-photo__frame[data-show="${window.category}"]`).addClass('show');

    });


    retakePhotoBtn.on('click touchstart', function(event) {
      event.preventDefault();

      showLoader();

      setTimeout(function() {

        hideLoader();

        showPage(takePhoto, '');
        $(window).trigger('startCountdown');
      }, 1000);

    });

    submitPhotoBtn.on('click touchstart', function(event) {
      event.preventDefault();

      showLoader();

      html2canvas(document.querySelector('.show-photo__container')).then(canvas => {

        base64string = getBase64FromCanvas(canvas);

      });

      setTimeout(function() {

        hideLoader();

        showPage(submitPhoto, base64string);

        $(window).trigger('showSubmissionForm');

      }, 1000);








    });



  }
}
