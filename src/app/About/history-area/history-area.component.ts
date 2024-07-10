import { Component } from '@angular/core';
import { TranslateLoader, TranslateModule, TranslateService, TranslatePipe } from '@ngx-translate/core';
import { TranslateHttpLoader } from '@ngx-translate/http-loader';
import { HttpClient } from '@angular/common/http';

// La fonction HttpLoaderFactory pour la configuration du chemin des fichiers de traduction
export function HttpLoaderFactory(http: HttpClient) {
  return new TranslateHttpLoader(http, './assets/i18n/', '.json');
}

@Component({
  selector: 'app-history-area',
  standalone: true,
  imports: [TranslateModule],
  templateUrl: './history-area.component.html',
  styleUrl: './history-area.component.css',
  providers: [
    {
      provide: TranslateLoader,
      useFactory: HttpLoaderFactory,
      deps: [HttpClient]
    },
    TranslateService
  ]
})
export class HistoryAreaComponent {
  constructor( private translate: TranslateService) {
    translate.setDefaultLang('en');
  }
}
