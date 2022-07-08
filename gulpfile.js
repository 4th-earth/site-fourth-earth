const uswds = require("@uswds/compile");

uswds.settings.version = 3;

/**
 * Path settings
 * Set as many as you need
 */

uswds.paths.dist.css = './src/uswds/css';
uswds.paths.dist.theme = './src/uswds/sass';

/**
 * Exports
 * Add as many as you need
 */

exports.init = uswds.init;
exports.compile = uswds.compile;
