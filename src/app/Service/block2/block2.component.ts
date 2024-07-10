import { Component } from '@angular/core';
import { TranslateLoader, TranslateModule, TranslateService, TranslatePipe } from '@ngx-translate/core';
import { TranslateHttpLoader } from '@ngx-translate/http-loader';
import { HttpClient } from '@angular/common/http';

// La fonction HttpLoaderFactory pour la configuration du chemin des fichiers de traduction
export function HttpLoaderFactory(http: HttpClient) {
  return new TranslateHttpLoader(http, './assets/i18n/', '.json');
}
@Component({
  selector: 'app-block2',
  standalone: true,
  imports: [TranslateModule],
  templateUrl: './block2.component.html',
  styleUrl: './block2.component.css',
  providers: [
   {
     provide: TranslateLoader,
     useFactory: HttpLoaderFactory,
     deps: [HttpClient]
   },
   TranslateService
 ]
})
export class Block2Component {
  constructor( private translate: TranslateService) {
    translate.setDefaultLang('en');
  }
}
