let slideIndex = 0; 
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const slidesPerView = 3; 

function showSlides() {
    const totalSlides = slides.length;

    slides.forEach(slide => {
        slide.style.display = 'none';
    });

    for (let i = 0; i < slidesPerView; i++) {
        const indexToShow = (slideIndex + i) % totalSlides;
        slides[indexToShow].style.display = 'block';
    }


    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove('active');
    }
    dots[slideIndex].classList.add('active');
}


function plusSlides(n) {
    const totalSlides = slides.length;

    slideIndex = (slideIndex + n + totalSlides) % totalSlides; 
    
    showSlides();
}

showSlides();
