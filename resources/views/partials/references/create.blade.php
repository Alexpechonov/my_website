<div class="modal fade store-reference-modal" tabindex="-1" role="dialog" aria-labelledby="storeReference" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="storeReference">Заголовок</h4>
            </div>
            <form method="POST" @submit.prevent="createReference()">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Название ссылки:</label>
                        <input type="text" name="name" v-model="newReference.name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="reference">Ссылка:</label>
                        <input type="text" name="reference" v-model="newReference.reference" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-default">Создать ссылку</button>
                </div>
            </form>
        </div>
    </div>
</div>