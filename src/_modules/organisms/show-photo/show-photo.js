'use strict';

import $ from 'jquery';
import { showPage } from '../../../_scripts/_helper';

export default class ShowPhoto {
  constructor() {

    let showPhoto = $('.show-photo'),
    showPhotoFrame = $('.show-photo__frame');

    $(window).on('showPhoto', function() {

      // show container
      showPage(showPhoto);

      // hide all show-photo__frame
      showPhotoFrame.removeClass('show');

      console.log(`window.category is ${window.category}`);

      $(`.show-photo__frame[data-show="${window.category}"]`).addClass('show');

    })
  }
}
