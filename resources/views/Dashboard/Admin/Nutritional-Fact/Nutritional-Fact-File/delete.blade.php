<div class="modal fade" id="delete{{ $nutritionalFact->id }}{{ $nutritionalFactFile->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/admin/pages/nutritional_facts_trans.delete_nutritional_fact_file') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('Admin.NutritionalFactFiles.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="nutritional_fact_id" value="{{ $nutritionalFact->id }}">
                    <input type="hidden" name="id" value="{{ $nutritionalFactFile->id }}">

                    <h5>{{ trans('Dashboard/admin/pages/nutritional_facts_trans.are_you_sure_about_the_deletion_process?') }}</h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Dashboard/admin/pages/nutritional_facts_trans.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('Dashboard/admin/pages/nutritional_facts_trans.submit') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
