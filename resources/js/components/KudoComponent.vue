<template>
	<div class="col-md-12" style="margin-bottom: 20px;">
        <div class="card">
            <div class="card-header">
           		De: {{ kudo.name_user_create }} ---
                Para: {{ kudo.name_user_receptor }}---
                Fecha: {{ kudo.created_at }}
                 {{ kudo.id }}
        	</div>

            <div class="card-body">
	            <input v-if="editMode" type="text" class="form-control" v-model="kudo.comment">
	            <p v-else>Comentario: {{ kudo.comment }}</p>
            </div>
            <div class="card-footer">
	            <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">
	                Guardar cambios
	            </button>
	            <button v-else class="btn btn-primary" v-on:click="onClickEdit()">
	                Editar
	            </button>

	            <button class="btn btn-danger" v-on:click="onClickDelete()">
	                Eliminar
	            </button>
	        </div>
        </div>
    </div>
</template>
<script>
	export default{
		props: ['kudo'],
		data() {
            return {
                editMode: false
            };
        },
        methods: {
        	onClickDelete() {
                axios.delete(`/kudoBirthday/${this.kudo.id}`).then(() => {
                    this.$emit('delete');
                });
            },

            onClickEdit() {
                this.editMode = true;
            },
            onClickUpdate() {
                const params = {
                    comentario: this.kudo.comment
                };
                axios.put(`/kudoBirthday/${this.kudo.id}`, params).then((response) => {
                    this.editMode = false;
                    const enviarKudo = response.data;
                    this.$emit('update', enviarKudo);
                });
            }
        }

	}
	
</script>