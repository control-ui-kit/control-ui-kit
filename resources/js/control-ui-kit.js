window.Components = {
    listbox(options) {
        let id = options.id || 'selected'

        return {
            init() {
                this.optionCount = this.$refs['listbox-' + id].children.length
                this.$watch('activeIndex', (highlightIndex) => {
                    if (!this.open) return

                    if (this.activeIndex === null) {
                        this.activeDescendant = ''
                        return
                    }

                    this.activeDescendant = this.$refs['listbox-' + id].children[this.activeIndex].id
                })

                for (let i = 0; i < this.$refs['listbox-' + id].children.length; i++) {
                    if (this.$refs['listbox-' + id].children[i].dataset.value == this.value) {  // leave as ==
                        this.highlightIndex = i
                        this.activeIndex = i
                    }
                }

                this.image = this.$refs['listbox-' + id].children[this.activeIndex].dataset.image
                this.subtext = this.$refs['listbox-' + id].children[this.activeIndex].dataset.subtext
                this.text = this.$refs['listbox-' + id].children[this.highlightIndex].dataset.text
            },
            activeDescendant: null,
            optionCount: null,
            open: false,
            text: null,
            subtext: null,
            image: null,
            activeIndex: 0,
            highlightIndex: 0,
            value: null,
            showButtonImage() {
                return image !== undefined
            },
            onMouseSelect(activeIndex) {
                this.highlightIndex = activeIndex
                this.open = false
                this.image = this.$refs['listbox-' + id].children[this.activeIndex].dataset.image
                this.subtext = this.$refs['listbox-' + id].children[this.activeIndex].dataset.subtext
                this.text = this.$refs['listbox-' + id].children[this.activeIndex].dataset.text
                this.value = this.$refs['listbox-' + id].children[this.activeIndex].dataset.value
            },
            onButtonClick() {
                if (this.open) return
                this.activeIndex = this.highlightIndex
                this.open = true
                this.$nextTick(() => {
                    this.$refs['listbox-' + id].focus()
                    if (this.activeIndex) {
                        this.$refs['listbox-' + id].children[this.activeIndex].scrollIntoView({ block: 'nearest' })
                    }
                })
            },
            onKeyboardSelect() {
                if (this.activeIndex !== null) {
                    this.highlightIndex = this.activeIndex
                }
                this.image = this.$refs['listbox-' + id].children[this.activeIndex].dataset.image
                this.subtext = this.$refs['listbox-' + id].children[this.activeIndex].dataset.subtext
                this.text = this.$refs['listbox-' + id].children[this.highlightIndex].dataset.text
                this.value = this.$refs['listbox-' + id].children[this.highlightIndex].dataset.value
                this.open = false
                this.$refs.button.focus()
            },
            onValueChange() {
                for (let i = 0; i < this.$refs['listbox-' + id].children.length; i++) {
                    if (this.$refs['listbox-' + id].children[i].dataset.value === this.value) {
                        this.highlightIndex = i
                        this.activeIndex = i
                        this.image = this.$refs['listbox-' + id].children[i].dataset.image
                        this.subtext = this.$refs['listbox-' + id].children[i].dataset.subtext
                        this.text = this.$refs['listbox-' + id].children[i].dataset.text
                        this.value = this.$refs['listbox-' + id].children[i].dataset.value
                        break
                    }
                }
            },
            onEscape() {
                this.open = false
                this.$refs.button.focus()
            },
            onArrowUp() {
                this.activeIndex = this.activeIndex - 1 < 0 ? this.optionCount - 1 : this.activeIndex - 1
                this.$refs['listbox-' + id].children[this.activeIndex].scrollIntoView({ block: 'nearest' })
            },
            onArrowDown() {
                this.activeIndex = this.activeIndex + 1 > this.optionCount - 1 ? 0 : this.activeIndex + 1
                this.$refs['listbox-' + id].children[this.activeIndex].scrollIntoView({ block: 'nearest' })
            },
            ...options,
        }
    },
    table(options) {
        return {
            open: false,
            moreButton: false,
            openMore: false,
            usedSpace: 0,
            optionCount: null,
            value: null,
            search: null,
            filters: [],
            orderby: null,
            sort: null,
            activeIndex: 0,
            highlightIndex: 0,
            activeDescendant: null,
            init() {
                this.$watch('activeIndex', () => {
                    if (!this.open) return

                    if (this.activeIndex === null) {
                        this.activeDescendant = ''
                        return
                    }

                    this.activeDescendant = this.$refs['listbox-' + this.open].children[this.activeIndex].id
                })
                window.addEventListener('DOMContentLoaded', () => {
                    this.$el.dispatchEvent(new Event('ready'))
                });
            },
            onButtonClick(filter) {
                if (this.open === filter) {
                    this.open = false
                    return
                }
                this.activeIndex = 0
                this.highlightIndex = 0
                this.open = filter
                this.value = this.$refs['listbox-' + this.open].dataset.value
                this.optionCount = this.$refs['listbox-' + this.open].children.length
                for (let i = 0; i < this.optionCount; i++) {
                    if (this.$refs['listbox-' + this.open].children[i].dataset.value === this.value) {
                        this.highlightIndex = i
                        this.activeIndex = i
                    }
                }
                this.$nextTick(() => {
                    this.$refs['listbox-' + this.open].focus()
                    if (this.activeIndex) {
                        this.$refs['listbox-' + this.open].children[this.activeIndex].scrollIntoView({ block: 'nearest' })
                    }
                })
            },
            onEscape() {
                this.open = false
            },
            onKeyboardSelect() {
                if (this.activeIndex !== null) this.highlightIndex = this.activeIndex
                this.value = this.$refs['listbox-' + this.open].children[this.highlightIndex].dataset.value
                this.$refs['listbox-' + this.open].dataset.value = this.value
                this.$refs['button-' + this.open].focus()
                this.open = false
            },
            onMouseSelect(activeIndex) {
                this.highlightIndex = activeIndex
                this.open = false
            },
            onArrowUp() {
                this.activeIndex = this.activeIndex - 1 < 0 ? this.optionCount - 1 : this.activeIndex - 1
                this.$refs['listbox-' + this.open].children[this.activeIndex].scrollIntoView({ block: 'nearest' })
            },
            onArrowDown() {
                this.activeIndex = this.activeIndex + 1 > this.optionCount - 1 ? 0 : this.activeIndex + 1
                this.$refs['listbox-' + this.open].children[this.activeIndex].scrollIntoView({ block: 'nearest' })
            },
            sortBy(field) {
                if (field === this.orderby) {
                    this.sort = this.sort === 'asc' ? 'desc' : 'asc'
                } else {
                    this.sort = 'asc'
                }

                this.orderby = field
            },
            sortByPriority(a, b) {
                if (a.priority > b.priority){
                    return -1;
                }
                if (a.priority < b.priority){
                    return 1;
                }
                return 0;
            },
            ...options,
        }
    },
    toggle(options) {
        return {
            toggle() {
                this.value = (this.value === this.on) ? this.off : this.on
            },
            ...options,
        }
    },
    openDialog(options) {
        return {
            dispatch() {
                $dispatch('dialog-modal', {
                    type: 'success',
                    title: 'success title',
                    content: 'success content',
                    button: 'Yes Close',
                    width: 'sm:max-w-xl',
                })
            }
        }
    }
}

function _controlNumber(input, decimals, min, max, fixed) {
    let number = input.value.replace(/[^\d\.-]/g, "") * 1;

    if (min !== '' && number < min) {
        number = min;
    }

    if (max !== '' && number > max) {
        number = max;
    }

    input.value = +(Math.round(number + ("e+" + decimals))  + ("e-" + decimals));

    if (fixed) {
        input.value = (input.value * 1).toFixed(decimals);
    }
}

function openDialog(type, title, content, width, button) {

    const eventParams = {
        type: type,
        title: title,
        content: content,
        button: button,
        width: maxWidth(width),
    };

    const event = new CustomEvent('dialog-modal', { detail: eventParams });

    window.dispatchEvent(event);

}

function openSuccessDialog(title, content, width, button) {
    openDialog('success', title, content, width, button)
}

function openWarningDialog(title, content, width, button) {
    openDialog('warning', title, content, width, button)
}

function openDefaultDialog(title, content, width, button) {
    openDialog('default', title, content, width, button)
}

function openInfoDialog(title, content, width, button) {
    openDialog('info', title, content, width, button)
}

function openBrandDialog(title, content, width, button) {
    openDialog('brand', title, content, width, button)
}

function openDangerDialog(title, content, width, button) {
    openDialog('danger', title, content, width, button)
}


function openConfirm(type, title, content, width, yes_button, no_button, yes_action, no_action) {

    const eventParams = {
        type: type,
        title: title,
        content: content,
        yes_button: yes_button,
        yes_action: yes_action,
        no_button: no_button,
        no_action: no_action,
        width: maxWidth(width),
    };

    const event = new CustomEvent('confirm-modal', { detail: eventParams });

    window.dispatchEvent(event);

}

function openSuccessConfirm(title, content, width, yes_button, no_button, yes_action, no_action) {
    openConfirm('success', title, content, width, yes_button, no_button, yes_action, no_action)
}

function openWarningConfirm(title, content, width, yes_button, no_button, yes_action, no_action) {
    openConfirm('warning', title, content, width, yes_button, no_button, yes_action, no_action)
}

function openDefaultConfirm(title, content, width, yes_button, no_button, yes_action, no_action) {
    openConfirm('default', title, content, width, yes_button, no_button, yes_action, no_action)
}

function openInfoConfirm(title, content, width, yes_button, no_button, yes_action, no_action) {
    openConfirm('info', title, content, width, yes_button, no_button, yes_action, no_action)
}

function openBrandConfirm(title, content, width, yes_button, no_button, yes_action, no_action) {
    openConfirm('brand', title, content, width, yes_button, no_button, yes_action, no_action)
}

function openDangerConfirm(title, content, width, yes_button, no_button, yes_action, no_action) {
    openConfirm('danger', title, content, width, yes_button, no_button, yes_action, no_action)
}


function maxWidth(maxWidth) {
    switch (maxWidth) {
        case 'sm':
            return 'sm:max-w-sm';
        case 'md':
            return 'sm:max-w-md';
        case 'lg':
            return 'sm:max-w-lg';
        case '2xl':
            return 'sm:max-w-2xl';
        case 'xl':
        default:
            return 'sm:max-w-xl';
    }
}
