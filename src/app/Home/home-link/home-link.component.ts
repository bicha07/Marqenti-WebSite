import { Component } from '@angular/core';
import { BannerComponent } from '../banner/banner.component';
import { CounterComponent } from '../counter/counter.component';
import { FooterComponent } from '../footer/footer.component';
import { HeaderComponent } from '../header/header.component';
import { PriceComponent } from '../price/price.component';
import { ServiceComponent } from '../service/service.component';
import { TestimonialComponent } from '../testimonial/testimonial.component';
import { AboutComponent } from '../about/about.component';
declare var WOW: any;

@Component({
    selector: 'app-home-link',
    standalone: true,
    templateUrl: './home-link.component.html',
    styleUrl: './home-link.component.css',
    imports: [HeaderComponent,AboutComponent, BannerComponent, ServiceComponent, CounterComponent, PriceComponent, TestimonialComponent, FooterComponent]
})
export class HomeLinkComponent {
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
