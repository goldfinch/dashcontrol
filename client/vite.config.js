import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from "autoprefixer";
import { viteStaticCopy } from 'vite-plugin-static-copy'

export default defineConfig({

  // build: {
  //   emptyOutDir: true,
  //   outDir: '../dist',
  //   rollupOptions: {
  //     output: {
  //       entryFileNames: `dashpanel/assets/[name].js`,
  //       chunkFileNames: `dashpanel/assets/[name].js`,
  //       assetFileNames: `dashpanel/assets/[name].[ext]`
  //     }
  //   }
  // },

  plugins: [
      laravel({
          input: [
              'src/app.scss',
              'src/app.js',
          ],
          refresh: true,
      }),

      viteStaticCopy({
        targets: [
          // {
          //   src: './extra/images/*',
          //   dest: '../dist/dashpanel/assets/extra/images',
          // },
        ],
      })
  ],

    css: {
        postcss: {
            plugins: [
                autoprefixer,
            ],
        }
    },

});
