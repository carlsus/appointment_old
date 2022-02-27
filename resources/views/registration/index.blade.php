@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong class="">{{ isset($url) ? ucwords($url) : ""}} {{ __('Registration') }}</strong>

                </div>
                <div class="card-body">
                    <form id="form" name="form">
                        @csrf

                        <div class="form-group row">
                            <label for="idnumber" class="col-md-4 col-form-label text-md-right">{{ __('Id Number') }}</label>

                            <div class="col-md-6">
                                <input id="idnumber" type="text" class="form-control @error('idnumber') is-invalid @enderror" name="idnumber" value="{{ old('idnumber') }}" autofocus>
                                <small id="idnumber_help" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}">
                                <small id="firstname_help" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" >
                                <small id="lastname_help" class="text-danger"></small>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >
                                <small id="email_help" class="text-danger"></small>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="department_id" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
                            <div class="col-md-6">
                            <select id='department_id' name='department_id' class="select2 form-control">
                                <option value='0'>Select Department</option>
                                @foreach($department['data'] as $department)
                                  <option value='{{ $department->id }}'>{{ $department->department }}</option>
                                @endforeach
                              </select>
                            <small id="department_id_help" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                                <small id="password_help" class="text-danger"></small>
                            </div>


                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('scripts')
<script type="text/javascript">
$(function () {

    $('.select2').select2({
          theme: 'bootstrap4'
    })

    $('#form').submit(function (e) {
        e.preventDefault();
        //$('#form').find('input,small').removeClass('is-invalid').text('');

        $.ajax({
          data: $('#form').serialize(),
          url: "{{ route('appointees.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            $('#form').trigger("reset");

            toastr.success(data.success);
          },
          error:function(err)
            {

                if(err.status===422){
                  var errors =$.parseJSON(err.responseText);
                  $.each(errors.errors, function(key, value){
                    $('#' +key).addClass('is-invalid');
                    $('#' +key).focus();
                    $('#'+key+"_help").text(value[0]);
                  })
                }
            }
      });
    });



  });
</script>
@endsection
