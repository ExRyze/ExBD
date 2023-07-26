let url = window.location.href;
url = url.substring(7);
url = url.split('/');
url[0] = 'home';
url = url.join('/');

switch (true) {
  // Home
  case url === "home/":
    document.querySelector('.nav-link#Home').classList.remove('collapsed');
    break;

  // Home/Anime
  case url.includes("home/anime"):
    document.querySelector('.nav-link#Anime').classList.remove('collapsed');
    break;

  // Home/Setting/Profile
  case url === "home/setting/profile":
    document.querySelector('.nav-link#Profile').classList.remove('collapsed');
    break;
    
  // Dashboard
  case url === "home/dashboard":
    document.querySelector('.nav-link#Dashboard').classList.remove('collapsed');
    break;
    
  // Dashboard/Users
  case url.includes("home/dashboard/user"):
    document.querySelector('.nav-link#User').classList.remove('collapsed');
    break;
    
  // Dashboard/Animes
  case url.includes("home/dashboard/anime") && !(url.includes("folder") || url.includes("video")) :
    document.querySelector('.nav-link#Anime').classList.remove('collapsed');
    document.querySelector('.nav-link#Anime').setAttribute('data-bs-toggle', 'collapsed');
    document.querySelector('.nav-link#Anime + #components-nav').classList.remove('collapse');
    document.querySelector('.nav-link#Anime + #components-nav #Anime').classList.add('active');
    break;
    
  // Dashboard/Animes/Component
  // case url.includes("home/dashboard/anime/component") :
  //   document.querySelector('.nav-link#Anime').classList.remove('collapsed');
  //   document.querySelector('.nav-link#Anime').setAttribute('data-bs-toggle', 'collapsed');
  //   document.querySelector('.nav-link#Anime + #components-nav').classList.remove('collapse');
  //   document.querySelector('.nav-link#Anime + #components-nav #Component').classList.add('active');
  //   break;
    
  // Dashboard/Animes/Folder
  case url.includes("home/dashboard/anime/folder") || url.includes("home/dashboard/anime/video") :
    document.querySelector('.nav-link#Anime').classList.remove('collapsed');
    document.querySelector('.nav-link#Anime').setAttribute('data-bs-toggle', 'collapsed');
    document.querySelector('.nav-link#Anime + #components-nav').classList.remove('collapse');
    document.querySelector('.nav-link#Anime + #components-nav #Video').classList.add('active');
    break;
}
