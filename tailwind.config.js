/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "selector",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./app/Livewire/**/*Table.php",
        "./vendor/power-components/livewire-powergrid/resources/views/**/*.php",
        "./vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php",
    ],
    presets: [
        // require("./vendor/wireui/wireui/tailwind.config.js"),
        require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
    ],
    theme: {
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
};
