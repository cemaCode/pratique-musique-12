function toggleVisibility(id_block) {
    document.getElementById(id_block).classList.toggle("hide");
}

var slideIndex = [];
var arraySlides = document.getElementById("arraySlides");
var txt_slides = arraySlides.childNodes[0].textContent.trim();
var slideId = txt_slides.split(",").map(String);

for(let i = 0; i< slideId.length; i++){
    slideIndex[i]= 1;
    showSlides(1, i);
}

function plusSlides(n, no) {
    showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
    var i;
    var x = document.getElementsByClassName(slideId[no]);
    if (n > x.length) {slideIndex[no] = 1;}
    if (n < 1) {slideIndex[no] = x.length;}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex[no]-1].style.display = "block";
}