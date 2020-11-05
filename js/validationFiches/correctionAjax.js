/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function updateFraisForfait(){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('succesErreur').innerHTML = xhr.responseText;
            document.getElementById("succesErreur").style.display = "block";
        }
        setTimeout(cacheMessage, 5000);
    };
    xhr.open("post", "index.php?uc=rechercheFiche&action=corrigerFrais", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    let parametres = "ETP=" + document.getElementById('ETP').value;
    parametres += "&KM=" + document.getElementById('KM').value;
    parametres += "&NUI=" + document.getElementById('NUI').value;
    parametres += "&REP=" + document.getElementById('REP').value;
    xhr.send(parametres);
}

function cacheMessage(){
    document.getElementById("succesErreur").style.display = "none";
}

function activeBtnRecherche() {
    document.getElementById('btnRecherche').disabled = false;
    document.getElementById('btnRecherche').style.visibility = "visible";
    
}

let btnCorriger = document.getElementById('btnCorriger');
btnCorriger.addEventListener("click", updateFraisForfait, false);

document.getElementById('selectDate').addEventListener("change", activeBtnRecherche, false);