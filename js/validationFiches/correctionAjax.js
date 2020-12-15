/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function updateFraisForfait() {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhr.responseText);
            if (xhr.responseText == "ErrCor") {
                document.getElementById("ErrCorr").style.display = "block";
            } else if (xhr.responseText == "ErrNum") {
                document.getElementById("ErrNum").style.display = "block";
            } else {
                document.getElementById('total').innerHTML = xhr.responseText;
                document.getElementById("succes").style.display = "block";
            }

        }
        //Active la fonction cacheMessage dans 5 secondes
        setTimeout(cacheMessage, 5000);
    };
    xhr.open("post", "index.php?uc=validerFrais&action=corrigerFrais", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    let parametres = "ETP=" + document.getElementById('ETP').value;
    parametres += "&KM=" + document.getElementById('KM').value;
    parametres += "&NUI=" + document.getElementById('NUI').value;
    parametres += "&REP=" + document.getElementById('REP').value;
    parametres += "&IDV=" + document.getElementById('idVehicule').value;
    xhr.send(parametres);
}

function cacheMessage() {
    document.getElementById("succes").style.display = "none";
    document.getElementById("ErrNum").style.display = "none";
    document.getElementById("ErrCor").style.display = "none";
}

function activeBtnRecherche() {
    document.getElementById('btnRecherche').disabled = false;
    document.getElementById('btnRecherche').style.visibility = "visible";

}

let btnCorriger = document.getElementById('btnCorriger');
btnCorriger.addEventListener("click", updateFraisForfait, false);

document.getElementById('selectDate').addEventListener("change", activeBtnRecherche, false);
