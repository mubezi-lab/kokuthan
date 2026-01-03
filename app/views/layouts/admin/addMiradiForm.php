<!-- ADD USER MODAL -->
<div class="modal" id="addMiradiModal">
    <div class="modal-content">

        <div class="modal-header">
            <h3>Ongeza Miradi</h3>
            <button type="button" class="close-btn" id="closeAddMiradi">&times;</button>
        </div>

        <form method="POST" action="/kokuthan/public/admin/projects/store">

            <input
                type="text"
                name="name"
                placeholder="Jina la Mradi"
                required
            >

            <input
                type="text"
                name="description"
                placeholder="Maelezo ya Mradi"
                required
            >

           
            <button type="submit" class="btn">Hifadhi</button>

        </form>

    </div>
</div>
