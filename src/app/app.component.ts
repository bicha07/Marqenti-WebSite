// app.component.ts
import { Component, Provider } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NavigationEnd, Router, RouterOutlet } from '@angular/router';
import { HomeLinkComponent } from './Home/home-link/home-link.component';
import { AboutLinkComponent } from './About/about-link/about-link.component';
import { ServicesLinkComponent } from './Service/services-link/services-link.component';
import { PricingLinkComponent } from './Pricing/pricing-link/pricing-link.component';
import { ContactLinkComponent } from './contact/contact-link/contact-link.component';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [
    RouterModule,
    CommonModule,
    RouterOutlet,
    HomeLinkComponent,
    AboutLinkComponent,
    ServicesLinkComponent,
    PricingLinkComponent,
    ContactLinkComponent,
    // ... autres composants que vous pourriez utiliser
  ],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
})
export class AppComponent {
  title = 'MQWS';
  constructor(private router: Router) {
    // Écouter les événements de fin de navigation
    this.router.events.subscribe((event) => {
      if (event instanceof NavigationEnd) {
        // Utiliser window.scrollTo pour déplacer le viewport en haut de la page
        window.scrollTo(0, 0);
      }
    });
  }
}
