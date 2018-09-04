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
    </div>
</template>

<script>
    export default {
    	data() {
    		return {
                purchaseForms: [{id: 1, enabled: true}], // default 1 purchase form
    		}
    	},
        methods: {
            addPurchaseForm() {
                this.purchaseForms.push({id: (this.purchaseForms.length + 1), enabled: true}); // increment the amount of purchase forms
            },
            submitPurchaseForm() {
                let formData = [];
                this.$children.forEach(child => {
                    // Only if enabled child
                    if (child.enabled) {
                        formData.push(child.bundleData());
                    }
                });
                axios.post('/api/purchase/store', {
                    data: JSON.stringify(formData)
                }).then(r => {
                    console.log(r);
                    // Once finished reset the forms
                    this.$children[0].resetForm();
                    this.purchaseforms = [{id: 1, enabled: true}];
                }).catch(e => {
                    console.error(e);
                });
            }
        }
    }
</script>
