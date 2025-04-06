import { defineConfig, loadEnv } from "vite";
import dotenv from 'dotenv';
import { fileURLToPath } from 'node:url';
import usePHP from 'vite-plugin-php';
import { viteStaticCopy } from 'vite-plugin-static-copy';
import { existsSync } from 'node:fs';
import tailwindcss from '@tailwindcss/vite';
import fs from 'node:fs';


export default defineConfig(({ command }) => {

  // Load environment variables from .env file
  // const env = loadEnv(mode, process.cwd());
  // const envFiles = [
  //   `.env.${mode}`,
  //   '.env'
  // ];

  // envFiles.forEach((file) => {
  //   if (fs.existsSync(file)) {
  //     try {
  //       const envConfig = dotenv.parse(fs.readFileSync(file));
  //       for (const k in envConfig) {
  //         process.env[k] = envConfig[k];
  //       }
  //     } catch (error) {
  //       console.error(`Failed to load environment variables from ${file}:`, error.message);
  //     }
  //   }
  // });

  // const port = parseInt(env.VITE_PORT) || 3000;
  // const origin = `${env.VITE_ORIGIN}:${port}` || "http://localhost:3000";

  const base = command === 'serve' ? '/' : './';
  const BASE = base.substring(0, base.length - 1);

  // Define Vite configuration
  return {
    base,
    plugins: [
      usePHP({
        entry: [
          'index.php',
          'configs/env.php',
          'pages/**/*.php',
          'partials/**/*.php',
        ],
        rewriteUrl(requestUrl) {
          const filePath = fileURLToPath(
            new URL('.' + requestUrl.pathname, import.meta.url),
          );
          const publicFilePath = fileURLToPath(
            new URL(
              './public' + requestUrl.pathname,
              import.meta.url,
            ),
          );

          if (
            !requestUrl.pathname.includes('.php') &&
            (existsSync(filePath) || existsSync(publicFilePath))
          ) {
            return undefined;
          }

          requestUrl.pathname = 'index.php';

          return requestUrl;
        },
      }),
      viteStaticCopy({
        targets: [
          { src: 'configs', dest: '', overwrite: false },
          { src: 'vendor', dest: '' },
        ],
        silent: command === 'serve',
      }),
      tailwindcss(),
    ],
    define: {
      'BASE': JSON.stringify(BASE),
      'import.meta.env.BASE': JSON.stringify(BASE),
    },
    resolve: {
      alias: {
        '~/': fileURLToPath(new URL('./src/', import.meta.url)),
      },
    },
    publicDir: command === 'build' ? 'raw' : 'public',
    css: {
      preprocessorOptions: {
        scss: {
          api: 'modern-compiler',
        },
      },
    },
    build: {
      rollupOptions: {
        // input: {
        //   main: "src/scripts/main.ts",
        //   styles: "src/styles/globals.scss",
        // },
        output: {
          assetFileNames: (assetInfo) => {
            if (/\.(gif|jpe?g|png|svg)$/.test(assetInfo.names?.[0] ?? '')) {
              return 'images/[name]-[hash][extname]';
            }
            if (/\.(woff|woff2|eot|ttf|otf)$/.test(assetInfo.names?.[0] ?? '')) {
              return 'fonts/[name][extname]';
            }

            return '[name][extname]';
          }
        },
      },
      assetsDir: 'public',
      emptyOutDir: true,
      sourcemap: false,
    },
    server: {
      strictPort: true,
      port: 5173,

      // define source of the images
      origin: 'localhost',
      hmr: {
        host: 'localhost',
      },
    }
  };
});

