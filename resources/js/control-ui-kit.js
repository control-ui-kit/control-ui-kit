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
                    if (this.$refs['listbox-' + id].children[i].dataset.value === this.value) {
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
            moreButton: true,
            openMore: false,
            usedSpace: 0,
            search: null,
            filters: [],
            init() {
                window.addEventListener('DOMContentLoaded', () => {
                    this.$el.dispatchEvent(new Event('ready'))
                });
            },
            onButtonClick(filter) {
                if (this.open === filter) return
                this.open = filter
            },
            onEscape() {
                this.open = false
            },
            onMoreButtonClicked() {
                this.openMore = ! this.openMore
                this.open = false
            },
            initFilters() {
                let filter, width, filters = this.$refs.filters;

                if (!this.hasFilters) {
                    return;
                }

                for (let i = 0; i < filters.children.length; i++) {

                    filter = filters.children[i]
                    width = filter.offsetWidth

                    if (filter.classList.contains('table-filter')) {
                        filter.id = 'filter_' + this.randomString()
                        this.filters.push({
                            display: i,
                            id: filter.id,
                            label: filter.dataset.label,
                            priority: filter.dataset.priority,
                            width: width,
                            element: filter,
                            location: 'filters'
                        })

                        filter.classList.add('hidden')
                    }
                }

                this.filters.sort(this.sortByPriority);
                this.resizeFilters(true)
            },
            randomString() {
                return Date.now().toString(36) + Math.random().toString(36).substring(2)
            },
            resizeFilters(first) {

                if (! this.hasFilters) {
                    return;
                }

                let filter, used = 0
                let searchFieldWidth = (this.hasSearch) ? this.$refs.search.offsetWidth : 0
                let moreButtonWidth = this.$refs.more.offsetWidth
                let tableWidth = this.$refs.table.offsetWidth
                let maxWidth = tableWidth - searchFieldWidth - moreButtonWidth - 50

                for (let i = 0; i < this.filters.length; i++) {

                    filter = this.filters[i]
                    if (first) filter.element.classList.remove('hidden')
                    used += filter.width

                    if (used > maxWidth && filter.location !== 'more') {
                        this.moveFilter(filter, this.$refs.overflow, 'more')
                        this.filters[i].location = 'more'
                    } else if (used < maxWidth && filter.location !== 'filters') {
                        this.moveFilter(filter, this.$refs.filters, 'filters')
                        this.filters[i].location = 'filters'
                    }
                }

                this.moreButton = this.$refs.overflow.children.length > 0
                this.openMore = this.openMore ? this.moreButton : this.openMore
            },
            moveFilter(filter, to, location) {
                let after = this.getAfterElement(filter, location)
                if (after !== '') {
                    after.after(filter.element)
                } else {
                    to.prepend(filter.element)
                }
            },
            getAfterElement(filter, location) {
                let filters = this.filters.filter(function(filter) {
                    return filter.location === location
                }).sort(this.sortByDisplayOrder)

                if (filters.length) {
                    for (let i = 0; i < filters.length; i++) {
                        if (filters[i].display < filter.display) {
                            return filters[i].element
                        }
                    }
                }

                return ''
            },
            sortByDisplayOrder(a, b) {
                if (a.display > b.display){
                    return -1;
                }
                if (a.display < b.display){
                    return 1;
                }
                return 0;
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