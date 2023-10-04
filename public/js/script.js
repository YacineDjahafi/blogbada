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
let btnNewsletter = document.querySelector("#btnNewsletter");

function btnDisplay(){
    btnNewsletter.classList.remove("logoNewsletter");
    btnNewsletter.classList.add("btnHover");
    btnNewsletter.innerText= "Newsletter";
}
btnNewsletter.addEventListener("mouseover", btnDisplay)

});