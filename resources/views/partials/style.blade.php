<style>
    .btn-primary, .bg-primary, .badge-primary, .btn-primary:hover, .btn-outline-primary:hover, .btn-outline-primary:active, .dropdown-item:active {
        background-color: {{ config('blogged.ui.primary_color') }} !important;
        border-color: {{ config('blogged.ui.primary_color') }} !important;
    }
    .btn-outline-primary {
        border-color: {{ config('blogged.ui.primary_color') }};
    }
    article h1 {
        border-left: 2px solid {{ config('blogged.ui.primary_color') }} !important;
    }
    .btn-outline-primary, article h2 a:before, article :not(pre)>code, a {
        color: {{ config('blogged.ui.primary_color') }};
    }
    article .sidebar>ul>li>ul>li.is-active {
        border-left: 2px solid {{ config('blogged.ui.primary_color') }};
    }
    .custom-toggle input:checked+.custom-toggle-slider {
        border: 1px solid {{ config('blogged.ui.primary_color') }};
    }
    .custom-toggle input:checked + .custom-toggle-slider::before, .alert-primary, .badge-primary {
        background: {{ config('blogged.ui.primary_color') }};
    }
    :not(pre)>code[class*=language-], pre[class*=language-] {
        border-top: 3px solid {{ config('blogged.ui.primary_color') }};
    }
    .bg-gradient-primary {
        background: linear-gradient(87deg, {{ config('blogged.ui.primary_color') }} 0, {{ config('blogged.ui.colors.secondary') }} 100%) !important;
    }
    ::-moz-selection {
        background: {{ config('blogged.ui.colors.selection') }};
    }
    ::selection {
        background: {{ config('blogged.ui.colors.selection') }};
    }
</style>