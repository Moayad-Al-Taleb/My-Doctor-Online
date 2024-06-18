<div class="modal fade" id="edit{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('Doctor.Appointments.update', 'test') }} " method="post" autocomplete="off"
                enctype="multipart/form-data">
                {{ method_field('put') }}
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $appointment->id }}">
                    <input type="hidden" name="doctor_id" value="{{ $appointment->doctor_id }}">

                    <label for="meeting_link">Meeting Link</label>
                    <input type="url" name="meeting_link" id="meeting_link" class="form-control">

                    <label for="status">Meeting status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="" selected disabled>-- Choose --</option>
                        <option value="0" {{ $appointment->status == 0 ? 'selected' : '' }}>pending</option>
                        <option value="1" {{ $appointment->status == 1 ? 'selected' : '' }}>accepted</option>
                        <option value="2" {{ $appointment->status == 2 ? 'selected' : '' }}>unaccepted</option>
                        <option value="3" {{ $appointment->status == 3 ? 'selected' : '' }}>finished</option>
                    </select>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
