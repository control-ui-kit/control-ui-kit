<?php

declare(strict_types=1);

namespace Tests\Components\Modals;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ActionTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.modal.lang-keys.close', 'buttons.close');
        Config::set('themes.default.modal.lang-keys.confirming', 'buttons.confirming');
        Config::set('themes.default.modal.lang-keys.no', 'buttons.no');
        Config::set('themes.default.modal.lang-keys.yes', 'buttons.yes');

        $this->setUpButtonConfig();
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
                        <div class="p-4 text-sm leading-6"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-on:click="show = false" type="button"> buttons.no </button>
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-bind:disabled="loading" type="submit"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
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
                        <div class="p-4 text-sm leading-6"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-on:click="show = false" type="button"> buttons.no </button>
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-bind:disabled="loading" type="submit"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
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
                        <div class="p-4 text-sm leading-6"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-on:click="show = false" type="button"> buttons.no </button>
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-bind:disabled="loading" type="submit"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
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
                        <div class="p-4 text-sm leading-6"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-on:click="show = false" type="button"> buttons.no </button>
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-bind:disabled="loading" type="submit"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
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
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, submitAction(form) { this.loading = true let data = new FormData(form) fetch(form.action, { method: form.method, body: data, headers: { 'X-Requested-With': 'XMLHttpRequest' } }) .then(response => { if (! response.ok) throw response return response.json() }) .then(result => { this.show = false this.loading = false window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'results', type: result.type ?? 'success', title: result.title ?? result.message ?? '', content: result.content ?? '' } })) }) .catch(() => { this.show = false this.loading = false window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'results', type: 'danger' } })) }) }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1" x-on:submit.prevent="submitAction($event.target)">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <div class="p-4 text-sm leading-6"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-on:click="show = false" type="button"> buttons.no </button>
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-bind:disabled="loading" type="submit"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
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
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'default', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, submitAction(form) { this.loading = true let data = new FormData(form) let allowed = ["name","email"] let filtered = new FormData() for (let key of allowed) { if (data.has(key)) filtered.append(key, data.get(key)) } data = filtered fetch(form.action, { method: form.method, body: data, headers: { 'X-Requested-With': 'XMLHttpRequest' } }) .then(response => { if (! response.ok) throw response return response.json() }) .then(result => { this.show = false this.loading = false window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'results', type: result.type ?? 'success', title: result.title ?? result.message ?? '', content: result.content ?? '' } })) }) .catch(() => { this.show = false this.loading = false window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'results', type: 'danger' } })) }) }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1" x-on:submit.prevent="submitAction($event.target)">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <div class="p-4 text-sm leading-6"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-on:click="show = false" type="button"> buttons.no </button>
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-bind:disabled="loading" type="submit"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
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
                        <div class="p-4 text-sm leading-6"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-on:click="show = false" type="button"> Cancel </button>
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-bind:disabled="loading" type="submit"> <span x-show="!loading">Confirm</span> <span x-show="loading">Please wait...</span> </button>
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
                        <div class="p-4 text-sm leading-6"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-on:click="show = false" type="button"> buttons.no </button>
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-bind:disabled="loading" type="submit"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
                        </div>
                    </form>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_action_modal_can_be_rendered_with_a_type(): void
    {
        $template = <<<'HTML'
            <x-modal-action route="/items/1" type="danger" results-modal="results">
            </x-modal-action>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, loading: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'danger', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <div class="p-4 text-sm leading-6"></div>
                        <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-on:click="show = false" type="button"> buttons.no </button>
                            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-bind:disabled="loading" type="submit"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
                        </div>
                    </form>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_action_modal_can_be_rendered_with_a_title(): void
    {
        $this->setUpAlertConfig();

        $template = <<<'HTML'
            <x-modal-action route="/items/1" type="danger" results-modal="results">
                <x-slot name="title">Are you sure?</x-slot>
            </x-modal-action>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ show: false, loading: false, focusables() { // All focusable element types... let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])' return [...$el.querySelectorAll(selector)] // All non-disabled elements... .filter(el =>
                ! el.hasAttribute('disabled')) }, firstFocusable() { return this.focusables()[0] }, lastFocusable() { return this.focusables().slice(-1)[0] }, nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() }, prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() }, nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) }, prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }, autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() }, detail: { type: 'danger', }, maxWidth: '2xl', openModal() { this.show = true this.loading = false this.maxWidth = this.width(this.maxWidth) }, width(maxWidth) { switch (maxWidth) { case 'sm': return 'sm:max-w-sm'; case 'md': return 'sm:max-w-md'; case 'lg': return 'sm:max-w-lg'; case '2xl': return 'sm:max-w-2xl'; case 'xl': default: return 'sm:max-w-xl'; } } }" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="" class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72" style="display: none;">
                <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
                </div>
                <div x-show="show" class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5" :class="{ [maxWidth]: true }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <form method="POST" action="/items/1">
                        <input type="hidden" name="_token" value="" autocomplete="off">
                        <div class="p-4 text-sm leading-6">
                            <div class="mb-4">
                                <div class="background default-background border default-border other padding rounded shadow width" x-show="detail.type == 'default'">
                                    <div class="flex items-center">
                                        <div class="flex flex-col space-y-2">
                                            <div class="text-color text-alert-default-text text-font text-size text-other"> Are you sure? </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="background brand-background border brand-border other padding rounded shadow width" x-show="detail.type == 'brand'">
                                    <div class="flex items-center">
                                        <div class="shrink-0 mr-3">
                                            <svg class="brand-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3" cy="3" r="3"/>
                                                </svg>
                                            </div>
                                            <div class="flex flex-col space-y-2">
                                                <div class="text-color text-alert-brand-text text-font text-size text-other"> Are you sure? </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="background danger-background border danger-border other padding rounded shadow width" x-show="detail.type == 'danger'">
                                        <div class="flex items-center">
                                            <div class="shrink-0 mr-3">
                                                <svg class="danger-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="3" cy="3" r="3"/>
                                                    </svg>
                                                </div>
                                                <div class="flex flex-col space-y-2">
                                                    <div class="text-color text-alert-danger-text text-font text-size text-other"> Are you sure? </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="background info-background border info-border other padding rounded shadow width" x-show="detail.type == 'info'">
                                            <div class="flex items-center">
                                                <div class="shrink-0 mr-3">
                                                    <svg class="info-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3" cy="3" r="3"/>
                                                        </svg>
                                                    </div>
                                                    <div class="flex flex-col space-y-2">
                                                        <div class="text-color text-alert-info-text text-font text-size text-other"> Are you sure? </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="background success-background border success-border other padding rounded shadow width" x-show="detail.type == 'success'">
                                                <div class="flex items-center">
                                                    <div class="shrink-0 mr-3">
                                                        <svg class="success-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3" cy="3" r="3"/>
                                                            </svg>
                                                        </div>
                                                        <div class="flex flex-col space-y-2">
                                                            <div class="text-color text-alert-success-text text-font text-size text-other"> Are you sure? </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="background warning-background border warning-border other padding rounded shadow width" x-show="detail.type == 'warning'">
                                                    <div class="flex items-center">
                                                        <div class="shrink-0 mr-3">
                                                            <svg class="warning-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="3" cy="3" r="3"/>
                                                                </svg>
                                                            </div>
                                                            <div class="flex flex-col space-y-2">
                                                                <div class="text-color text-alert-warning-text text-font text-size text-other"> Are you sure? </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                                                <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-on:click="show = false" type="button"> buttons.no </button>
                                                <button class="background default-background border default-border color default-color cursor font other padding rounded shadow min-w-20 space-x-0!" x-bind:disabled="loading" type="submit"> <span x-show="!loading">buttons.yes</span> <span x-show="loading">buttons.confirming</span> </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    private function setUpButtonConfig(): void
    {
        Config::set('themes.default.button.primary-button', 'default');
        Config::set('themes.default.button.background', 'background');
        Config::set('themes.default.button.border', 'border');
        Config::set('themes.default.button.color', 'color');
        Config::set('themes.default.button.cursor', 'cursor');
        Config::set('themes.default.button.disabled', 'disabled');
        Config::set('themes.default.button.font', 'font');
        Config::set('themes.default.button.icon-size', 'icon-size');
        Config::set('themes.default.button.other', 'other');
        Config::set('themes.default.button.padding', 'padding');
        Config::set('themes.default.button.rounded', 'rounded');
        Config::set('themes.default.button.shadow', 'shadow');
        Config::set('themes.default.button.width', 'width');
        Config::set('themes.default.button.default.background', 'default-background');
        Config::set('themes.default.button.default.border', 'default-border');
        Config::set('themes.default.button.default.color', 'default-color');
        Config::set('themes.default.button.default.icon', 'default-icon');
    }

    private function setUpAlertConfig(): void
    {
        Config::set('themes.default.alert.default-alert', 'default');
        Config::set('themes.default.alert.background', 'background');
        Config::set('themes.default.alert.border', 'border');
        Config::set('themes.default.alert.other', 'other');
        Config::set('themes.default.alert.padding', 'padding');
        Config::set('themes.default.alert.rounded', 'rounded');
        Config::set('themes.default.alert.shadow', 'shadow');
        Config::set('themes.default.alert.width', 'width');
        Config::set('themes.default.alert.text-color', 'text-color');
        Config::set('themes.default.alert.text-font', 'text-font');
        Config::set('themes.default.alert.text-size', 'text-size');
        Config::set('themes.default.alert.text-other', 'text-other');
        Config::set('themes.default.alert.title-color', 'title-color');
        Config::set('themes.default.alert.title-font', 'title-font');
        Config::set('themes.default.alert.title-size', 'title-size');
        Config::set('themes.default.alert.title-other', 'title-other');
        Config::set('themes.default.alert.url-color', 'url-color');
        Config::set('themes.default.alert.url-font', 'url-font');
        Config::set('themes.default.alert.url-size', 'url-size');
        Config::set('themes.default.alert.url-other', 'url-other');
        Config::set('themes.default.alert.icon', '');
        Config::set('themes.default.alert.icon-color', 'icon-color');
        Config::set('themes.default.alert.icon-size', 'icon-size');
        Config::set('themes.default.alert.default.background', 'default-background');
        Config::set('themes.default.alert.default.border', 'default-border');
        Config::set('themes.default.alert.default.icon', '');
        Config::set('themes.default.alert.default.icon-color', 'default-icon-color');
        Config::set('themes.default.alert.default.title-color', 'default-title-color');
        Config::set('themes.default.alert.default.text-other', 'default-text-other');
        Config::set('themes.default.alert.default.url-color', 'default-url-color');
        Config::set('themes.default.alert.brand.background', 'brand-background');
        Config::set('themes.default.alert.brand.border', 'brand-border');
        Config::set('themes.default.alert.brand.icon', 'icon-dot');
        Config::set('themes.default.alert.brand.icon-color', 'brand-icon-color');
        Config::set('themes.default.alert.brand.title-color', 'brand-title-color');
        Config::set('themes.default.alert.brand.text-other', 'brand-text-other');
        Config::set('themes.default.alert.brand.url-color', 'brand-url-color');
        Config::set('themes.default.alert.danger.background', 'danger-background');
        Config::set('themes.default.alert.danger.border', 'danger-border');
        Config::set('themes.default.alert.danger.icon', 'icon-dot');
        Config::set('themes.default.alert.danger.icon-color', 'danger-icon-color');
        Config::set('themes.default.alert.danger.title-color', 'danger-title-color');
        Config::set('themes.default.alert.danger.text-other', 'danger-text-other');
        Config::set('themes.default.alert.danger.url-color', 'danger-url-color');
        Config::set('themes.default.alert.info.background', 'info-background');
        Config::set('themes.default.alert.info.border', 'info-border');
        Config::set('themes.default.alert.info.icon', 'icon-dot');
        Config::set('themes.default.alert.info.icon-color', 'info-icon-color');
        Config::set('themes.default.alert.info.title-color', 'info-title-color');
        Config::set('themes.default.alert.info.text-other', 'info-text-other');
        Config::set('themes.default.alert.info.url-color', 'info-url-color');
        Config::set('themes.default.alert.success.background', 'success-background');
        Config::set('themes.default.alert.success.border', 'success-border');
        Config::set('themes.default.alert.success.icon', 'icon-dot');
        Config::set('themes.default.alert.success.icon-color', 'success-icon-color');
        Config::set('themes.default.alert.success.title-color', 'success-title-color');
        Config::set('themes.default.alert.success.text-other', 'success-text-other');
        Config::set('themes.default.alert.success.url-color', 'success-url-color');
        Config::set('themes.default.alert.warning.background', 'warning-background');
        Config::set('themes.default.alert.warning.border', 'warning-border');
        Config::set('themes.default.alert.warning.icon', 'icon-dot');
        Config::set('themes.default.alert.warning.icon-color', 'warning-icon-color');
        Config::set('themes.default.alert.warning.title-color', 'warning-title-color');
        Config::set('themes.default.alert.warning.text-other', 'warning-text-other');
        Config::set('themes.default.alert.warning.url-color', 'warning-url-color');
    }
}
