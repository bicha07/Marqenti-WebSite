import { Component } from '@angular/core';
import { TranslateLoader, TranslateModule, TranslateService, TranslatePipe } from '@ngx-translate/core';
import { TranslateHttpLoader } from '@ngx-translate/http-loader';
import { HttpClient } from '@angular/common/http';

// La fonction HttpLoaderFactory pour la configuration du chemin des fichiers de traduction
export function HttpLoaderFactory(http: HttpClient) {
  return new TranslateHttpLoader(http, './assets/i18n/', '.json');
}

@Component({
  selector: 'app-first-b',
  standalone: true,
  imports: [TranslateModule],
  templateUrl: './first-b.component.html',
  styleUrl: './first-b.component.css',
  providers: [
   {
     provide: TranslateLoader,
     useFactory: HttpLoaderFactory,
     deps: [HttpClient]
   },
   TranslateService
 ]
})
export class FirstBComponent {
  constructor( private translate: TranslateService) {
    translate.setDefaultLang('en');
  }
}
