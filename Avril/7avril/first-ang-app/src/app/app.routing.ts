// Importer les class pour configurer les routes
import {ModuleWithProviders} from'@angular/core';
import { Routes, RouterModule} from '@angular/router';

// Importer les composants à afficher dans le routes

import {HomeComponent} from './components/home/home.component';
import {AboutComponent} from './components/about/about.component';
import {PortfolioComponent} from './components/portfolio/portfolio.component';
import {ContactsComponent} from './components/contacts/contacts.component';

// Définir les routes
const appRoute: Routes = [
    {
        path: '',
        component: HomeComponent
    },

    {
        path: 'about',        
        component: AboutComponent
    },

    {
        path: 'portfolio',        
        component: PortfolioComponent
    },

    {
        path: 'contacts',        
        component: ContactsComponent
    }
];

// Exporter la constante du routing
export const Router: ModuleWithProviders = RouterModule.forRoot(appRoute);




