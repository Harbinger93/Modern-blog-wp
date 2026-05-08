import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  build: {
    // Output assets to the 'assets' directory
    outDir: 'assets',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'src/js/main.jsx'),
        style: path.resolve(__dirname, 'src/css/style.css'),
      },
      output: {
        entryFileNames: `js/[name].js`,
        chunkFileNames: `js/[name].js`,
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return 'css/[name].[ext]';
          }
          return 'media/[name].[ext]';
        },
      },
    },
  },
  server: {
    // For local development with WP
    cors: true,
    strictPort: true,
    port: 3000,
  }
});
