const flasher = document.querySelector('.flasher-close');

if(flasher != null) {
  flasher.addEventListener('click', () => {
    (document.querySelector('.flasher')).remove();
  })
}