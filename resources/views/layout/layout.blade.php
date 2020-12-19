<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Admin de Pelis' }}</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
</head>

<body>
  <section class="hero is-fullheight has-background-light">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head has-background-primary">
      <header class="navbar">
        <div class="container">
          <div class="navbar-brand">
            <a class="navbar-item">
              <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo">
            </a>
            <span class="navbar-burger" data-target="navbarMenuHeroC">
              <span>Roberto</span>
              <span>Roberto</span>
              <span>Roberto</span>
            </span>
          </div>
          <div id="navbarMenuHeroC" class="navbar-menu">
            <div class="navbar-end">
              <a class="navbar-item is-active">
                Home
              </a>
              <a class="navbar-item">
                Examples
              </a>
              <a class="navbar-item">
                Documentation
              </a>
              <span class="navbar-item">
                <a class="button is-success is-inverted">
                  <span class="icon">
                    <i class="fab fa-github"></i>
                  </span>
                  <span>Download</span>
                </a>
              </span>
            </div>
          </div>
        </div>
      </header>
      <div class="container has-text-centered py-6">
          <p class="title">@yield("titulo")</p>
          <p class="subtitle">@yield("subtitulo")</p>
      </div>
    </div>

    <!-- Hero content: will be in the middle -->    
    @if(session("exito"))
    <div class="notification is-success m-4"><button class="delete"></button>{{session("exito")}}</div>
    @endif
    @if(session("error"))
    <div class="notification is-danger m-4"><button class="delete"></button>{{session("error")}}</div>
    @endif
    <div class="hero-body container">      
      @yield("contenido")            
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot has-background-dark has-text-light">
      <div class="has-text-centered mt-4 mb-4">
        <p class="is-size-6">Creado por Francisco Barreneche para <em>Taller de Programacion</em></p>
        <p class="is-size-6">2020</p>
      </div>
    </div>
  </section>
  <script>
  document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    var $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});
</script>
</body>

</html>