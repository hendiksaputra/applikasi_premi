<a href="{{ url('unit_premis/' . $model->id) }}" class="btn btn-warning btn-sm">
  <i class="fa fa-eye"></i>
</a>
<a href="{{ url('unit_premis/' . $model->id . '/edit') }}" class="btn btn-primary btn-sm">
  <i class="fa fa-pencil"></i>
</a>
<form action="{{ url('unit_premis/' . $model->id) }}" method="post"
  onsubmit="return confirm('Are you sure want to delete this data?')" class="d-inline">
  @method('delete')
  @csrf
  <button class="btn btn-danger btn-sm">
    <i class="fa fa-trash"></i>
  </button>
</form>
