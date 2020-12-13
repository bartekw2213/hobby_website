const carousel1 = document.getElementById('carousel1')
const carousel2 = document.getElementById('carousel2')
const carousel3 = document.getElementById('carousel3')
const carouselBtn1 = document.getElementById('landingBtn1');
const carouselBtn2 = document.getElementById('landingBtn2');
const carouselBtn3 = document.getElementById('landingBtn3');
const carouselBtnArr = [carouselBtn1, carouselBtn2, carouselBtn3];

const landingDownArrows = document.getElementsByClassName('arrow');

carouselBtnArr.forEach(btn => {
    btn.addEventListener('click', () => {
        changeCarouselBtnStyle(btn)
        moveCarousel(btn)
    })
})

const changeCarouselBtnStyle = (btn) => {
    if(btn === carouselBtn1) carouselBtn1.style.backgroundColor = 'var(--light-maroon)';
    else carouselBtn1.style.backgroundColor = 'transparent';

    if(btn === carouselBtn2) carouselBtn2.style.backgroundColor = 'var(--light-maroon)';
    else carouselBtn2.style.backgroundColor = 'transparent';

    if(btn === carouselBtn3) carouselBtn3.style.backgroundColor = 'var(--light-maroon)';
    else carouselBtn3.style.backgroundColor = 'transparent';
}

const moveCarousel = (btn) => {
    if(btn === carouselBtn1) {
        carousel1.style.left = '0';
        carousel2.style.left = '100%';
        carousel3.style.left = '100%';
    } else if(btn === carouselBtn2) {
        carousel1.style.left = '-100%';
        carousel2.style.left = '0%';
        carousel3.style.left = '100%';
    } else if(btn === carouselBtn3) {
        carousel1.style.left = '-100%';
        carousel2.style.left = '-100%';
        carousel3.style.left = '0%';
    } 
}

 Array.from(landingDownArrows).forEach(arrow => {
     arrow.addEventListener('click', () => {
         window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' })
     })
 });