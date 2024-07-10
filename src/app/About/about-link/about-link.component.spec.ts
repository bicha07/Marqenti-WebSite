import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutLinkComponent } from './about-link.component';

describe('AboutLinkComponent', () => {
  let component: AboutLinkComponent;
  let fixture: ComponentFixture<AboutLinkComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AboutLinkComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(AboutLinkComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
