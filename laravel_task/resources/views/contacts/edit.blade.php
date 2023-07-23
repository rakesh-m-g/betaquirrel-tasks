@extends('contacts.layout')
@section('content')
<div class="card">
    <div class="card-header">Edit Page</div>
    <div class="card-body">
        <form action="{{ url('contact/' .$contacts->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$contacts->id}}" />
            <label>First Name</label><br>
            <input type="text" name="first_name" id="first_name" value="{{$contacts->first_name}}" class="form-control"><br>
            <label>Last Name</label><br>
            <input type="text" name="last_name" id="last_name" value="{{$contacts->last_name}}" class="form-control"><br>
            <!-- Other input fields ... -->
            <div class="col-md-6">
                <label for="hostel" class="form-label col-md-12">Do You Need Hostel Facility:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Hostel" id="yes" value="yes" @if($contacts->Hostel === 'yes') checked @endif>
                    <label class="form-check-label" for="yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Hostel" id="no" value="no" @if($contacts->Hostel === 'no') checked @endif>
                    <label class="form-check-label" for="no">No</label>
                </div>
            </div>
            <!-- Other input fields ... -->
            <div class="col-md-12">
              <label class="form-check-label" for="subject">Choose Additional Subject<span class="text-danger">*</span>:</label>
              @php
              $selectedSubjects = is_array($contacts->subject) ? $contacts->subject : explode(',', $contacts->subject);
              @endphp
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="cyber" name="subject[]" value="cyber" @if(in_array('cyber', $selectedSubjects)) checked @endif>
                  <label class="form-check-label" for="cyber">Cyber Security</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="ai" name="subject[]" value="ai" @if(in_array('ai', $selectedSubjects)) checked @endif>
                  <label class="form-check-label" for="ai">Artificial Intelligence</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="blockchain" name="subject[]" value="blockchain" @if(in_array('blockchain', $selectedSubjects)) checked @endif>
                  <label class="form-check-label" for="blockchain">Blockchain</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="iot" name="subject[]" value="iot" @if(in_array('iot', $selectedSubjects)) checked @endif>
                  <label class="form-check-label" for="iot">IoT</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="robotics" name="subject[]" value="robotics" @if(in_array('robotics', $selectedSubjects)) checked @endif>
                  <label class="form-check-label" for="robotics">Robotics</label>
              </div>
          </div>
            <div class="col-md-12">
                <!-- Checkbox options ... -->
            </div>
            <!-- Address field -->
            <label class="form-check-label" for="address">Permanent Address<span class="text-danger">*</span>:</label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="address" name="address" style="height: 100px">{{$contacts->address}}</textarea>
                <label for="address">Enter your address</label>
            </div>
            <!-- Mobile and Email fields ... -->
            <div class="col-md-6">
              <label for="mobile" class="form-label">Mobile<span class="text-danger">*</span> :</label>
              <input type="tel" class="form-control" id="mobile" name="mobile" value="{{$contacts->mobile}}"/>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email<span class="text-danger">*</span> :</label>
              <input type="email" class="form-control" id="Email" name="Email" value="{{$contacts->Email}}" />
            </div>
            <div class="button gap-2 d-md-flex justify-content-md-end">
                <button type="reset" class="btn btn-danger">
                    <i class="bi bi-arrow-clockwise"></i>Reset
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check2-square"></i>Submit
                </button>
            </div>
        </form>
    </div>
</div>
<input type="submit" value="Update" class="btn btn-success"><br>
@stop
