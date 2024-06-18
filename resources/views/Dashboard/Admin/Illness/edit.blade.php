<div class="modal fade" id="edit{{ $illness->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ trans('Dashboard/admin/pages/illnesses_trans.edit_illness') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('Admin.Illnesses.update', 'test') }} " method="post" autocomplete="off"
                enctype="multipart/form-data">
                {{ method_field('put') }}
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $illness->id }}">

                    <label for="name"> {{ trans('Dashboard/admin/pages/illnesses_trans.name') }}:</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ $illness->name }}">

                    <label for="description"> {{ trans('Dashboard/admin/pages/illnesses_trans.description') }}:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $illness->description }}</textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
