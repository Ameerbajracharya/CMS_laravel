

    <tr class="ui-sortable-handle input-field">
        <input type="hidden" name="gallery_id[]" value="">
        <td>
            {!! Form::file('gallery_image[]') !!}

            @if($errors->has('gallery_image') )
                <small class="text-danger">{{$errors->first('gallery_image')}}</small>
            @endif
        </td>

        <td>

            <input class="form-control" name="gallery_caption[]" type="text">
        </td>
    
        <td>
            <select class="form-control" name="status[]" type="text">
                <option value="0">Inactive</option>
                <option value="1">Active</option>
            </select>

        </td>


        <td><button type="button" class="btn btn-sm btn-danger page-row-remove-btn" onclick="$(this).closest('tr').remove();">Remove This Image From Gallery</button></td>

    </tr>
