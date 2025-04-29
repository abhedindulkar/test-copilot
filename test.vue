<template>
    <div class="sm-scroll-content">
        <div class="sm-card">
            <div class="sm-card-header-dark">
                <span class="sm-text-thin-l">Update Authentication Configuration</span>
            </div>
            <div class="sm-card-content">
                <section class="sm-integration-configuration">
                    <b-field label="Client ID">
                        <b-input v-model="authConfig.client_id" maxlength="190" autocomplete="off" placeholder="Enter Client ID" required></b-input>
                    </b-field>
                    <b-field label="Client Secret">
                        <b-input type="password" v-model="authConfig.client_secret" maxlength="190" autocomplete="off" placeholder="Enter Client Secret" required password-reveal></b-input>
                    </b-field>
                    <b-field label="Tenant ID">
                        <b-input v-model="authConfig.tenant_id" maxlength="190" autocomplete="off" placeholder="Enter Tenant ID" required></b-input>
                    </b-field>
                </section>
                <section class="sm-text-right">
                    <b-button icon-left="check" class="is-warning ml-10" @click="updateAuthConfig">Update Configuration</b-button>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AuthConfig',

    /**
     * Props passed to the component.
     *
     * @type {Object}
     */
    props: {
        authConfig: Object
    },

    /**
     * Lifecycle hook to fetch authentication configuration on mount.
     */
    mounted() {
        this.fetchAuthConfig();
    },

    methods: {
        /**
         * Fetch the authentication configuration from the server.
         */
        async fetchAuthConfig() {
            try {
                const response = await fetch('/api/auth-config');
                if (response.ok) {
                    const data = await response.json();
                    this.$emit('update:authConfig', data);
                } else {
                    console.error('Failed to fetch auth configuration');
                }
            } catch (error) {
                console.error('Error fetching auth configuration:', error);
            }
        },

        /**
         * Update the authentication configuration on the server.
         */
        async updateAuthConfig() {
            try {
                const response = await fetch('/api/auth-config', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(this.authConfig),
                });

                if (response.ok) {
                    this.$emit('update:authConfig', this.authConfig);
                    console.log('Authentication configuration updated successfully');
                } else {
                    console.error('Failed to update authentication configuration');
                }
            } catch (error) {
                console.error('Error updating authentication configuration:', error);
            }
        }
    },
};
</script>
