/** @type {import('tailwindcss').Config} */
export default {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
}

module.exports = {

    plugins: [
        require('flowbite/plugin')
    ]

}

module.exports = {

    content: [
        "./node_modules/flowbite/**/*.js"
    ]

}

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
   ])
   .styles([
       'node_modules/datatables.net-dt/css/jquery.dataTables.css'
   ], 'public/css/dataTables.css')
   .scripts([
       'node_modules/datatables.net/js/jquery.dataTables.js'
   ], 'public/js/dataTables.js');
