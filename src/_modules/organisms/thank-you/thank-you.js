'use strict';

import $ from 'jquery';
import { showPage, reset } from '../../../_scripts/_helper';

export default class ThankYou {
  constructor() {

    let restartBtn = $('.thank-you__restart');

    restartBtn.on('click touchstart', function() {

      reset();

    })

  }
}
