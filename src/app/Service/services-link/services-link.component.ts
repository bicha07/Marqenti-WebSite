import { Component } from '@angular/core';
import { AreaComponent } from '../area/area.component'; 
import { BannerComponent } from '../banner/banner.component';
import { Block2Component } from '../block2/block2.component';
import { Block3Component } from '../block3/block3.component';
import { HeaderComponent } from '../header/header.component';
import { PartnersComponent } from '../partners/partners.component';
import { FooterComponent } from '../../Home/footer/footer.component';
declare var WOW: any;

@Component({
  selector: 'app-services-link',
  standalone: true,
  imports: [AreaComponent,BannerComponent,FooterComponent,Block2Component,Block3Component,HeaderComponent,PartnersComponent],
  templateUrl: './services-link.component.html',
  styleUrl: './services-link.component.css'
})
export class ServicesLinkComponent {
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
