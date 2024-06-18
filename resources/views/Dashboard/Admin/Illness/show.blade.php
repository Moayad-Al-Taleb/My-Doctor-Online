<div class="modal fade" id="show{{ $illness->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ trans('Dashboard/admin/pages/illnesses_trans.show_illness') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <label> {{ trans('Dashboard/admin/pages/illnesses_trans.name') }}:</label>
                <p class="form-control-static">{{ $illness->name }}</p>

                <label> {{ trans('Dashboard/admin/pages/illnesses_trans.description') }}:</label>
                <p class="form-control-static">{{ $illness->description }}</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{ trans('Dashboard/admin/pages/illnesses_trans.close') }}</button>
            </div>
        </div>
    </div>
</div>
