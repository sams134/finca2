<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
      var navbarStyle = localStorage.getItem("navbarStyle");
 
      
      document.querySelector('.navbar-vertical').classList.add(`navbar-vibrant`);
    </script>
    <div class="d-flex align-items-center">
      <div class="toggle-icon-wrapper">

        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

      </div><a class="navbar-brand" href="{{route('dashboard')}}">
        <div class="d-flex align-items-center py-3"><span class="font-sans-serif">Finca</span>
        </div>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
      <div class="navbar-vertical-content scrollbar">
        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
          <li class="nav-item">
            <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="dashboard">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
              </div>
            </a>
            <ul class="nav collapse false" id="dashboard">
              <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Default</span>
                  </div>
                </a>
                <!-- more inner pages-->
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Configuraciones
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
            <!-- parent pages--><a class="nav-link" href="{{route('owners.index')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-hat-cowboy-side"></span></span><span class="nav-link-text ps-1">Dueños</span>
                </div>
              </a>
            <!-- parent pages--><a class="nav-link" href="{{route('colors.index')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-palette"></span></span><span class="nav-link-text ps-1">Colores</span>
                </div>
              </a>
            <!-- parent pages--><a class="nav-link" href="{{route('types.index')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-eye"></span></span><span class="nav-link-text ps-1">Tipos</span>
                </div>
              </a>
            <!-- parent pages--><a class="nav-link" href="{{route('status.index')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-globe"></span></span><span class="nav-link-text ps-1">Estados</span>
                </div>
              </a> 
            
           
            
           
           
           
          </li>
          <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Animales
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
            <!-- parent pages--><a class="nav-link" href="{{route('animals.index')}}" role="button" aria-expanded="false"">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-horse"></span></span><span class="nav-link-text ps-1">Ver Animales</span>
              </div>
            </a>
            
          </li>
          
          <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Finca
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
            <!-- parent pages--><a class="nav-link" href="../../../documentation/getting-started.html" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-rocket"></span></span><span class="nav-link-text ps-1">Listado de Potreros</span>
              </div>
            </a>
            <!-- parent pages--><a class="nav-link dropdown-indicator" href="#customization" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="customization">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-wrench"></span></span><span class="nav-link-text ps-1">Herramientas</span>
              </div>
            </a>
            <ul class="nav collapse false" id="customization">
              <li class="nav-item"><a class="nav-link" href="../../../documentation/customization/configuration.html" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Sillas de Montar</span>
                  </div>
                </a>
                <!-- more inner pages-->
              </li>
              <li class="nav-item"><a class="nav-link" href="../../../documentation/customization/styling.html" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bombas de Fumigar</span>
                  </div>
                </a>
                <!-- more inner pages-->
              </li>
              <li class="nav-item"><a class="nav-link" href="../../../documentation/customization/dark-mode.html" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Maquinas</span>
                  </div>
                </a>
                <!-- more inner pages-->
              </li>
              <li class="nav-item"><a class="nav-link" href="../../../documentation/customization/plugin.html" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Carros</span>
                  </div>
                </a>
                <!-- more inner pages-->
              </li>
            </ul>
            <!-- parent pages--><a class="nav-link" href="../../../documentation/gulp.html" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-gulp"></span></span><span class="nav-link-text ps-1">Vecinos</span>
              </div>
            </a>
          
          </li>

          <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Empleados
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
            <!-- parent pages--><a class="nav-link" href="#" role="button" aria-expanded="false"">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-horse"></span></span><span class="nav-link-text ps-1">Listado de empleados</span>
              </div>
            </a>
             <!-- parent pages--><a class="nav-link" href="#" role="button" aria-expanded="false"">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-horse"></span></span><span class="nav-link-text ps-1">Planillas</span>
              </div>
            </a>
            <!-- parent pages--><a class="nav-link" href="#" role="button" aria-expanded="false"">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-horse"></span></span><span class="nav-link-text ps-1">Prestamos</span>
              </div>
            </a>
          </li>
        </ul>
        <div class="settings mb-3">
          <div class="card alert p-0 shadow-none" role="alert">
            <div class="btn-close-falcon-container">
              <div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </nav>