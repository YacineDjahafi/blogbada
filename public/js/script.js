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
           /*  hover.classList.remove("active");
            hover.classList.add(".unactive"); */
            btnVoirMoins.style.display = "none";
            btnVoirTout.style.display = "block";
        }
    }

    const hover = document.querySelectorAll(".hover");

    function hoverActive(event) {
        event.target.style.opacity = "1";
    }

    hover.forEach(function(hover){
        hover.addEventListener("mouseover", hoverActive)
        console.log("bonjour");
    });
 
        btnVoirTout.addEventListener("click", voirTout);
        btnVoirMoins.addEventListener("click", voirScroll);
   

}); 
   // TEST
  /*   function voirTout() {
            carousel.style.display = "none";
            spectacles.style.display = "block";
            btnVoirTout.style.display = "none";
            btnVoirMoins.style.display = "block";
        
    }
    function voirScroll() {
            spectacles.style.display = "none";
            carousel.style.display = "block";
            btnVoirMoins.style.display = "block";
            btnVoirTout.style.display = "none";
        
    } */
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