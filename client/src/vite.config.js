import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from "autoprefixer";
import * as path from 'path'
import { viteStaticCopy } from 'vite-plugin-static-copy'
import vue from '@vitejs/plugin-vue';
import fs from 'fs';

const host = 'silverstripe-starter.lh';

export default defineConfig({

  resolve: {
      alias: {}
  },

  server: {
      host,
      hmr: { host },
      https: {
          key: fs.readFileSync(`/Applications/MAMP/Library/OpenSSL/certs/${host}.key`),
          cert: fs.readFileSync(`/Applications/MAMP/Library/OpenSSL/certs/${host}.crt`),
      },
  },
  // root: path.join(__dirname, 'src'),
  // base: '',
  build: {
    emptyOutDir: true,
    // outDir: path.join(__dirname, 'dist'),
    outDir: '../dist',
    rollupOptions: {
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `js/[name].js`,
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return '[name][extname]'
          } else if (
            assetInfo.name.match(/(\.(woff2?|eot|ttf|otf)|font\.svg)(\?.*)?$/)
          ) {
            return 'fonts/[name][extname]'
          } else if (assetInfo.name.match(/\.(jpg|png|svg)$/)) {
            return 'images/[name][extname]'
          }

          return 'js/[name][extname]'
        }
      }
    }
  },

  plugins: [

      laravel({
          input: [
              'src/dashpanel-style.scss',
              'src/dashpanel.js',
          ],
          refresh: true,
          // buildDirectory: '',
      }),

      vue({
          template: {
              transformAssetUrls: {
                  base: null,
                  includeAbsolute: false,
              },
          },
      }),

      // viteStaticCopy({
      //   targets: [
      //     {
      //       src: './node_modules/bootstrap-icons/icons/*',
      //       dest: '../dist/images/bootstrap-icons',
      //     },
      //   ],
      // })
  ],

  css: {
      postcss: {
          plugins: [
              autoprefixer,
          ],
      }
  },

});
