import { FirstAngAppPage } from './app.po';

describe('first-ang-app App', () => {
  let page: FirstAngAppPage;

  beforeEach(() => {
    page = new FirstAngAppPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
