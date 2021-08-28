<template>

    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">KUDO</div>
            <div class="card-body">
                <form v-on:submit.prevent="newKudoPersona()">
                    <div>
                      <label class="typo__label">Seleccionar personas</label>
                      <multiselect v-model="personas" :options="users" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Seleccionar" label="name" track-by="name" :preselect-first="true" noResult="false">
                        <template slot="selection" 
                                    slot-scope="{ values, search, isOpen }">
                                    <!-- <span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected
                                    </span> -->
                        </template>
                      </multiselect>
                      <pre class="language-json"><code>{{ personas }}</code></pre>
                    </div>

                    <div class="form-group">
                        <label >Comentario</label>
                        <textarea class="form-control" rows="3" v-model="comentario"></textarea>
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
                personas: [],

            }
        },
        components: {
            Multiselect
        },

        mounted() {
            axios.get('kudo').then((response) => {
                this.users = response.data;
            });
        },
        methods: {
            newKudoPersona(){
                console.log(this.comentario);
                console.log(this.personas);
            }

        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
