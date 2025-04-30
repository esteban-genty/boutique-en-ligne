
  document.addEventListener('DOMContentLoaded', () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.main-nav');

    burger.addEventListener('click', () => {
      nav.classList.toggle('open');
      burger.classList.toggle('active');
      burger.setAttribute('aria-expanded', burger.classList.contains('active'));
    });
  });

