import { Component } from '@angular/core';
import { BannerComponent } from '../banner/banner.component'; 
import { HeaderComponent } from '../header/header.component';
import { FormComponent } from '../form/form.component';
import { FooterComponent } from "../../Home/footer/footer.component";
declare var WOW: any;




@Component({
    selector: 'app-contact-link',
    standalone: true,
    templateUrl: './contact-link.component.html',
    styleUrl: './contact-link.component.css',
    imports: [BannerComponent, HeaderComponent, FormComponent, FooterComponent]
})
export class ContactLinkComponent {
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
