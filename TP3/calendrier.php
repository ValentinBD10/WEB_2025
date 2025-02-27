<?php
if (isset($_GET['user'])) {
    $USER = $_GET['user'];
} 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link href="calendrier.css" rel="stylesheet">
    <title>Calendrier</title>
</head>
<body>
    <header>
        <div class="navbarstyle">
            <a class="navbar-brand" href="modification.html"><i class="fa-solid fa-gear"></i></a>
            <a class="navbar-brand" href="deconnexion.php"><i class="fa-solid fa-power-off"></i></a>
        </div>
    </header>
    <section class="white-box">
        <h1 class="ChangeDateTitle" id="annee"></h1>
            <section class="grey-box">
                <div class="NavButtons">
                    <h1 class="PreviousMonth"><a href="precedent.php">Précédent</a></h1>
                    <h1 class="ActualMonth" id="mois"></h1>
                    <h1 class="NextMonth"><a href="suivant.php">Suivant</a></h1>
                </div>
                <div class="horizontalLine"></div>
                <script>
                    function afficherNumeroBouton(numero) {
                        // Crée une nouvelle page avec le numéro du bouton
                        
                        var nouvellePage = window.open("", "_blank");
                        nouvellePage.document.write("<h1>Vous avez réservé pour le " + numero + "</h1>");
                    }
                </script>
                <section class="Days">
                    <div class="Day">
                        <h1>Lundi</h1>
                        <button id="" onclick="afficherNumeroBouton(this.id)" class="Numero"></button>
                        <button id="7" onclick="afficherNumeroBouton(this.id)" class="Numero">7</button>
                        <button id="14" onclick="afficherNumeroBouton(this.id)" class="Numero">14</button>
                        <button id="21" onclick="afficherNumeroBouton(this.id)" class="Numero">21</button>
                        <button id="28" onclick="afficherNumeroBouton(this.id)" class="Numero">28</button>
                    </div>
                    <div class="Day">
                        <h1>Mardi</h1>
                        <button id="1" onclick="afficherNumeroBouton(this.id)" class="Numero">1</button>
                        <button id="8" onclick="afficherNumeroBouton(this.id)" class="Numero">8</button>
                        <button id="15" onclick="afficherNumeroBouton(this.id)" class="Numero">15</button>
                        <button id="22" onclick="afficherNumeroBouton(this.id)" class="Numero">22</button>
                        <button id="29" onclick="afficherNumeroBouton(this.id)" class="Numero">29</button>
                    </div>
                    <div class="Day">
                        <h1>Mercredi</h1>
                        <button id="2" onclick="afficherNumeroBouton(this.id)" class="Numero">2</button>
                        <button id="9" onclick="afficherNumeroBouton(this.id)" class="Numero">9</button>
                        <button id="16" onclick="afficherNumeroBouton(this.id)" class="Numero">16</button>
                        <button id="23" onclick="afficherNumeroBouton(this.id)" class="Numero">23</button>
                        <button id="30" onclick="afficherNumeroBouton(this.id)" class="Numero">30</button>
                    </div>
                    <div class="Day">
                        <h1>Jeudi</h1>
                        <button id="3" onclick="afficherNumeroBouton(this.id)" class="Numero">3</button>
                        <button id="10" onclick="afficherNumeroBouton(this.id)" class="Numero">10</button>
                        <button id="17" onclick="afficherNumeroBouton(this.id)" class="Numero">17</button>
                        <button id="24" onclick="afficherNumeroBouton(this.id)" class="Numero">24</button>
                        <button id="31" onclick="afficherNumeroBouton(this.id)" class="Numero">31</button>
                    </div>
                    <div class="Day">
                        <h1>Vendredi</h1>
                        <button id="4" onclick="afficherNumeroBouton(this.id)" class="Numero">4</button>
                        <button id="11" onclick="afficherNumeroBouton(this.id)" class="Numero">11</button>
                        <button id="18" onclick="afficherNumeroBouton(this.id)" class="Numero">18</button>
                        <button id="25" onclick="afficherNumeroBouton(this.id)" class="Numero">25</button>
                        <button id="" onclick="afficherNumeroBouton(this.id)" class="Numero"></button>
                    </div>
                    <div class="Day">
                        <h1>Samedi</h1>
                        <button id="5" onclick="afficherNumeroBouton(this.id)" class="Numero">5</button>
                        <button id="12" onclick="afficherNumeroBouton(this.id)" class="Numero">12</button>
                        <button id="19" onclick="afficherNumeroBouton(this.id)" class="Numero">19</button>
                        <button id="26" onclick="afficherNumeroBouton(this.id)" class="Numero">26</button>
                        <button id="" onclick="afficherNumeroBouton(this.id)" class="Numero"></button>
                    </div>
                    <div class="Day">
                        <h1>Dimanche</h1>
                        <button id="6" onclick="afficherNumeroBouton(this.id)" class="Numero">6</button>
                        <button id="13" onclick="afficherNumeroBouton(this.id)" class="Numero">13</button>
                        <button id="20" onclick="afficherNumeroBouton(this.id)" class="Numero">20</button>
                        <button id="27" onclick="afficherNumeroBouton(this.id)" class="Numero">27</button>
                        <button id="" onclick="afficherNumeroBouton(this.id)" class="Numero"></button>
                    </div>
                </section>
            </section>
    </section>
</body>
<script src="script.js"></script>
</html>