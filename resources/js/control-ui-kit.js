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
    inputToggle(options) {
        return {
            ...options,
            flipToggle() {
                this.value = (this.value === this.on) ? this.off : this.on
            },
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
    },
    inputColorPicker(options) {
        return {
            ...options,
            hex: null,
            picker: null,
            chars: null,
            init() {
                let self = this
                this.chars = this.alpha ? 9 : 7
                if (self.value && self.isValidHexColor(self.value)) {
                    self.hex = self.value
                    self.$refs.color.style.background = self.hex
                } else {
                    self.value = null
                }
                this.picker = new Picker({
                    parent: this.$refs.wrapper,
                    color: this.$refs.picker.value,
                    defaultColor: self.default,
                    layout: 'control',
                    popup: self.popup,
                    alpha: self.alpha,
                    editor: self.editor,
                    editorFormat: 'hex',
                    onDone: function(color) {
                        self.setColor(color.hex.substring(0, self.chars), 'value')
                    },
                    onClose: function(color){
                        self.setColor(color.hex.substring(0, self.chars), 'value')
                    },
                    onOpen: function() {
                        const inputElement = this.domElement.querySelector('.picker_editor > input');
                        if (inputElement) {
                            setTimeout(() => {
                                inputElement.focus();
                                const length = inputElement.value.length;
                                inputElement.selectionStart = length;
                                inputElement.selectionEnd = length;
                            }, 150)
                        }
                    },
                    onChange: function(color) {
                        if (color) {
                            self.$refs.color.style.background = color.hex
                        }
                        if (self.onchange) {
                            eval(self.onchange.replace(/\\/g, ''))
                        }
                    },
                })
                self.setColor(this.value)
                this.$watch('value', () => {
                    self.setColor(this.value, 'value')
                })
                this.$watch('hex', () => {
                    self.setColor(this.hex, 'hex')
                })
            },
            isValidHexColor(hexString) {
                let chars = this.alpha ? 8 : 6;
                let regex = new RegExp("^#[0-9a-fA-F]{" + chars + "}$");
                return regex.test(hexString);
            },
            setColor(color, change) {
                if (color === '') {
                    this.hex = ''
                    this.value = ''
                    this.$refs.color.style.background = null
                } else if (this.isValidHexColor(color)) {
                    if (! this.picker.color || this.picker.color.hex.substring(0, this.chars) !== color) {
                        this.picker.setColor(color)
                    }
                    if (this.hex !== color) {
                        this.hex = color
                    }
                    if (this.value !== color) {
                        this.value = color
                    }
                    this.setBackgroundColor(color)
                } else if (change === 'value') {
                    this.value = this.hex
                } else {
                    this.hex = this.value
                }
            },
            setBackgroundColor(color) {
                if (this.$refs.color.style.background !== color) {
                    this.$refs.color.style.background = color
                }
            }
        }
    },
    inputNumber(options) {
        return {
            ...options,
            display: null,
            init() {
                this.setInitialValues()
                this.$watch('value', (value) => {
                    value = this.formatLimits(value)
                    if (this.value !== value) {
                        this.value = this.formatLimits(this.value)
                        return;
                    }
                    this.formatDisplay(value)
                })
                this.$watch('display', () => {
                    this.formatDisplay(this.display)
                    if (this.value !== parseFloat(this.display)) {
                        this.value = parseFloat(this.display)
                    }
                })
            },
            setInitialValues() {
                this.formatDisplay(this.value)
                this.value = parseFloat(this.value)
            },
            formatDisplay(value) {
                let display = this.formatNumber(value)
                if (this.display !== display) {
                    this.display = display
                }
            },
            formatNumber(value) {
                let number = this.formatLimits(value)
                number = +(Math.round(number + ("e+" + this.decimals)) + ("e-" + this.decimals))
                return number.toFixed(this.decimals)
            },
            formatLimits(value) {
                let number = String(value).replace(/[^\d\.-]/g, "") * 1
                number = this.min !== undefined && parseFloat(number) < this.min ? this.min : number
                number = this.max !== undefined && parseFloat(number) > this.max ? this.max : number
                return number.toFixed(this.decimals) * 1
            },
        }
    },
    inputPassword(options) {
        return {
            ...options,
            type: 'password',
            showToggle() {
                this.type = this.type === 'password' ? 'text' : 'password'
            },
        }
    },
    inputUrl(options) {
        return {
            ...options,
            init() {
                this.$watch('value', () => {
                    this.formatUrl()
                })
            },
            formatUrl() {
                const sanitizedPrefix = this.prefix ? this.prefix.replace(/^(http:\/\/|https:\/\/)/, '') : '';

                if (this.value === 'http://' || this.value === 'https://' || this.value === sanitizedPrefix) {
                    this.value = '';
                } else if (this.value !== '') {
                  if (this.value.indexOf(sanitizedPrefix) < 0) {
                        this.value = sanitizedPrefix + this.value;
                    } else {
                        this.value = (this.value.indexOf('http://') > -1 ? 'http' : 'https') + '://' + this.value.replace(/^[htps:]+\/{1,2}/i, '');
                    }
                }
            },
        }
    },
    flatpickr(options) {
        return {
            ...options,
            display: '',
            picker: null,
            init() {
                let self = this
                if (this.data === null) {
                    this.data = '';
                }
                this.picker = flatpickr(this.$refs.display, {
                    mode: this.mode,
                    noCalendar: this.noCalendar,
                    enableTime: this.enableTime,
                    time_24hr: this.time_24hr,
                    minuteIncrement: this.minuteIncrement,
                    hourIncrement: this.hourIncrement,
                    defaultHour: 0,
                    defaultMinute: 0,
                    enableSeconds: this.enableSeconds,
                    dateFormat: this.format,
                    minDate: this.minDate,
                    maxDate: this.maxDate,
                    weekNumbers: this.weekNumbers,
                    allowInput: true,
                    onReady: (selectedDates, dateString, picker) => {
                        if (this.data) {
                            if (this.mode === 'single') {
                                this.setOffsetDisplayTime(picker)
                            } else {
                                let dates = this.data.split(this.separator)
                                picker.setDate([
                                    flatpickr.formatDate(flatpickr.parseDate(dates[0], this.dataFormat), this.format),
                                    flatpickr.formatDate(flatpickr.parseDate(dates[1], this.dataFormat), this.format),
                                ])
                            }
                        }

                        if (! this.noCalendar) {
                            let nextMonth = picker.calendarContainer.querySelector('.flatpickr-next-month');
                            let prevMonth = picker.calendarContainer.querySelector('.flatpickr-prev-month');

                            nextMonth.addEventListener('click', function () {
                                self.updateYear(picker)
                            })

                            prevMonth.addEventListener('click', function () {
                                self.updateYear(picker)
                            })
                        }
                    },
                    onClose: (selectedDates, dateString, picker) => {
                        this.updateData()
                    },
                    locale: this.locale,
                    plugins: [
                        ShortcutButtonsPlugin({
                            button: [
                                {
                                    label: this.noCalendar ? this.now : this.today
                                },
                                {
                                    label: this.clear
                                },
                                {
                                    label: this.close
                                }
                            ],
                            onClick: (index, fp) => {
                                switch (index) {
                                    case 0:
                                        let today = new Date()
                                        if (! this.noCalendar) {
                                            today.setHours(0,0,0,0)
                                        } else if (! this.enableSeconds) {
                                            today.setSeconds(0,0)
                                        }
                                        if (this.mode === 'single') {
                                            fp.setDate(today)
                                        } else {
                                            fp.setDate(flatpickr.formatDate(today, this.format) + this.picker.l10n.rangeSeparator + flatpickr.formatDate(today, this.format))
                                        }
                                        fp.close()
                                        break;
                                    case 1:
                                        fp.setDate(null)
                                        this.updateYear(fp)
                                        fp.close()
                                        break;
                                    case 2:
                                        fp.close()
                                        break;
                                }
                            }
                        }),
                        YearDropdownPlugin({
                            id: this.id,
                            date: this.value,
                            yearsBefore: this.yearsBefore,
                            yearsAfter: this.yearsAfter
                        })
                    ],
                })
                this.$watch('display', () => {
                    if (this.mode === 'single') {
                        if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], this.format) !== this.display) {
                            this.picker.setDate(this.display)
                            this.data = flatpickr.formatDate(this.picker.selectedDates[0], this.dataFormat)
                        }
                    } else {
                        if (flatpickr.formatDate(this.picker.selectedDates[0], this.format) + this.separator + flatpickr.formatDate(this.picker.selectedDates[1], this.format) !== this.display) {
                            this.picker.setDate(this.display)
                            let data_from = flatpickr.formatDate(this.picker.selectedDates[0], this.dataFormat)
                            let data_to = flatpickr.formatDate(this.picker.selectedDates[1], this.dataFormat)
                            this.data = data_from + this.separator + data_to
                        }
                    }
                })
                this.$watch('data', () => {
                    if (this.mode === 'single') {
                        if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.offsetDisplayTime(), this.dataFormat) !== this.data)) {
                            this.setOffsetDisplayTime(this.picker)
                            if (this.picker.selectedDates[0] === undefined) {
                                this.data = ''
                                this.display = ''
                            }
                        } else if (!this.data) {
                            this.picker.setDate(null)
                        }

                        this.updateLinkedDates()
                    } else {
                        if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], this.dataFormat) + this.separator + flatpickr.formatDate(this.picker.selectedDates[1], this.dataFormat) !== this.data)) {
                            let dates = this.data.split(this.separator)
                            let display_date = flatpickr.formatDate(flatpickr.parseDate(dates[0], this.dataFormat), this.format) + this.picker.l10n.rangeSeparator + flatpickr.formatDate(flatpickr.parseDate(dates[1], this.dataFormat), this.format)
                            this.picker.setDate(display_date)
                            this.display = display_date
                        }
                    }
                })
                this.$watch('offset', () => {
                    if (this.data) {
                        this.setOffsetDisplayTime(this.picker)
                    }
                })
                if (this.mode === 'single') {
                    if (this.linkedTo || this.linkedFrom) {
                        this.$nextTick(() => {
                            if (this.data) {
                                let date = flatpickr.formatDate(flatpickr.parseDate(this.data, this.dataFormat), this.format)
                                if (this.linkedTo) {
                                    document.querySelector('#' + this.linkedTo + '_display')._flatpickr.set('minDate', date)
                                }
                                if (this.linkedFrom) {
                                    document.querySelector('#' + this.linkedFrom + '_display')._flatpickr.set('maxDate', date)
                                }
                            }
                        })
                    }
                }
            },
            open() {
                this.picker.open()
            },
            setOffsetDisplayTime(picker) {
                picker.setDate(flatpickr.formatDate(this.offsetDataTime(), this.format))
                this.updateYear(picker)
            },
            setOffsetDataTime() {
                if (this.picker.selectedDates.length === 0) {
                    this.data = null
                } else if (this.showTimeZones && (this.noCalendar || this.enableTime)) {
                    const offset = this.getSelectedOffset() * -1
                    this.data = flatpickr.formatDate(new Date(this.picker.selectedDates[0].getTime() + offset), this.dataFormat)
                } else {
                    this.data = flatpickr.formatDate(this.picker.selectedDates[0], this.dataFormat)
                }
            },
            offsetDataTime() {
                if (this.data === null || this.data === '') {
                    return this.data
                }

                if (this.showTimeZones && (this.noCalendar || this.enableTime)) {
                    const offset = this.getSelectedOffset()
                    return new Date(flatpickr.parseDate(this.data, this.dataFormat).getTime() + offset)
                }

                return flatpickr.parseDate(this.data, this.dataFormat)
            },
            offsetDisplayTime() {
                if (this.picker.selectedDates.length === 0) {
                    return null
                }

                if (this.showTimeZones && (this.noCalendar || this.enableTime)) {
                    const offset = this.getSelectedOffset() * -1
                    return new Date(flatpickr.parseDate(this.picker.selectedDates[0], this.dataFormat).getTime() + offset)
                }

                return flatpickr.parseDate(this.picker.selectedDates[0], this.dataFormat)
            },
            updateData() {
                if (this.mode === 'single') {
                    if (this.$refs.display.value) {
                        this.setOffsetDataTime()
                    } else {
                        this.data = ''
                    }
                    this.updateLinkedDates()
                } else {
                    if (this.$refs.display.value && this.picker.selectedDates.length === 2) {
                        data_from = flatpickr.formatDate(this.picker.selectedDates[0], this.dataFormat)
                        data_to = flatpickr.formatDate(this.picker.selectedDates[1], this.dataFormat)
                        this.data = data_from + this.separator + data_to
                    } else {
                        this.data = ''
                    }
                }

                this.updateYear(this.picker)
            },
            getSelectedOffset() {
                return this.$refs.offset.options[this.offset].dataset.offset * 60 * 60 * 1000
            },
            updateLinkedDates() {
                if (this.linkedTo) {
                    document.querySelector('#' + this.linkedTo + '_display')._flatpickr.set('minDate', this.picker.selectedDates[0])
                }
                if (this.linkedFrom) {
                    document.querySelector('#' + this.linkedFrom + '_display')._flatpickr.set('maxDate', this.picker.selectedDates[0])
                }
            },
            updateYear(picker) {
                if (this.noCalendar) {
                    return
                }

                setTimeout(() => {
                    document.getElementById(this.id + '_year').value = picker.currentYear
                }, 150)
            }
        }
    }
}

function openDialog(type, title, content, width, button) {

    const eventParams = {
        type: type,
        title: title,
        content: content,
        button: button,
        width: maxWidth(width),
    }

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
