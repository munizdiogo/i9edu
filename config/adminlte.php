<?php

return [

    // https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-
// https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
// https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
// https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
// https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
// https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
// https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration


    // 'classes_body' => 'dark-mode',
    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    */

    'title' => 'EduYes',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    */

    'logo' => '<b>Edu</b>Yes',
    // 'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    // 'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            // 'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    */

    'preloader' => [
        'enabled' => true,
        'mode' => 'fullscreen',
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    */

    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-olive bg-navy elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-dark',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    */

    'right_sidebar' => true,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    */

    'use_route_url' => false,
    'dashboard_url' => 'dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,
    'disable_darkmode_routes' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Asset Bundling
    |--------------------------------------------------------------------------
    */

    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    */

    'menu' => [
        // Navbar items:
        [
            'type' => 'navbar-search',
            'text' => 'Pesquisa geral',
            'topnav_right' => true,
        ],
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'Pesquisar tela',
        ],


        ['header' => 'CONFIG. SISTEMA ', 'classes' => 'pt-5'],

        [
            'text' => ' Estruturas',
            'url' => '/estruturas',
            'icon' => 'fas fa-fw fa-object-ungroup',
            'icon_color' => 'red pr-4',
            'classes' => 'pl-2',
        ],
        [
            'text' => ' Regras de acesso',
            'url' => '/roles',
            'icon' => 'fas fa-fw fa-user-shield',
            'icon_color' => 'red pr-4',
            'classes' => 'pl-2',
        ],



        ['header' => 'CADASTROS ', 'classes' => 'pt-5'],
        [
            'text' => 'Cadastros Gerais',
            'icon' => 'fas fa-fw fa-user-cog',
            'icon_color' => 'orange',
            'classes' => 'pl-2',
            'url' => '#',
            'submenu' => [
                [
                    'text' => ' Setores',
                    'url' => '/setores',
                    'icon' => 'fa fa-fw fa-circle',
                    'icon_color' => 'orange',
                    'shift' => 'ml-3',
                ],
                [
                    'text' => ' Funções',
                    'url' => '/funcoes',
                    'icon' => 'fa fa-fw fa-circle',
                    'icon_color' => 'orange',
                    'shift' => 'ml-3',
                ],
                [
                    'text' => ' Documentos',
                    'url' => '/documentos',
                    'icon' => 'fa fa-fw fa-circle',
                    'icon_color' => 'orange',
                    'shift' => 'ml-3',
                ],
            ],
        ],
        [
            'text' => ' Perfil',
            'url' => '/perfis',
            'icon' => 'fas fa-fw fa-user',
            'icon_color' => 'orange',
            'classes' => 'pl-2',
        ],
        [
            'text' => ' Polos',
            'url' => '/polos',
            'icon' => 'fas fa-fw fa-building',
            'icon_color' => 'orange',
            'classes' => 'pl-2',
        ],
        [
            'text' => ' Professores',
            'url' => '/professores',
            'icon' => 'fa fa-fw fa-chalkboard-teacher',
            'icon_color' => 'orange',
            'classes' => 'pl-2',
        ],
        [
            'text' => ' Funcionários',
            'url' => '/funcionarios',
            'icon' => 'fa fa-fw fa-briefcase',
            'icon_color' => 'orange',
            'classes' => 'pl-2',
        ],



        ['header' => 'ACADÊMICO ', 'classes' => 'pt-5'],

        [
            'text' => 'Cadastros Acadêmicos',
            'icon' => 'fas fa-fw fa-user-cog',
            'icon_color' => 'yellow',
            'url' => '#',
            'classes' => 'pl-2',
            'submenu' => [
                [
                    'text' => ' Departamentos',
                    'url' => '/requerimentos_departamentos',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'yellow',
                    'shift' => 'ml-3',
                ],
                [
                    'text' => ' Grade Disciplinas Matrizes',
                    'url' => '/grade_disciplinas_matrizes',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'yellow',
                    'shift' => 'ml-3',
                ],
                [
                    'text' => ' Períodos Letivos',
                    'url' => '/periodos',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'yellow',
                    'shift' => 'ml-3',
                ],
                [
                    'text' => ' Etapas Período Letivo',
                    'url' => '/etapas_periodos_letivos',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'yellow',
                    'shift' => 'ml-3',
                ],
                [
                    'text' => ' Áreas de Conhecimento',
                    'url' => '/area_conhecimentos',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'yellow',
                    'shift' => 'ml-3',
                ],
                [
                    'text' => ' Módulos',
                    'url' => '/modulos',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'yellow',
                    'shift' => 'ml-3',
                ],
                [
                    'text' => ' Disciplinas Base',
                    'url' => '/disciplinas_base',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'yellow',
                    'shift' => 'ml-3',
                ],
                [
                    'text' => ' Disciplinas',
                    'url' => '/disciplinas',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'yellow',
                    'shift' => 'ml-3',
                ],
            ],
        ],
        [
            'text' => ' Cursos',
            'url' => '/cursos',
            'icon' => 'fas fa-fw fa-book',
            'icon_color' => 'yellow',
            'classes' => 'pl-2',
        ],
        [
            'text' => ' Matrizes Curriculares',
            'url' => '/matrizes',
            'icon' => 'fas fa-fw fa-book-open',
            'icon_color' => 'yellow',
            'classes' => 'pl-2',
        ],
        [
            'text' => ' Turmas',
            'url' => '/turmas',
            'icon' => 'fas fa-fw fa-chalkboard-teacher',
            'icon_color' => 'yellow',
            'classes' => 'pl-2',
        ],


        [
            'text' => ' Alunos',
            'url' => '/alunos',
            'icon' => 'fas fa-fw fa-user-graduate',
            'icon_color' => 'yellow',
            'classes' => 'pl-2',
        ],
        [
            'text' => ' Alunos Curso Admissão',
            'url' => '/admissoes',
            'icon' => 'fas fa-fw fa-graduation-cap',
            'icon_color' => 'yellow',
            'classes' => 'pl-2',
        ],
        [
            'text' => ' Matrículas',
            'url' => '/matriculas',
            'icon' => 'fas fa-fw fa-address-card',
            'icon_color' => 'yellow',
            'classes' => 'pl-2',
        ],



        ['header' => 'CAPTAÇÃO', 'classes' => 'pt-5',],


        [
            'text' => ' Editais Processo Seletivo',
            'url' => '/editais',
            'icon' => 'fas fa-fw fa-clipboard-list',
            'icon_color' => 'info',
        ],
        [
            'text' => ' Matriz Captação',
            'url' => '/matriz-captacao',
            'icon' => 'fas fa-fw fa-table',
            'icon_color' => 'info',
        ],


        ['header' => 'FINANCEIRO', 'classes' => 'pt-5',],

        [
            'text' => 'Cadastro Financeiro',
            'icon' => 'fas fa-fw fa-funnel-dollar',
            'icon_color' => 'teal',
            'url' => '#',
            'classes' => 'pl-2',
            'submenu' => [
                [
                    'text' => ' Departamentos',
                    'url' => '/requerimentos_departamentos',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'teal',
                    'classes' => 'pl-4',
                ],
                [
                    'text' => ' Grupo de Contas',
                    'url' => '/grupo-contas',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'teal',
                    'classes' => 'pl-4',
                ],
                [
                    'text' => ' Plano de Contas',
                    'url' => '/plano-contas',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'teal',
                    'classes' => 'pl-4',
                ],
                [
                    'text' => ' Convênios',
                    'url' => '/convenios',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'teal',
                    'classes' => 'pl-4',
                ],
                [
                    'text' => ' Cupons',
                    'url' => '/cupons',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'teal',
                    'classes' => 'pl-4',
                ],
                [
                    'text' => ' Restrições Plano de Pagamento',
                    'url' => '/restricoes_plano_pagamento',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'teal',
                    'classes' => 'pl-4',
                ],
            ]
        ],

        [
            'text' => ' Planos de Pagamento',
            'url' => '/planos_pagamento',
            'icon' => 'fas fa-fw fa-dollar-sign',
            'icon_color' => 'teal',
            'classes' => 'pl-2',
        ],


        ['header' => 'REQUERIMENTOS', 'classes' => 'pt-5',],

        [
            'text' => 'Conf. Requerimentos',
            'icon' => 'fas fa-fw fa-book',
            'icon_color' => 'purple',
            'url' => '#',
            'classes' => 'pl-2',
            'submenu' => [
                [
                    'text' => ' Departamentos',
                    'url' => '/requerimentos_departamentos',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'purple',
                    'classes' => 'pl-4',
                ],
                [
                    'text' => ' Status',
                    'url' => '/requerimentos-status',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'purple',
                    'classes' => 'pl-4',
                ],
                [
                    'text' => ' Assuntos',
                    'url' => '/requerimentos_assuntos',
                    'icon' => 'fas fa-fw fa-circle',
                    'icon_color' => 'purple',
                    'classes' => 'pl-4',
                ],
            ],
        ],

        [
            'text' => ' Solicitações',
            'url' => '/requerimentos_solicitacoes',
            'icon' => 'fas fa-fw  fa-comment-dots',
            'icon_color' => 'purple',
            'classes' => 'pl-2',
        ],


        ['header' => 'OUTROS MENUS', 'classes' => 'pt-5',],

        [
            'text' => ' AAAAAAAA',
            'url' => '#',
            'icon' => 'fas fa-fw fa-check-double',
            'icon_color' => 'blue',
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                ['type' => 'css', 'asset' => true, 'location' => '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'],
                ['type' => 'css', 'asset' => true, 'location' => '//cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css'],
                ['type' => 'js', 'asset' => true, 'location' => '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'],

            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@11',
                ],
            ],
        ],

        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    */

    'livewire' => false,
];
