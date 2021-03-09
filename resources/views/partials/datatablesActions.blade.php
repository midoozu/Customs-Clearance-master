@can($viewGate)
    <a  class="fas fa-eye" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
    </a>
@endcan
@can($editGate)
    <a class="far fa-edit" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
    </a>
@endcan
@can($deleteGate)
    <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onclick="return confirm('{{ trans('global.areYouSure') }}');" style="color:red;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <a class="fas fa-trash-alt"></a>
    </form>
@endcan
@can($viewGate)
    <a  class="fas fa-print" href="{{ route('print', $row->id) }}">
    </a>
@endcan

