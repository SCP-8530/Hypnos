
/**
 * Le document qui suit sert a plusieurs truc dans la view groupe_cours.show
 *@author Guillaume Paoli
 * 1. analyser les blocs cours a generer
 * 2. confirmer que les bloc_cours ont été généré
 * 3. afficher ou non le bouton de création de bloc_cours
 * 4. traduire les donnés des bloc cours au lieu d'avoir des 0 et des 1
 */
//mettre les cookie a null
localStorage.setItem("gc", null);
localStorage.setItem("heures", null);

//recuperation de la donner importante de notre script
var code_bloc_cours = $(".LesBlocsCoursToGen i").text();

//traduction des blocs cours necessaire
var liste_bloc_cours = []
for(let char of code_bloc_cours)
{
    if(char !== "-") liste_bloc_cours.push(char);
}

//recuperer les carte des cours generer
var liste_card_cours = document.getElementsByClassName("card_cours");

//traduction des cartes
for(let carte of liste_card_cours)
{
    //changement du tag heures
    let nb_heures = 0;
    for(let char of carte.getAttribute("heures"))
    {
        if (char == 1) nb_heures += 0.5;
    }
    carte.setAttribute("heures", nb_heures);

    //changement du p pour les heures
    let heures = carte.querySelector('p.heures i');
    let h = 8;
    let m = 0;
    let z = 0;
    let start = "";
    let end = "";
    let result = "";

    for(let char of heures.textContent)
    {
        //detecter le debut du bloc
        if (char == 1)
        {
            if (start == "") start = h+":"+m+z;
        }

        //detecter la fin du bloc
        if (char == 0)
        {
            if (start != "")
            {
                end = h+":"+m+z;
                result = start + " - " + end;
                break
            }
        }

        //avance dans le temps
        m += 3;
        if (m == 6)
        {
            h += 1;
            m = 0;
        }
    }
    if (start != "")
    {
        if (end == "")
        {
            end = h+":"+m+z;
            result = start + " - " + end;
        }
    }
    heures.textContent = result;

    //changement du p pour les jours
    let jour = carte.querySelector('p.jour i')
    if (jour.textContent == 1)
    {
        jour.textContent = "Lundi";
    }
    if (jour.textContent == 2)
    {
        jour.textContent = "Mardi";
    }
    if (jour.textContent == 3)
    {
        jour.textContent = "Mercredi";
    }
    if (jour.textContent == 4)
    {
        jour.textContent = "Jeudi";
    }
    if (jour.textContent == 5)
    {
        jour.textContent = "Vendredi";
    }
}

//retirer les cours dans la liste
for(let carte of liste_card_cours)
{
    let h = carte.getAttribute("heures")
    liste_bloc_cours = liste_bloc_cours.filter(e => e !== h)
}

//gestion du bouton
$("#btn_bloc_cours").show();
document.addEventListener("click", function (event) {
    if (event.target.id !== "btn_bloc_cours") return;

    localStorage.setItem("heures", liste_bloc_cours[0]);
    localStorage.setItem("gc", $("#gc_id i").text());

    if (liste_bloc_cours==null) $("#btn_bloc_cours").hide();

}, false);

/**
 * Ensemble des tests
 */
console.log("code_bloc_cours : " + code_bloc_cours);
console.log("liste_bloc_cours : " + liste_bloc_cours);
console.log("liste_card_cours : " + liste_card_cours);
console.log("Premier element : " + liste_bloc_cours[0]);
console.log("Cookie : " + localStorage.getItem("heures"));
console.log("Cookie 2 : " + localStorage.getItem("gc"));
