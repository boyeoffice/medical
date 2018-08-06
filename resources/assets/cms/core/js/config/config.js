// Import config from JSON file
const boyeConfig = require('~/config/config.json');

// Initialize config object
export let config = { };

// Helper function to check if passed environment hostname matches actual hostname
const _matchEnv = (envHostname) => {
    if (document.location.hostname !== envHostname) {
        // If no match return
        return;
    }
    // Else assing environment to config.ENV object
    config.ENV = boyeConfig.env[envHostname];
};


// Check all environments in config JSON
for (const envHostname in boyeConfig.env) {
    if (boyeConfig.env.hasOwnProperty(envHostname)) {
        // Check if any environment matches current hostname
        _matchEnv(envHostname);
    }
}

if (!config.ENV) {
    // If no suitable environment was found for current hostname
    // check if default env was provided in JSON
    if (!boyeConfig.env.default) {
        // If no default throw error
        throw 'Invalid Photon config file. No default environment set.';
    }
    // Else assing default environment to config.ENV object
    config.ENV = boyeConfig.env.default;
}
