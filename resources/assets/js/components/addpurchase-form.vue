<template>
    <div class="box" v-bind:data-form="formNumber" v-bind:class="{ 'is-hidden': !enabled }">
    	<div @click="removepurchaseform()" class="button is-danger is-small remove-purchase-sale-form-button">
    		<span class="icon">
    			<i class="fa fa-close"></i>
    		</span>
    	</div>
    	<div class="title is-5 has-text-centered">Purchase Form {{ formNumber.id }}</div>
    	<div class="columns">
    		<div class="column">
    			<div class="field">
    			  <label class="label">GSTIN</label>
    			  <div class="control">
    			    <input class="input" type="text" v-model="gstin">
    			  </div>
    			</div>
    			<div class="field">
    			  <label class="label">HSN Code</label>
    			  <div class="control">
    			    <input class="input" type="text" v-model="hsncode">
    			  </div>
    			</div>
    			<div class="field">
    			  <label class="label">Name</label>
    			  <div class="control">
    			    <input class="input" type="text" v-model="name">
    			  </div>
    			</div>	
    		</div>
    		<div class="column">
    			<div class="field">
    			  <label class="label">Quantity</label>
    			  <div class="control">
    			    <input min="0" class="input" type="number" v-model="quantity">
    			  </div>
    			</div>
    			<div class="field">
    			  <label class="label">Unit</label>
    			  <div class="control">
    			    <input class="input" type="text" v-model="unit">
    			  </div>
    			</div>
    			<div class="field">
    			  <label class="label">Taxable Value</label>
    			  <div class="control">
    			    <input class="input" type="number" v-model="taxablevalue">
    			  </div>
    			</div>	
    			<div class="field">
    			  <label class="label">Tax Rate</label>
    			  <div class="control">
    			    <input class="input" type="number" v-model="taxrate">
    			  </div>
    			</div>
    		</div>
    		<div class="column">
    			<div class="field">
    			  <label class="label">IGST</label>
    			  <div class="control">
    			    <input class="input" type="number" v-model="igst">
    			  </div>
    			</div>
    			<div class="field">
    			  <label class="label">CGST</label>
    			  <div class="control">
    			    <input class="input" type="number" v-model="cgst">
    			  </div>
    			</div>	
    			<div class="field">
    			  <label class="label">SGST</label>
    			  <div class="control">
    			    <input class="input" type="number" v-model="sgst">
    			  </div>
    			</div>
    			<div class="field">
    			  <label class="label">CESS</label>
    			  <div class="control">
    			    <input class="input" type="number" v-model="cess">
    			  </div>
    			</div>
    		</div>
    	</div>
    </div>
</template>

<script>
    export default {
    	data() {
    		return {
    			gstin: null,
    			hsncode: null,
    			name: null,
    			quantity: 0,
    			unit: null,
    			taxablevalue: null,
    			taxrate: null,
    			igst: null,
    			cgst: null,
    			sgst: null,
    			cess: null,
    			enabled: true
    		}
    	},
    	props: {
			formNumber: Object    		
    	},
    	methods: {
    		removepurchaseform() {
                let formCount = 0;
                this.$parent.purchaseForms.forEach(function(ob) {
                    if (ob.enabled) {
                        formCount++;
                    }
                });
                if (formCount <= 1) {
                    this.$parent.$children[0].resetForm();
                    this.$parent.purchaseForms = [{id: 1, enabled: true}];
                } else {
                    this.$parent.purchaseForms[this.$parent.purchaseForms.map((ob) => ob.id).indexOf(this.formNumber.id)].enabled = false;
        			this.enabled = false;
                }
    		},
    		bundleData() {
    			let data = [];
    			data.push(this.gstin);
    			data.push(this.hsncode);
    			data.push(this.name);
    			data.push(this.quantity);
    			data.push(this.unit);
    			data.push(this.taxablevalue);
    			data.push(this.taxrate);
    			data.push(this.igst);
    			data.push(this.cgst);
    			data.push(this.sgst);
    			data.push(this.cess);
    			return data;
    		},
    		resetForm() {
    			this.gstin = null;
    			this.hsncode = null;
    			this.name = null;
    			this.quantity = 0;
    			this.unit = null;
    			this.taxablevalue = null;
    			this.taxrate = null;
    			this.igst = null;
    			this.cgst = null;
    			this.sgst = null;
    			this.cess = null;
    			this.enabled = true;
    		}
    	}
    }
</script>
