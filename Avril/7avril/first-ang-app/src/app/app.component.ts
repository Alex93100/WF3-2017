// Importer la class Component 
import { Component, OnInit } from '@angular/core';

// Importer la class Router
import {Router} from '@angular/router';

/**************************************************************/ 


// Définir le décorateur @Component({...})
  @Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
  })

  // Exporter la class du composant
  export class AppComponent implements OnInit {

    // initier le router dans le constructeur du composant
    constructor(
      private router: Router
    ){}
    
    private burgerIsOpen = false;

    // Créer une fonction à appeler au click sur .fa-bars
    openBurger(){
      if(this.burgerIsOpen == false){

        // Changer la valeur de burgerIsOpen
        this.burgerIsOpen = true;
      }
      else{
        // Changer la valeur de burgerIsOpen
        this.burgerIsOpen = false;
      };

    };

    // Créer une fonction pour fermer le burger menu
    closeBurger(link){

      // Fermer le burger menu
      this.burgerIsOpen = false;

      // Naviguer vers la bonne vue
      this.router.navigate([link]);

    }

    // Attendre le chargement du composant
    ngOnInit(){
      console.log('Le composant est chargé');
      
      // Créer une variable pour sdélectionner le loader en JS
      let loader = document.getElementById('appLoader');

      // Ajouter la class closedLoader à la balise
      loader.classList.add('closedLoader');

    };
  }
