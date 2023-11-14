window.Components = {
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
                    document.getElementById(self.id + '_color').style.background = self.hex
                } else {
                    self.value = null
                }
                this.picker = new Picker({
                    parent: this.$refs.wrapper,
                    color: document.getElementById(self.id).value,
                    defaultColor: self.default,
                    layout: 'control',
                    popup: self.popup,
                    alpha: self.alpha,
                    editor: self.editor,
                    editorFormat: 'hex',
                    onDone: function(color) {
                        const inputElement = this.domElement.querySelector('.picker_editor > input')
                        self.setColor(inputElement.value, 'value')
                    },
                    onClose: function(color){
                        const inputElement = this.domElement.querySelector('.picker_editor > input')
                        self.setColor(inputElement.value, 'value')
                    },
                    onOpen: function() {
                        const inputElement = this.domElement.querySelector('.picker_editor > input')
                        if (inputElement) {
                            setTimeout(() => {
                                inputElement.focus()
                                const length = inputElement.value.length
                                inputElement.selectionStart = length
                                inputElement.selectionEnd = length
                            }, 150)
                        }
                        const closeButton = this.domElement.querySelector('.picker_done > button')
                        if (closeButton && self.close) {
                            closeButton.textContent = self.close
                        }
                    },
                    onChange: function(color) {
                        if (color) {
                            document.getElementById(self.id + '_color').style.background = color.hex
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
                let chars = this.alpha ? 8 : 6
                let regex = new RegExp("^#[0-9a-fA-F]{" + chars + "}$")
                return regex.test(hexString);
            },
            setColor(color, change) {
                if (color === '') {
                    this.hex = ''
                    this.value = ''
                    document.getElementById(this.id + '_color').style.background = null
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
                if (document.getElementById(this.id + '_color').style.background !== color) {
                    document.getElementById(this.id + '_color').style.background = color
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
    inputOneTimeCode(options) {
        return {
            ...options,
            init() {

                let watch = [];
                for (let i = 1; i <= this.digits; i++) {
                    watch.push('digit_' + i)
                }

                this.$watch(watch.join(', '), () => {
                    this.updateValue()
                })

                this.$watch('value', () => {
                    this.updateDigits()
                })

                this.updateDigits();

                let self = this;

                let first = document.getElementById(this.name + '-1'),
                    ins = document.querySelectorAll('fieldset.fs-' + this.name + '-otc input[type="number"]'),
                    splitNumber = function(e) {
                        let data = e.data || e.target.value; // Chrome doesn't get the e.data, it's always empty, fallback to value then.
                        if (! data) return; // Shouldn't happen, just in case.
                        if (data.length === 1) return; // Here is a normal behavior, not a paste action.

                        populateNext(e.target, data);
                    },
                    populateNext = function(el, data) {
                        el.value = data[0]; // Apply first item to first input

                        self['digit_' + el.getAttribute('data-digit')] = el.value;
                        data = data.substring(1); // remove the first char.

                        if (el.nextElementSibling && data.length) {
                            // Do the same with the next element and next data
                            populateNext(el.nextElementSibling, data);
                        }
                    };

                ins.forEach(function(input) {
                    /**
                     * Control on keyup to catch what the user intends to do.
                     */
                    input.addEventListener('keyup', function(e){

                        // Break if Shift, Tab, CMD, Option, Control.
                        if (e.keyCode === 16 || e.keyCode === 9 || e.keyCode === 224 || e.keyCode === 18 || e.keyCode === 17) {
                            return;
                        }

                        // On Backspace or left arrow, go to the previous field.
                        if ((e.keyCode === 8 || e.keyCode === 37) && this.previousElementSibling && this.previousElementSibling.tagName === "INPUT") {
                            this.previousElementSibling.select();
                        } else if (e.keyCode !== 8 && this.nextElementSibling) {
                            this.nextElementSibling.select();
                        }

                        // If the target is populated to quickly, value length can be > 1
                        if (e.target.value.length > 1) {
                            splitNumber(e);
                        }
                    });

                    /**
                     * Better control on Focus
                     * - don't allow focus on other field if the first one is empty
                     * - don't allow focus on field if the previous one if empty (debatable)
                     * - get the focus on the first empty field
                     */
                    input.addEventListener('focus', function(e) {
                        // If the focus element is the first one, do nothing
                        if (this === first) return;

                        // If value of input 1 is empty, focus it.
                        if (first.value === '') {
                            first.focus();
                        }

                        // If value of a previous input is empty, focus it.
                        // To remove if you don't want to force user respecting the fields order.
                        if (this.previousElementSibling.value === '') {
                            this.previousElementSibling.focus();
                        }
                    });
                });

                /**
                 * Handle copy/paste of a big number.
                 * It catches the value pasted on the first field and spread it into the inputs.
                 */
                first.addEventListener('input', splitNumber);
            },
            updateValue() {
                let value = '';
                for (let i = 1; i <= this.digits; i++) {
                    value += this['digit_' + i]
                }
                this.value = value
            },
            updateDigits() {
                if (this.value !== this.value.toString().substring(0, this.digits)) {
                    this.value = this.value.toString().substring(0, this.digits)
                    return
                }

                let digits = this.value.toString().substring(0, this.digits).split('')

                digits.forEach((digit, index) => {
                    this['digit_' + (index + 1)] = digit
                });

                if (this.digits - digits.length) {
                    for (let i = digits.length + 1; i <= this.digits; i++) {
                        this['digit_' + i] = '';
                    }
                }
            }
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
    inputSelect(options) {
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
                this.$watch('value', () => {
                    this.setIndexesFromValue();
                })
                this.setIndexesFromValue();
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
            setIndexesFromValue() {
                this.highlightIndex = 0;
                this.activeIndex = 0;
                for (let i = 0; i < this.$refs['listbox-' + id].children.length; i++) {
                    if (this.$refs['listbox-' + id].children[i].dataset.value == this.value) {  // leave as ==
                        this.highlightIndex = i
                        this.activeIndex = i
                    }
                }
                this.setValuesFromIndex();
            },
            setValuesFromIndex() {
                this.image = this.$refs['listbox-' + id].children[this.activeIndex].dataset.image
                this.subtext = this.$refs['listbox-' + id].children[this.activeIndex].dataset.subtext
                this.text = this.$refs['listbox-' + id].children[this.highlightIndex].dataset.text
            },
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
    inputRange(options) {
        return {
            ...options,
        }
    },
    inputAutocomplete(options) {
        return {
            ...options,
            isAjax: false,
            show: false,
            selected: null,
            chosen: null,
            selectedText: null,
            focusedOptionIndex: null,
            noResults: false,
            options: null,
            init() {
                if (this.data.length > 0) {
                    this.options = this.data.slice(0, this.config['limit'])
                } else if (this.focus.length > 0) {
                    this.options = this.focus
                }
                this.isAjax = !(this.ajax instanceof Array)
                if (! this.filter) {
                    this.setSelected(true)
                } else {
                    this.selectedText = this.filter
                    this.selected = {
                        'id': parseInt(this.value),
                        'text': this.filter,
                        'sub': null,
                        'image': null,
                    };
                }
                this.$watch('value', () => {
                    this.setSelected(false)
                })
                this.$watch('options', () => {
                    this.noResults = this.filter && this.filter !== this.selectedText && (! this.options || this.options.length === 0)
                })
            },
            setSelected(init) {
                if (this.value && this.options && (! init || this.focus.length === 0)) {
                    let selected = this.options.filter(option => {
                        return option.id.toString() === this.value.toString()
                    })
                    if (selected.length) {
                        this.selected = selected[0]
                        this.filter = this.selected.text
                        this.selectedText = this.selected.text
                    } else {
                        this.selected = null
                        this.selectedText = ''
                        this.filter = ''
                    }
                } else if (this.isAjax && this.chosen) {
                    this.chosen = null;
                } else if (init && this.options && this.focus.length > 0) {
                    this.lookupId()
                } else if (this.isAjax && this.ajax['lookup_url'] && this.value && ! this.options) {
                    this.lookupId()
                } else {
                    this.selected = null
                    this.selectedText = ''
                }
            },
            clear() {
                this.value = null
                this.filter = null
                this.selected = null
                this.selectedText = ''
            },
            lookupId() {
                fetch(this.ajaxLookupUrl())
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then((record) => {
                        this.selected = this.convertRow(record)
                        this.filter = this.selected.text
                        this.selectedText = this.selected.text
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            },
            close() {
                this.show = false;
                this.filter = this.selectedName();
                // Timeout needed to fix a bug with double highlighted options
                setTimeout(() => {
                    if (this.isAjax) {
                        this.options = null
                    } else {
                        this.options = this.data.slice(0, this.config['limit'])
                    }
                }, 150)
                this.focusedOptionIndex = null
            },
            open() {
                this.options = this.isAjax && this.focus.length > 0 ? this.focus : this.options
                this.show = true;
                this.filter = '';
            },
            toggle() {
                if (this.show) {
                    this.close();
                }
                else {
                    this.open()
                }
            },
            isOpen() { return this.show === true },
            selectedName() { return this.selected ? this.selected.text : this.filter },
            isSelected(id) { return this.selected ? id === this.selected.id : false },
            isFocused(index) { return index === this.focusedOptionIndex },
            canFilter() {
                if (this.config['min'] === null) {
                    return true;
                }
                return this.filter.length >= parseInt(this.config['min'])
            },
            classOption(id, index) {
                return {
                    [this.conditionals['option-selected']]: this.isSelected(id),
                    [this.conditionals['option-focus']] : this.isFocused(index)
                };
            },
            classText(id, index, option) {
                return {
                    [this.conditionals['text-selected']]: this.isSelected(id),
                    [this.conditionals['text-focus']] : this.isFocused(index)
                };
            },
            classSubtext(id, index) {
                return {
                    [this.conditionals['subtext-selected']]: this.isSelected(id),
                    [this.conditionals['subtext-focus']] : this.isFocused(index)
                };
            },
            filteredOptions() { return this.options },
            refreshOptions() {
                if (this.filter === '') {
                    this.resetOptions();
                    return;
                }
                if (this.canFilter()) {
                    if (this.isAjax) {
                        this.getAjaxOptions()
                    } else {
                        this.options = this.filteredDataOptions()
                    }
                    this.resetOptions();
                }
            },
            resetOptions() {
                if (this.filter) {
                    return
                }
                this.options = this.isAjax ? null : this.data.slice(0, this.config['limit']);
            },
            filteredDataOptions() {
                return this.data.slice(0, this.config['limit'])
                    ? this.data.filter(option => {
                        return (option.text.toLowerCase().indexOf(this.filter) > -1)
                    }).slice(0, this.config['limit'])
                    : {}
            },
            ajaxSearchUrl() {
                return this.ajax['search_url']
                    .replace(this.ajax['search_string'], this.filter)
                    .replace(this.ajax['limit_string'], this.config['limit'])
            },
            ajaxLookupUrl() {
                return this.ajax['lookup_url'].replace(this.ajax['id_string'], this.value)
            },
            getAjaxOptions() {
                fetch(this.ajaxSearchUrl())
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then((rows) => {
                        this.options = this.convertData(rows);
                    })
                    .catch((error) => {
                        console.error('Error :', error);
                    });
            },
            convertData(data) {
                const options = [];
                for (const key in data) {
                    if (data.hasOwnProperty(key)) {
                        options.push(this.convertRow(data[key]));
                    }
                }
                return options;
            },
            convertRow(data) {
                return {
                    'id': data[this.config['value']],
                    'text': data[this.config['text']],
                    'sub': data[this.config['subtext']] || null,
                    'image': data[this.config['image']] || null,
                };
            },
            onOptionClick(index) {
                this.focusedOptionIndex = index;
                this.selectOption();
            },
            selectOption() {
                if (this.options === null) {
                    return;
                }
                if (! this.isOpen()) {
                    this.open()
                    return;
                }
                this.focusedOptionIndex = this.focusedOptionIndex ?? 0;
                const selected = this.filteredOptions()[this.focusedOptionIndex]
                this.chosen = selected;
                this.value = selected.id
                if ((this.selected && this.selected.id !== selected.id) || this.selected === null) {
                    this.selected = selected
                    this.filter = this.selectedName()
                    this.selectedText = this.selectedName()
                    document.activeElement.blur();
                }
                this.close();
            },
            focusPrevOption() {
                if (!this.isOpen() || this.options === null) {
                    return;
                }
                const optionsNum = Object.keys(this.filteredOptions()).length - 1;
                if (this.focusedOptionIndex > 0 && this.focusedOptionIndex <= optionsNum) {
                    this.focusedOptionIndex--;
                }
                else if (this.focusedOptionIndex === 0) {
                    this.focusedOptionIndex = optionsNum;
                }
            },
            focusNextOption() {
                if (this.options === null) {
                    return;
                }
                const optionsNum = Object.keys(this.filteredOptions()).length - 1;
                if (!this.isOpen()) {
                    this.open();
                }
                if (this.focusedOptionIndex == null || this.focusedOptionIndex === optionsNum) {
                    this.focusedOptionIndex = 0;
                }
                else if (this.focusedOptionIndex >= 0 && this.focusedOptionIndex < optionsNum) {
                    this.focusedOptionIndex++;
                }
            }
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
                this.picker = flatpickr(document.getElementById(self.id + '_display'), {
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
                    if (document.getElementById(this.id + '_display').value) {
                        this.setOffsetDataTime()
                    } else {
                        this.data = ''
                    }
                    this.updateLinkedDates()
                } else {
                    if (document.getElementById(this.id + '_display').value && this.picker.selectedDates.length === 2) {
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
