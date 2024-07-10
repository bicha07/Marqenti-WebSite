import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FirstBComponent } from './first-b.component';

describe('FirstBComponent', () => {
  let component: FirstBComponent;
  let fixture: ComponentFixture<FirstBComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [FirstBComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(FirstBComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
