"use strict";

// Slider 

const carrouselDiv = document.querySelector(".carrousel");
const images = ["./img/licorne.JPG", "./img/elephant.JPG", "./img/lapin.JPG", "./img/trapilho.JPG", "./img/trapilho2.JPG"];
const dotsElements = [];
const imagesElements = [];

function createCarrousel() {
    const carrouselContainer = document.createElement("div");
    carrouselContainer.classList.add("carrousel-container");

    images.forEach((img, index) => {
    // console.log(img,index)
    const image = document.createElement("img");
    image.classList.add("slider-image");
    image.src = img;
    image.style.display = index === 0 ? "block" : "none";
    const dot = document.createElement("button");
    dot.classList.add("dot");
    dot.dataset.id = index;

    dotsElements.push(dot);
    imagesElements.push(image);
})
    imagesElements.forEach((imageElement) => carrouselContainer.append(imageElement));
    dotsElements.forEach((dotElement) =>carrouselContainer.append(dotElement));
    const next = document.createElement("a");
    next.classList.add("next");
    next.innerHTML = "&#10095;"
    
    const previous = document.createElement("a"); 
    previous.classList.add("previous");
    previous.innerHTML = "&#10094;"

    carrouselContainer.append(next);
    carrouselContainer.append(previous);
    carrouselDiv.append(carrouselContainer);

    startSlider();
}

function startSlider() {
    const sliderImages = document.querySelectorAll(".slider-image");
    // console.log(sliderImages);
    let currentIndex = 0; 

    function showImage(index) {
        sliderImages.forEach((image, i) => {
            image.style.display = i === index ? "block" : "none";
            console.log(index, i);
        });
    }
    function showNextImage() {
        currentIndex++ 
        if (currentIndex >= sliderImages.length) {
            currentIndex=0;
        }
        showImage(currentIndex);
    }

    function showPreviousImage() {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = sliderImages.length - 1;
        }
        showImage(currentIndex);
    }

    function showImageFromDots() {
        const dotIndex = parseInt(this.dataset.id);
        currentIndex = dotIndex;
        showImage(currentIndex);
    }
    

    const btnNext = document.querySelector(".next");
    btnNext.addEventListener("click", () => showNextImage());

    const btnPrevious = document.querySelector(".previous");
    btnPrevious.addEventListener("click", () => showPreviousImage());

    const dots = document.querySelectorAll(".dot");
    dots.forEach((dot) => {
        dot.addEventListener("click", showImageFromDots);
    });
}

// createCarrousel();

export default createCarrousel;