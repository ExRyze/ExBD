const addAliasButtons = $('.btn-add-alias');
const addGenreButtons = $('.btn-add-genre');
const addLicensorButtons = $('.btn-add-licensor');
const addProducerButtons = $('.btn-add-producer');
const addStudioButtons = $('.btn-add-studio');

setValue(addAliasButtons, $('#aliasAnimeId'));
setValue(addGenreButtons, $('#genreAnimeId'));
setValue(addLicensorButtons, $('#licensorAnimeId'));
setValue(addProducerButtons, $('#producerAnimeId'));
setValue(addStudioButtons, $('#studioAnimeId'));

function setValue(button, input) {
  $.each(button, (key, value) => {
    value.addEventListener('click', () => {
      input.val(value.id);
    })
  })
}