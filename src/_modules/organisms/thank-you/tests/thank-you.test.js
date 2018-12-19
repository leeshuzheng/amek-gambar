'use strict';

import ThankYou from '../thank-you';

describe('ThankYou View', function() {

  beforeEach(() => {
    this.thankYou = new ThankYou();
  });

  it('Should run a few assertions', () => {
    expect(this.thankYou);
  });

});
