import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { TranslateLoader, TranslateModule, TranslateService } from '@ngx-translate/core';
import { HttpLoaderFactory } from '../banner/banner.component';

@Component({
  selector: 'app-block',
  standalone: true,
  imports: [TranslateModule],
  templateUrl: './block.component.html',
  styleUrl: './block.component.css',
  providers: [
    {
      provide: TranslateLoader,
      useFactory: HttpLoaderFactory,
      deps: [HttpClient]
    },
    TranslateService
  ]
})
export class BlockComponent {

}
