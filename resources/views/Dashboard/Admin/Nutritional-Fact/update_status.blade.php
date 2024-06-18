<div class="modal fade" id="update_status{{ $nutritionalFact->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/admin/pages/nutritional_facts_trans.update_status_for') }} {{ $nutritionalFact->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('Admin.NutritionalFacts.update_status') }}" method="post" autocomplete="off">
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $nutritionalFact->id }}">

                    <div class="form-group">
                        <label for="status">{{ trans('Dashboard/admin/pages/nutritional_facts_trans.status') }}</label>
                        <select class="form-control" id="status" name="status">
                            <option value="" selected disabled>-- {{ trans('Dashboard/admin/pages/nutritional_facts_trans.choose') }} --</option>
                            <option value="0">{{ trans('Dashboard/admin/pages/nutritional_facts_trans.not_enabled') }}</option>
                            <option value="1">{{ trans('Dashboard/admin/pages/nutritional_facts_trans.enabled') }}</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Dashboard/admin/pages/nutritional_facts_trans.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('Dashboard/admin/pages/nutritional_facts_trans.submit') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
