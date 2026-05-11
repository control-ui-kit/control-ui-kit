<?php

declare(strict_types=1);

namespace Tests\Components\Modals;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ModalTest extends ComponentTestCase
{
    #[Test]
    public function a_modal_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-modal />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-2xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_an_id(): void
    {
        $template = <<<'HTML'
            <x-modal id="test-modal" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-2xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="test-modal" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_small_max_width(): void
    {
        $template = <<<'HTML'
            <x-modal max-width="sm" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-sm', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
