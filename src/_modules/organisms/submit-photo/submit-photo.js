'use strict';

import $ from 'jquery';

import { showPage, isValidEmail, getUrlParameter } from '../../../_scripts/_helper';

export default class SubmitPhoto {
  constructor() {

    let submitPhoto = $('.submit-photo'),
    thankYou = $('.thank-you'),
    tooltip = $('#tooltip'),
    base64string;


    $(window).on('showSubmissionForm', function() {
      // when submit-photo div is visible, assign base64 string

      base64string = submitPhoto.data('info');

    });

    $(window).trigger('submit');

    $(window).on('submit', function() {

      let userEmail = $('.keyboard__input').val(),
      currentPanel = getUrlParameter('panel') || 'noPanel';

      if (isValidEmail(userEmail)) {

        tooltip.removeClass('show');

        let formData = {
          'action': 'update_user_submissions',
          'panel': currentPanel,
          'email': userEmail,
          'image': base64string
        };

        console.log(formData);

        $.ajax({
          type: 'POST',
          dataType: 'text',
          url: amekgambar.ajaxurl,
          data: formData,
          success: function success(data) {

            console.log(data);

          },
          error: function error(e) {

            console.log('error');

          }
        });

        showPage(thankYou, '');

      } else {

        // show tooltip
        tooltip.addClass('show');

      }

    })

  }
}
