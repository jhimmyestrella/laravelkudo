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
                :kudo="kudo"
                @update="updateKudobir(index, ...arguments)"
                @delete="deleteKudobir(index)">
	        	
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
            axios.get('/kudoBirthday').then((response) => {
                this.kudos = response.data;
            });
        },
		methods: {
            addKudobir(enviarKudo) {
                this.kudos.push(enviarKudo);
            },
            updateKudobir(index, enviarKudo) {
                this.kudos[index] = enviarKudo;
            },
            deleteKudobir(index) {
                this.kudos.splice(index, 1);
            }

        }
		
	}

	
</script>