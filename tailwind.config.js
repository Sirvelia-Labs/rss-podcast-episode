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
	important: true,
	prefix: "pb-",
	corePlugins: {
		preflight: true,
	},
};
