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
    			    <input :data-vv-scope="'form' + formNumber.id" @input="checkGSTIN()" v-validate="'required'" class="input" type="text" name="gstin" v-model="gstin">
                    <small class="help is-danger">{{ errors.first('form' + formNumber.id + '.gstin') }}</small>
    			  </div>
    			</div>
    			<div class="field">
    			  <label class="label">HSN Code</label>
    			  <div class="control">
    			    <input :data-vv-scope="'form' + formNumber.id" class="input" type="number" v-validate="'required'" name="hsncode" v-model="hsncode">
                    <small class="help is-danger">{{ errors.first('form' + formNumber.id + '.hsncode') }}</small>
    			  </div>
    			</div>
    			<div class="field">
    			  <label class="label">Name</label>
    			  <div class="control">
    			    <input :data-vv-scope="'form' + formNumber.id" class="input" type="text" v-validate="'required'" name="name" v-model="name">
                    <small class="help is-danger">{{ errors.first('form' + formNumber.id + '.name') }}</small>
    			  </div>
    			</div>
                <div class="field">
                  <label class="label">Price</label>
                  <div class="control has-icons-left">
                    <span class="icon is-small has-text-primary is-left">
                      <i class="fa fa-rupee"></i>
                    </span>
                    <input min="1" :data-vv-scope="'form' + formNumber.id" class="input" type="number" v-validate="'required'" name="price" v-model="price">
                    <small class="help is-danger">{{ errors.first('form' + formNumber.id + '.price') }}</small>
                  </div>
                </div>
    		</div>
    		<div class="column">
    			<div class="field">
    			  <label class="label">Quantity</label>
    			  <div class="control">
    			    <input :data-vv-scope="'form' + formNumber.id" min="1" class="input" type="number" v-validate="'required'" name="quantity" v-model="quantity">
                    <small class="help is-danger">{{ errors.first('form' + formNumber.id + '.quantity') }}</small>
    			  </div>
    			</div>
    			<div class="field">
    			  <label class="label">Unit</label>
    			  <div class="control">
    			    <input :data-vv-scope="'form' + formNumber.id" class="input" type="text" v-validate="'required'" name="unit" v-model="unit">
                    <small class="help is-danger">{{ errors.first('form' + formNumber.id + '.unit') }}</small>
    			  </div>
    			</div>
    			<div class="field">
    			  <label class="label">Taxable Value</label>
    			  <div class="control">
    			    <input :data-vv-scope="'form' + formNumber.id" class="input" type="number" v-validate="'required'" name="taxablevalue" v-model="taxablevalue">
                    <small class="help is-danger">{{ errors.first('form' + formNumber.id + '.taxablevalue') }}</small>
    			  </div>
    			</div>	
    			<div class="field">
    			  <label class="label">Tax Rate</label>
    			  <div class="control">
    			    <input :data-vv-scope="'form' + formNumber.id" class="input" type="number" v-validate="'required'" name="taxrate" v-model="taxrate">
                    <small class="help is-danger">{{ errors.first('form' + formNumber.id + '.taxrate') }}</small>
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
        inject: ['$validator'],
    	data() {
    		return {
    			gstin: null,
    			hsncode: null,
    			name: null,
                price: 0,
    			quantity: 0,
    			unit: null,
    			taxablevalue: null,
    			taxrate: null,
    			igst: null,
    			cgst: null,
    			sgst: null,
    			cess: null,
    			enabled: true,
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
    			return { // Bundle all the data and return and object
                    gstin: this.gstin,
                    hsncode: this.hsncode,
                    name: this.name,
                    price: this.price,
                    quantity: this.quantity,
                    unit: this.unit,
                    taxablevalue: this.taxablevalue,
                    taxrate: this.taxrate,
                    igst: this.igst,
                    cgst: this.cgst,
                    sgst: this.sgst,
                    cess: this.cess
                };
    		},
    		resetForm() {
    			this.gstin = null;
    			this.hsncode = null;
    			this.name = null;
                this.price = 0;
    			this.quantity = 0;
    			this.unit = null;
    			this.taxablevalue = null;
    			this.taxrate = null;
    			this.igst = null;
    			this.cgst = null;
    			this.sgst = null;
    			this.cess = null;
    			this.enabled = true;
    		},
            checkGSTIN() {
                axios.get('/api/client/checkGSTIN', {
                    gstin: this.gstin,
                }).then(r => {
                    console.log(r.data);
                }).catch(e => {
                    console.error(e);
                });
            }
    	}
    }
</script>
