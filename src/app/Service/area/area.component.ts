import { Component } from '@angular/core';
import { TranslateLoader, TranslateModule, TranslateService, TranslatePipe } from '@ngx-translate/core';
import { TranslateHttpLoader } from '@ngx-translate/http-loader';
import { HttpClient } from '@angular/common/http';

// La fonction HttpLoaderFactory pour la configuration du chemin des fichiers de traduction
export function HttpLoaderFactory(http: HttpClient) {
  return new TranslateHttpLoader(http, './assets/i18n/', '.json');
}


@Component({
  selector: 'app-area',
  standalone: true,
  imports: [TranslateModule],
  templateUrl: './area.component.html',
  styleUrl: './area.component.css',
   providers: [
    {
      provide: TranslateLoader,
      useFactory: HttpLoaderFactory,
      deps: [HttpClient]
    },
    TranslateService
  ]
})
export class AreaComponent {
  constructor( private translate: TranslateService) {
    translate.setDefaultLang('en');
  }
}
