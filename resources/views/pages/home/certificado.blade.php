<div class="container formulario" id="certificado">
  <h1 class="text-center mb-4">Emissão de Certificado</h1>

  <form action="{{url('/downloadCertificado')}}" method="post" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
      <div id="erros" class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="form-group">
      <div class="row justify-content-center">
          <div class="col-12 col-lg-3 mb-2 text-center">
            <label id="label_form" for="cpf" class="control-label">CPF do Participante</label>
            <input type="text" class="form-control" placeholder="000.000.000-00" data-mask='000.000.000-00' maxlength="11" name="cpf" value="{{ old('cpf') }}" required="required">
          </div>

          <div class="text-center col-12 mt-3 mb-5">
            <button type="submit" class="btn btn-default">Emitir Certificado</button>
          </div>
      </div>{{-- End Row --}}
    </div>{{-- End Form-Group --}}
  </form>
</div>
