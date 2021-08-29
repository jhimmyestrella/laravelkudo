<template>
	<div class="col-md-4">
            <div class="card">
                <div class="card-header">Kudo Birthday</div>
                <div class="card-body">
                    <form v-on:submit.prevent="newKudoBir()">
                        <div>
                            <label class="typo__label">Cumpleaños de:</label>
                            <multiselect v-model="persona" deselect-label="Can't remove this value" track-by="name" label="name" placeholder="Select one" :options="users" :searchable="false" :allow-empty="false">
                            <template slot="singleLabel" slot-scope="{ user }"></template>
                            </multiselect>
                            <!-- <pre class="language-json"><code>{{ persona  }}</code></pre> -->
                        </div>
                        <div class="form-group">
                            <label >Comentario</label>
                            <textarea class="form-control" rows="3" v-model="comentario" ></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

	export default {
        data() {
            return {
                users: [],
                comentario: '',
                persona: [],

            }
        },
        components: {
            Multiselect
        },

        mounted() {
            axios.get('mostrarUserkudo').then((response) => {
                this.users = response.data;
            });
        },
        methods: {
	        newKudoBir(){
	        	const params = {
                    persona: this.persona,
                    comentario: this.comentario
                };
                axios.post('/kudoBirthday', params)
                    .then((response) => {
                        const enviarKudo = response.data;
                        this.$emit('new', enviarKudo);
                });

	        }

        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
