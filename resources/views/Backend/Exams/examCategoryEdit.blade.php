<form role="form" action="{{route('category.exam.insert.update')}}" id="quickForm" method="post">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-8">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control" id="category" value="{{$edit_data->category}}"
                       placeholder="Enter category">
            </div>
            <div class="form-group col-sm-4" style="margin-top: 31px;">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>