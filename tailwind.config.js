const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
	content: [
		"./resources/**/*.{php,js}",
		"./Functionality/**/*.php",
		"./Components/**/*.php",
	],
	theme: {
		extend: {
			colors: {},
		},
	},
	plugins: [],
	corePlugins: {
		preflight: true,
	},
};
