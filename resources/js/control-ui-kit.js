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
            moreButton: false,
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
            onResize() {
                this.resizeFilters()
            },
            onMoreButtonClick() {
                this.openMore = ! this.openMore
                this.open = false
            },
            initFilters() {

                let filter, width, filters = this.$refs.filters;

                for (let i = 0; i < filters.children.length; i++) {
                    filter = filters.children[i]
                    width = filter.offsetWidth
                    if (filter.classList.contains('table-filter')) {

                        filter.id = 'filter_' + this.randomString()

                        this.filters.push({
                            id: filter.id,
                            label: filter.dataset.label,
                            priority:
                            filter.dataset.priority,
                            width: width,
                            element: filter,
                            location: 'filters'
                        })


                    }
                }

                this.filters.sort(this.sortByPriority);
                this.resizeFilters()
            },
            randomString() {
                return Date.now().toString(36) + Math.random().toString(36).substring(2)
            },
            resizeFilters() {

                let element, after, filter, used = 0, maxWidth = this.$refs.filterSpace.offsetWidth - 130

                console.log('Width available.....', maxWidth)
                console.log('Filter Count.....', this.filters.length)

                for (let i = 0; i < this.filters.length; i++) {

                    filter = this.filters[i]
                    element = document.getElementById(filter.id);

                    console.log(filter.label + ' [' + filter.location + ']', filter.id);

                    used += filter.width

                    if (used > maxWidth && filter.location !== 'more') {
                        after = this.getAfterElement(filter.id, 'more')
                        this.moveFilter(element, this.$refs.filters, this.$refs.moreFilters, after)
                        this.filters[i].location = 'more'
                    } else if (used < maxWidth && filter.location !== 'filters') {
                        after = this.getAfterElement(filter.id, 'filters')
                        this.moveFilter(element, this.$refs.moreFilters, this.$refs.filters, after)
                        this.filters[i].location = 'filters'
                    } else {
                        console.log('nothing to move')
                    }
                }

                this.moreButton = this.$refs.moreFilters.children.length > 0
            },
            moveFilter(filter, from, to, after) {

                if (after !== '') {
                    console.log('move after...', filter, from, to, after)
                    after.after(filter)
                } else {
                    console.log('move append...', filter, from, to)
                    to.append(filter)
                }

                let button = document.getElementById('moreButton')
                this.$refs.filters.append(button)
            },
            getAfterElement(id, location) {

                console.log('before', this.filters)

                let filters = this.filters.filter(function(filter) {
                    console.log(filter.id, filter.location, location)
                    return filter.location === location;
                });

                console.log('filtered', filters)

                let after = '';
                for (let i = 0; i < filters.length; i++) {
                    if (filters.id === id) {
                        return after
                    }

                    after = filters.id
                }

                console.log('after....empty')

                return ''

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
            moveFilters() {

                let limit, usedSpace = 0, filter = null, filterSpace = 0
                let availableSpace = this.$refs.filterSpace.offsetWidth - 130
                let filters = this.$refs.filters;
                let moreFilters = this.$refs.moreFilters;

                //for (let i = 0; i < moreFilters.children.length; i++) {
                //    filter = moreFilters.children[i]
                //    if (filter.classList.contains('table-filter')) {
                //        filters.append(filter)
                //    }
                //}

                for (let i = 0; i < filters.children.length; i++) {
                    filter = filters.children[i]
                    filterSpace = filter.offsetWidth
                    if (filter.classList.contains('table-filter')) {
                        if (usedSpace + filterSpace > availableSpace) {
                            limit = i--
                            usedSpace += filterSpace
                            break
                        }
                        usedSpace += filterSpace
                    }
                }

                let move = filters.children.length - 1 - limit

                for (let i = 0; i < move; i++) {
                    moreFilters.append(filters.children[limit])
                }

                this.moreButton = moreFilters.children.length > 0
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
