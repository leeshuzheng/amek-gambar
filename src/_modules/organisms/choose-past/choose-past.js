'use strict';

import $ from 'jquery';
import { showPage, initCamera, setGlobalCategory, showLoader, hideLoader } from '../../../_scripts/_helper';

export default class ChoosePast {
  constructor() {

    let choosePastEach = $('.choose-past__each'),
    takePhotoPage = $('.take-photo');

    choosePastEach.on('click touchstart', function() {

      showLoader();

      let category = $(this).data('category');

      initCamera(category);

      setTimeout(function() {

        hideLoader();

        showPage(takePhotoPage, '');

        $('.take-photo__frame').removeClass('show');
        $(`.take-photo__frame[data-show="${category}"]`).addClass('show');

        $('.take-photo__sample').removeClass('show');
        $(`.take-photo__sample[data-show="${category}"]`).addClass('show');

        setGlobalCategory(category);

        $(window).trigger('startCountdown');

      }, 1000);





    })

  }
}
