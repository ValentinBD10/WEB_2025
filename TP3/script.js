function moisenlettre(mois){
    if(mois == 0){
        return "Janvier";
    }
    else if(mois == 1){
        return "Février";
    }
    else if(mois == 2){
        return "Mars";
    }
    else if(mois == 3){
        return "Avril";
    }
    else if(mois == 4){
        return "Mai";
    }
    else if(mois == 5){
        return "Juin";
    }
    else if(mois == 6){
        return "Juillet";
    }
    else if(mois == 7){
        return "Août";
    }
    else if(mois == 8){
        return "Septembre";
    }
    else if(mois == 9){
        return "Octobre";
    }
    else if(mois == 10){
        return "Novembre";
    }
    else if(mois == 11){
        return "Décembre";
    }
}
const aujourdHui = new Date();
const annee = aujourdHui.getFullYear();
const moisC = aujourdHui.getMonth();
const mois = moisenlettre(moisC);
document.getElementById("annee").innerText = annee;
document.getElementById("mois").innerText = mois;