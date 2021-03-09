@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.carPermission.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.car-permissions.update", [$carPermission->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="file_number">{{ trans('cruds.carPermission.fields.file_number') }}</label>
                    <input class="form-control {{ $errors->has('file_number') ? 'is-invalid' : '' }}" type="number" name="file_number" id="file_number" value="{{ old('file_number', $carPermission->file_number) }}" step="1" required>
                    @if($errors->has('file_number'))
                        <span class="text-danger">{{ $errors->first('file_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carPermission.fields.file_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="permission_date">{{ trans('cruds.carPermission.fields.permission_date') }}</label>
                    <input class="form-control date {{ $errors->has('permission_date') ? 'is-invalid' : '' }}" type="text" name="permission_date" id="permission_date" value="{{ old('permission_date', $carPermission->permission_date) }}" required>
                    @if($errors->has('permission_date'))
                        <span class="text-danger">{{ $errors->first('permission_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carPermission.fields.permission_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="exit_date">{{ trans('cruds.carPermission.fields.exit_date') }}</label>
                    <input class="form-control date {{ $errors->has('exit_date') ? 'is-invalid' : '' }}" type="text" name="exit_date" id="exit_date" value="{{ old('exit_date', $carPermission->exit_date) }}" required>
                    @if($errors->has('exit_date'))
                        <span class="text-danger">{{ $errors->first('exit_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carPermission.fields.exit_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="return_date">{{ trans('cruds.carPermission.fields.return_date') }}</label>
                    <input class="form-control date {{ $errors->has('return_date') ? 'is-invalid' : '' }}" type="text" name="return_date" id="return_date" value="{{ old('return_date', $carPermission->return_date) }}" required>
                    @if($errors->has('return_date'))
                        <span class="text-danger">{{ $errors->first('return_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carPermission.fields.return_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="truck_number">{{ trans('cruds.carPermission.fields.truck_number') }}</label>
                    <input class="form-control {{ $errors->has('truck_number') ? 'is-invalid' : '' }}" type="text" name="truck_number" id="truck_number" value="{{ old('truck_number', $carPermission->truck_number) }}" required>
                    @if($errors->has('truck_number'))
                        <span class="text-danger">{{ $errors->first('truck_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carPermission.fields.truck_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="car_type">{{ trans('cruds.carPermission.fields.car_type') }}</label>
                    <input class="form-control {{ $errors->has('car_type') ? 'is-invalid' : '' }}" type="text" name="car_type" id="car_type" value="{{ old('car_type', $carPermission->car_type) }}" required>
                    @if($errors->has('car_type'))
                        <span class="text-danger">{{ $errors->first('car_type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carPermission.fields.car_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="driver_name">{{ trans('cruds.carPermission.fields.driver_name') }}</label>
                    <input class="form-control {{ $errors->has('driver_name') ? 'is-invalid' : '' }}" type="text" name="driver_name" id="driver_name" value="{{ old('driver_name', $carPermission->driver_name) }}" required>
                    @if($errors->has('driver_name'))
                        <span class="text-danger">{{ $errors->first('driver_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carPermission.fields.driver_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="driver_number">{{ trans('cruds.carPermission.fields.driver_number') }}</label>
                    <input class="form-control {{ $errors->has('driver_number') ? 'is-invalid' : '' }}" type="number" name="driver_number" id="driver_number" value="{{ old('driver_number', $carPermission->driver_number) }}" step="1" required>
                    @if($errors->has('driver_number'))
                        <span class="text-danger">{{ $errors->first('driver_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carPermission.fields.driver_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="attachments">{{ trans('cruds.carPermission.fields.attachments') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
                    </div>
                    @if($errors->has('attachments'))
                        <span class="text-danger">{{ $errors->first('attachments') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carPermission.fields.attachments_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="form-group float-auto" style="display: inline-block">
                    <a class="btn btn-danger" href="{{  url()->previous() }}">
                        {{ trans('global.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        var uploadedAttachmentsMap = {}
        Dropzone.options.attachmentsDropzone = {
            url: '{{ route('admin.car-permissions.storeMedia') }}',
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 10
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
                uploadedAttachmentsMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedAttachmentsMap[file.name]
                }
                $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($carPermission) && $carPermission->attachments)
                var files =
                {!! json_encode($carPermission->attachments) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
