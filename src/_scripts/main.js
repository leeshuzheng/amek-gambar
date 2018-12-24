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
import Keyboard from '../_modules/organisms/keyboard/keyboard';

$(() => {

  new Home();
  new ChoosePast();
  new ShowPhoto();
  new SubmitPhoto();
  new TakePhoto();
  new ThankYou();
  new Keyboard();

});
