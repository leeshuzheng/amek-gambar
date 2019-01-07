'use strict';

import $ from 'jquery';
import { showPage, showLoader, hideLoader } from '../../../_scripts/_helper';

export default class Home {
  constructor() {

    let choosePast = $('.choose-past'),
    homeButton = $('.home__button'),
    page = $('.page'),
    amekgambarHeader = $('.amek-gambar__header');

    homeButton.on('click touchstart', function() {

      showLoader();

      setTimeout(function() {

        showPage(choosePast, '');
        amekgambarHeader.addClass('smaller');

        hideLoader();

      }, 1000);

    });


  }
}
