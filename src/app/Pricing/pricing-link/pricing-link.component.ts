import { Component } from '@angular/core';
import { BannerComponent } from '../banner/banner.component';
import { FirstBComponent } from '../first-b/first-b.component';
import { HeaderComponent } from '../header/header.component';
import { FooterComponent } from '../../Home/footer/footer.component';
declare var WOW: any;



@Component({
  selector: 'app-pricing-link',
  standalone: true,
  imports: [BannerComponent,FirstBComponent,HeaderComponent,FooterComponent],
  templateUrl: './pricing-link.component.html',
  styleUrl: './pricing-link.component.css'
})
export class PricingLinkComponent {
  ngOnInit() {
    new WOW({
      boxClass:     'wow',      // default
      animateClass: 'animated', // default
      offset:       0,          // default
      mobile:       true,       // default
      live:         true        // default
    }).init();
  }
}
