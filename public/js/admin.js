// Add
const addAlias = $('.btn-add-alias');
setValue(addAlias, $('#addAliasAnimeId'));

const linkGenre = $('.btn-link-genre');
const linkTheme = $('.btn-link-theme');
const linkLicensor = $('.btn-link-licensor');
const linkProducer = $('.btn-link-producer');
const linkStudio = $('.btn-link-studio');

setValue(linkGenre, $('#linkGenreAnimeId'));
setValue(linkTheme, $('#linkThemeAnimeId'));
setValue(linkLicensor, $('#linkLicensorAnimeId'));
setValue(linkProducer, $('#linkProducerAnimeId'));
setValue(linkStudio, $('#linkStudioAnimeId'));

setValue(linkGenre, $('#addGenreAnimeId'));
setValue(linkTheme, $('#addThemeAnimeId'));
setValue(linkLicensor, $('#addLicensorAnimeId'));
setValue(linkProducer, $('#addProducerAnimeId'));
setValue(linkStudio, $('#addStudioAnimeId'));

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