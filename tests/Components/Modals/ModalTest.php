<?php

declare(strict_types=1);

namespace Tests\Components\Modals;

use ControlUIKit\Components\Modals\Modal;
use ControlUIKit\Exceptions\ControlUIKitException;
use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ModalTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.modal.body', 'body');
        Config::set('themes.default.modal.footer', 'footer');
        Config::set('themes.default.modal.form', 'form');
        Config::set('themes.default.modal.overlay', 'overlay');
        Config::set('themes.default.modal.panel', 'panel');
        Config::set('themes.default.modal.scroll-body', 'scroll-body');
        Config::set('themes.default.modal.scroll-clip', 'scroll-clip');
        Config::set('themes.default.modal.scroll-panel', 'scroll-panel');
        Config::set('themes.default.modal.title', 'title');
    }

    #[Test]
    public function a_modal_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-modal />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-2xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="panel scroll-panel" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
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
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-2xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="test-modal" class="overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="panel scroll-panel" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_medium_max_width(): void
    {
        $template = <<<'HTML'
            <x-modal max-width="md" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-md', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="panel scroll-panel" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_large_max_width(): void
    {
        $template = <<<'HTML'
            <x-modal max-width="lg" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-lg', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="panel scroll-panel" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_xlarge_max_width(): void
    {
        $template = <<<'HTML'
            <x-modal max-width="xl" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="panel scroll-panel" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
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
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-sm', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="panel scroll-panel" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_3xl_max_width(): void
    {
        $template = <<<'HTML'
            <x-modal max-width="3xl" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-3xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="panel scroll-panel" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_4xl_max_width(): void
    {
        $template = <<<'HTML'
            <x-modal max-width="4xl" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-4xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="panel scroll-panel" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-modal overlay="none" panel="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-2xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="scroll-panel" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-modal overlay="my-overlay" panel="my-panel" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-2xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="my-overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="my-panel scroll-panel" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_body_scroll(): void
    {
        $template = <<<'HTML'
            <x-modal scroll="body" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-2xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="panel scroll-body" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_can_be_rendered_with_clip_scroll(): void
    {
        $template = <<<'HTML'
            <x-modal scroll="clip" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, scrollLocked: false, trigger: null, init() { this.$watch('show', this.toggleScroll.bind(this)) if (this.show) { this.lockScroll() } }, toggleScroll(value) { if (value) { this.trigger = document.activeElement; this.lockScroll(); return } this.unlockScroll() if (this.trigger) { this.trigger.focus() } this.trigger = null }, lockScroll() { if (this.scrollLocked) { return } this.scrollLocked = true window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' } let store = window.controlUiKitScrollLock let root = document.documentElement store.depth++ if (store.depth !== 1) { return } let gutter = Math.max(0, window.innerWidth - root.clientWidth) store.overflow = root.style.overflow store.paddingRight = root.style.paddingRight root.style.overflow = 'hidden' if (gutter !== 0) { root.style.paddingRight = gutter + 'px' } }, unlockScroll() { if (! this.scrollLocked) { return } this.scrollLocked = false let store = window.controlUiKitScrollLock if (! store) { return } store.depth = Math.max(0, store.depth - 1) if (store.depth !== 0) { return } let root = document.documentElement root.style.overflow = store.overflow root.style.paddingRight = store.paddingRight }, destroy() { this.unlockScroll() }, detail: { type: 'default', button: 'buttons.close', yes_button: 'buttons.yes', no_button: 'buttons.no', yes_action: 'show = false', no_action: 'show = false', }, maxWidth: 'sm:max-w-2xl', openModal() { this.show = true this.detail.button = this.detail.button ?? 'buttons.close' this.detail.yes_button = this.detail.yes_button ?? 'buttons.yes' this.detail.no_button = this.detail.no_button ?? 'buttons.no' this.detail.yes_action = this.detail.yes_action ?? 'show = false' this.detail.no_action = this.detail.no_action ?? 'show = false' this.maxWidth = this.width(this.detail.width ?? this.maxWidth) if (Array.isArray(this.detail.content)) { this.detail.content = '
                <p>' + this.detail.content.join('</p>
                <p>') + '</p>
                '; } }, width(maxWidth) { if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth } switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case '3xl': return 'sm:max-w-3xl'; case '4xl': return 'sm:max-w-4xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="overlay" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="panel scroll-clip" :class="{ [maxWidth]: true }" role="dialog" aria-modal="true" tabindex="-1" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_modal_component_throws_an_exception_when_given_an_invalid_scroll(): void
    {
        $this->expectException(ControlUIKitException::class);
        $this->expectExceptionMessage('Modal scroll [bottom] is invalid, please use one of [panel, body, clip]');

        new Modal(scroll: 'bottom');
    }

    /**
     * `scroll` names a theme key suffix rather than a class, so unlike every style attribute in
     * the kit it has no `none`: `UseThemeFile::style()` resolves the string `none` to an empty
     * string, which is why the third mode is called `clip`.
     */
    #[Test]
    public function a_modal_component_throws_an_exception_when_given_a_scroll_of_none(): void
    {
        $this->expectException(ControlUIKitException::class);
        $this->expectExceptionMessage('Modal scroll [] is invalid, please use one of [panel, body, clip]');

        new Modal(scroll: 'none');
    }

    #[Test]
    public function a_modal_component_throws_an_exception_when_the_theme_scroll_is_invalid(): void
    {
        Config::set('themes.default.modal.scroll', 'inside');

        $this->expectException(ControlUIKitException::class);
        $this->expectExceptionMessage('Modal scroll [inside] is invalid, please use one of [panel, body, clip]');

        new Modal;
    }
}
