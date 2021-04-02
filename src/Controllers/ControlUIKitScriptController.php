<?php

namespace ControlUIKit\Controllers;

use Illuminate\Routing\Controller;

class ControlUIKitScriptController extends Controller
{
    public function __invoke(): string
    {
        $this->disablePackageConflicts();

        return <<<blade
            window.Components = {
                listbox(options) {
                    let id = options.id || 'selected'

                    return {
                        init() {
                            this.optionCount = this.\$refs['listbox-' + id].children.length
                            this.\$watch('activeIndex', (highlightIndex) => {
                                if (!this.open) return

                                if (this.activeIndex === null) {
                                    this.activeDescendant = ''
                                    return
                                }

                                this.activeDescendant = this.\$refs['listbox-' + id].children[this.activeIndex].id
                            })

                            for (let i = 0; i < this.\$refs['listbox-' + id].children.length; i++) {
                                if (this.\$refs['listbox-' + id].children[i].dataset.value == this.value) {
                                    this.highlightIndex = i
                                    this.activeIndex = i
                                }
                            }

                            this.image = this.\$refs['listbox-' + id].children[this.activeIndex].dataset.image
                            this.subtext = this.\$refs['listbox-' + id].children[this.activeIndex].dataset.subtext
                            this.text = this.\$refs['listbox-' + id].children[this.highlightIndex].dataset.text
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
                            this.image = this.\$refs['listbox-' + id].children[this.activeIndex].dataset.image
                            this.subtext = this.\$refs['listbox-' + id].children[this.activeIndex].dataset.subtext
                            this.text = this.\$refs['listbox-' + id].children[this.activeIndex].dataset.text
                            this.value = this.\$refs['listbox-' + id].children[this.activeIndex].dataset.value
                        },
                        onButtonClick() {
                            if (this.open) return
                            this.activeIndex = this.highlightIndex
                            this.open = true
                            this.\$nextTick(() => {
                                this.\$refs['listbox-' + id].focus()
                                if (this.activeIndex) {
                                    this.\$refs['listbox-' + id].children[this.activeIndex].scrollIntoView({ block: 'nearest' })
                                }
                            })
                        },
                        onKeyboardSelect() {
                            if (this.activeIndex !== null) {
                                this.highlightIndex = this.activeIndex
                            }
                            this.image = this.\$refs['listbox-' + id].children[this.activeIndex].dataset.image
                            this.subtext = this.\$refs['listbox-' + id].children[this.activeIndex].dataset.subtext
                            this.text = this.\$refs['listbox-' + id].children[this.highlightIndex].dataset.text
                            this.value = this.\$refs['listbox-' + id].children[this.highlightIndex].dataset.value
                            this.open = false
                            this.\$refs.button.focus()
                        },
                        onValueChange() {
                            for (let i = 0; i < this.\$refs['listbox-' + id].children.length; i++) {
                                if (this.\$refs['listbox-' + id].children[i].dataset.value === this.value) {
                                    this.highlightIndex = i
                                    this.activeIndex = i
                                    this.image = this.\$refs['listbox-' + id].children[i].dataset.image
                                    this.subtext = this.\$refs['listbox-' + id].children[i].dataset.subtext
                                    this.text = this.\$refs['listbox-' + id].children[i].dataset.text
                                    this.value = this.\$refs['listbox-' + id].children[i].dataset.value
                                    break
                                }
                            }
                        },
                        onEscape() {
                            this.open = false
                            this.\$refs.button.focus()
                        },
                        onArrowUp() {
                            this.activeIndex = this.activeIndex - 1 < 0 ? this.optionCount - 1 : this.activeIndex - 1
                            this.\$refs['listbox-' + id].children[this.activeIndex].scrollIntoView({ block: 'nearest' })
                        },
                        onArrowDown() {
                            this.activeIndex = this.activeIndex + 1 > this.optionCount - 1 ? 0 : this.activeIndex + 1
                            this.\$refs['listbox-' + id].children[this.activeIndex].scrollIntoView({ block: 'nearest' })
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
        blade;
    }

    private function disablePackageConflicts(): void
    {
        if (config('debugbar.enabled')) {
            app('debugbar')->disable();
        }
    }
}
