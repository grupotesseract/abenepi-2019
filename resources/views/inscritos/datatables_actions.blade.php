{!! Form::open(['route' => ['inscritos.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('inscritos.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    {{-- <a href="{{ route('inscritos.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a> --}}
    <a href="{{ route('inscritos.pagou', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-usd"></i>
    </a>
    <a href="{{ route('inscritos.compareceu', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-education"></i>
    </a>
    <a href="{{ route('inscritos.comprovante', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-download-alt"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Você tem certeza que deseja excluir esse inscrito?')"
    ]) !!}
</div>
{!! Form::close() !!}
