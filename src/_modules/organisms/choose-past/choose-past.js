'use strict';

import $ from 'jquery';
// import Webcam from '../../../_scripts/webcam.min';
import { showPage, initCamera } from '../../../_scripts/_helper';

export default class ChoosePast {
  constructor() {

    let choosePastEach = $('.choose-past__each'),
    takePhotoPage = $('.take-photo');

    choosePastEach.on('click touchstart', function() {

      // .take-photo__frame

      let category = $(this).data('category');

      showPage(takePhotoPage);

      $('.take-photo__frame').removeClass('show');
      $(`.take-photo__frame[data-show="${category}"]`).addClass('show');

      initCamera();

    })

  }
}
