'use strict';

import $ from 'jquery';

import { showPage } from '../../../_scripts/_helper';

export default class SubmitPhoto {
  constructor() {

    let submitPhoto = $('.submit-photo'),
    base64string;


    $(window).on('showSubmissionForm', function() {

      base64string = submitPhoto.data('info');

    });


    let formData = {
      'action': 'update_user_submissions',
      // 'panel': currentPanel,
      // 'email': emailValue,
      'image': base64string
    };

    // $.ajax({
    //   type: 'POST',
    //   dataType: 'text',
    //   url: evaair2018.ajaxurl,
    //   data: formdata,
    //   success: function success(data) {
    //     console.log(data);
    //   },
    //   error: function error(e) {
    //     console.log(e);
    //   }
    // });

  }
}
