<!DOCTYPE html>
<html lang="pt-br">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <?= $head; ?>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= assetAdmin('assets/css/app.min.css'); ?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= assetAdmin('assets/bundles/datatables/datatables.min.css'); ?>">
  <link rel="stylesheet" href="<?= assetAdmin('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= assetAdmin('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?= assetAdmin('assets/css/components.css'); ?>">
  <link rel="stylesheet" href="<?= assetAdmin('assets/css/load.css'); ?>">
  <link rel="stylesheet" href="<?= assetAdmin('assets/css/message.css'); ?>">
  <link rel="stylesheet" href="<?= assetAdmin('assets/bundles/lightgallery/dist/css/lightgallery.css'); ?>">
  <link rel="stylesheet" href="<?= assetAdmin('assets/bundles/pretty-checkbox/pretty-checkbox.min.css'); ?>">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= assetAdmin('assets/css/custom.css'); ?>">
  <link rel='shortcut icon' type='image/x-icon' href='<?= assetAdmin('assets/img/meleva.png'); ?>' />
</head>


<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?= $user->foto ?>"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Olá <?= $user->nome ?></div>
              <a href="<?= $router->route("site.inicio");?>" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Site
              <div class="dropdown-divider"></div>
              <a href="<?= $router->route("app.logoff");?>" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Sair
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
              <a href="<?= $router->route("admin.home");?>"> <img alt="image" src="<?= assetAdmin('assets/img/meleva.png') ?>" class="header-logo"> <span class="logo-name">MeLeva</span>
              </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="dropdown active">
              <a href="<?= $router->route("admin.home");?>" class="nav-link"><i data-feather="home"></i><span>home</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="users"></i><span>Usuários</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= $router->route('admin.motoristasativos') ?>">Motoristas Ativos</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.motoristasnaoativos') ?>">Motoristas não Ativos</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.motoristasdesativados') ?>">Motoristas Desativados</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.todosmotoristas') ?>">Todos Motoristas</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.usuariosdesativados') ?>">Usuários Desativados</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.todosusuarios') ?>">Todos Usuários</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="truck"></i><span>Rotas</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= $router->route('admin.rotasandamento') ?>">Rotas Andamento</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.rotasfinalizadas') ?>">Rotas Finalizadas</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.rotascanceladas') ?>">Rotas Canceladas</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.todasrotas') ?>">Todas Rotas</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="credit-card"></i><span>Financeiro</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= $router->route('admin.pagamentosfinalizados') ?>">Pagamentos Finalizados</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.pagamentoscancelados') ?>">Pagamentos Cancelados</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.pagamentosandamento') ?>">Pagamentos em Andamento</a></li>
                <li><a class="nav-link" href="<?= $router->route('admin.todospagamentos') ?>">Todos os Pagamentos</a></li>
              </ul>
            </li>
            <li class="menu-header">Site</li>
            <li class="dropdown">
              <a href="<?= $router->route('site.inicio') ?>"><i data-feather="monitor"></i><span>Ir No Site</span></a>
            </li>
            <li class="dropdown">
              <a href="<?= $router->route('app.logoff') ?>"><i data-feather="power"></i><span>Sair</span></a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">


        <main class="main_content">
          <?= $v->section("content"); ?>
        </main>



        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">
                Painel de configuração
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Selecionar Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Cor do sidebar</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Cor do tema</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restaurar padrão
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">

        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
      <!-- General JS Scripts -->
  <script src="<?= assetAdmin('assets/js/app.min.js'); ?>"></script>
  <!-- JS Libraies -->
  <script src="<?= assetAdmin('assets/bundles/apexcharts/apexcharts.min.js'); ?>"></script>
  <!-- Page Specific JS File -->
  <?= $v->section("scripts"); ?>
  <script src="<?= assetAdmin('assets/bundles/datatables/datatables.min.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/bundles/datatables/export-tables/dataTables.buttons.min.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/bundles/datatables/export-tables/buttons.flash.min.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/bundles/datatables/export-tables/jszip.min.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/bundles/datatables/export-tables/pdfmake.min.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/bundles/datatables/export-tables/vfs_fonts.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/bundles/datatables/export-tables/buttons.print.min.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/js/page/datatables.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/bundles/lightgallery/dist/js/lightgallery-all.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/js/page/light-gallery.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/bundles/sweetalert/sweetalert.min.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/js/page/sweetalert.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/js/page/index.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/bundles/jquery-steps/jquery.steps.min.js'); ?>"></script>
  <script src="<?= assetAdmin('assets/js/page/form-wizard.js'); ?>"></script>
  <!-- Template JS File -->
  <!-- Page Specific JS File -->

  <script src="<?= assetAdmin('assets/js/scripts.js'); ?>"></script>
  <!-- Custom JS File -->
  <script src="<?= assetAdmin('assets/js/custom.js'); ?>"></script>
</body>

</html>