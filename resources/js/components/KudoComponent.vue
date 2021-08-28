<template>
	<div class="col-md-12" style="margin-bottom: 20px;">
        <div class="card">
            <div class="card-header">
           		De: {{ kudo.id_user_create }}
                Para: {{ kudo.id_user }}
                Fecha: {{ kudo.created_at }}
        	</div>

            <div class="card-body">
                Comentario: {{ kudo.comment }}
            </div>
        </div>
    </div>
</template>
<script>
	export default{
		props: ['kudo'],

	}
	
</script>