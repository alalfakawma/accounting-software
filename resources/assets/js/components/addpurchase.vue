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
        <div @click="submitPurchaseForm()" class="button is-success is-large submit-purchase-sale-button">
            <span class="icon">
                <i class="fa fa-check"></i>
            </span>
        </div>
        <div class="loading-spinner has-text-primary" :class="{ 'is-hidden' : !submitting }">
        	<i class="fa fa-refresh fa-5x"></i>
        </div>
    </div>
</template>

<script>
    export default {
    	data() {
    		return {
                purchaseForms: [{id: 1, enabled: true}], // default 1 purchase form
                submitting: false
    		}
    	},
        methods: {
            addPurchaseForm() {
                this.purchaseForms.push({id: (this.purchaseForms.length + 1), enabled: true}); // increment the amount of purchase forms
            },
            submitPurchaseForm() {
                let formData = [];
                const self = this;
                this.$children.forEach(child => {
                    // Only if enabled child
                    if (child.enabled) {
                        formData.push(child.bundleData());
                    }
                });
                // Data is bundled, check if null values still exist, if they do, remove them
                if (formData.length == 0) {
                	self.$children[0].resetForm();
                    self.purchaseforms = [{id: 1, enabled: true}];
                } else {
            		this.submitting = true;
	                axios.post('/api/purchase/store', {
	                    data: JSON.stringify(formData)
	                }).then(r => {
	                    // Once finished reset the forms
	                    self.$children[0].resetForm();
	                    self.purchaseforms = [{id: 1, enabled: true}];
	                    this.submitting = false;
	                }).catch(e => {
	                	this.submitting = false;
	                    console.error(e);
	                });
                }
            }
        }
    }
</script>
