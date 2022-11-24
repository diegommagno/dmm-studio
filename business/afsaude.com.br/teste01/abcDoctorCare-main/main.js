const navigation = document.querySelector('#navigation');
const backToTopButton = document.querySelector('#backToTopButton');

window.addEventListener('scroll', onScroll)

function onScroll() {
  showNavOnScroll();
  showBackToTopButton();

  activateMenuAtCurrentSection(home);
  activateMenuAtCurrentSection(services);
  activateMenuAtCurrentSection(about);
  activateMenuAtCurrentSection(contact);

}
onScroll()


function activateMenuAtCurrentSection(section) {
  const targetLine = scrollY + innerHeight / 2;

  // Verificar se a seção passou da linha?
  // Quais dados vou precisar?
  const sectionTop = section.offsetTop;
  const sectionHeight = section.offsetHeight;

  // O topo da seção chegou ou ultrapassou a linha alvo
  const sectionTopReachOrPassedTargedLine = targetLine >= sectionTop;

  // Verificar se a vase está abaixo da linha alvo
  // Quais dados vou precisar

  // A seção termina onde?
  const sectionEndsAt = sectionTop + sectionHeight;

  const sectionEndPassedTargetLine = sectionEndsAt <= targetLine;

  // Limites da seção
  const sectionBoundaries = sectionTopReachOrPassedTargedLine && !sectionEndPassedTargetLine;

  const sectionId = section.getAttribute('id');
  const menuElement = document.querySelector(`.menu a[href*=${sectionId}]`);

  menuElement.classList.remove('active');
  if(sectionBoundaries) {
    menuElement.classList.add('active')
  }
}

function showNavOnScroll() {
  if (scrollY > 0) {
    navigation.classList.add('scroll')
  } else {
    navigation.classList.remove('scroll')
  }
}

function showBackToTopButton() {
  if (scrollY > 400) {
    backToTopButton.classList.add('show')
  } else {
    backToTopButton.classList.remove('show')
  }
}

function openMenu() {
  document.body.classList.add('menu-expanded');
}

function closeMenu() {
  document.body.classList.remove('menu-expanded');
}

ScrollReveal({
  origin: 'top',
  distance: '30px',
  duration: 700,
}).reveal(`
  #home, #home img, #home .stats,
  #services, #services header, #services .card,
  #about, #about header, #about .content,
  #contact, #contact header, #contact .content`);
