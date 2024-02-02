//verification des cookie
console.log("Cookie : " + localStorage.getItem("heures"));
console.log("Cookie 2 : " + localStorage.getItem("gc"));

//message d'alerte
let heures = localStorage.getItem("heures");
$(".alert.alert-info").text(`La taille du bloc cours va etre de ${heures} heures`);

//generation les options
let h = 8;
let h2 = parseInt(h)+parseInt(heures);
let m = 0;

//generation des options de bloc
let data_bloc = "00000000000000000000";
let taille_bloc = ""
for(let taille = parseInt(heures)*2;taille>0;taille--)
{
    taille_bloc += "1";
}

// Inspiration de :
//https://stackoverflow.com/questions/1431094/how-do-i-replace-a-character-at-a-particular-index-in-javascript
function replaceAt(mystring, index, replacement) {
    return mystring.substring(0, index) + replacement + mystring.substring(index + replacement.length);
}

//generation des options
for(let char = 0; char <= 20-taille_bloc.length; char++)
{
    let temp_data_bloc = data_bloc;
    temp_data_bloc = replaceAt(temp_data_bloc,char,taille_bloc);

    if(char !== 0)
    {
        m += 3;
        if (m === 6)
        {
            m = 0;
            h++;
            h2++;
        }
    }

    let str_option = `${h}:${m}0 - ${h2}:${m}0`;
    let option_html = `<option value="${temp_data_bloc}">${str_option}</option>`;
    $("#heures").append(option_html);
}

//ajout de la donnee dans l'input pour groupe cours
let input = $("input#groupe_cours_id");
let id = localStorage.getItem("gc");
input.attr("value", id);
