'use strict';

import $ from 'jquery';
import html2canvas from 'html2canvas';

import { showPage, getBase64FromCanvas } from '../../../_scripts/_helper';

export default class ShowPhoto {
  constructor() {

    let showPhoto = $('.show-photo'),
    takePhoto = $('.take-photo'),
    showPhotoFrame = $('.show-photo__frame'),
    retakePhotoBtn = $('.show-photo__retake'),
    submitPhotoBtn = $('.show-photo__submit'),
    submitPhoto = $('.submit-photo');

    $(window).on('showPhoto', function() {

      // show container
      showPage(showPhoto, '');

      // hide all show-photo__frame
      showPhotoFrame.removeClass('show');

      $(`.show-photo__frame[data-show="${window.category}"]`).addClass('show');

    });


    retakePhotoBtn.on('click touchstart', function(event) {
      event.preventDefault();

      showPage(takePhoto, '');
      $(window).trigger('startCountdown');

    });

    submitPhotoBtn.on('click touchstart', function(event) {
      event.preventDefault();

      html2canvas(document.querySelector('.show-photo__container')).then(canvas => {

        let base64string = getBase64FromCanvas(canvas);

        showPage(submitPhoto, base64string);

        $(window).trigger('showSubmissionForm');

      });

    });



  }
}
