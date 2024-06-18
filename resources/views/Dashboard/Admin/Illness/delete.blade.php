<div class="modal fade" id="delete{{ $illness->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ trans('Dashboard/admin/pages/illnesses_trans.delete_illness') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('Admin.Illnesses.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $illness->id }}">

                    <h5>{{ trans('Dashboard/admin/pages/illnesses_trans.are_you_sure_about_the_deletion_process?') }}
                    </h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Dashboard/admin/pages/illnesses_trans.close') }}</button>
                    <button type="submit"
                        class="btn btn-primary">{{ trans('Dashboard/admin/pages/illnesses_trans.submit') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
