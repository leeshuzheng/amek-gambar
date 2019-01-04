'use strict';

import $ from 'jquery';
import { showPage } from '../../../_scripts/_helper';

export default class Home {
  constructor() {

    let choosePast = $('.choose-past'),
    home = $('.home'),
    page = $('.page'),
    amekgambarHeader = $('.amek-gambar__header');

    home.on('click touchstart', function() {

      showPage(choosePast, '');
      amekgambarHeader.addClass('smaller');

    });


  }
}
