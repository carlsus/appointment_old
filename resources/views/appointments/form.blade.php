

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form" name="form">
          @csrf
        <div class="modal-body">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="appointee_id" id="appointee_id" value="{{ Auth::user()->id }} ">
              <div class="form-group">
                <label for="teacher_id" class="col-form-label">Teacher</label>
                <select id='teacher_id' name='teacher_id' class="select2">
                  <option value='0'>Select Teacher</option>
                  @foreach($teacher['data'] as $teacher)
                    <option value='{{ $teacher->id }}'>{{ $teacher->firstname . ' ' . $teacher->lastname}}</option>
                  @endforeach
                </select>
                <small id="teacher_id_help" class="text-danger"></small>
              </div>

            <div class="form-group">
                <label>Date:</label>
                <div class="input-group date" id="appointment_date_start" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#appointment_date_start" id="appointment_date_start" name="appointment_date_start"/>
                    <div class="input-group-append" data-target="#appointment_date_start" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <small id="appointment_date_start_help" class="text-danger"></small>
            </div>
            <div class="form-group">
                <label>Duration</label>
                <div class="input-group date" id="appointment_date_end" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#appointment_date_end" id="appointment_date_end" name="appointment_date_end" />
                    <div class="input-group-append" data-target="#appointment_date_end" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <small id="appointment_date_end_help" class="text-danger"></small>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
      </div>
    </div>
  </div>
