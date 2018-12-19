'use strict';

import Home from '../home';

describe('Home View', function() {

  beforeEach(() => {
    this.home = new Home();
  });

  it('Should run a few assertions', () => {
    expect(this.home);
  });

});
