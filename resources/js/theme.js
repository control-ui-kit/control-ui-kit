const theme = {
    backgroundColor: {

        'login': withOpacityValue('--login-bg'),
        'login-input': withOpacityValue('--login-bg'),
        'app': withOpacityValue('--app-bg'),
        'header': withOpacityValue('--header-bg'),
        'header-hover': withOpacityValue('--header-bg-hover'),
        'footer': withOpacityValue('--footer-bg'),

        'nav-bar': withOpacityValue('--nav-bar-bg'),
        'nav-bar-hover': withOpacityValue('--nav-bar-bg-hover'),
        'nav-bar-option': withOpacityValue('--nav-bar-option-bg'),
        'nav-bar-option-hover': withOpacityValue('--nav-bar-option-bg-hover'),
        'nav-bar-selected': withOpacityValue('--nav-bar-selected-bg'),
        'nav-bar-selected-hover': withOpacityValue('--nav-bar-selected-bg-hover'),

        'nav-side': withOpacityValue('--nav-side-bg'),
        'nav-side-hover': withOpacityValue('--nav-side-bg-hover'),
        'nav-side-option': withOpacityValue('--nav-side-option-bg'),
        'nav-side-option-hover': withOpacityValue('--nav-side-option-bg-hover'),
        'nav-side-selected': withOpacityValue('--nav-side-selected-bg'),
        'nav-side-selected-hover': withOpacityValue('--nav-side-selected-bg-hover'),

        'nav-profile-header': withOpacityValue('--nav-profile-header-bg'),

        'toolbar': withOpacityValue('--toolbar-bg'),

        'alert-brand': withOpacityValue('--alert-brand-bg'),
        'alert-default': withOpacityValue('--alert-default-bg'),
        'alert-danger': withOpacityValue('--alert-danger-bg'),
        'alert-info': withOpacityValue('--alert-info-bg'),
        'alert-success': withOpacityValue('--alert-success-bg'),
        'alert-muted': withOpacityValue('--alert-muted-bg'),
        'alert-warning': withOpacityValue('--alert-warning-bg'),

        'button-brand': withOpacityValue('--button-brand-bg'),
        'button-brand-hover': withOpacityValue('--button-brand-bg-hover'),
        'button-default': withOpacityValue('--button-default-bg'),
        'button-default-hover': withOpacityValue('--button-default-bg-hover'),
        'button-danger': withOpacityValue('--button-danger-bg'),
        'button-danger-hover': withOpacityValue('--button-danger-bg-hover'),
        'button-info': withOpacityValue('--button-info-bg'),
        'button-info-hover': withOpacityValue('--button-info-bg-hover'),
        'button-link': withOpacityValue('--button-link-bg'),
        'button-link-hover': withOpacityValue('--button-link-bg-hover'),
        'button-success': withOpacityValue('--button-success-bg'),
        'button-success-hover': withOpacityValue('--button-success-bg-hover'),
        'button-muted': withOpacityValue('--button-muted-bg'),
        'button-muted-hover': withOpacityValue('--button-muted-bg-hover'),
        'button-warning': withOpacityValue('--button-warning-bg'),
        'button-warning-hover': withOpacityValue('--button-warning-bg-hover'),

        'pill-brand': withOpacityValue('--pill-brand-bg'),
        'pill-default': withOpacityValue('--pill-default-bg'),
        'pill-danger': withOpacityValue('--pill-danger-bg'),
        'pill-info': withOpacityValue('--pill-info-bg'),
        'pill-success': withOpacityValue('--pill-success-bg'),
        'pill-muted': withOpacityValue('--pill-muted-bg'),
        'pill-warning': withOpacityValue('--pill-warning-bg'),

        'table-header': withOpacityValue('--table-header-bg'),
        'table-row-1': withOpacityValue('--table-row-bg-1'),
        'table-row-2': withOpacityValue('--table-row-bg-2'),
        'table-row-hover': withOpacityValue('--table-row-bg-hover'),
        'table-row-muted': withOpacityValue('--table-row-muted-bg'),
        'table-filters': withOpacityValue('--table-filters-bg'),
        'table-filters-hover': withOpacityValue('--table-filters-bg-hover'),
        'table-filter': withOpacityValue('--table-filter-bg'),
        'active-filter': withOpacityValue('--active-filter-bg'),

        'paginate-button': withOpacityValue('--paginate-button-bg'),
        'paginate-button-hover': withOpacityValue('--paginate-button-bg-hover'),
        'paginate-active': withOpacityValue('--paginate-active-bg'),
        'paginate-active-hover': withOpacityValue('--paginate-active-bg-hover'),
        'paginate-disabled': withOpacityValue('--paginate-disabled-bg'),
        'paginate-disabled-hover': withOpacityValue('--paginate-disabled-bg-hover'),
        'paginate-limit': withOpacityValue('--paginate-limit-bg'),
        'paginate-limit-hover': withOpacityValue('--paginate-limit-bg-hover'),

        'panel': withOpacityValue('--panel-bg'),
        'input': withOpacityValue('--input-bg'),
        'input-brand': withOpacityValue('--brand'),
        'input-muted': withOpacityValue('--input-muted-bg'),
        'input-option': withOpacityValue('--input-option-bg'),
        'input-option-hover': withOpacityValue('--input-option-bg-hover'),

        'modal': withOpacityValue('--modal-bg'),
        'modal-blur': withOpacityValue('--modal-blur-bg'),
        'modal-header': withOpacityValue('--modal-header-bg'),
        'modal-footer': withOpacityValue('--modal-footer-bg'),

    },
    borderColor: {

        'login-input': withOpacityValue('--login-input-border'),

        'default': withOpacityValue('--border'),
        'header': withOpacityValue('--header-border'),
        'footer': withOpacityValue('--footer-border'),

        'nav-bar': withOpacityValue('--nav-bar-border'),
        'nav-bar-divider': withOpacityValue('--nav-bar-divider'),
        'nav-bar-option': withOpacityValue('--nav-bar-option-border'),
        'nav-bar-option-hover': withOpacityValue('--nav-bar-option-border-hover'),
        'nav-bar-selected': withOpacityValue('--nav-bar-selected-border'),
        'nav-bar-selected-hover': withOpacityValue('--nav-bar-selected-border-hover'),

        'nav-side': withOpacityValue('--nav-side-border'),
        'nav-side-divider': withOpacityValue('--nav-side-divider'),
        'nav-side-option': withOpacityValue('--nav-side-option-border'),
        'nav-side-option-hover': withOpacityValue('--nav-side-option-border-hover'),
        'nav-side-selected': withOpacityValue('--nav-side-selected-border'),
        'nav-side-selected-hover': withOpacityValue('--nav-side-selected-border-hover'),

        'nav-profile-avatar': withOpacityValue('--nav-profile-avatar-border'),

        'toolbar': withOpacityValue('--toolbar-border'),

        'alert-brand': withOpacityValue('--alert-brand-border'),
        'alert-danger': withOpacityValue('--alert-danger-border'),
        'alert-info': withOpacityValue('--alert-info-border'),
        'alert-muted': withOpacityValue('--alert-muted-border'),
        'alert-success': withOpacityValue('--alert-success-border'),
        'alert-warning': withOpacityValue('--alert-warning-border'),

        'button-brand': withOpacityValue('--button-brand-border'),
        'button-brand-hover': withOpacityValue('--button-brand-border-hover'),
        'button-default': withOpacityValue('--button-default-border'),
        'button-default-hover': withOpacityValue('--button-default-border-hover'),
        'button-danger': withOpacityValue('--button-danger-border'),
        'button-danger-hover': withOpacityValue('--button-danger-border-hover'),
        'button-info': withOpacityValue('--button-info-border'),
        'button-info-hover': withOpacityValue('--button-info-border-hover'),
        'button-link': withOpacityValue('--button-link-border'),
        'button-link-hover': withOpacityValue('--button-link-border-hover'),
        'button-muted': withOpacityValue('--button-muted-border'),
        'button-muted-hover': withOpacityValue('--button-muted-border-hover'),
        'button-success': withOpacityValue('--button-success-border'),
        'button-success-hover': withOpacityValue('--button-success-border-hover'),
        'button-warning': withOpacityValue('--button-warning-border'),
        'button-warning-hover': withOpacityValue('--button-warning-border-hover'),

        'table': withOpacityValue('--table-border'),
        'table-divider': withOpacityValue('--table-divider'),
        'table-filters': withOpacityValue('--table-filters-border'),
        'active-filter': withOpacityValue('--active-filter-border'),

        'paginate-button': withOpacityValue('--paginate-button-border'),
        'paginate-button-hover': withOpacityValue('--paginate-button-border-hover'),
        'paginate-active': withOpacityValue('--paginate-active-border'),
        'paginate-active-hover': withOpacityValue('--paginate-active-border-hover'),
        'paginate-disabled': withOpacityValue('--paginate-disabled-border'),
        'paginate-disabled-hover': withOpacityValue('--paginate-disabled-border-hover'),
        'paginate-limit': withOpacityValue('--paginate-limit-border'),
        'paginate-limit-hover': withOpacityValue('--paginate-limit-border-hover'),

        'panel': withOpacityValue('--panel-border'),
        'panel-divider': withOpacityValue('--panel-divider'),

        'input': withOpacityValue('--input-border'),
        'input-focus': withOpacityValue('--input-focus-border'),

        'modal': withOpacityValue('--modal-border'),

    },
    divideColor: {

        'table': 'var(--table-divider)',

    },
    colors: {

        'gray-50': withOpacityValue('--gray-50'),
        'gray-100': withOpacityValue('--gray-100'),
        'gray-150': withOpacityValue('--gray-150'),
        'gray-200': withOpacityValue('--gray-200'),
        'gray-250': withOpacityValue('--gray-250'),
        'gray-300': withOpacityValue('--gray-300'),
        'gray-350': withOpacityValue('--gray-350'),
        'gray-400': withOpacityValue('--gray-400'),
        'gray-450': withOpacityValue('--gray-450'),
        'gray-500': withOpacityValue('--gray-500'),
        'gray-550': withOpacityValue('--gray-550'),
        'gray-600': withOpacityValue('--gray-600'),
        'gray-650': withOpacityValue('--gray-650'),
        'gray-700': withOpacityValue('--gray-700'),
        'gray-750': withOpacityValue('--gray-750'),
        'gray-800': withOpacityValue('--gray-800'),
        'gray-850': withOpacityValue('--gray-850'),
        'gray-900': withOpacityValue('--gray-900'),
        'gray-950': withOpacityValue('--gray-950'),
        'gray-1000': withOpacityValue('--gray-1000'),

        'brand-50': withOpacityValue('--brand-50'),
        'brand-100': withOpacityValue('--brand-100'),
        'brand-200': withOpacityValue('--brand-200'),
        'brand-300': withOpacityValue('--brand-300'),
        'brand-400': withOpacityValue('--brand-400'),
        'brand-500': withOpacityValue('--brand-500'),
        'brand-600': withOpacityValue('--brand-600'),
        'brand-700': withOpacityValue('--brand-700'),
        'brand-800': withOpacityValue('--brand-800'),
        'brand-900': withOpacityValue('--brand-900'),

        // rgb(var(--danger-500), var(--tw-bg-opacity))

        'danger-50': withOpacityValue('--danger-50'),
        'danger-100': withOpacityValue('--danger-100'),
        'danger-200': withOpacityValue('--danger-200'),
        'danger-300': withOpacityValue('--danger-300'),
        'danger-400': withOpacityValue('--danger-400'),
        // 'danger-500': withOpacityValue('--danger-500'),
        'danger-500': withOpacityValue('--danger-500'),
        'danger-600': withOpacityValue('--danger-600'),
        'danger-700': withOpacityValue('--danger-700'),
        'danger-800': withOpacityValue('--danger-800'),
        'danger-900': withOpacityValue('--danger-900'),

        'info-50': withOpacityValue('--info-50'),
        'info-100': withOpacityValue('--info-100'),
        'info-200': withOpacityValue('--info-200'),
        'info-300': withOpacityValue('--info-300'),
        'info-400': withOpacityValue('--info-400'),
        'info-500': withOpacityValue('--info-500'),
        'info-600': withOpacityValue('--info-600'),
        'info-700': withOpacityValue('--info-700'),
        'info-800': withOpacityValue('--info-800'),
        'info-900': withOpacityValue('--info-900'),

        'success-50': withOpacityValue('--success-50'),
        'success-100': withOpacityValue('--success-100'),
        'success-200': withOpacityValue('--success-200'),
        'success-300': withOpacityValue('--success-300'),
        'success-400': withOpacityValue('--success-400'),
        'success-500': withOpacityValue('--success-500'),
        'success-600': withOpacityValue('--success-600'),
        'success-700': withOpacityValue('--success-700'),
        'success-800': withOpacityValue('--success-800'),
        'success-900': withOpacityValue('--success-900'),

        'warning-50': withOpacityValue('--warning-50'),
        'warning-100': withOpacityValue('--warning-100'),
        'warning-200': withOpacityValue('--warning-200'),
        'warning-300': withOpacityValue('--warning-300'),
        'warning-400': withOpacityValue('--warning-400'),
        'warning-500': withOpacityValue('--warning-500'),
        'warning-600': withOpacityValue('--warning-600'),
        'warning-700': withOpacityValue('--warning-700'),
        'warning-800': withOpacityValue('--warning-800'),
        'warning-900': withOpacityValue('--warning-900'),

        'chart-50': withOpacityValue('--chart-50'),
        'chart-100': withOpacityValue('--chart-100'),
        'chart-200': withOpacityValue('--chart-200'),
        'chart-300': withOpacityValue('--chart-300'),
        'chart-400': withOpacityValue('--chart-400'),
        'chart-500': withOpacityValue('--chart-500'),
        'chart-600': withOpacityValue('--chart-600'),
        'chart-700': withOpacityValue('--chart-700'),
        'chart-800': withOpacityValue('--chart-800'),
        'chart-900': withOpacityValue('--chart-900'),

    },
    ringColor: {

        'brand': withOpacityValue('--brand'),
        'input': withOpacityValue('--input'),

    },
    textColor: {

        'login': withOpacityValue('--login'),
        'login-input': withOpacityValue('--login-input'),
        'login-link': withOpacityValue('--login-link'),
        'login-link-hover': withOpacityValue('--login-link-hover'),
        'login-placeholder': withOpacityValue('--login-placeholder'),

        'default': withOpacityValue('--default'),
        'default-hover': withOpacityValue('--default-hover'),
        'link': withOpacityValue('--link'),
        'link-hover': withOpacityValue('--link-hover'),

        'brand': withOpacityValue('--brand'),
        'brand-hover': withOpacityValue('--brand-hover'),
        'danger': withOpacityValue('--danger'),
        'danger-hover': withOpacityValue('--danger-hover'),
        'info': withOpacityValue('--info'),
        'info-hover': withOpacityValue('--info-hover'),
        'muted': withOpacityValue('--muted'),
        'muted-hover': withOpacityValue('--muted-hover'),
        'success': withOpacityValue('--success'),
        'success-hover': withOpacityValue('--success-hover'),
        'warning': withOpacityValue('--warning'),
        'warning-hover': withOpacityValue('--warning-hover'),

        'header': withOpacityValue('--header'),
        'header-muted': withOpacityValue('--header-muted'),
        'header-link': withOpacityValue('--header-link'),
        'header-link-hover': withOpacityValue('--header-link-hover'),
        'footer': withOpacityValue('--footer'),

        'nav-bar': withOpacityValue('--nav-bar'),
        'nav-bar-hover': withOpacityValue('--nav-bar-hover'),
        'nav-bar-muted': withOpacityValue('--nav-bar-muted'),
        'nav-bar-option': withOpacityValue('--nav-bar-option'),
        'nav-bar-option-hover': withOpacityValue('--nav-bar-option-hover'),
        'nav-bar-icon': withOpacityValue('--nav-bar-icon'),
        'nav-bar-icon-hover': withOpacityValue('--nav-bar-icon-hover'),

        'nav-side': withOpacityValue('--nav-side'),
        'nav-side-hover': withOpacityValue('--nav-side-hover'),
        'nav-side-muted': withOpacityValue('--nav-side-muted'),
        'nav-side-option': withOpacityValue('--nav-side-option'),
        'nav-side-option-hover': withOpacityValue('--nav-side-option-hover'),
        'nav-side-icon': withOpacityValue('--nav-side-icon'),
        'nav-side-icon-hover': withOpacityValue('--nav-side-icon-hover'),

        'nav-profile': withOpacityValue('--nav-profile'),

        'toolbar': withOpacityValue('--toolbar'),

        'alert-brand-icon': withOpacityValue('--alert-brand-icon'),
        'alert-brand-text': withOpacityValue('--alert-brand-text'),
        'alert-brand-title': withOpacityValue('--alert-brand-title'),
        'alert-danger-icon': withOpacityValue('--alert-danger-icon'),
        'alert-danger-text': withOpacityValue('--alert-danger-text'),
        'alert-danger-title': withOpacityValue('--alert-danger-title'),
        'alert-info-icon': withOpacityValue('--alert-info-icon'),
        'alert-info-text': withOpacityValue('--alert-info-text'),
        'alert-info-title': withOpacityValue('--alert-info-title'),
        'alert-muted-icon': withOpacityValue('--alert-muted-icon'),
        'alert-muted-text': withOpacityValue('--alert-muted-text'),
        'alert-muted-title': withOpacityValue('--alert-muted-title'),
        'alert-success-icon': withOpacityValue('--alert-success-icon'),
        'alert-success-text': withOpacityValue('--alert-success-text'),
        'alert-success-title': withOpacityValue('--alert-success-title'),
        'alert-warning-icon': withOpacityValue('--alert-warning-icon'),
        'alert-warning-text': withOpacityValue('--alert-warning-text'),
        'alert-warning-title': withOpacityValue('--alert-warning-title'),

        'button-brand': withOpacityValue('--button-brand'),
        'button-brand-hover': withOpacityValue('--button-brand-hover'),
        'button-brand-icon': withOpacityValue('--button-brand-icon'),
        'button-brand-icon-hover': withOpacityValue('--button-brand-icon-hover'),
        'button-default': withOpacityValue('--button-default'),
        'button-default-hover': withOpacityValue('--button-default-hover'),
        'button-default-icon': withOpacityValue('--button-default-icon'),
        'button-default-icon-hover': withOpacityValue('--button-default-icon-hover'),
        'button-danger': withOpacityValue('--button-danger'),
        'button-danger-hover': withOpacityValue('--button-danger-hover'),
        'button-danger-icon': withOpacityValue('--button-danger-icon'),
        'button-danger-icon-hover': withOpacityValue('--button-danger-icon-hover'),
        'button-info': withOpacityValue('--button-info'),
        'button-info-hover': withOpacityValue('--button-info-hover'),
        'button-info-icon': withOpacityValue('--button-info-icon'),
        'button-info-icon-hover': withOpacityValue('--button-info-icon-hover'),
        'button-link': withOpacityValue('--button-link'),
        'button-link-hover': withOpacityValue('--button-link-hover'),
        'button-link-icon': withOpacityValue('--button-link-icon'),
        'button-link-icon-hover': withOpacityValue('--button-link-icon-hover'),
        'button-muted': withOpacityValue('--button-muted'),
        'button-muted-hover': withOpacityValue('--button-muted-hover'),
        'button-muted-icon': withOpacityValue('--button-muted-icon'),
        'button-muted-icon-hover': withOpacityValue('--button-muted-icon-hover'),
        'button-success': withOpacityValue('--button-success'),
        'button-success-hover': withOpacityValue('--button-success-hover'),
        'button-success-icon': withOpacityValue('--button-success-icon'),
        'button-success-icon-hover': withOpacityValue('--button-success-icon-hover'),
        'button-warning': withOpacityValue('--button-warning'),
        'button-warning-hover': withOpacityValue('--button-warning-hover'),
        'button-warning-icon': withOpacityValue('--button-warning-icon'),
        'button-warning-icon-hover': withOpacityValue('--button-warning-icon-hover'),

        'pill-brand': withOpacityValue('--pill-brand'),
        'pill-danger': withOpacityValue('--pill-danger'),
        'pill-info': withOpacityValue('--pill-info'),
        'pill-muted': withOpacityValue('--pill-muted'),
        'pill-success': withOpacityValue('--pill-success'),
        'pill-warning': withOpacityValue('--pill-warning'),

        'table-header': withOpacityValue('--table-header'),
        'table-header-hover': withOpacityValue('--table-header-hover'),
        'table-row': withOpacityValue('--table-row'),
        'table-row-muted': withOpacityValue('--table-row-muted'),
        'table-filters': withOpacityValue('--table-filters'),
        'table-filters-hover': withOpacityValue('--table-filters-hover'),
        'table-filters-icon': withOpacityValue('--table-filters-icon'),
        'table-filters-icon-hover': withOpacityValue('--table-filters-icon-hover'),
        'table-action-icon': withOpacityValue('--table-action-icon'),
        'table-action-icon-hover': withOpacityValue('--table-action-icon-hover'),

        'active-filter': withOpacityValue('--active-filter'),
        'active-filter-icon': withOpacityValue('--active-filter-icon'),
        'active-filter-icon-hover': withOpacityValue('--active-filter-icon-hover'),

        'paginate-button': withOpacityValue('--paginate-button'),
        'paginate-button-hover': withOpacityValue('--paginate-button-hover'),
        'paginate-active': withOpacityValue('--paginate-active'),
        'paginate-active-hover': withOpacityValue('--paginate-active-hover'),
        'paginate-disabled': withOpacityValue('--paginate-disabled'),
        'paginate-disabled-hover': withOpacityValue('--paginate-disabled-hover'),
        'paginate-limit': withOpacityValue('--paginate-limit'),
        'paginate-limit-hover': withOpacityValue('--paginate-limit-hover'),

        'panel': withOpacityValue('--panel'),
        'panel-header': withOpacityValue('--panel-header'),

        'input': withOpacityValue('--input'),
        'input-muted': withOpacityValue('--input-muted'),
        'input-placeholder': withOpacityValue('--input-placeholder'),

        'input-option': withOpacityValue('--input-option'),
        'input-option-hover': withOpacityValue('--input-option-hover'),
        'input-option-sub': withOpacityValue('--input-option-sub'),
        'input-option-sub-hover': withOpacityValue('--input-option-sub-hover'),

        'modal': withOpacityValue('--modal'),
        'modal-muted': withOpacityValue('--modal-muted'),

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

function withOpacityValue(variable) {
    return ({ opacityValue }) => {
        if (opacityValue === undefined) {
            return `rgb(var(${variable}))`
        }
        return `rgb(var(${variable}), ${opacityValue})`
    }
}
