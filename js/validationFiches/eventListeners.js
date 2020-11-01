/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//let btnRecherche = document.getElementById('btnRecherche');
//btnRecherche.addEventListener('click', afficheFiche, false);

let inputVi = document.getElementById('idVi');
inputVi.addEventListener("change", chercheDates, false);

document.getElementById('selectDate').addEventListener("change", activeBtnRecherche, false);

//let btnCorriger = document.getElementById('btnCorriger');
//btnCorriger.addEventListener("click", updateFraisForfait, false);