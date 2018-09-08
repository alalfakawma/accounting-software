<template>
    <div class="container">
        <div class="title is-4 has-text-centered">Add Purchases</div>
        <div class="columns">
        	<div class="column">
                <template v-for="i in purchaseForms">
                    <add-purchase-form v-bind:formNumber="i"></add-purchase-form>
                </template>   
            </div>
        </div>
        <div @click="addPurchaseForm()" class="button is-primary is-large add-purchase-sale-button">
        	<span class="icon">
        		<i class="fa fa-plus"></i>
        	</span>
        </div>
        <div :disabled="errors.any()" @click="submitPurchaseForm()" class="button is-success is-large submit-purchase-sale-button">
            <span class="icon">
                <i class="fa fa-check"></i>
            </span>
        </div>
        <b-loading  :active.sync="isUploading"></b-loading>
    </div>
</template>

<script>
    export default {
    	data() {
    		return {
                purchaseForms: [{id: 1, enabled: true}], // default 1 purchase form
                isUploading: false
    		}
    	},
        methods: {
            addPurchaseForm() {
                this.purchaseForms.push({id: (this.purchaseForms.length + 1), enabled: true}); // increment the amount of purchase forms
            },
            submitPurchaseForm() {
                this.$validator.validateScopes().then(result => {
                    if (result) {
                        this.isUploading = true;
                        let formData = [];
                        const self = this;
                        this.$children.forEach(child => {
                            // Only if enabled child
                            if (child.enabled) {
                                formData.push(child.bundleData());
                            }
                        });
                        axios.post('/api/purchase/store', {
                            data: JSON.stringify(formData)
                        }).then(r => {
                            // Once finished reset the forms
                            self.$children[0].resetForm();
                            self.purchaseforms = [{id: 1, enabled: true}];
                            this.isUploading = false;
                        }).catch(e => {
                            console.error(e);
                            this.isUploading = false;
                            this.$toast.open({
                                duration: 4000,
                                message: 'Ooops! An error has occured, please try again!',
                                type: 'is-danger'
                            });
                        });
                    }
                }).catch((e) => {
                    console.error(e);
                });
            }
        }
    }
</script>
