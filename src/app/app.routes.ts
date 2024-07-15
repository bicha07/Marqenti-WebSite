// app.routes.ts
import { RouterModule, Routes, provideRouter } from '@angular/router';
import { HomeLinkComponent } from './Home/home-link/home-link.component';
import { AboutLinkComponent } from './About/about-link/about-link.component';
import { ServicesLinkComponent } from './Service/services-link/services-link.component';
import { PricingLinkComponent } from './Pricing/pricing-link/pricing-link.component';
import { ContactLinkComponent } from './contact/contact-link/contact-link.component';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PortfolioLinkComponent } from './Portfolio/portfolio-link/portfolio-link.component';



export const routes: Routes = [
  { path: '', component: HomeLinkComponent },
  { path: 'home', component: HomeLinkComponent },
  { path: 'about', component: AboutLinkComponent },
  { path: 'service', component: ServicesLinkComponent },
  { path: 'pricing', component: PricingLinkComponent },
  { path: 'contact', component: ContactLinkComponent },
  { path: 'portfolio', component: PortfolioLinkComponent },

  // ... autres chemins
];
@NgModule({
    imports: [
      RouterModule.forRoot(routes, {
      scrollPositionRestoration: 'enabled'  // active le défilement automatique en haut de la page
    }),
    CommonModule  
      ],
    exports: [RouterModule]
  })

  export class AppRoutingModule { }
