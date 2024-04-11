<form role="form" method="post"
      action="{{route('exam.store.instruction',['up_id'=>isset($instruction->id)?$instruction->id:''])}}">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="instruction" class=" col-form-label">Instruction</label>
                <div class="col-sm-12">
                    <textarea class="form-control textarea" name="instruction"
                              id="instruction"
                              placeholder="Instruction">{!!isset($instruction->instruction)?$instruction->instruction:'' !!}</textarea>
                </div>
            </div>
            <input type="hidden" name="id" id="id" value="{{encrypt(isset($id)?$id:'')}}">

        </div>
        <div class="form-group text-center ">
            <hr/>
            <button type="submit" class="btn btn-primary w-25" id="submit">Save</button>
        </div>
    </div>

</form>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    })
</script>