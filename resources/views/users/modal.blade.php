<div class="modal fade" id="userModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="userForm">
                    @csrf
                    <input type="hidden" id="user_id">
                    <input class="form-control mb-2" id="name" placeholder="Nama">
                    <input class="form-control mb-2" id="email" placeholder="Email">
                    <input class="form-control mb-2" id="password" placeholder="Password">

                    @foreach ($roles as $role)
                        <label><input type="checkbox" name="roles[]" value="{{ $role->id }}">
                            {{ $role->name }}</label><br>
                    @endforeach
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="btnSaveUser">Simpan</button>
            </div>
        </div>
    </div>
</div>
