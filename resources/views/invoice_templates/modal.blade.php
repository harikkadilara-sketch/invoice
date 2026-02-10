<div class="modal fade" id="modal-primary">
    <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h4 class="modal-title">Invoice Template</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="templateForm">
                    @csrf
                    <input type="hidden" id="template_id">

                    <div class="form-group">
                        <label>Template Name</label>
                        <input type="text" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Template Code</label>
                        <input type="text" id="code" class="form-control" placeholder="travel / corporate">
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light" id="btnSaveTemplate">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
