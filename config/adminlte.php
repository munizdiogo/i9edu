<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'i9Edu',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>i9</b>Edu',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
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
    |
    | Here you can change the preloader animation configuration. Currently, two
    | modes are supported: 'fullscreen' for a fullscreen preloader animation
    | and 'cwrapper' to attach the preloader animation into the content-wrapper
    | element and avoid overlapping it with the sidebars and the top navbar.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
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
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
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
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
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
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'light',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
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
    |
    | Here we can enable the Laravel Asset Bundling option for the admin panel.
    | Currently, the next modes are supported: 'mix', 'vite' and 'vite_js_only'.
    | When using 'vite_js_only', it's expected that your CSS is imported using
    | JavaScript. Typically, in your application's 'resources/js/app.js' file.
    | If you are not using any of these, leave it as 'false'.
    |
    | For detailed instructions you can look the asset bundling section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
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
        [
            'text' => 'blog',
            'url' => 'admin/blog',
            'can' => 'manage-blog',
        ],

        ['header' => '_____________________'],
        ['header' => '   '],
        ['header' => 'CONFIG. SISTEMA '],

        [
            'text' => ' Estruturas',
            'url' => '/estruturas',
            'icon' => 'fas fa-fw fa-user',
            'icon_color' => 'red',
        ],
        [
            'text' => ' Regras de acesso',
            'url' => '/roles',
            'icon' => 'fas fa-fw fa-user',
            'icon_color' => 'red',
        ],
        ['header' => '_____________________'],
        ['header' => '   '],
        ['header' => 'CADASTROS '],
        [
            'text' => ' Perfil',
            'url' => '/perfis',
            'icon' => 'fas fa-fw fa-user',
            'icon_color' => 'red',
        ],
        [
            'text' => ' Polos',
            'url' => '/polos',
            'icon' => 'fas fa-fw fa-building',
            'icon_color' => 'red',
        ],
        [
            'text' => ' Professores',
            'url' => '/professores',
            'icon' => 'fa fa-fw fa-chalkboard-teacher',
            'icon_color' => 'red',
        ],
        [
            'text' => ' Funcionários',
            'url' => '/funcionarios',
            'icon' => 'fa fa-fw fa-briefcase',
            'icon_color' => 'red',
        ],

        // [
        //     'text' => 'CADASTROS',
        //     'icon' => 'fas fa-fw fa-pencil-alt',
        //     'icon_color' => 'white',
        //     'submenu' => [
        //     ],
        // ],
        ['header' => '_____________________'],
        ['header' => '   '],
        ['header' => 'CADASTROS GERAIS '],
        [
            'text' => ' Setores',
            'url' => '/setores',
            'icon' => 'fa fa-fw fa-sitemap',
        ],
        [
            'text' => ' Funções',
            'url' => '/funcoes',
            'icon' => 'fa fa-fw fa-vector-square',
        ],
        [
            'text' => ' Documentos',
            'url' => '/documentos',
            'icon' => 'fa fa-fw fa-vector-square',
        ],
        // [
        //     'text' => ' CADASTROS GERAIS',
        //     'icon' => 'fa fa-fw fa-pencil-alt',
        //     'icon_color' => 'white',
        //     'submenu' => [
        //     ],
        // ],
        ['header' => '_____________________'],
        ['header' => '   '],
        ['header' => 'ACADÊMICO '],
        [
            'text' => ' Cursos',
            'url' => '/cursos',
            'icon' => 'fas fa-fw fa-book',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Matrizes Curriculares',
            'url' => '/matrizes',
            'icon' => 'fas fa-fw fa-book-open',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Turmas',
            'url' => '/turmas',
            'icon' => 'fas fa-fw fa-chalkboard-teacher',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Disciplinas Base',
            'url' => '/disciplinas_base',
            'icon' => 'fas fa-fw fa-list-alt',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Disciplinas',
            'url' => '/disciplinas',
            'icon' => 'fab fa-fw fa-buffer',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Grade Disciplinas Matrizes',
            'url' => '/grade_disciplinas_matrizes',
            'icon' => 'fa fa-fw fa-table',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Períodos Letivos',
            'url' => '/periodos',
            'icon' => 'fas fa-fw fa-calendar-alt',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Etapas Período Letivo',
            'url' => '/etapas_periodos_letivos',
            'icon' => 'fas fa-fw fa-stream',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Áreas de Conhecimento',
            'url' => '/area_conhecimentos',
            'icon' => 'fas fa-fw fa-book-reader',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Módulos',
            'url' => '/modulos',
            'icon' => 'fas fa-fw fa-puzzle-piece',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Alunos',
            'url' => '/alunos',
            'icon' => 'fas fa-fw fa-user-graduate',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Alunos Curso Admissão',
            'url' => '/admissoes',
            'icon' => 'fas fa-fw fa-graduation-cap',
            'icon_color' => 'yellow',
        ],
        [
            'text' => ' Matrículas',
            'url' => '/matriculas',
            'icon' => 'fas fa-fw fa-address-card',
            'icon_color' => 'yellow',
        ],
        // [
        //     'text' => 'ACADÊMICO',
        //     'icon' => 'fas fa-fw fa-book',
        //     'icon_color' => 'white',
        //     'url' => '#',
        //     'submenu' => [

        //     ],
        // ],
        ['header' => '_____________________'],
        ['header' => '   '],
        ['header' => 'CAPTAÇÃO',],


        [
            'text' => ' Editais Processo Seletivo',
            'url' => '/editais',
            'icon' => 'fas fa-fw fa-clipboard-list',
        ],
        [
            'text' => ' Matriz Captação',
            'url' => '/matriz-captacao',
            'icon' => 'fas fa-fw fa-table',
            // 'icon' => 'fas fa-fw fa-check-double',
        ],
        // [
        //     'text' => ' CAPTAÇÃO',
        //     'icon' => 'fas fa-fw fa-address-book',
        //     'icon_color' => 'white',
        //     'submenu' => [
        //     ],
        // ],
        ['header' => '_____________________'],
        ['header' => '   '],
        ['header' => 'FINANCEIRO'],


        [
            'text' => ' Planos de Pagamento',
            'url' => '/planos_pagamento',
            'icon' => 'fas fa-fw fa-dollar-sign',
            'icon_color' => 'green',
        ],
        [
            'text' => ' Grupo de Contas',
            'url' => '/grupo-contas',
            'icon' => 'fas fa-fw fa-dollar-sign',
            'icon_color' => 'green',
        ],
        [
            'text' => ' Plano de Contas',
            'url' => '/plano-contas',
            'icon' => 'fas fa-fw fa-dollar-sign',
            'icon_color' => 'green',
        ],
        [
            'text' => ' Convênios',
            'url' => '/convenios',
            'icon' => 'fas fa-fw fa-dollar-sign',
            'icon_color' => 'green',
        ],
        [
            'text' => ' Cupons',
            'url' => '/cupons',
            'icon' => 'fas fa-fw fa-dollar-sign',
            'icon_color' => 'green',
        ],
        [
            'text' => ' Restrições Plano de Pagamento',
            'url' => '/restricoes_plano_pagamento',
            'icon' => 'fas fa-fw fa-dollar-sign',
            'icon_color' => 'green',
        ],

        ['header' => '_____________________'],
        ['header' => '   '],
        ['header' => 'REQUERIMENTOS'],

        [
            'text' => ' Departamentos',
            'url' => '/requerimentos_departamentos',
            'icon' => 'fas fa-fw fa-circle',
            'icon_color' => 'purple',
        ],
        [
            'text' => ' Status',
            'url' => '/requerimentos-status',
            'icon' => 'fas fa-fw fa-circle',
            'icon_color' => 'purple',
        ],
        [
            'text' => ' Assuntos',
            'url' => '/requerimentos_assuntos',
            'icon' => 'fas fa-fw fa-circle',
            'icon_color' => 'purple',
        ],
        [
            'text' => ' Solicitações',
            'url' => '/requerimentos_solicitacoes',
            'icon' => 'fas fa-fw fa-circle',
            'icon_color' => 'purple',
        ],


        ['header' => '_____________________'],
        ['header' => '   '],
        ['header' => 'OUTROS MENUS'],

        [
            'text' => ' AAAAAAAA',
            'url' => '/planos_pagamento',
            'icon' => 'fas fa-fw fa-check-double',
            'icon_color' => 'blue',
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
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
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
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
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
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
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
