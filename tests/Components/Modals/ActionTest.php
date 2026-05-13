<?php

declare(strict_types=1);

namespace Tests\Components\Modals;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ActionTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.modal.lang-keys.close', 'buttons.close');
        Config::set('themes.default.modal.lang-keys.confirming', 'buttons.confirming');
        Config::set('themes.default.modal.lang-keys.no', 'buttons.no');
        Config::set('themes.default.modal.lang-keys.yes', 'buttons.yes');
    }

    #[Test]
    public function an_action_modal_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-modal-action route="/items/1" results-modal="results">
            </x-modal-action>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, loading: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <div class="p-4"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button type="button" x-on:click="show = false">buttons.no</button>
                            <button type="submit" :disabled="loading" x-on:click="loading = true"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
                        </div>
                    </form>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_action_modal_can_be_rendered_with_put_method(): void
    {
        $template = <<<'HTML'
            <x-modal-action route="/items/1" method="PUT" results-modal="results">
            </x-modal-action>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, loading: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="p-4"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button type="button" x-on:click="show = false">buttons.no</button>
                            <button type="submit" :disabled="loading" x-on:click="loading = true"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
                        </div>
                    </form>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_action_modal_can_be_rendered_with_patch_method(): void
    {
        $template = <<<'HTML'
            <x-modal-action route="/items/1" method="PATCH" results-modal="results">
            </x-modal-action>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, loading: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="p-4"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button type="button" x-on:click="show = false">buttons.no</button>
                            <button type="submit" :disabled="loading" x-on:click="loading = true"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
                        </div>
                    </form>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_action_modal_can_be_rendered_with_delete_method(): void
    {
        $template = <<<'HTML'
            <x-modal-action route="/items/1" method="DELETE" results-modal="results">
            </x-modal-action>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, loading: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="p-4"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button type="button" x-on:click="show = false">buttons.no</button>
                            <button type="submit" :disabled="loading" x-on:click="loading = true"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
                        </div>
                    </form>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_action_modal_can_be_rendered_with_ajax_action(): void
    {
        $template = <<<'HTML'
            <x-modal-action route="/items/1" action="ajax" results-modal="results">
            </x-modal-action>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, loading: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, submitAction(form) { this.loading = true let data = new FormData(form) fetch(form.action, { method: form.method, body: data, headers: { 'X-Requested-With': 'XMLHttpRequest' } }) .then(response => { if (! response.ok) throw response return response.json() }) .then(result => { this.show = false this.loading = false window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'results', type: result.type ?? 'success', title: result.title ?? result.message ?? '', content: result.content ?? '' } })) }) .catch(() => { this.show = false this.loading = false window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'results', type: 'danger' } })) }), width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1" x-on:submit.prevent="submitAction($event.target)">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <div class="p-4"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button type="button" x-on:click="show = false">buttons.no</button>
                            <button type="submit" :disabled="loading" x-on:click="loading = true"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
                        </div>
                    </form>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_action_modal_can_be_rendered_with_ajax_and_fields(): void
    {
        $template = <<<'HTML'
            <x-modal-action route="/items/1" action="ajax" fields="name,email" results-modal="results">
            </x-modal-action>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, loading: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, submitAction(form) { this.loading = true let data = new FormData(form) let allowed = ["name","email"] let filtered = new FormData() for (let key of allowed) { if (data.has(key)) filtered.append(key, data.get(key)) } data = filtered fetch(form.action, { method: form.method, body: data, headers: { 'X-Requested-With': 'XMLHttpRequest' } }) .then(response => { if (! response.ok) throw response return response.json() }) .then(result => { this.show = false this.loading = false window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'results', type: result.type ?? 'success', title: result.title ?? result.message ?? '', content: result.content ?? '' } })) }) .catch(() => { this.show = false this.loading = false window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'results', type: 'danger' } })) }), width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1" x-on:submit.prevent="submitAction($event.target)">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <div class="p-4"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button type="button" x-on:click="show = false">buttons.no</button>
                            <button type="submit" :disabled="loading" x-on:click="loading = true"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
                        </div>
                    </form>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_action_modal_can_be_rendered_with_custom_button_labels(): void
    {
        $template = <<<'HTML'
            <x-modal-action route="/items/1" results-modal="results" yes="Confirm" no="Cancel" confirming="Please wait...">
            </x-modal-action>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, loading: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <div class="p-4"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button type="button" x-on:click="show = false">Cancel</button>
                            <button type="submit" :disabled="loading" x-on:click="loading = true"> <span x-show="!loading">Confirm</span> <span x-show="loading">Please wait...</span> </button>
                        </div>
                    </form>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_action_modal_can_be_rendered_with_custom_id(): void
    {
        $template = <<<'HTML'
            <x-modal-action id="delete-modal" route="/items/1" results-modal="results">
            </x-modal-action>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, loading: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="delete-modal" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <div class="p-4"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button type="button" x-on:click="show = false">buttons.no</button>
                            <button type="submit" :disabled="loading" x-on:click="loading = true"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
                        </div>
                    </form>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
