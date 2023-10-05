document.addEventListener("DOMContentLoaded", function() {
    const allArticles = document.querySelector("#container");
    const btnVoirTout = document.querySelector(".btn-voirTout");
    const btnVoirMoins = document.querySelector(".btn-voirMoins");

    function voirTout() {
        if (allArticles) {
            allArticles.classList.remove("articleContainer");
            allArticles.classList.add("voirTout");
            btnVoirTout.style.display = "none";
            btnVoirMoins.style.display = "block";
        }
    }

    function voirScroll() {
        if (allArticles) {
            allArticles.classList.remove("voirTout");
            allArticles.classList.add("articleContainer");
            btnVoirMoins.style.display = "none";
            btnVoirTout.style.display = "block";
        }
    }

        btnVoirTout.addEventListener("click", voirTout);
        btnVoirMoins.addEventListener("click", voirScroll);
   


// Newsletter
/* let btnNewsletter = document.querySelector("#btnNewsletter");
let formNewsletter = document.querySelector(".formNewsletter");

function btnDisplay(){
    btnNewsletter.classList.remove("logoNewsletter");
    btnNewsletter.classList.add("btnHover");
    if (btnNewsletter){
        btnNewsletter.innerText= "Newsletter";
    }
}

function logoNewsletter(){
    btnNewsletter.classList.remove("btnHover");
    btnNewsletter.classList.add("logoNewsletter");
    if (btnNewsletter){
        btnNewsletter.innerText= "N";
    }
}

function formDisplay(){
    formNewsletter.style.display = "block";
}

btnNewsletter.addEventListener("mouseover", btnDisplay);
btnNewsletter.addEventListener("mouseout", logoNewsletter);
btnNewsletter.addEventListener("onclick", formDisplay);
*/
}); 