<div class="card card-primary">
  <div class="card-header"><h3 class="card-title">Dados Básicos</h3></div>
  <div class="card-body">
    <div class="form-group">
      <label>Nome</label>
      <input type="text" name="nome" class="form-control"
             value="{{ old('nome',$planos_pagamento->nome ?? '') }}" required>
    </div>
    <div class="form-check">
      <input type="checkbox" name="disponivel_todos_cursos" class="form-check-input"
             {{ old('disponivel_todos_cursos',$planos_pagamento->disponivel_todos_cursos??false)?'checked':'' }}>
      <label class="form-check-label">Disponível p/ todos os cursos</label>
    </div>
    <div class="form-check">
      <input type="checkbox" name="permite_cupom" class="form-check-input"
             {{ old('permite_cupom',$planos_pagamento->permite_cupom??false)?'checked':'' }}>
      <label class="form-check-label">Permite cupom de desconto</label>
    </div>
  </div>
</div>
