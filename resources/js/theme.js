function withOpacity(variableName) {
    return ({ opacityValue }) => {
        if (opacityValue !== undefined) {
            return `rgb(var(${variableName}), ${opacityValue})`;
        }
        return `rgb(var(${variableName}))`;
    };
}

const theme = {
    backgroundColor: {

        'login': withOpacity('--login-bg'),
        'login-input': withOpacity('--login-bg'),
        'app': withOpacity('--app-bg'),
        'header': withOpacity('--header-bg'),
        'header-hover': withOpacity('--header-bg-hover'),
        'footer': withOpacity('--footer-bg'),

        'nav-bar': withOpacity('--nav-bar-bg'),
        'nav-bar-hover': withOpacity('--nav-bar-bg-hover'),
        'nav-bar-option': withOpacity('--nav-bar-option-bg'),
        'nav-bar-option-hover': withOpacity('--nav-bar-option-bg-hover'),
        'nav-bar-selected': withOpacity('--nav-bar-selected-bg'),
        'nav-bar-selected-hover': withOpacity('--nav-bar-selected-bg-hover'),

        'nav-side': withOpacity('--nav-side-bg'),
        'nav-side-hover': withOpacity('--nav-side-bg-hover'),
        'nav-side-option': withOpacity('--nav-side-option-bg'),
        'nav-side-option-hover': withOpacity('--nav-side-option-bg-hover'),
        'nav-side-selected': withOpacity('--nav-side-selected-bg'),
        'nav-side-selected-hover': withOpacity('--nav-side-selected-bg-hover'),

        'nav-profile-header': withOpacity('--nav-profile-header-bg'),

        'toolbar': withOpacity('--toolbar-bg'),

        'alert-brand': withOpacity('--alert-brand-bg'),
        'alert-default': withOpacity('--alert-default-bg'),
        'alert-danger': withOpacity('--alert-danger-bg'),
        'alert-info': withOpacity('--alert-info-bg'),
        'alert-success': withOpacity('--alert-success-bg'),
        'alert-muted': withOpacity('--alert-muted-bg'),
        'alert-warning': withOpacity('--alert-warning-bg'),

        'button-brand': withOpacity('--button-brand-bg'),
        'button-brand-hover': withOpacity('--button-brand-bg-hover'),
        'button-default': withOpacity('--button-default-bg'),
        'button-default-hover': withOpacity('--button-default-bg-hover'),
        'button-danger': withOpacity('--button-danger-bg'),
        'button-danger-hover': withOpacity('--button-danger-bg-hover'),
        'button-info': withOpacity('--button-info-bg'),
        'button-info-hover': withOpacity('--button-info-bg-hover'),
        'button-link': withOpacity('--button-link-bg'),
        'button-link-hover': withOpacity('--button-link-bg-hover'),
        'button-success': withOpacity('--button-success-bg'),
        'button-success-hover': withOpacity('--button-success-bg-hover'),
        'button-muted': withOpacity('--button-muted-bg'),
        'button-muted-hover': withOpacity('--button-muted-bg-hover'),
        'button-warning': withOpacity('--button-warning-bg'),
        'button-warning-hover': withOpacity('--button-warning-bg-hover'),

        'pill-brand': withOpacity('--pill-brand-bg'),
        'pill-default': withOpacity('--pill-default-bg'),
        'pill-danger': withOpacity('--pill-danger-bg'),
        'pill-info': withOpacity('--pill-info-bg'),
        'pill-success': withOpacity('--pill-success-bg'),
        'pill-muted': withOpacity('--pill-muted-bg'),
        'pill-warning': withOpacity('--pill-warning-bg'),

        'table-header': withOpacity('--table-header-bg'),
        'table-row-1': withOpacity('--table-row-bg-1'),
        'table-row-2': withOpacity('--table-row-bg-2'),
        'table-row-hover': withOpacity('--table-row-bg-hover'),
        'table-row-muted': withOpacity('--table-row-muted-bg'),
        'table-row-muted-hover': withOpacity('--table-row-muted-bg'),
        'table-row-brand': withOpacity('--table-row-brand-bg'),
        'table-row-brand-hover': withOpacity('--table-row-brand-hover-bg'),
        'table-row-danger': withOpacity('--table-row-danger-bg'),
        'table-row-danger-hover': withOpacity('--table-row-danger-hover-bg'),
        'table-row-info': withOpacity('--table-row-info-bg'),
        'table-row-info-hover': withOpacity('--table-row-info-hover-bg'),
        'table-row-success': withOpacity('--table-row-success-bg'),
        'table-row-success-hover': withOpacity('--table-row-success-hover-bg'),
        'table-row-warning': withOpacity('--table-row-warning-bg'),
        'table-row-warning-hover': withOpacity('--table-row-warning-hover-bg'),
        'table-filters': withOpacity('--table-filters-bg'),
        'table-filters-hover': withOpacity('--table-filters-bg-hover'),
        'table-filter': withOpacity('--table-filter-bg'),
        'active-filter': withOpacity('--active-filter-bg'),

        'paginate-button': withOpacity('--paginate-button-bg'),
        'paginate-button-hover': withOpacity('--paginate-button-bg-hover'),
        'paginate-active': withOpacity('--paginate-active-bg'),
        'paginate-active-hover': withOpacity('--paginate-active-bg-hover'),
        'paginate-disabled': withOpacity('--paginate-disabled-bg'),
        'paginate-disabled-hover': withOpacity('--paginate-disabled-bg-hover'),
        'paginate-limit': withOpacity('--paginate-limit-bg'),
        'paginate-limit-hover': withOpacity('--paginate-limit-bg-hover'),

        'panel': withOpacity('--panel-bg'),
        'panel-header': withOpacity('--panel-header-bg'),
        'panel-footer': withOpacity('--panel-footer-bg'),

        'input': withOpacity('--input-bg'),
        'input-item': withOpacity('--input-item-bg'),
        'input-brand': withOpacity('--brand'),
        'input-muted': withOpacity('--input-muted-bg'),
        'input-option': withOpacity('--input-option-bg'),
        'input-option-hover': withOpacity('--input-option-bg-hover'),

        'modal': withOpacity('--modal-bg'),
        'modal-blur': withOpacity('--modal-blur-bg'),
        'modal-header': withOpacity('--modal-header-bg'),
        'modal-footer': withOpacity('--modal-footer-bg'),
        'modal-button': withOpacity('--modal-button-bg'),
        'modal-button-hover': withOpacity('--modal-button-bg-hover'),

    },
    borderColor: {

        'login-input': withOpacity('--login-input-border'),

        'header': withOpacity('--header-border'),
        'footer': withOpacity('--footer-border'),

        'nav-bar': withOpacity('--nav-bar-border'),
        'nav-bar-divider': withOpacity('--nav-bar-divider'),
        'nav-bar-option': withOpacity('--nav-bar-option-border'),
        'nav-bar-option-hover': withOpacity('--nav-bar-option-border-hover'),
        'nav-bar-selected': withOpacity('--nav-bar-selected-border'),
        'nav-bar-selected-hover': withOpacity('--nav-bar-selected-border-hover'),

        'nav-side': withOpacity('--nav-side-border'),
        'nav-side-divider': withOpacity('--nav-side-divider'),
        'nav-side-option': withOpacity('--nav-side-option-border'),
        'nav-side-option-hover': withOpacity('--nav-side-option-border-hover'),
        'nav-side-selected': withOpacity('--nav-side-selected-border'),
        'nav-side-selected-hover': withOpacity('--nav-side-selected-border-hover'),

        'nav-profile-avatar': withOpacity('--nav-profile-avatar-border'),

        'toolbar': withOpacity('--toolbar-border'),

        'brand': withOpacity('--border-brand'),
        'brand-hover': withOpacity('--border-brand-hover'),
        'default': withOpacity('--border-default'),
        'default-hover': withOpacity('--border-default-hover'),
        'danger': withOpacity('--border-danger'),
        'danger-hover': withOpacity('--border-danger-hover'),
        'info': withOpacity('--border-info'),
        'info-hover': withOpacity('--border-info-hover'),
        'muted': withOpacity('--border-muted'),
        'muted-hover': withOpacity('--border-muted-hover'),
        'success': withOpacity('--border-success'),
        'success-hover': withOpacity('--border-success-hover'),
        'warning': withOpacity('--border-warning'),
        'warning-hover': withOpacity('--border-warning-hover'),

        'alert-brand': withOpacity('--alert-brand-border'),
        'alert-default': withOpacity('--alert-default-border'),
        'alert-danger': withOpacity('--alert-danger-border'),
        'alert-info': withOpacity('--alert-info-border'),
        'alert-muted': withOpacity('--alert-muted-border'),
        'alert-success': withOpacity('--alert-success-border'),
        'alert-warning': withOpacity('--alert-warning-border'),

        'button-brand': withOpacity('--button-brand-border'),
        'button-brand-hover': withOpacity('--button-brand-border-hover'),
        'button-default': withOpacity('--button-default-border'),
        'button-default-hover': withOpacity('--button-default-border-hover'),
        'button-danger': withOpacity('--button-danger-border'),
        'button-danger-hover': withOpacity('--button-danger-border-hover'),
        'button-info': withOpacity('--button-info-border'),
        'button-info-hover': withOpacity('--button-info-border-hover'),
        'button-link': withOpacity('--button-link-border'),
        'button-link-hover': withOpacity('--button-link-border-hover'),
        'button-muted': withOpacity('--button-muted-border'),
        'button-muted-hover': withOpacity('--button-muted-border-hover'),
        'button-success': withOpacity('--button-success-border'),
        'button-success-hover': withOpacity('--button-success-border-hover'),
        'button-warning': withOpacity('--button-warning-border'),
        'button-warning-hover': withOpacity('--button-warning-border-hover'),

        'table': withOpacity('--table-border'),
        'table-divider': withOpacity('--table-divider'),
        'table-filters': withOpacity('--table-filters-border'),
        'active-filter': withOpacity('--active-filter-border'),

        'paginate-button': withOpacity('--paginate-button-border'),
        'paginate-button-hover': withOpacity('--paginate-button-border-hover'),
        'paginate-active': withOpacity('--paginate-active-border'),
        'paginate-active-hover': withOpacity('--paginate-active-border-hover'),
        'paginate-disabled': withOpacity('--paginate-disabled-border'),
        'paginate-disabled-hover': withOpacity('--paginate-disabled-border-hover'),
        'paginate-limit': withOpacity('--paginate-limit-border'),
        'paginate-limit-hover': withOpacity('--paginate-limit-border-hover'),

        'panel': withOpacity('--panel-border'),
        'panel-divider': withOpacity('--panel-divider'),

        'input': withOpacity('--input-border'),
        'input-focus': withOpacity('--input-focus-border'),

        'modal': withOpacity('--modal-border'),
        'modal-button': withOpacity('--modal-button-border'),
        'modal-button-hover': withOpacity('--modal-button-border-hover'),

    },
    divideColor: {

        'table': withOpacity('--table-divider'),
        'panel': withOpacity('--panel-divider'),

    },
    colors: {

        'gray-50': withOpacity('--gray-50'),
        'gray-100': withOpacity('--gray-100'),
        'gray-150': withOpacity('--gray-150'),
        'gray-200': withOpacity('--gray-200'),
        'gray-250': withOpacity('--gray-250'),
        'gray-300': withOpacity('--gray-300'),
        'gray-350': withOpacity('--gray-350'),
        'gray-400': withOpacity('--gray-400'),
        'gray-450': withOpacity('--gray-450'),
        'gray-500': withOpacity('--gray-500'),
        'gray-550': withOpacity('--gray-550'),
        'gray-600': withOpacity('--gray-600'),
        'gray-650': withOpacity('--gray-650'),
        'gray-700': withOpacity('--gray-700'),
        'gray-750': withOpacity('--gray-750'),
        'gray-800': withOpacity('--gray-800'),
        'gray-850': withOpacity('--gray-850'),
        'gray-900': withOpacity('--gray-900'),
        'gray-950': withOpacity('--gray-950'),
        'gray-1000': withOpacity('--gray-1000'),

        'brand-50': withOpacity('--brand-50'),
        'brand-100': withOpacity('--brand-100'),
        'brand-200': withOpacity('--brand-200'),
        'brand-300': withOpacity('--brand-300'),
        'brand-400': withOpacity('--brand-400'),
        'brand-500': withOpacity('--brand-500'),
        'brand-600': withOpacity('--brand-600'),
        'brand-700': withOpacity('--brand-700'),
        'brand-800': withOpacity('--brand-800'),
        'brand-900': withOpacity('--brand-900'),

        'danger-50': withOpacity('--danger-50'),
        'danger-100': withOpacity('--danger-100'),
        'danger-200': withOpacity('--danger-200'),
        'danger-300': withOpacity('--danger-300'),
        'danger-400': withOpacity('--danger-400'),
        'danger-500': withOpacity('--danger-500'),
        'danger-600': withOpacity('--danger-600'),
        'danger-700': withOpacity('--danger-700'),
        'danger-800': withOpacity('--danger-800'),
        'danger-900': withOpacity('--danger-900'),

        'info-50': withOpacity('--info-50'),
        'info-100': withOpacity('--info-100'),
        'info-200': withOpacity('--info-200'),
        'info-300': withOpacity('--info-300'),
        'info-400': withOpacity('--info-400'),
        'info-500': withOpacity('--info-500'),
        'info-600': withOpacity('--info-600'),
        'info-700': withOpacity('--info-700'),
        'info-800': withOpacity('--info-800'),
        'info-900': withOpacity('--info-900'),

        'success-50': withOpacity('--success-50'),
        'success-100': withOpacity('--success-100'),
        'success-200': withOpacity('--success-200'),
        'success-300': withOpacity('--success-300'),
        'success-400': withOpacity('--success-400'),
        'success-500': withOpacity('--success-500'),
        'success-600': withOpacity('--success-600'),
        'success-700': withOpacity('--success-700'),
        'success-800': withOpacity('--success-800'),
        'success-900': withOpacity('--success-900'),

        'warning-50': withOpacity('--warning-50'),
        'warning-100': withOpacity('--warning-100'),
        'warning-200': withOpacity('--warning-200'),
        'warning-300': withOpacity('--warning-300'),
        'warning-400': withOpacity('--warning-400'),
        'warning-500': withOpacity('--warning-500'),
        'warning-600': withOpacity('--warning-600'),
        'warning-700': withOpacity('--warning-700'),
        'warning-800': withOpacity('--warning-800'),
        'warning-900': withOpacity('--warning-900'),

        'chart-50': withOpacity('--chart-50'),
        'chart-100': withOpacity('--chart-100'),
        'chart-200': withOpacity('--chart-200'),
        'chart-300': withOpacity('--chart-300'),
        'chart-400': withOpacity('--chart-400'),
        'chart-500': withOpacity('--chart-500'),
        'chart-600': withOpacity('--chart-600'),
        'chart-700': withOpacity('--chart-700'),
        'chart-800': withOpacity('--chart-800'),
        'chart-900': withOpacity('--chart-900'),

    },
    fillColor: {

        'progress-bar': withOpacity('--progress-bar'),
        'progress-bg': withOpacity('--progress-bg'),

    },
    placeholderColor: {

        'input': withOpacity('--input-placeholder'),

    },
    ringColor: {

        'brand': withOpacity('--brand'),
        'input': withOpacity('--input'),

    },
    ringOffsetColor: {

        'input': withOpacity('--input-bg'),

    },
    textColor: {

        'login': withOpacity('--login'),
        'login-input': withOpacity('--login-input'),
        'login-link': withOpacity('--login-link'),
        'login-link-hover': withOpacity('--login-link-hover'),
        'login-placeholder': withOpacity('--login-placeholder'),

        'default': withOpacity('--default'),
        'default-hover': withOpacity('--default-hover'),
        'link': withOpacity('--link'),
        'link-hover': withOpacity('--link-hover'),

        'brand': withOpacity('--brand'),
        'brand-hover': withOpacity('--brand-hover'),
        'danger': withOpacity('--danger'),
        'danger-hover': withOpacity('--danger-hover'),
        'info': withOpacity('--info'),
        'info-hover': withOpacity('--info-hover'),
        'muted': withOpacity('--muted'),
        'muted-hover': withOpacity('--muted-hover'),
        'success': withOpacity('--success'),
        'success-hover': withOpacity('--success-hover'),
        'warning': withOpacity('--warning'),
        'warning-hover': withOpacity('--warning-hover'),

        'header': withOpacity('--header'),
        'header-muted': withOpacity('--header-muted'),
        'header-link': withOpacity('--header-link'),
        'header-link-hover': withOpacity('--header-link-hover'),
        'footer': withOpacity('--footer'),

        'nav-bar': withOpacity('--nav-bar'),
        'nav-bar-hover': withOpacity('--nav-bar-hover'),
        'nav-bar-muted': withOpacity('--nav-bar-muted'),
        'nav-bar-option': withOpacity('--nav-bar-option'),
        'nav-bar-option-hover': withOpacity('--nav-bar-option-hover'),
        'nav-bar-icon': withOpacity('--nav-bar-icon'),
        'nav-bar-icon-hover': withOpacity('--nav-bar-icon-hover'),

        'nav-side': withOpacity('--nav-side'),
        'nav-side-hover': withOpacity('--nav-side-hover'),
        'nav-side-muted': withOpacity('--nav-side-muted'),
        'nav-side-option': withOpacity('--nav-side-option'),
        'nav-side-option-hover': withOpacity('--nav-side-option-hover'),
        'nav-side-icon': withOpacity('--nav-side-icon'),
        'nav-side-icon-hover': withOpacity('--nav-side-icon-hover'),

        'nav-profile': withOpacity('--nav-profile'),

        'toolbar': withOpacity('--toolbar'),

        'alert-brand-icon': withOpacity('--alert-brand-icon'),
        'alert-brand-text': withOpacity('--alert-brand-text'),
        'alert-brand-title': withOpacity('--alert-brand-title'),
        'alert-brand-url': withOpacity('--alert-brand-url'),
        'alert-danger-icon': withOpacity('--alert-danger-icon'),
        'alert-danger-text': withOpacity('--alert-danger-text'),
        'alert-danger-title': withOpacity('--alert-danger-title'),
        'alert-danger-url': withOpacity('--alert-danger-url'),
        'alert-default-icon': withOpacity('--alert-default-icon'),
        'alert-default-text': withOpacity('--alert-default-text'),
        'alert-default-title': withOpacity('--alert-default-title'),
        'alert-default-url': withOpacity('--alert-default-url'),
        'alert-info-icon': withOpacity('--alert-info-icon'),
        'alert-info-text': withOpacity('--alert-info-text'),
        'alert-info-title': withOpacity('--alert-info-title'),
        'alert-info-url': withOpacity('--alert-info-url'),
        'alert-muted-icon': withOpacity('--alert-muted-icon'),
        'alert-muted-text': withOpacity('--alert-muted-text'),
        'alert-muted-title': withOpacity('--alert-muted-title'),
        'alert-muted-url': withOpacity('--alert-muted-url'),
        'alert-success-icon': withOpacity('--alert-success-icon'),
        'alert-success-text': withOpacity('--alert-success-text'),
        'alert-success-title': withOpacity('--alert-success-title'),
        'alert-success-url': withOpacity('--alert-success-url'),
        'alert-warning-icon': withOpacity('--alert-warning-icon'),
        'alert-warning-text': withOpacity('--alert-warning-text'),
        'alert-warning-title': withOpacity('--alert-warning-title'),
        'alert-warning-url': withOpacity('--alert-warning-url'),

        'button-brand': withOpacity('--button-brand'),
        'button-brand-hover': withOpacity('--button-brand-hover'),
        'button-brand-icon': withOpacity('--button-brand-icon'),
        'button-brand-icon-hover': withOpacity('--button-brand-icon-hover'),
        'button-default': withOpacity('--button-default'),
        'button-default-hover': withOpacity('--button-default-hover'),
        'button-default-icon': withOpacity('--button-default-icon'),
        'button-default-icon-hover': withOpacity('--button-default-icon-hover'),
        'button-danger': withOpacity('--button-danger'),
        'button-danger-hover': withOpacity('--button-danger-hover'),
        'button-danger-icon': withOpacity('--button-danger-icon'),
        'button-danger-icon-hover': withOpacity('--button-danger-icon-hover'),
        'button-info': withOpacity('--button-info'),
        'button-info-hover': withOpacity('--button-info-hover'),
        'button-info-icon': withOpacity('--button-info-icon'),
        'button-info-icon-hover': withOpacity('--button-info-icon-hover'),
        'button-link': withOpacity('--button-link'),
        'button-link-hover': withOpacity('--button-link-hover'),
        'button-link-icon': withOpacity('--button-link-icon'),
        'button-link-icon-hover': withOpacity('--button-link-icon-hover'),
        'button-muted': withOpacity('--button-muted'),
        'button-muted-hover': withOpacity('--button-muted-hover'),
        'button-muted-icon': withOpacity('--button-muted-icon'),
        'button-muted-icon-hover': withOpacity('--button-muted-icon-hover'),
        'button-success': withOpacity('--button-success'),
        'button-success-hover': withOpacity('--button-success-hover'),
        'button-success-icon': withOpacity('--button-success-icon'),
        'button-success-icon-hover': withOpacity('--button-success-icon-hover'),
        'button-warning': withOpacity('--button-warning'),
        'button-warning-hover': withOpacity('--button-warning-hover'),
        'button-warning-icon': withOpacity('--button-warning-icon'),
        'button-warning-icon-hover': withOpacity('--button-warning-icon-hover'),

        'pill-brand': withOpacity('--pill-brand'),
        'pill-danger': withOpacity('--pill-danger'),
        'pill-info': withOpacity('--pill-info'),
        'pill-muted': withOpacity('--pill-muted'),
        'pill-success': withOpacity('--pill-success'),
        'pill-warning': withOpacity('--pill-warning'),

        'table-header': withOpacity('--table-header'),
        'table-header-hover': withOpacity('--table-header-hover'),
        'table-row': withOpacity('--table-row'),
        'table-row-muted': withOpacity('--table-row-muted'),
        'table-row-brand': withOpacity('--table-row-brand'),
        'table-row-danger': withOpacity('--table-row-danger'),
        'table-row-info': withOpacity('--table-row-info'),
        'table-row-success': withOpacity('--table-row-success'),
        'table-row-warning': withOpacity('--table-row-warning'),
        'table-filters': withOpacity('--table-filters'),
        'table-filters-hover': withOpacity('--table-filters-hover'),
        'table-filters-icon': withOpacity('--table-filters-icon'),
        'table-filters-icon-hover': withOpacity('--table-filters-icon-hover'),
        'table-action-icon': withOpacity('--table-action-icon'),
        'table-action-icon-hover': withOpacity('--table-action-icon-hover'),

        'active-filter': withOpacity('--active-filter'),
        'active-filter-icon': withOpacity('--active-filter-icon'),
        'active-filter-icon-hover': withOpacity('--active-filter-icon-hover'),

        'paginate-button': withOpacity('--paginate-button'),
        'paginate-button-hover': withOpacity('--paginate-button-hover'),
        'paginate-active': withOpacity('--paginate-active'),
        'paginate-active-hover': withOpacity('--paginate-active-hover'),
        'paginate-disabled': withOpacity('--paginate-disabled'),
        'paginate-disabled-hover': withOpacity('--paginate-disabled-hover'),
        'paginate-limit': withOpacity('--paginate-limit'),
        'paginate-limit-hover': withOpacity('--paginate-limit-hover'),

        'panel': withOpacity('--panel'),
        'panel-header': withOpacity('--panel-header'),
        'panel-footer': withOpacity('--panel-footer'),

        'input': withOpacity('--input'),
        'input-muted': withOpacity('--input-muted'),

        'input-option': withOpacity('--input-option'),
        'input-option-hover': withOpacity('--input-option-hover'),
        'input-option-sub': withOpacity('--input-option-sub'),
        'input-option-sub-hover': withOpacity('--input-option-sub-hover'),

        'modal': withOpacity('--modal'),
        'modal-muted': withOpacity('--modal-muted'),
        'modal-button': withOpacity('--modal-button'),
        'modal-button-hover': withOpacity('--modal-button-hover'),

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

function placeholderColor(customPlaceholderColor) {
    return { ...theme.placeholderColor, ...customPlaceholderColor};
}

function ringOffsetColor(customRingOffsetColor) {
    return { ...theme.ringOffsetColor, ...customRingOffsetColor};
}

function fillColor(customFillColor) {
    return { ...theme.fillColor, ...customFillColor};
}

function textColor(customTextColor) {
    return { ...theme.textColor, ...customTextColor};
}

module.exports.backgroundColor = backgroundColor;
module.exports.borderColor = borderColor;
module.exports.colors = colors;
module.exports.divideColor = divideColor;
module.exports.fillColor = fillColor;
module.exports.placeholderColor = placeholderColor;
module.exports.ringColor = ringColor;
module.exports.ringOffsetColor = ringOffsetColor;
module.exports.textColor = textColor;
