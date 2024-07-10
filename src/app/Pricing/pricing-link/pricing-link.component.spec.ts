import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PricingLinkComponent } from './pricing-link.component';

describe('PricingLinkComponent', () => {
  let component: PricingLinkComponent;
  let fixture: ComponentFixture<PricingLinkComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PricingLinkComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(PricingLinkComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
