"use strict";

// Slider 
export function createCarrousel(){
    console.log('Creating carousel...');

    const carrouselDiv = document.querySelector(".carrousel");
    const carrouselContainer = document.createElement("div");
    if (carrouselDiv.querySelector(".carrousel-container")) {
        return;
    }
    const images = ["./img/licorne.JPG", "./img/elephant.JPG", "./img/lapin.JPG", "./img/trapilho.JPG", "./img/trapilho2.JPG"];
    const dotsElements = [];
    const imagesElements = [];
    const divDot = document.createElement("div");
    divDot.classList.add("divDot");


        
        carrouselContainer.classList.add("carrousel-container");

        images.forEach((img, index) => {
        // console.log(img,index)
        const divImg = document.createElement("div")
        divImg.classList.add("slider-image", "fade");
        const image = document.createElement("img");
        image.src = img;
        divImg.style.display = index === 0 ? "block" : "none";
        divImg.append(image);
        const dot = document.createElement("button");
        dot.classList.add("dot");
        dot.dataset.id = index;
        dotsElements.push(dot);
        imagesElements.push(divImg);
        carrouselContainer.append(divImg);
    })
        imagesElements.forEach((imageElement) => carrouselContainer.append(imageElement));

        carrouselContainer.append(divDot);
        dotsElements.forEach((dotElement) =>divDot.append(dotElement));
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

    export function startSlider() {
        const sliderImages = document.querySelectorAll(".slider-image");
        // console.log(sliderImages);
        let currentIndex = 0; 

        function showImage(index) {
            sliderImages.forEach((image, i) => {
            // console.log('Showing image at index:', index);

                image.style.display = i === index ? "block" : "none";
                console.log(index, i);
            });
        }
        function showNextImage() {
            // console.log('Showing next image');
            currentIndex++ 
            if (currentIndex >= sliderImages.length) {
                currentIndex=0;
            }
            showImage(currentIndex);
        }

        function showPreviousImage() {
            // console.log('Showing previous image');
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
