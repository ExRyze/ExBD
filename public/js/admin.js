const addAliasButtons = $('.btn-add-alias');
const addGenreButtons = $('.btn-add-genre');

setValue(addAliasButtons, $('#aliasAnimeId'));
setValue(addGenreButtons, $('#genreAnimeId'));

function setValue(button, input) {
  $.each(button, (key, value) => {
    value.addEventListener('click', () => {
      input.val(value.id);
    })
  })
}