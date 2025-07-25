import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/task/layouts/app.css",
                "resources/js/app.js",
                "resources/js/task/team.js",
                "resources/js/task/role.js",
                "resources/js/task/user.js",
            ],
            refresh: true,
        }),
    ],
});
