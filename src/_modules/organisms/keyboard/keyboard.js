'use strict';

import $ from 'jquery';

export default class Keyboard {
  constructor() {
    let keyboard = $('.keyboard'),
      clearBtn = keyboard.find('.clear'),
      submitBtn = keyboard.find('.submit'),
      keyboardInput = $('.keyboard__input'),
      shift = false,
      capslock = false;

    submitBtn.on('click touchstart', function(event) {
      event.preventDefault();

      $(window).trigger('submit');
    });

    clearBtn.on('click touchstart', function(event) {
      event.preventDefault();

      keyboardInput.val('');
    });

    $('.keyboard__keys li').click(function() {

      let $this = $(this),
        character = $this.html(); // If it's a lowercase letter, nothing happens to this letiable

      // Shift keys
      if ($this.hasClass('left-shift') || $this.hasClass('right-shift')) {
        $('.letter').toggleClass('uppercase');
        $('.symbol span').toggle();

        shift = (shift === true) ? false : true;
        capslock = false;
        return false;
      }

      // Caps lock
      if ($this.hasClass('capslock')) {
        $('.letter').toggleClass('uppercase');
        capslock = true;
        return false;
      }

      // Delete
      if ($this.hasClass('delete')) {
        let html = keyboardInput.val();

        keyboardInput.val(html.substr(0, html.length - 1));
        return false;
      }

      // Special characters
      if ($this.hasClass('symbol')) character = $('span:visible', $this).html();
      if ($this.hasClass('space')) character = ' ';
      if ($this.hasClass('tab')) character = '\t';

      // Uppercase letter
      if ($this.hasClass('uppercase')) character = character.toUpperCase();

      // Remove shift once a key is clicked.
      if (shift === true) {
        $('.symbol span').toggle();
        if (capslock === false) $('.letter').toggleClass('uppercase');

        shift = false;
      }

      // Add the character
      keyboardInput.val(keyboardInput.val() + character);
    });
  }
}
