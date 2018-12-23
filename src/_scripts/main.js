// Main javascript entry point
// Should handle bootstrapping/starting application

'use strict';

import $ from 'jquery';

import Home from '../_modules/organisms/home/home';
import ChoosePast from '../_modules/organisms/choose-past/choose-past';
import ShowPhoto from '../_modules/organisms/show-photo/show-photo';
import SubmitPhoto from '../_modules/organisms/submit-photo/submit-photo';
import TakePhoto from '../_modules/organisms/take-photo/take-photo';
import ThankYou from '../_modules/organisms/thank-you/thank-you';

$(() => {

  // html2canvas(document.querySelector('.holdscreenshot')).then(canvas => {
  //   let base64string = getBase64FromCanvas(canvas);
  //
  //   let formdata = {
  //     'action': 'update_user_submissions',
  //     'panel': currentPanel,
  //     'email': emailValue,
  //     'image': base64string
  //   };
  //
  //   $.ajax({
  //     type: 'POST',
  //     dataType: 'text',
  //     url: evaair2018.ajaxurl,
  //     data: formdata,
  //     success: function success(data) {
  //       console.log(data);
  //     },
  //     error: function error(e) {
  //       console.log(e);
  //     }
  //   });
  // });

  new Home();
  new ChoosePast();
  new ShowPhoto();
  new SubmitPhoto();
  new TakePhoto();
  new ThankYou();

});
