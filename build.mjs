import { build } from 'vite'
import { resolve, dirname } from 'path'
import { fileURLToPath } from 'url'
import { rmSync } from 'fs'

const __dirname = dirname(fileURLToPath(import.meta.url))

rmSync('dist', { recursive: true, force: true })

const buildLib = (name, entry) => build({
    logLevel: 'info',
    build: {
        outDir: 'dist',
        emptyOutDir: false,
        lib: {
            entry: resolve(__dirname, entry),
            name: name.replace(/[.\-]/g, '_'),
            fileName: () => `${name}.min.js`,
            formats: ['iife'],
        },
    },
})

await buildLib('control-ui-kit', 'resources/js/control-ui-kit.js')
await buildLib('chart-utils', 'resources/js/chart-utils.js')
await buildLib('flatpickr.year-plugin', 'resources/js/flatpickr.year-select-plugin.js')
