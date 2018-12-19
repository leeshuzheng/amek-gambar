'use strict';

import ShowPhoto from '../show-photo';

describe('ShowPhoto View', function() {

  beforeEach(() => {
    this.showPhoto = new ShowPhoto();
  });

  it('Should run a few assertions', () => {
    expect(this.showPhoto);
  });

});
