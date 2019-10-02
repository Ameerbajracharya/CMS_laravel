                           
<div class="box-body">
    <div class="col-sm-12 col-md-12 col-lg-12">

    <div class="table-responsive">
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th><label>Image</label></th>
                <th><label>Caption</label></th>
                <th><label>Status</label></th>

                <th><button type="button" class="btn-xs btn-primary" id="gallery-html-loader-btn">
                        Click Here To Add Another</button></th>
            </tr>
            </thead>

            <tbody id="gallery_row_wrapper" class="ui-sortable">
            @if(!isset($data['gallery']))
            @include($_view_path.'layouts.table_row')
                @else
                @include($_view_path.'layouts.edit-form')
            @endif
               
            </tbody>

        </table>
        <div class="clearfix form-actions">
            <div class="col-md-offset-5 col-md-7">
                <button class="btn btn-info" type="submit">
                    <i class="icon-ok bigger-110"></i>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
</div>