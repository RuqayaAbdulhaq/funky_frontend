import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/style.css",
                "resources/js/vendors/modernizr-3.6.0.min.js",
                "resources/js/vendors/jquery-3.6.0.min.js",
                "resources/js/vendors/jquery-migrate-3.3.0.min.js",
                "resources/js/vendors/bootstrap.bundle.min.js",
                "resources/js/vendors/waypoints.js",
                "resources/js/vendors/wow.js",
                "resources/js/vendors/text-type.js",
                "resources/js/vendors/swiper-bundle.min.js",
                "resources/js/vendors/jquery.progressScroll.min.js",
                "resources/js/main.js",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
