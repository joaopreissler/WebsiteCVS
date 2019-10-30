const slider = document.querySelector('.SliderContainer');
const sliderlImages = document.querySelectorAll('.slide img');

//buttons
const prevBtn = document.querySelector('#prevBtn');
const nextBtn = document.querySelector('#nextBtn');

//Counter
let counter = 1;
const size = sliderlImages[0].clientWidth;

slider.style.transform = 'translateX(' + (-size * counter) +'px)';

//button Listeners

nextBtn.addEventListener ('click',() =>{

  slider.style.transition = "transform 0.4s ease-in-out";
  counter++;
  slider.style.transform = 'translateX(' + (-slide * counter) + 'px)';
  });

  prevBtn.addEventListener('click', () =>{
    slider.style.transition = "transform 0.4s ease-in-out";
    counter--;
    slider.style.transform = 'tranlateX(' + (-size * counter) + 'px)';
  });
slider.addEventListener('transitionend', ()=>{
if(sliderlImages[counter].id === 'lastClone'){
    slider.style.transition = "transform 0.4s ease-in-out";
    counter = sliderlImages.length -2 ;
    slider.style.transform = 'tranlateX(' + (-size * counter) + 'px)';
    }
if(sliderlImages[counter].id === 'firstClone'){
    slider.style.transition = "transform 0.4s ease-in-out";
    counter = sliderlImages.length -2 ;
    slider.style.transform = 'tranlateX(' + (-size * counter) + 'px)';
        }
});
