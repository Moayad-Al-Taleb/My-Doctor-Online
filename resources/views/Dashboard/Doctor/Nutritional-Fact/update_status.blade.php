<div class="modal fade" id="update_status{{ $nutritionalFact->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update status for {{ $nutritionalFact->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('Doctor.NutritionalFacts.update_status') }}" method="post" autocomplete="off">
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $nutritionalFact->id }}">

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="" selected disabled>-- Choose --</option>
                            <option value="0">Not enabled</option>
                            <option value="1">Enabled</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
