'use strict';

import SubmitPhoto from '../submit-photo';

describe('SubmitPhoto View', function() {

  beforeEach(() => {
    this.submitPhoto = new SubmitPhoto();
  });

  it('Should run a few assertions', () => {
    expect(this.submitPhoto);
  });

});
