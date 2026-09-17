{{--
    Locks scrolling on the document behind an open modal, and releases it again on close.

    The lock is reference counted on a single `window.controlUiKitScrollLock` object, so a modal
    opened from another modal - `x-modal-action` handing off to its results dialog - keeps the page
    locked until the last of them closes, and the original inline `overflow` / `padding-right` are
    saved once and restored once. The counter lives on `window` rather than on a `dataset`, so an
    empty string round-trips exactly and a `wire:navigate` back-button cache cannot resurrect a
    stale depth. `padding-right` compensates for the width of the scrollbar the lock removes, so
    there is no layout shift on open or close.

    Removing the overflow is what locks the page; `overscroll-contain` on the overlay only stops a
    scroll inside the panel from chaining out to the page, and is not a substitute for it.

    Wiring lives in `init()` rather than in the element's `x-init` so that a modal rendered
    already-open - through `@@entangle` or `wire:model` - is locked on first render too, since
    `$watch` fires on change only. This partial therefore claims the `init()` and `destroy()` keys
    of the `x-data` object it is included in, and a caller must not declare either of its own: the
    later literal key would silently win and the lock would never be wired up or released.

    Written without a single angle bracket in it, in either direction. `Gajus\Dindent\Indenter`,
    which the component tests format their expectations with, tokenises tags with a regex that
    stops at the first closing angle bracket inside an attribute value, and an opening one makes
    its reproduce-check fail and throw outright. Hence `!== 0` rather than a greater-than
    comparison, and `.bind(this)` rather than an arrow function.
--}}
        scrollLocked: false,
        trigger: null,
        init() {
            this.$watch('show', this.toggleScroll.bind(this))
            if (this.show) { this.lockScroll() }
        },
        toggleScroll(value) {
            if (value) { this.trigger = document.activeElement; this.lockScroll(); return }
            this.unlockScroll()
            if (this.trigger) { this.trigger.focus() }
            this.trigger = null
        },
        lockScroll() {
            if (this.scrollLocked) { return }
            this.scrollLocked = true
            window.controlUiKitScrollLock = window.controlUiKitScrollLock ?? { depth: 0, overflow: '', paddingRight: '' }
            let store = window.controlUiKitScrollLock
            let root = document.documentElement
            store.depth++
            if (store.depth !== 1) { return }
            let gutter = Math.max(0, window.innerWidth - root.clientWidth)
            store.overflow = root.style.overflow
            store.paddingRight = root.style.paddingRight
            root.style.overflow = 'hidden'
            if (gutter !== 0) { root.style.paddingRight = gutter + 'px' }
        },
        unlockScroll() {
            if (! this.scrollLocked) { return }
            this.scrollLocked = false
            let store = window.controlUiKitScrollLock
            if (! store) { return }
            store.depth = Math.max(0, store.depth - 1)
            if (store.depth !== 0) { return }
            let root = document.documentElement
            root.style.overflow = store.overflow
            root.style.paddingRight = store.paddingRight
        },
        destroy() {
            this.unlockScroll()
        },
