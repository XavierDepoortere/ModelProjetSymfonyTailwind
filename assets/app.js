/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.scss";

import "tw-elements";
// Sélectionnez le bouton du menu de l'utilisateur par son ID
const userMenuButton = document.getElementById("user-menu-button");

// Sélectionnez le menu déroulant par sa classe
const userMenu = document.getElementById("user-menu");

// Ajoutez un écouteur d'événements pour le clic sur le bouton du menu de l'utilisateur
userMenuButton.addEventListener("click", () => {
  // Basculez la classe "hidden" pour afficher ou masquer le menu
  userMenu.classList.toggle("hidden");
});
