const addAliasButtons = $('.btn-add-alias');

$.each(addAliasButtons, (key, alias) => {
  alias.addEventListener('click', () => {
    $('#aliasAnimeId').val(alias.id);
  })
})