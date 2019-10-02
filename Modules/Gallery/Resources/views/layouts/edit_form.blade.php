<div class="box-body">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <div class="table-responsive">
            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th><label>Image</label></th>
                    <th><label>Caption</label></th>
                    <th><label>Action</label></th>

                </tr>
                </thead>

                <tbody id="gallery_row_wrapper" class="ui-sortable">
                    <td>
                      <img src="{{asset('public/images/gallery/'.$data['gallery']->image)}}" alt="" height="150px" width="150px" style="padding-bottom: 20px">

                        <b><p>Change this image</p></b>{!! Form::file('gallery_image') !!}
                    </td>
                    <td><input type="text" name="gallery_caption" value="{{$data['gallery']->caption}}"></td>
                   
                    <td><button type="submit" class="btn btn-sm btn-info">Save</button></td>
                </tbody>

            </table>
        </div>
    </div>
</div>