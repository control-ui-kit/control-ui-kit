const theme = {
    backgroundColor: {

        'login': 'rgb(var(--login-bg), <alpha-value>)',
        'login-input': 'rgb(var(--login-bg), <alpha-value>)',
        'app': 'rgb(var(--app-bg), <alpha-value>)',
        'header': 'rgb(var(--header-bg), <alpha-value>)',
        'header-hover': 'rgb(var(--header-bg-hover), <alpha-value>)',
        'footer': 'rgb(var(--footer-bg), <alpha-value>)',

        'nav-bar': 'rgb(var(--nav-bar-bg), <alpha-value>)',
        'nav-bar-hover': 'rgb(var(--nav-bar-bg-hover), <alpha-value>)',
        'nav-bar-option': 'rgb(var(--nav-bar-option-bg), <alpha-value>)',
        'nav-bar-option-hover': 'rgb(var(--nav-bar-option-bg-hover), <alpha-value>)',
        'nav-bar-selected': 'rgb(var(--nav-bar-selected-bg), <alpha-value>)',
        'nav-bar-selected-hover': 'rgb(var(--nav-bar-selected-bg-hover), <alpha-value>)',

        'nav-side': 'rgb(var(--nav-side-bg), <alpha-value>)',
        'nav-side-hover': 'rgb(var(--nav-side-bg-hover), <alpha-value>)',
        'nav-side-option': 'rgb(var(--nav-side-option-bg), <alpha-value>)',
        'nav-side-option-hover': 'rgb(var(--nav-side-option-bg-hover), <alpha-value>)',
        'nav-side-selected': 'rgb(var(--nav-side-selected-bg), <alpha-value>)',
        'nav-side-selected-hover': 'rgb(var(--nav-side-selected-bg-hover), <alpha-value>)',

        'nav-profile-header': 'rgb(var(--nav-profile-header-bg), <alpha-value>)',

        'toolbar': 'rgb(var(--toolbar-bg), <alpha-value>)',

        'alert-brand': 'rgb(var(--alert-brand-bg), <alpha-value>)',
        'alert-default': 'rgb(var(--alert-default-bg), <alpha-value>)',
        'alert-danger': 'rgb(var(--alert-danger-bg), <alpha-value>)',
        'alert-info': 'rgb(var(--alert-info-bg), <alpha-value>)',
        'alert-success': 'rgb(var(--alert-success-bg), <alpha-value>)',
        'alert-muted': 'rgb(var(--alert-muted-bg), <alpha-value>)',
        'alert-warning': 'rgb(var(--alert-warning-bg), <alpha-value>)',

        'button-brand': 'rgb(var(--button-brand-bg), <alpha-value>)',
        'button-brand-hover': 'rgb(var(--button-brand-bg-hover), <alpha-value>)',
        'button-default': 'rgb(var(--button-default-bg), <alpha-value>)',
        'button-default-hover': 'rgb(var(--button-default-bg-hover), <alpha-value>)',
        'button-danger': 'rgb(var(--button-danger-bg), <alpha-value>)',
        'button-danger-hover': 'rgb(var(--button-danger-bg-hover), <alpha-value>)',
        'button-info': 'rgb(var(--button-info-bg), <alpha-value>)',
        'button-info-hover': 'rgb(var(--button-info-bg-hover), <alpha-value>)',
        'button-link': 'rgb(var(--button-link-bg), <alpha-value>)',
        'button-link-hover': 'rgb(var(--button-link-bg-hover), <alpha-value>)',
        'button-success': 'rgb(var(--button-success-bg), <alpha-value>)',
        'button-success-hover': 'rgb(var(--button-success-bg-hover), <alpha-value>)',
        'button-muted': 'rgb(var(--button-muted-bg), <alpha-value>)',
        'button-muted-hover': 'rgb(var(--button-muted-bg-hover), <alpha-value>)',
        'button-warning': 'rgb(var(--button-warning-bg), <alpha-value>)',
        'button-warning-hover': 'rgb(var(--button-warning-bg-hover), <alpha-value>)',

        'pill-brand': 'rgb(var(--pill-brand-bg), <alpha-value>)',
        'pill-default': 'rgb(var(--pill-default-bg), <alpha-value>)',
        'pill-danger': 'rgb(var(--pill-danger-bg), <alpha-value>)',
        'pill-info': 'rgb(var(--pill-info-bg), <alpha-value>)',
        'pill-success': 'rgb(var(--pill-success-bg), <alpha-value>)',
        'pill-muted': 'rgb(var(--pill-muted-bg), <alpha-value>)',
        'pill-warning': 'rgb(var(--pill-warning-bg), <alpha-value>)',

        'table-header': 'rgb(var(--table-header-bg), <alpha-value>)',
        'table-row-1': 'rgb(var(--table-row-bg-1), <alpha-value>)',
        'table-row-2': 'rgb(var(--table-row-bg-2), <alpha-value>)',
        'table-row-hover': 'rgb(var(--table-row-bg-hover), <alpha-value>)',
        'table-row-muted': 'rgb(var(--table-row-muted-bg), <alpha-value>)',
        'table-filters': 'rgb(var(--table-filters-bg), <alpha-value>)',
        'table-filters-hover': 'rgb(var(--table-filters-bg-hover), <alpha-value>)',
        'table-filter': 'rgb(var(--table-filter-bg), <alpha-value>)',
        'active-filter': 'rgb(var(--active-filter-bg), <alpha-value>)',

        'paginate-button': 'rgb(var(--paginate-button-bg), <alpha-value>)',
        'paginate-button-hover': 'rgb(var(--paginate-button-bg-hover), <alpha-value>)',
        'paginate-active': 'rgb(var(--paginate-active-bg), <alpha-value>)',
        'paginate-active-hover': 'rgb(var(--paginate-active-bg-hover), <alpha-value>)',
        'paginate-disabled': 'rgb(var(--paginate-disabled-bg), <alpha-value>)',
        'paginate-disabled-hover': 'rgb(var(--paginate-disabled-bg-hover), <alpha-value>)',
        'paginate-limit': 'rgb(var(--paginate-limit-bg), <alpha-value>)',
        'paginate-limit-hover': 'rgb(var(--paginate-limit-bg-hover), <alpha-value>)',

        'panel': 'rgb(var(--panel-bg), <alpha-value>)',
        'input': 'rgb(var(--input-bg), <alpha-value>)',
        'input-item': 'rgb(var(--input-item-bg), <alpha-value>)',
        'input-brand': 'rgb(var(--brand), <alpha-value>)',
        'input-muted': 'rgb(var(--input-muted-bg), <alpha-value>)',
        'input-option': 'rgb(var(--input-option-bg), <alpha-value>)',
        'input-option-hover': 'rgb(var(--input-option-bg-hover), <alpha-value>)',

        'modal': 'rgb(var(--modal-bg), <alpha-value>)',
        'modal-blur': 'rgb(var(--modal-blur-bg), <alpha-value>)',
        'modal-header': 'rgb(var(--modal-header-bg), <alpha-value>)',
        'modal-footer': 'rgb(var(--modal-footer-bg), <alpha-value>)',
        'modal-button': 'rgb(var(--modal-button-bg), <alpha-value>)',
        'modal-button-hover': 'rgb(var(--modal-button-bg-hover), <alpha-value>)',

    },
    borderColor: {

        'login-input': 'rgb(var(--login-input-border), <alpha-value>)',

        'default': 'rgb(var(--border), <alpha-value>)',
        'header': 'rgb(var(--header-border), <alpha-value>)',
        'footer': 'rgb(var(--footer-border), <alpha-value>)',

        'nav-bar': 'rgb(var(--nav-bar-border), <alpha-value>)',
        'nav-bar-divider': 'rgb(var(--nav-bar-divider), <alpha-value>)',
        'nav-bar-option': 'rgb(var(--nav-bar-option-border), <alpha-value>)',
        'nav-bar-option-hover': 'rgb(var(--nav-bar-option-border-hover), <alpha-value>)',
        'nav-bar-selected': 'rgb(var(--nav-bar-selected-border), <alpha-value>)',
        'nav-bar-selected-hover': 'rgb(var(--nav-bar-selected-border-hover), <alpha-value>)',

        'nav-side': 'rgb(var(--nav-side-border), <alpha-value>)',
        'nav-side-divider': 'rgb(var(--nav-side-divider), <alpha-value>)',
        'nav-side-option': 'rgb(var(--nav-side-option-border), <alpha-value>)',
        'nav-side-option-hover': 'rgb(var(--nav-side-option-border-hover), <alpha-value>)',
        'nav-side-selected': 'rgb(var(--nav-side-selected-border), <alpha-value>)',
        'nav-side-selected-hover': 'rgb(var(--nav-side-selected-border-hover), <alpha-value>)',

        'nav-profile-avatar': 'rgb(var(--nav-profile-avatar-border), <alpha-value>)',

        'toolbar': 'rgb(var(--toolbar-border), <alpha-value>)',

        'alert-brand': 'rgb(var(--alert-brand-border), <alpha-value>)',
        'alert-default': 'rgb(var(--alert-default-border), <alpha-value>)',
        'alert-danger': 'rgb(var(--alert-danger-border), <alpha-value>)',
        'alert-info': 'rgb(var(--alert-info-border), <alpha-value>)',
        'alert-muted': 'rgb(var(--alert-muted-border), <alpha-value>)',
        'alert-success': 'rgb(var(--alert-success-border), <alpha-value>)',
        'alert-warning': 'rgb(var(--alert-warning-border), <alpha-value>)',

        'button-brand': 'rgb(var(--button-brand-border), <alpha-value>)',
        'button-brand-hover': 'rgb(var(--button-brand-border-hover), <alpha-value>)',
        'button-default': 'rgb(var(--button-default-border), <alpha-value>)',
        'button-default-hover': 'rgb(var(--button-default-border-hover), <alpha-value>)',
        'button-danger': 'rgb(var(--button-danger-border), <alpha-value>)',
        'button-danger-hover': 'rgb(var(--button-danger-border-hover), <alpha-value>)',
        'button-info': 'rgb(var(--button-info-border), <alpha-value>)',
        'button-info-hover': 'rgb(var(--button-info-border-hover), <alpha-value>)',
        'button-link': 'rgb(var(--button-link-border), <alpha-value>)',
        'button-link-hover': 'rgb(var(--button-link-border-hover), <alpha-value>)',
        'button-muted': 'rgb(var(--button-muted-border), <alpha-value>)',
        'button-muted-hover': 'rgb(var(--button-muted-border-hover), <alpha-value>)',
        'button-success': 'rgb(var(--button-success-border), <alpha-value>)',
        'button-success-hover': 'rgb(var(--button-success-border-hover), <alpha-value>)',
        'button-warning': 'rgb(var(--button-warning-border), <alpha-value>)',
        'button-warning-hover': 'rgb(var(--button-warning-border-hover), <alpha-value>)',

        'table': 'rgb(var(--table-border), <alpha-value>)',
        'table-divider': 'rgb(var(--table-divider), <alpha-value>)',
        'table-filters': 'rgb(var(--table-filters-border), <alpha-value>)',
        'active-filter': 'rgb(var(--active-filter-border), <alpha-value>)',

        'paginate-button': 'rgb(var(--paginate-button-border), <alpha-value>)',
        'paginate-button-hover': 'rgb(var(--paginate-button-border-hover), <alpha-value>)',
        'paginate-active': 'rgb(var(--paginate-active-border), <alpha-value>)',
        'paginate-active-hover': 'rgb(var(--paginate-active-border-hover), <alpha-value>)',
        'paginate-disabled': 'rgb(var(--paginate-disabled-border), <alpha-value>)',
        'paginate-disabled-hover': 'rgb(var(--paginate-disabled-border-hover), <alpha-value>)',
        'paginate-limit': 'rgb(var(--paginate-limit-border), <alpha-value>)',
        'paginate-limit-hover': 'rgb(var(--paginate-limit-border-hover), <alpha-value>)',

        'panel': 'rgb(var(--panel-border), <alpha-value>)',
        'panel-divider': 'rgb(var(--panel-divider), <alpha-value>)',

        'input': 'rgb(var(--input-border), <alpha-value>)',
        'input-focus': 'rgb(var(--input-focus-border), <alpha-value>)',

        'modal': 'rgb(var(--modal-border), <alpha-value>)',
        'modal-button': 'rgb(var(--modal-button-border), <alpha-value>)',
        'modal-button-hover': 'rgb(var(--modal-button-border-hover), <alpha-value>)',

    },
    divideColor: {

        'table': 'rgb(var(--table-divider), <alpha-value>)',

    },
    colors: {

        'gray-50': 'rgb(var(--gray-50), <alpha-value>)',
        'gray-100': 'rgb(var(--gray-100), <alpha-value>)',
        'gray-150': 'rgb(var(--gray-150), <alpha-value>)',
        'gray-200': 'rgb(var(--gray-200), <alpha-value>)',
        'gray-250': 'rgb(var(--gray-250), <alpha-value>)',
        'gray-300': 'rgb(var(--gray-300), <alpha-value>)',
        'gray-350': 'rgb(var(--gray-350), <alpha-value>)',
        'gray-400': 'rgb(var(--gray-400), <alpha-value>)',
        'gray-450': 'rgb(var(--gray-450), <alpha-value>)',
        'gray-500': 'rgb(var(--gray-500), <alpha-value>)',
        'gray-550': 'rgb(var(--gray-550), <alpha-value>)',
        'gray-600': 'rgb(var(--gray-600), <alpha-value>)',
        'gray-650': 'rgb(var(--gray-650), <alpha-value>)',
        'gray-700': 'rgb(var(--gray-700), <alpha-value>)',
        'gray-750': 'rgb(var(--gray-750), <alpha-value>)',
        'gray-800': 'rgb(var(--gray-800), <alpha-value>)',
        'gray-850': 'rgb(var(--gray-850), <alpha-value>)',
        'gray-900': 'rgb(var(--gray-900), <alpha-value>)',
        'gray-950': 'rgb(var(--gray-950), <alpha-value>)',
        'gray-1000': 'rgb(var(--gray-1000), <alpha-value>)',

        'brand-50': 'rgb(var(--brand-50), <alpha-value>)',
        'brand-100': 'rgb(var(--brand-100), <alpha-value>)',
        'brand-200': 'rgb(var(--brand-200), <alpha-value>)',
        'brand-300': 'rgb(var(--brand-300), <alpha-value>)',
        'brand-400': 'rgb(var(--brand-400), <alpha-value>)',
        'brand-500': 'rgb(var(--brand-500), <alpha-value>)',
        'brand-600': 'rgb(var(--brand-600), <alpha-value>)',
        'brand-700': 'rgb(var(--brand-700), <alpha-value>)',
        'brand-800': 'rgb(var(--brand-800), <alpha-value>)',
        'brand-900': 'rgb(var(--brand-900), <alpha-value>)',

        'danger-50': 'rgb(var(--danger-50), <alpha-value>)',
        'danger-100': 'rgb(var(--danger-100), <alpha-value>)',
        'danger-200': 'rgb(var(--danger-200), <alpha-value>)',
        'danger-300': 'rgb(var(--danger-300), <alpha-value>)',
        'danger-400': 'rgb(var(--danger-400), <alpha-value>)',
        'danger-500': 'rgb(var(--danger-500), <alpha-value>)',
        'danger-600': 'rgb(var(--danger-600), <alpha-value>)',
        'danger-700': 'rgb(var(--danger-700), <alpha-value>)',
        'danger-800': 'rgb(var(--danger-800), <alpha-value>)',
        'danger-900': 'rgb(var(--danger-900), <alpha-value>)',

        'info-50': 'rgb(var(--info-50), <alpha-value>)',
        'info-100': 'rgb(var(--info-100), <alpha-value>)',
        'info-200': 'rgb(var(--info-200), <alpha-value>)',
        'info-300': 'rgb(var(--info-300), <alpha-value>)',
        'info-400': 'rgb(var(--info-400), <alpha-value>)',
        'info-500': 'rgb(var(--info-500), <alpha-value>)',
        'info-600': 'rgb(var(--info-600), <alpha-value>)',
        'info-700': 'rgb(var(--info-700), <alpha-value>)',
        'info-800': 'rgb(var(--info-800), <alpha-value>)',
        'info-900': 'rgb(var(--info-900), <alpha-value>)',

        'success-50': 'rgb(var(--success-50), <alpha-value>)',
        'success-100': 'rgb(var(--success-100), <alpha-value>)',
        'success-200': 'rgb(var(--success-200), <alpha-value>)',
        'success-300': 'rgb(var(--success-300), <alpha-value>)',
        'success-400': 'rgb(var(--success-400), <alpha-value>)',
        'success-500': 'rgb(var(--success-500), <alpha-value>)',
        'success-600': 'rgb(var(--success-600), <alpha-value>)',
        'success-700': 'rgb(var(--success-700), <alpha-value>)',
        'success-800': 'rgb(var(--success-800), <alpha-value>)',
        'success-900': 'rgb(var(--success-900), <alpha-value>)',

        'warning-50': 'rgb(var(--warning-50), <alpha-value>)',
        'warning-100': 'rgb(var(--warning-100), <alpha-value>)',
        'warning-200': 'rgb(var(--warning-200), <alpha-value>)',
        'warning-300': 'rgb(var(--warning-300), <alpha-value>)',
        'warning-400': 'rgb(var(--warning-400), <alpha-value>)',
        'warning-500': 'rgb(var(--warning-500), <alpha-value>)',
        'warning-600': 'rgb(var(--warning-600), <alpha-value>)',
        'warning-700': 'rgb(var(--warning-700), <alpha-value>)',
        'warning-800': 'rgb(var(--warning-800), <alpha-value>)',
        'warning-900': 'rgb(var(--warning-900), <alpha-value>)',

        'chart-50': 'rgb(var(--chart-50), <alpha-value>)',
        'chart-100': 'rgb(var(--chart-100), <alpha-value>)',
        'chart-200': 'rgb(var(--chart-200), <alpha-value>)',
        'chart-300': 'rgb(var(--chart-300), <alpha-value>)',
        'chart-400': 'rgb(var(--chart-400), <alpha-value>)',
        'chart-500': 'rgb(var(--chart-500), <alpha-value>)',
        'chart-600': 'rgb(var(--chart-600), <alpha-value>)',
        'chart-700': 'rgb(var(--chart-700), <alpha-value>)',
        'chart-800': 'rgb(var(--chart-800), <alpha-value>)',
        'chart-900': 'rgb(var(--chart-900), <alpha-value>)',

    },
    ringColor: {

        'brand': 'rgb(var(--brand), <alpha-value>)',
        'input': 'rgb(var(--input), <alpha-value>)',

    },
    textColor: {

        'login': 'rgb(var(--login), <alpha-value>)',
        'login-input': 'rgb(var(--login-input), <alpha-value>)',
        'login-link': 'rgb(var(--login-link), <alpha-value>)',
        'login-link-hover': 'rgb(var(--login-link-hover), <alpha-value>)',
        'login-placeholder': 'rgb(var(--login-placeholder), <alpha-value>)',

        'default': 'rgb(var(--default), <alpha-value>)',
        'default-hover': 'rgb(var(--default-hover), <alpha-value>)',
        'link': 'rgb(var(--link), <alpha-value>)',
        'link-hover': 'rgb(var(--link-hover), <alpha-value>)',

        'brand': 'rgb(var(--brand), <alpha-value>)',
        'brand-hover': 'rgb(var(--brand-hover), <alpha-value>)',
        'danger': 'rgb(var(--danger), <alpha-value>)',
        'danger-hover': 'rgb(var(--danger-hover), <alpha-value>)',
        'info': 'rgb(var(--info), <alpha-value>)',
        'info-hover': 'rgb(var(--info-hover), <alpha-value>)',
        'muted': 'rgb(var(--muted), <alpha-value>)',
        'muted-hover': 'rgb(var(--muted-hover), <alpha-value>)',
        'success': 'rgb(var(--success), <alpha-value>)',
        'success-hover': 'rgb(var(--success-hover), <alpha-value>)',
        'warning': 'rgb(var(--warning), <alpha-value>)',
        'warning-hover': 'rgb(var(--warning-hover), <alpha-value>)',

        'header': 'rgb(var(--header), <alpha-value>)',
        'header-muted': 'rgb(var(--header-muted), <alpha-value>)',
        'header-link': 'rgb(var(--header-link), <alpha-value>)',
        'header-link-hover': 'rgb(var(--header-link-hover), <alpha-value>)',
        'footer': 'rgb(var(--footer), <alpha-value>)',

        'nav-bar': 'rgb(var(--nav-bar), <alpha-value>)',
        'nav-bar-hover': 'rgb(var(--nav-bar-hover), <alpha-value>)',
        'nav-bar-muted': 'rgb(var(--nav-bar-muted), <alpha-value>)',
        'nav-bar-option': 'rgb(var(--nav-bar-option), <alpha-value>)',
        'nav-bar-option-hover': 'rgb(var(--nav-bar-option-hover), <alpha-value>)',
        'nav-bar-icon': 'rgb(var(--nav-bar-icon), <alpha-value>)',
        'nav-bar-icon-hover': 'rgb(var(--nav-bar-icon-hover), <alpha-value>)',

        'nav-side': 'rgb(var(--nav-side), <alpha-value>)',
        'nav-side-hover': 'rgb(var(--nav-side-hover), <alpha-value>)',
        'nav-side-muted': 'rgb(var(--nav-side-muted), <alpha-value>)',
        'nav-side-option': 'rgb(var(--nav-side-option), <alpha-value>)',
        'nav-side-option-hover': 'rgb(var(--nav-side-option-hover), <alpha-value>)',
        'nav-side-icon': 'rgb(var(--nav-side-icon), <alpha-value>)',
        'nav-side-icon-hover': 'rgb(var(--nav-side-icon-hover), <alpha-value>)',

        'nav-profile': 'rgb(var(--nav-profile), <alpha-value>)',

        'toolbar': 'rgb(var(--toolbar), <alpha-value>)',

        'alert-brand-icon': 'rgb(var(--alert-brand-icon), <alpha-value>)',
        'alert-brand-text': 'rgb(var(--alert-brand-text), <alpha-value>)',
        'alert-brand-title': 'rgb(var(--alert-brand-title), <alpha-value>)',
        'alert-brand-url': 'rgb(var(--alert-brand-url), <alpha-value>)',
        'alert-danger-icon': 'rgb(var(--alert-danger-icon), <alpha-value>)',
        'alert-danger-text': 'rgb(var(--alert-danger-text), <alpha-value>)',
        'alert-danger-title': 'rgb(var(--alert-danger-title), <alpha-value>)',
        'alert-danger-url': 'rgb(var(--alert-danger-url), <alpha-value>)',
        'alert-default-icon': 'rgb(var(--alert-default-icon), <alpha-value>)',
        'alert-default-text': 'rgb(var(--alert-default-text), <alpha-value>)',
        'alert-default-title': 'rgb(var(--alert-default-title), <alpha-value>)',
        'alert-default-url': 'rgb(var(--alert-default-url), <alpha-value>)',
        'alert-info-icon': 'rgb(var(--alert-info-icon), <alpha-value>)',
        'alert-info-text': 'rgb(var(--alert-info-text), <alpha-value>)',
        'alert-info-title': 'rgb(var(--alert-info-title), <alpha-value>)',
        'alert-info-url': 'rgb(var(--alert-info-url), <alpha-value>)',
        'alert-muted-icon': 'rgb(var(--alert-muted-icon), <alpha-value>)',
        'alert-muted-text': 'rgb(var(--alert-muted-text), <alpha-value>)',
        'alert-muted-title': 'rgb(var(--alert-muted-title), <alpha-value>)',
        'alert-muted-url': 'rgb(var(--alert-muted-url), <alpha-value>)',
        'alert-success-icon': 'rgb(var(--alert-success-icon), <alpha-value>)',
        'alert-success-text': 'rgb(var(--alert-success-text), <alpha-value>)',
        'alert-success-title': 'rgb(var(--alert-success-title), <alpha-value>)',
        'alert-success-url': 'rgb(var(--alert-success-url), <alpha-value>)',
        'alert-warning-icon': 'rgb(var(--alert-warning-icon), <alpha-value>)',
        'alert-warning-text': 'rgb(var(--alert-warning-text), <alpha-value>)',
        'alert-warning-title': 'rgb(var(--alert-warning-title), <alpha-value>)',
        'alert-warning-url': 'rgb(var(--alert-warning-url), <alpha-value>)',

        'button-brand': 'rgb(var(--button-brand), <alpha-value>)',
        'button-brand-hover': 'rgb(var(--button-brand-hover), <alpha-value>)',
        'button-brand-icon': 'rgb(var(--button-brand-icon), <alpha-value>)',
        'button-brand-icon-hover': 'rgb(var(--button-brand-icon-hover), <alpha-value>)',
        'button-default': 'rgb(var(--button-default), <alpha-value>)',
        'button-default-hover': 'rgb(var(--button-default-hover), <alpha-value>)',
        'button-default-icon': 'rgb(var(--button-default-icon), <alpha-value>)',
        'button-default-icon-hover': 'rgb(var(--button-default-icon-hover), <alpha-value>)',
        'button-danger': 'rgb(var(--button-danger), <alpha-value>)',
        'button-danger-hover': 'rgb(var(--button-danger-hover), <alpha-value>)',
        'button-danger-icon': 'rgb(var(--button-danger-icon), <alpha-value>)',
        'button-danger-icon-hover': 'rgb(var(--button-danger-icon-hover), <alpha-value>)',
        'button-info': 'rgb(var(--button-info), <alpha-value>)',
        'button-info-hover': 'rgb(var(--button-info-hover), <alpha-value>)',
        'button-info-icon': 'rgb(var(--button-info-icon), <alpha-value>)',
        'button-info-icon-hover': 'rgb(var(--button-info-icon-hover), <alpha-value>)',
        'button-link': 'rgb(var(--button-link), <alpha-value>)',
        'button-link-hover': 'rgb(var(--button-link-hover), <alpha-value>)',
        'button-link-icon': 'rgb(var(--button-link-icon), <alpha-value>)',
        'button-link-icon-hover': 'rgb(var(--button-link-icon-hover), <alpha-value>)',
        'button-muted': 'rgb(var(--button-muted), <alpha-value>)',
        'button-muted-hover': 'rgb(var(--button-muted-hover), <alpha-value>)',
        'button-muted-icon': 'rgb(var(--button-muted-icon), <alpha-value>)',
        'button-muted-icon-hover': 'rgb(var(--button-muted-icon-hover), <alpha-value>)',
        'button-success': 'rgb(var(--button-success), <alpha-value>)',
        'button-success-hover': 'rgb(var(--button-success-hover), <alpha-value>)',
        'button-success-icon': 'rgb(var(--button-success-icon), <alpha-value>)',
        'button-success-icon-hover': 'rgb(var(--button-success-icon-hover), <alpha-value>)',
        'button-warning': 'rgb(var(--button-warning), <alpha-value>)',
        'button-warning-hover': 'rgb(var(--button-warning-hover), <alpha-value>)',
        'button-warning-icon': 'rgb(var(--button-warning-icon), <alpha-value>)',
        'button-warning-icon-hover': 'rgb(var(--button-warning-icon-hover), <alpha-value>)',

        'pill-brand': 'rgb(var(--pill-brand), <alpha-value>)',
        'pill-danger': 'rgb(var(--pill-danger), <alpha-value>)',
        'pill-info': 'rgb(var(--pill-info), <alpha-value>)',
        'pill-muted': 'rgb(var(--pill-muted), <alpha-value>)',
        'pill-success': 'rgb(var(--pill-success), <alpha-value>)',
        'pill-warning': 'rgb(var(--pill-warning), <alpha-value>)',

        'table-header': 'rgb(var(--table-header), <alpha-value>)',
        'table-header-hover': 'rgb(var(--table-header-hover), <alpha-value>)',
        'table-row': 'rgb(var(--table-row), <alpha-value>)',
        'table-row-muted': 'rgb(var(--table-row-muted), <alpha-value>)',
        'table-filters': 'rgb(var(--table-filters), <alpha-value>)',
        'table-filters-hover': 'rgb(var(--table-filters-hover), <alpha-value>)',
        'table-filters-icon': 'rgb(var(--table-filters-icon), <alpha-value>)',
        'table-filters-icon-hover': 'rgb(var(--table-filters-icon-hover), <alpha-value>)',
        'table-action-icon': 'rgb(var(--table-action-icon), <alpha-value>)',
        'table-action-icon-hover': 'rgb(var(--table-action-icon-hover), <alpha-value>)',

        'active-filter': 'rgb(var(--active-filter), <alpha-value>)',
        'active-filter-icon': 'rgb(var(--active-filter-icon), <alpha-value>)',
        'active-filter-icon-hover': 'rgb(var(--active-filter-icon-hover), <alpha-value>)',

        'paginate-button': 'rgb(var(--paginate-button), <alpha-value>)',
        'paginate-button-hover': 'rgb(var(--paginate-button-hover), <alpha-value>)',
        'paginate-active': 'rgb(var(--paginate-active), <alpha-value>)',
        'paginate-active-hover': 'rgb(var(--paginate-active-hover), <alpha-value>)',
        'paginate-disabled': 'rgb(var(--paginate-disabled), <alpha-value>)',
        'paginate-disabled-hover': 'rgb(var(--paginate-disabled-hover), <alpha-value>)',
        'paginate-limit': 'rgb(var(--paginate-limit), <alpha-value>)',
        'paginate-limit-hover': 'rgb(var(--paginate-limit-hover), <alpha-value>)',

        'panel': 'rgb(var(--panel), <alpha-value>)',
        'panel-header': 'rgb(var(--panel-header), <alpha-value>)',

        'input': 'rgb(var(--input), <alpha-value>)',
        'input-muted': 'rgb(var(--input-muted), <alpha-value>)',
        'input-placeholder': 'rgb(var(--input-placeholder), <alpha-value>)',

        'input-option': 'rgb(var(--input-option), <alpha-value>)',
        'input-option-hover': 'rgb(var(--input-option-hover), <alpha-value>)',
        'input-option-sub': 'rgb(var(--input-option-sub), <alpha-value>)',
        'input-option-sub-hover': 'rgb(var(--input-option-sub-hover), <alpha-value>)',

        'modal': 'rgb(var(--modal), <alpha-value>)',
        'modal-muted': 'rgb(var(--modal-muted), <alpha-value>)',
        'modal-button': 'rgb(var(--modal-button), <alpha-value>)',
        'modal-button-hover': 'rgb(var(--modal-button-hover), <alpha-value>)',

    }
}

function backgroundColor(customBackgroundColor) {
    return { ...theme.backgroundColor, ...customBackgroundColor};
}

function borderColor(customBorderColor) {
    return { ...theme.borderColor, ...customBorderColor};
}

function colors(customColors) {
    return { ...theme.colors, ...customColors};
}

function divideColor(customColors) {
    return { ...theme.divideColor, ...customColors};
}

function ringColor(customRingColor) {
    return { ...theme.ringColor, ...customRingColor};
}

function textColor(customTextColor) {
    return { ...theme.textColor, ...customTextColor};
}

module.exports.backgroundColor = backgroundColor;
module.exports.borderColor = borderColor;
module.exports.colors = colors;
module.exports.divideColor = divideColor;
module.exports.ringColor = ringColor;
module.exports.textColor = textColor;
