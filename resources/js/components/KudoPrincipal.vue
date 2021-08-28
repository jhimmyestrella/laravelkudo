<template>
	<div>
		<div class="row justify-content-center">
			
	        <kudo-projet ></kudo-projet>
	        <kudo-birthday @new="addKudobir"></kudo-birthday>
	        <kudo-person></kudo-person>
			 
	    </div>

	    <div class="row justify-content-center" style="margin-top: 30px;">

	        <kudo-component
	        	v-for="(kudo, index) in kudos"
                :key="kudo.id"
                :kudo="kudo">
	        	
	        </kudo-component>

	        
	    </div>

	</div>
</template>

<script>
	export default {
		data(){
			return {
				kudos: []
			}
		},
		mounted() {
            axios.get('/mostrarKudoBir').then((response) => {
                this.kudos = response.data;
            });
        },
		methods: {
            addKudobir(enviarKudo) {
                this.kudos.push(enviarKudo);
            },

        }
		
	}

	
</script>