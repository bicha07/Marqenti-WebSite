import { Component } from '@angular/core';
import { BannerComponent } from '../banner/banner.component';
import { HeaderComponent } from '../header/header.component';
import { FooterComponent } from '../../Home/footer/footer.component';
import { BlockComponent } from "../block/block.component";

@Component({
  selector: 'app-portfolio-link',
  standalone: true,
  imports: [BannerComponent, HeaderComponent, FooterComponent, BlockComponent],
  templateUrl: './portfolio-link.component.html',
  styleUrl: './portfolio-link.component.css'
})
export class PortfolioLinkComponent {
  
}
