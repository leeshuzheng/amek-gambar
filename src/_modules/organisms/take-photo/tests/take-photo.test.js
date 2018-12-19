'use strict';

import TakePhoto from '../take-photo';

describe('TakePhoto View', function() {

  beforeEach(() => {
    this.takePhoto = new TakePhoto();
  });

  it('Should run a few assertions', () => {
    expect(this.takePhoto);
  });

});
