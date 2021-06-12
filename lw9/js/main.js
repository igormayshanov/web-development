const maxSlide = 4;
const hiddenClass = 'hidden';
let slides;


initSlider = () => {
  let nextButton = document.getElementById('next_slide');
  let prevButton = document.getElementById('prev_slide');
  slides = document.getElementsByClassName('columns-item');

  prevButton.addEventListener('click', function (event) {
    event.preventDefault(); //предотвращаем стандартное поведение браузера
    prevSlide();
  }, false);
  nextButton.addEventListener('click', function (event) {
    event.preventDefault(); //предотвращаем стандартное поведение браузера
    nextSlide();
  }, false);

  for (let i = 0; i < slides.length; i++) {
    if (i > (maxSlide - 1) % slides.length) slides[i].classList.add(hiddenClass);
  }
}

function prevSlide() {
  let lastSlide = slides[slides.length - 1];
  let parentLastSlide = lastSlide.parentNode;

  parentLastSlide.removeChild(lastSlide);
  slides[0].before(lastSlide);
  slides = document.getElementsByClassName('columns-item');

  for (let i = 0; i < slides.length; i++) {
    if (i > (maxSlide - 1)) {
      slides[i].classList.add(hiddenClass);
    } else {
      slides[i].classList.remove(hiddenClass);
    }
  }
}

function nextSlide() {
  let firstSlide = slides[0];
  let parentFirstSlide = firstSlide.parentNode;

  parentFirstSlide.removeChild(firstSlide);
  slides[slides.length - 1].after(firstSlide);
  slides = document.getElementsByClassName('columns-item');

  for (let i = 0; i < slides.length; i++) {
    if (i > (maxSlide - 1)) {
      slides[i].classList.add(hiddenClass);
    } else {
      slides[i].classList.remove(hiddenClass);
    }
  }
}
window.onload = () => {  //  событие с докум, кот происходит после загрузки документа
  initSlider();
}