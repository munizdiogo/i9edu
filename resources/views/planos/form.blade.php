<div class="card card-primary mt-4">
  <div class="card-header"><h3 class="card-title">Dados Básicos</h3></div>
  <div class="card-body">
    <div class="form-group">
      <label>Nome</label>
      <input type="text" name="nome" class="form-control"
             value="{{ old('nome',$planos_pagamento->nome ?? '') }}" required>
    </div>
    <div class="custom-control custom-checkbox">
      <input class="custom-control-input" type="checkbox" name="disponivel_todos_cursos" id="checkboxTodosCursos{{ $planos_pagamento->id }}" 
             {{ old('disponivel_todos_cursos',$planos_pagamento->disponivel_todos_cursos??false)?'checked':'' }}>
      <label for="checkboxTodosCursos{{ $planos_pagamento->id }}" class="custom-control-label">Disponível p/ todos os cursos</label>
    </div>
    <div class="custom-control custom-checkbox">
      <input class="custom-control-input" type="checkbox" name="permite_cupom" id="checkboxCupom{{ $planos_pagamento->id }}" 
             {{ old('permite_cupom',$planos_pagamento->permite_cupom??false)?'checked':'' }}>
      <label for="checkboxCupom{{ $planos_pagamento->id }}" class="custom-control-label">Permite cupom de desconto</label>
    </div>
  </div>
</div>
