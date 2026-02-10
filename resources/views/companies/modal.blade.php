<div class="modal fade" id="companyModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Company</h5>
            </div>

            <div class="modal-body">
                <form id="companyForm">
                    @csrf
                    <input type="hidden" id="company_id">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>VAT Number</label>
                        <input type="text" id="vat_number" name="vat_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Registration Number</label>
                        <input type="text" id="registration_number" name="registration_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Currency</label>
                        <input type="text" id="currency" name="currency" class="form-control" value="SAR">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea id="address" class="form-control" name="address"></textarea>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="btnSaveCompany">Simpan</button>
            </div>

        </div>
    </div>
</div>
