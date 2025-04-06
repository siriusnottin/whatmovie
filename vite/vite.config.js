import { defineConfig } from 'vite'

export default defineConfig({
  root: 'src',
  base: process.env.APP_ENV === 'development'
    ? '/'
    : '/dist/',
  build: {
    outDir: '../public/dist',
    emptyOutDir: true,

    // emit manifest so PHP can find the hashed files
    manifest: true,
  },
  server: {
    strictPort: true,
    port: 5173,
    host: true,
  },
})
