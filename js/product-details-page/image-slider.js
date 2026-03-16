const mainImage = document.getElementById("mainImage");
const thumbnails = document.querySelectorAll(".thumb");
const prev = document.querySelector(".prev");
const next = document.querySelector(".next");

let currentIndex = 0;

function updateImage(index){

  mainImage.src = thumbnails[index].src;

  thumbnails.forEach(t => t.classList.remove("active"));

  thumbnails[index].classList.add("active");

}

thumbnails.forEach((thumb, index) => {

  thumb.addEventListener("click", () => {

    currentIndex = index;
    updateImage(currentIndex);

  });

});

next.addEventListener("click", () => {

  currentIndex++;

  if(currentIndex >= thumbnails.length){
    currentIndex = 0;
  }

  updateImage(currentIndex);

});

prev.addEventListener("click", () => {

  currentIndex--;

  if(currentIndex < 0){
    currentIndex = thumbnails.length - 1;
  }

  updateImage(currentIndex);

});