<template>

</template>
<script>
export default {
    data: function() {
        return {
            form:{
                company_name:'',
                company_location:'',
                company_phone:'',
                name:'',
                email:'',
                phone:'',
                subject:'',
                message:'',
            },
            loading:false,
        };
    },
    methods:{
        submit() {
            this.loading = true;
            if(!this.validate()) {
                this.$parent.error('Please Fill up all the details');
                this.loading = false;
                return;
            }
            axios.post('/api/v1/contact/company',this.form)
                .then((response) => {
                    this.$parent.success("Form Submiteed Successfully");
                    this.loading = false;
                    this.reset();
                }).catch((error) => {
                    console.log(error);
                    this.$parent.error("Something went wrong . PLease contact us to our mail for more info");
                    this.loading = false;
                });

        },
        validate() {
            return this.form.company_name !== '' &&
                this.form.company_location !== '' &&
                this.form.company_contact !== '' &&
                this.form.name !== '' &&
                (this.form.email !== '' ||
                this.form.phone !== '') &&
                this.form.subject !== '' &&
                this.form.message !== '';
        },
        reset() {
            this.form = {
                company_name:'',
                company_location:'',
                company_phone:'',
                name:'',
                email:'',
                phone:'',
                subject:'',
                message:'',
            }
        }
    }
}
</script>
