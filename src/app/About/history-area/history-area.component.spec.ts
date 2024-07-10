import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HistoryAreaComponent } from './history-area.component';

describe('HistoryAreaComponent', () => {
  let component: HistoryAreaComponent;
  let fixture: ComponentFixture<HistoryAreaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [HistoryAreaComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(HistoryAreaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
