<div class="modal fade" id="menuModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="menuForm">
                    @csrf
                    <input type="hidden" id="menu_id">

                    <input class="form-control mb-2" id="name" placeholder="Nama">
                    <input class="form-control mb-2" id="route" placeholder="Route">
                    <input class="form-control mb-2" id="icon" placeholder="Icon">

                    <select id="parent_id" class="form-control mb-2">
                        <option value="">Parent</option>
                        @foreach ($parents as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>

                    @foreach ($roles as $role)
                        <label><input type="checkbox" name="roles[]" value="{{ $role->id }}">
                            {{ $role->name }}</label><br>
                    @endforeach

                    <select id="is_active" class="form-control mt-2">
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="btnSaveMenu">Simpan</button>
            </div>
        </div>
    </div>
</div>
