let slideIndex = 0; 
const slides = document.querySelectorAll('.slide');
const duplicates = document.querySelectorAll('.duplicate');
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

    
    dots.forEach(dot => dot.classList.remove('active'));
    dots[slideIndex % dots.length].classList.add('active');
}

function plusSlides(n) {
    const totalSlides = slides.length;

    slideIndex += n;

    if (slideIndex < 0) {
        slideIndex = totalSlides - duplicates.length - 1;
    }

    if (slideIndex >= totalSlides - duplicates.length) {
        slideIndex = 0;
    }
    
    showSlides();
}

showSlides();
