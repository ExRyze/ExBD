const addAliasButtons = $('.btn-add-alias');
const addGenreButtons = $('.btn-add-genre');
const addLicensorButtons = $('.btn-add-licensor');

setValue(addAliasButtons, $('#aliasAnimeId'));
setValue(addGenreButtons, $('#genreAnimeId'));
setValue(addLicensorButtons, $('#licensorAnimeId'));

function setValue(button, input) {
  $.each(button, (key, value) => {
    value.addEventListener('click', () => {
      input.val(value.id);
    })
  })
}