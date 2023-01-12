// Add
const BASE_URL = '/portofolio/ExBD';

class Modal {

  modal = {
    form: $('#modal form'),
    head: $('#modal form .modal-header h5'),
    body: $('#modal form .modal-body')
  }

  constructor() {
    $.each($(".btn[data-bs-toggle='modal']"), (key, value) => {
      value.addEventListener('click', () => {
        let datas = {
          anime: ($(value).attr('anime') != undefined) ? JSON.parse($(value).attr('anime').replaceAll("`", '"')) : undefined,
          uid: $(value).attr('uid'),
          id: $(value).attr('id'),
          title: $(value).attr('title'),
          key: $(value).attr('key'),
          url: $(value).attr('url'),
        }
        this.route(datas);
      })
    })
  }

  route(datas) {
    (this.modal.foot != undefined) ? '' : this.modal.form.append(`<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>`);
    this.modal.foot = $('#modal form .modal-footer');
    switch (datas.url) {
      case 'Admin':
        switch (datas.key) {
          case 'add':
            this.modal.form.attr('action', BASE_URL+'/register/admin');
            this.modal.head.text('Add Admin');
            this.modal.body.html(`
            <input type="hidden" name="role" value="Admin">
            <div class="form-group mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            `);
          break;
        }
        break;
      case 'Anime':
        switch (datas.key) {
          case 'add':
            this.modal.form.attr('action', BASE_URL+'/animes/store');
            this.modal.head.text('Add Anime');
            this.modal.body.html(`
            <input type="hidden" name="id_user" value="${datas.uid}">
            <div class="form-group mb-3">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Title..." required>
            </div>
            <div class="form-group mb-3">
              <label for="episodes">Episodes</label>
              <input type="number" class="form-control" name="episodes" id="episodes" min="0" value="0">
            </div>
            <div class="form-group mb-3">
              <label for="status">Status</label>
              <select class="form-select" name="status" id="status" required>
                <option value="" selected disabled hidden>Status</option>
                <option value="Not yet aired">Not yet aired</option>
                <option value="Currently aired">Currently aired</option>
                <option value="Finished airing">Finished airing</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="tipe">Type</label>
              <select class="form-select" name="tipe" id="tipe" required>
                <option value="" selected disabled hidden>Type</option>
                <option value="TV">TV</option>
                <option value="BD">BD</option>
                <option value="OVA">OVA</option>
                <option value="ONA">ONA</option>
                <option value="OAD">OAD</option>
                <option value="Movie">Movie</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="aired">Date Aired</label>
              <input class="form-control" type="date" name="aired" id="aired">
            </div>
            <div class="form-group">
              <label for="finished">Date Finished</label>
              <input class="form-control" type="date" name="finished" id="finished">
            </div>
            `);
            break;
          case 'edit':
            this.modal.form.attr('action', BASE_URL+'/animes/update');
            this.modal.head.text('Edit Anime');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.anime.title}</h6>
            <input type="hidden" name="id_user" value="${datas.uid}">
            <input type="hidden" name="id" value="${datas.anime.id}">
            <div class="form-group mb-3">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Title..." value="${datas.anime.title}" required>
            </div>
            <div class="form-group mb-3">
              <label for="episodes">Episodes</label>
              <input type="number" class="form-control" name="episodes" id="episodes" min="0" value="${datas.anime.episodes}">
            </div>
            <div class="form-group mb-3">
              <label for="status">Status</label>
              <select class="form-select" name="status" id="status" required>
                <option value="Not yet aired" ${(datas.anime.status === 'Not yet aired') ? 'selected' : ''}>Not yet aired</option>
                <option value="Currently aired" ${(datas.anime.status === 'Currently aired') ? 'selected' : ''}>Currently aired</option>
                <option value="Finished airing" ${(datas.anime.status === 'Finished airing') ? 'selected' : ''}>Finished airing</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="tipe">Type</label>
              <select class="form-select" name="tipe" id="tipe" required>
                <option value="TV" ${(datas.anime.type === 'TV') ? 'selected' : ''}>TV</option>
                <option value="BD" ${(datas.anime.type === 'BD') ? 'selected' : ''}>BD</option>
                <option value="OVA" ${(datas.anime.type === 'OVA') ? 'selected' : ''}>OVA</option>
                <option value="ONA" ${(datas.anime.type === 'ONA') ? 'selected' : ''}>ONA</option>
                <option value="OAD" ${(datas.anime.type === 'OAD') ? 'selected' : ''}>OAD</option>
                <option value="Movie" ${(datas.anime.type === 'Movie') ? 'selected' : ''}>Movie</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="aired">Date Aired</label>
              <input class="form-control" type="date" name="aired" id="aired" value="${datas.anime.aired}">
            </div>
            <div class="form-group">
              <label for="finished">Date Finished</label>
              <input class="form-control" type="date" name="finished" id="finished" value="${datas.anime.finished}">
            </div>
            `);
            break;
        }
        break;
      case 'Video':
        switch (datas.key) {
          case 'add':
            this.modal.form.attr('action', BASE_URL+'/admin/addAnimePart/Videos');
            this.modal.head.text('Add Video');
            this.modal.body.html(`
            <input type="hidden" name="status" id="status" value="${datas.id}" required>
            <div class="form-group mb-3">
              <label for="id">Anime</label>
              <select class="form-select" name="id" id="id" required>
                <option value="" selected hidden disabled>Select Anime</option>
              </select>
            </div>
            <div class="form-group mb-3">
                <label for="source" class="form-label">Source videos</label>
                <input type="text" name="source" id="source" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="type" class="form-label">Type videos</label>
                <input type="text" name="type" id="type" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="resolution" class="form-label">Resolution videos</label>
                <input type="text" name="resolution" id="resolution" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="tracks" class="form-label">Video tracks</label>
                <input type="text" name="tracks" id="tracks" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="chapter" class="form-label">Chapters</label>
                <input type="text" name="chapter" id="chapter" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="audio" class="form-label">Audio tracks</label>
                <input type="text" name="audio" id="audio" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="subtitle" class="form-label">Subtitles</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="errors" class="form-label">Additional errors</label>
                <textarea name="errors" id="errors" class="col-12"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="values" class="form-label">Additional values</label>
                <textarea name="values" id="values" class="col-12"></textarea>
            </div>
            `);
            $.each(datas.anime, (key, anime) => {
              this.modal.body.find('select#id').append(`<option value='${anime['id']}'>${anime['title']}</option>`); })
            break;
          case 'edit':
            this.modal.form.attr('action', BASE_URL+'/admin/editAnimePart/Videos');
            this.modal.head.text('Edit Video');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.anime['title']}</h6>
            <input type="hidden" name="status" id="status" value="${datas.id}" required>
            <div class="form-group mb-3">
              <label for="id">Anime</label>
              <select class="form-select" name="id" id="id" required>
                <option value="${datas.anime['id']}" selected>${datas.anime['title']}</option>
              </select>
            </div>
            <div class="form-group mb-3">
                <label for="source" class="form-label">Source videos</label>
                <input type="text" name="source" id="source" class="form-control" value="${datas.anime['source_videos']}" required>
            </div>
            <div class="form-group mb-3">
                <label for="type" class="form-label">Type videos</label>
                <input type="text" name="type" id="type" class="form-control" value="${datas.anime['type_videos']}" required>
            </div>
            <div class="form-group mb-3">
                <label for="resolution" class="form-label">Resolution videos</label>
                <input type="text" name="resolution" id="resolution" class="form-control" value="${datas.anime['resolution_videos']}" required>
            </div>
            <div class="form-group mb-3">
                <label for="tracks" class="form-label">Video tracks</label>
                <input type="text" name="tracks" id="tracks" class="form-control" value="${datas.anime['tracks_videos']}" required>
            </div>
            <div class="form-group mb-3">
                <label for="chapter" class="form-label">Chapters</label>
                <input type="text" name="chapter" id="chapter" class="form-control" value="${datas.anime['chapters_videos']}" required>
            </div>
            <div class="form-group mb-3">
                <label for="audio" class="form-label">Audio tracks</label>
                <input type="text" name="audio" id="audio" class="form-control" value="${datas.anime['tracks_audios']}" required>
            </div>
            <div class="form-group mb-3">
                <label for="subtitle" class="form-label">Subtitles</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" value="${datas.anime['subtitles_videos']}" required>
            </div>
            <div class="form-group mb-3">
                <label for="errors" class="form-label">Additional errors</label>
                <textarea name="errors" id="errors" class="col-12">${datas.anime['additional_errors']}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="values" class="form-label">Additional values</label>
                <textarea name="values" id="values" class="col-12">${datas.anime['additional_values']}</textarea>
            </div>
            `);
            break;
          case 'generate':
            this.modal.head.text('Generate Title');
            this.modal.body.html(`<h6 class="text-muted text-center">${datas.anime['title']}</h6>`);
            if(datas.anime['title'].includes(':')) {datas.anime['title'] = datas.anime['title'].replaceAll(':', '-')}
            if(datas.anime['title'].includes('?')) {datas.anime['title'] = datas.anime['title'].replaceAll('?', '@')}
            datas.string = datas.anime['title'];
            if(datas.anime['type'] === 'Movie') {datas.string += ' – '}
            if(datas.anime['type'] != 'Movie' && datas.anime['episodes'] === 1) {datas.string += ' – '}
            if(datas.anime['type'] != 'Movie' && datas.anime['episodes'] != 1) {datas.string += ' Episode 0 – '}
            datas.string += datas.anime['source_videos']+' '+datas.anime['type']+' '+datas.anime['resolution_videos']+'.'+datas.anime['type_videos'];
            this.modal.body.append(`
            <div class="form-group mb-3">
              <label for="folder">Folder</label>
              <input class="form-control" type="text" value="${datas.anime['title']}" readonly>
            </div>
            <div class="form-group mb-3">
              <label for="folder">File</label>
              <input class="form-control" type="text" value="${datas.string}" readonly>
            </div>
            `)
            break;
        }
        break;
      case 'Alias':
        switch (datas.key) {
          case 'add':
            this.modal.form.attr('action', BASE_URL+'/admin/addAnimePart/aliases');
            this.modal.head.text('Add Alias');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="mb-3">
              <label for="origin" class="form-label">Origin alias</label>
              <input type="text" name="origin" id="origin" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="alias" class="form-label">Anime alias</label>
              <input type="text" name="alias" id="alias" class="form-control" required>
            </div>
            `);
            break;
          case 'edit':
            this.modal.foot.remove();
            this.modal.foot = undefined;
            this.modal.head.text('Edit Alias');
            this.modal.body.html(`<h6 class="text-muted text-center">${datas.title}</h6>`);
            $.each(datas.anime, (key, alias) => {
              this.modal.body.append(`
              <form action="${BASE_URL+'/admin/deleteAnimePart/aliases'}" method="post" class="mb-3">
                <input type="hidden" name="id" value="${datas.id}">
                <label class="form-label" for="alias">${alias['origin_alias']}</label>
                <input type="hidden" name="origin" value="${alias['origin_alias']}">
                <div class="d-flex gap-3 align-items-center">
                  <input type="text" name="alias" id="alias" class="form-control" value="${alias['anime_alias']}" readonly>
                  <button type="submit" class="btn-close"></button>
                </div>
              </form>
              `);
            })
            break;
        }
        break;
      case 'Genre':
        switch (datas.key) {
          case 'new':
            this.modal.form.attr('action', BASE_URL+'/admin/addPartsAnimePart/genres');
            this.modal.head.text('New Genre');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group">
              <label class="form-label" for='genre'>Genre</label>
              <input type="text" name='genre' id='genre' class="form-control">
            </div>
            `);
            break;
          case 'add':
            this.modal.form.attr('action', BASE_URL+'/admin/addAnimePart/genres');
            this.modal.head.text('Add Genre');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group mb-2">
              <label for="genre">Genre</label>
              <select class="form-select" name="genre" id="genre" required>
                <option value="" selected hidden disabled>Select genre</option>
              </select>
            </div>
            `);
            $.each(datas.anime, (key, genre) => {
              this.modal.body.find('select').append(`<option value="${genre['id']}">${genre['genre']}</option>`); })
            break;
          case 'edit':
            this.modal.foot.remove();
            this.modal.foot = undefined;
            this.modal.head.text('Edit Genre');
            this.modal.body.html(`<h6 class="text-muted text-center">${datas.title}</h6>`);
            $.each(datas.anime, (key, genre) => {
              this.modal.body.append(`
              <form action="${BASE_URL+'/admin/deleteAnimePart/genres'}" method="post" class="mb-3">
                <input type="hidden" name="id" value="${datas.id}">
                <div class="d-flex gap-3 align-items-center">
                  <input type="text" name="genre" class="form-control" value="${genre}" readonly>
                  <button type="submit" class="btn-close"></button>
                </div>
              </form>
              `);
            })
            break;
          case 'modify' :
            this.modal.form.attr('action', BASE_URL+'/admin/editParts/genres');
            this.modal.head.text('Modify Genre');
            this.modal.body.html(`
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group">
              <label class="form-label" for='genre'>Genre</label>
              <input type="text" name='genre' id='genre' class="form-control" value="${datas.title}">
            </div>
            `);
            break;
        }
        break;
      case 'Theme':
        switch (datas.key) {
          case 'new':
            this.modal.form.attr('action', BASE_URL+'/admin/addPartsAnimePart/themes');
            this.modal.head.text('New Theme');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group">
              <label class="form-label" for='theme'>Theme</label>
              <input type="text" name='theme' id='theme' class="form-control">
            </div>
            `);
            break;
          case 'add':
            this.modal.form.attr('action', BASE_URL+'/admin/addAnimePart/themes');
            this.modal.head.text('Add Theme');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group mb-2">
              <label for="genre">Theme</label>
              <select class="form-select" name="theme" id="theme" required>
                <option value="" selected hidden disabled>Select theme</option>
              </select>
            </div>
            `);
            $.each(datas.anime, (key, theme) => {
              this.modal.body.find('select').append(`<option value="${theme['id']}">${theme['theme']}</option>`); })
            break;
          case 'edit':
            this.modal.foot.remove();
            this.modal.foot = undefined;
            this.modal.head.text('Edit Theme');
            this.modal.body.html(`<h6 class="text-muted text-center">${datas.title}</h6>`);
            $.each(datas.anime, (key, theme) => {
              this.modal.body.append(`
              <form action="${BASE_URL+'/admin/deleteAnimePart/themes'}" method="post" class="mb-3">
                <input type="hidden" name="id" value="${datas.id}">
                <div class="d-flex gap-3 align-items-center">
                  <input type="text" name="theme" class="form-control" value="${theme}" readonly>
                  <button type="submit" class="btn-close"></button>
                </div>
              </form>
              `);
            })
            break;
          case 'modify':
            this.modal.form.attr('action', BASE_URL+'/admin/editParts/themes');
            this.modal.head.text('Modify Theme');
            this.modal.body.html(`
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group">
              <label class="form-label" for='theme'>Theme</label>
              <input type="text" name='theme' id='theme' class="form-control" value="${datas.title}">
            </div>
            `);
            break;
          }
        break;
      case 'Producer':
        switch (datas.key) {
          case 'new':
            this.modal.form.attr('action', BASE_URL+'/admin/addPartsAnimePart/producers');
            this.modal.head.text('New Producer');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group">
              <label class="form-label" for='producer'>Producer</label>
              <input type="text" name='producer' id='producer' class="form-control">
            </div>
            `);
            break;
          case 'add':
            this.modal.form.attr('action', BASE_URL+'/admin/addAnimePart/producers');
            this.modal.head.text('Add Producer');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group mb-2">
              <label for="genre">Producer</label>
              <select class="form-select" name="producer" id="producer" required>
                <option value="" selected hidden disabled>Select producer</option>
              </select>
            </div>
            `);
            $.each(datas.anime, (key, producer) => {
              this.modal.body.find('select').append(`<option value="${producer['id']}">${producer['producer']}</option>`); })
            break;
          case 'edit':
            this.modal.foot.remove();
            this.modal.foot = undefined;
            this.modal.head.text('Edit Producer');
            this.modal.body.html(`<h6 class="text-muted text-center">${datas.title}</h6>`);
            $.each(datas.anime, (key, producer) => {
              this.modal.body.append(`
              <form action="${BASE_URL+'/admin/deleteAnimePart/producers'}" method="post" class="mb-3">
                <input type="hidden" name="id" value="${datas.id}">
                <div class="d-flex gap-3 align-items-center">
                  <input type="text" name="producer" class="form-control" value="${producer}" readonly>
                  <button type="submit" class="btn-close"></button>
                </div>
              </form>
              `);
            })
            break;
          case 'modify':
            this.modal.form.attr('action', BASE_URL+'/admin/editParts/producers');
            this.modal.head.text('Modify Producer');
            this.modal.body.html(`
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group">
              <label class="form-label" for='producer'>Producer</label>
              <input type="text" name='producer' id='producer' class="form-control" value="${datas.title}">
            </div>
            `);
            break;
          }
        break;
      case 'Licensor':
        switch (datas.key) {
          case 'new':
            this.modal.form.attr('action', BASE_URL+'/admin/addPartsAnimePart/licensors');
            this.modal.head.text('New Licensor');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group">
              <label class="form-label" for='licensor'>Licensor</label>
              <input type="text" name='licensor' id='licensor' class="form-control">
            </div>
            `);
            break;
          case 'add':
            this.modal.form.attr('action', BASE_URL+'/admin/addAnimePart/licensors');
            this.modal.head.text('Add Licensor');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group mb-2">
              <label for="genre">Licensor</label>
              <select class="form-select" name="licensor" id="licensor" required>
                <option value="" selected hidden disabled>Select licensor</option>
              </select>
            </div>
            `);
            $.each(datas.anime, (key, licensor) => {
              this.modal.body.find('select').append(`<option value="${licensor['id']}">${licensor['licensor']}</option>`); })
            break;
          case 'edit':
            this.modal.foot.remove();
            this.modal.foot = undefined;
            this.modal.head.text('Edit Licensor');
            this.modal.body.html(`<h6 class="text-muted text-center">${datas.title}</h6>`);
            $.each(datas.anime, (key, licensor) => {
              this.modal.body.append(`
              <form action="${BASE_URL+'/admin/deleteAnimePart/licensors'}" method="post" class="mb-3">
                <input type="hidden" name="id" value="${datas.id}">
                <div class="d-flex gap-3 align-items-center">
                  <input type="text" name="licensor" class="form-control" value="${licensor}" readonly>
                  <button type="submit" class="btn-close"></button>
                </div>
              </form>
              `);
            })
            break;
          case 'modify':
            this.modal.form.attr('action', BASE_URL+'/admin/editParts/licensors');
            this.modal.head.text('Modify Licensor');
            this.modal.body.html(`
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group">
              <label class="form-label" for='licensor'>Licensor</label>
              <input type="text" name='licensor' id='licensor' class="form-control" value="${datas.title}">
            </div>
            `);
            break;
          }
        break;
      case 'Studio':
        switch (datas.key) {
          case 'new':
            this.modal.form.attr('action', BASE_URL+'/admin/addPartsAnimePart/studios');
            this.modal.head.text('New Studio');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group">
              <label class="form-label" for='studio'>Studio</label>
              <input type="text" name='studio' id='studio' class="form-control">
            </div>
            `);
            break;
          case 'add':
            this.modal.form.attr('action', BASE_URL+'/admin/addAnimePart/studios');
            this.modal.head.text('Add Studio');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group mb-2">
              <label for="genre">Studio</label>
              <select class="form-select" name="studio" id="studio" required>
                <option value="" selected hidden disabled>Select studio</option>
              </select>
            </div>
            `);
            $.each(datas.anime, (key, studio) => {
              this.modal.body.find('select').append(`<option value="${studio['id']}">${studio['studio']}</option>`); })
            break;
          case 'edit':
            this.modal.foot.remove();
            this.modal.foot = undefined;
            this.modal.head.text('Edit Studio');
            this.modal.body.html(`<h6 class="text-muted text-center">${datas.title}</h6>`);
            $.each(datas.anime, (key, studio) => {
              this.modal.body.append(`
              <form action="${BASE_URL+'/admin/deleteAnimePart/studios'}" method="post" class="mb-3">
                <input type="hidden" name="id" value="${datas.id}">
                <div class="d-flex gap-3 align-items-center">
                  <input type="text" name="studio" class="form-control" value="${studio}" readonly>
                  <button type="submit" class="btn-close"></button>
                </div>
              </form>
              `);
            })
            break;
          case 'modify':
            this.modal.form.attr('action', BASE_URL+'/admin/editParts/studios');
            this.modal.head.text('Modify Studio');
            this.modal.body.html(`
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group">
              <label class="form-label" for='studio'>Studio</label>
              <input type="text" name='studio' id='studio' class="form-control" value="${datas.title}">
            </div>
            `);
            break;
          }
        break;
      case 'Relation':
        switch (datas.key) {
          case 'add':
            this.modal.form.attr('action', BASE_URL+'/admin/addAnimePart/relations');
            this.modal.head.text('Add Studio');
            this.modal.body.html(`
            <h6 class="text-muted text-center">${datas.title}</h6>
            <input type="hidden" name="id" value="${datas.id}">
            <div class="form-group mb-3">
              <label for="relation">Relation</label>
              <select class="form-select" name="relation" id="relation" required>
                <option value="" selected disabled hidden>Relation</option>
                <option value="Adaption">Adaption</option>
                <option value="Source">Source</option>
                <option value="Parent">Parent</option>
                <option value="Sequel">Sequel</option>
                <option value="Prequel">Prequel</option>
                <option value="OVA">OVA</option>
                <option value="ONA">ONA</option>
                <option value="Special">Special</option>
                <option value="Movie">Movie</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="relation_id">Anime</label>
              <select class="form-select" name="relation_id" id="relation_id" required>
                <option value="" selected hidden disabled>Select Anime</option>
              </select>
            </div>
            `);
            $.each(datas.anime, (key, relation) => {
              this.modal.body.find('select#relation_id').append(`<option value="${relation['id']}">${relation['title']}</option>`); })
            break;
          case 'edit':
            this.modal.foot.remove();
            this.modal.foot = undefined;
            this.modal.head.text('Edit Relation');
            this.modal.body.html(`<h6 class="text-muted text-center">${datas.title}</h6>`);
            $.each(datas.anime, (key, relation) => {
              this.modal.body.append(`
              <form action=${BASE_URL+'/admin/deleteAnimePart/relations'} method="post" class="mb-3">
                <input type="hidden" name="id" value="${datas.id}">
                <input type="hidden" name="relation_id" value="${relation['relation_id']}">
                <div class="d-flex gap-3 align-items-center">
                  <label class="col-2" for="${key}">${key}</label>
                  <input type="hidden" name="relation" value="${key}">
                  <input type="text" name="anime_title" id="${key}" class="form-control" value="${relation['title']}" readonly>
                  <button type="submit" class="btn-close"></button>
                </div>
              </form>
              `);
            })
            break;
        }
        break;
    }
  }

}

new Modal;