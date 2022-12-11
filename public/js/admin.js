// Add
const addAliasButtons = $('.btn-add-alias');
const addGenreButtons = $('.btn-add-genre');
const addLicensorButtons = $('.btn-add-licensor');
const addProducerButtons = $('.btn-add-producer');
const addStudioButtons = $('.btn-add-studio');
setValue(addAliasButtons, $('#addAliasAnimeId'));
setValue(addGenreButtons, $('#addGenreAnimeId'));
setValue(addLicensorButtons, $('#addLicensorAnimeId'));
setValue(addProducerButtons, $('#addProducerAnimeId'));
setValue(addStudioButtons, $('#addStudioAnimeId'));

function setValue(button, input) {
  $.each(button, (key, value) => {
    value.addEventListener('click', () => {
      input.val(value.id);
    })
  })
}