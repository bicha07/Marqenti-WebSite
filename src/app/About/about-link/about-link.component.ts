import { Component } from '@angular/core';
import { AboutAreaComponent } from '../about-area/about-area.component';
import { BannerAreaComponent } from '../banner-area/banner-area.component';
import { CounterAreaComponent } from '../counter-area/counter-area.component';
import { HistoryAreaComponent } from '../history-area/history-area.component';
import { SectionTeamComponent } from '../section-team/section-team.component';
import { HeaderComponent } from '../header/header.component';
import { FooterComponent } from '../../Home/footer/footer.component';
declare var WOW: any;




@Component({
    selector: 'app-about-link',
    standalone: true,
    templateUrl: './about-link.component.html',
    styleUrl: './about-link.component.css',
    imports: [AboutAreaComponent, BannerAreaComponent, HeaderComponent, CounterAreaComponent, HistoryAreaComponent, SectionTeamComponent, FooterComponent]
})
export class AboutLinkComponent {
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
