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

$('.modal-add [data-bs-dismiss=modal]').on('click', function (e) {
  var $t = $(this),
    target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

  $(target)
    .find("input,textarea,select")
      .val('')
      .end()
    .find("input[type=checkbox], input[type=radio]")
      .prop("checked", "")
      .end();
})