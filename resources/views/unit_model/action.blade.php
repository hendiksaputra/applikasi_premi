<a href="{{ url('unit_models/' . $model->id . '/edit') }}" class="btn btn-primary btn-sm">
  <i class="fa fa-pencil"></i>
</a>
<form action="{{ url('unit_models/' . $model->id) }}" method="post"
  onsubmit="return confirm('Are you sure want to delete this data?')" class="d-inline">
  @method('delete')
  @csrf
  <button class="btn btn-danger btn-sm">
    <i class="fa fa-trash"></i>
  </button>
</form>
