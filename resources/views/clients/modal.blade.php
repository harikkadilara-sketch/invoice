<div class="modal fade" id="clientModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Client</h5>
            </div>

            <div class="modal-body">
                <form id="clientForm">
                    @csrf
                    <input type="hidden" id="client_id">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea id="address" name="adress" class="form-control"></textarea>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="btnSaveClient">Simpan</button>
            </div>

        </div>
    </div>
</div>
