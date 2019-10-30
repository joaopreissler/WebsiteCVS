const navSlide = ()=> {
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.nav-links');
  const navLinks = document.querySelectorAll('.nav-links li');
//toggle Nav
  burger.addEventListener('click', () => {
    //toggle nav
    nav.classList.toggle('nav-active');

    //animate Links
    navLinks.forEach((link, index) => {
   if (link.style.animation){
     link.style.animation = '';
   }else {
     link.style.animation = `navlinkFade 0.5s ease forwards ${index/ 7 + 0.3}s`;
   }
  });
  //Burguer.animation
  burger.classList.toggle('toggle');
  });
  //Animate Links


}
navSlide();
