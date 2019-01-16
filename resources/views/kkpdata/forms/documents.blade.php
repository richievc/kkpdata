<div class="container">
    <div class=""row>
        <div class="col-md-12">
            <form action="{{ url('kkpdata/process_step4/' . $property['id']) }}"
                  method="post" class="form-horizontal"
                  enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input id="property_id" name="user_id" type="hidden" value="{{ $property['id'] }}">

                <fieldset>

                    <!-- Form Name -->
                    <legend>Step 3 - (Property Documents)</legend>

                    @for ($i = 1; $i <= 5; $i++)
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="upload_file_{{$i}}">Document {{$i}}: </label>
                            <div class="col-md-4">
                                @if(!empty($property['upload_file_' . $i]))
                                    FileName: <small>{{ $property['upload_file_' . $i] }}</small>&nbsp;&nbsp;
                                    <a href="#remove_image" id="upload_file_{{$i}}" data-toggle="modal" class="remove_file btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @else
                                    <input type="file" name="upload_file_{{$i}}" id="upload_file_{{$i}}" />
                                @endif
                            </div>
                        </div>

                    @endfor

                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-8">
                            <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</div>


<div class="modal fade " tabindex="-1" role="dialog" id="remove_image">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger text-bold">Remove File From Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="file_name" id="file_name" value=""/>
                <div class="alert alert-danger">Remove file from document! Are you sure?</div>
            </div>
            <div class="modal-footer">
                <button type="button" id="complete_remove" class="btn btn-danger">Remove File</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        var deleteButton = $('a.remove_file');
        deleteButton.on('click', function(e) {
            e.preventDefault();
            var file = $(this).prop('id');
            $('input#file_name').val(file);
         });

        var completeDeleteButton = $('button#complete_remove');
        completeDeleteButton.on('click', function(e) {
            e.preventDefault();
            var property_id = $('input#property_id').val();
            var file = $(document).find('input#file_name').val();

            window.location.href = '/kkpdata/survey/remove_file/' + property_id + '/' + file;
        });
    });
</script>

















































