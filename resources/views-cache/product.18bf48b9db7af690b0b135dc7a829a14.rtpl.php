<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid py-1">
  Página/Produto/<h7 class="font-weight-bolder mb-0" style="color: aliceblue;" id="titile">Cadastro</h7>
</div>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Filtro de Busca</h6>
          </div>
          <div class="card-body px-0 pb-2">
            <form action="<?php echo htmlspecialchars( $link, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="row">
                <div class="col-md-2">
                  <div class="input-group input-group-static mb-4">
                    <label>Código</label>
                    <input type="text" name="code" value="<?php echo htmlspecialchars( $product["code"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="input-group input-group-static mb-4">
                    <label>Nome</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars( $product["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="input-group input-group-static mb-4 pt-3">
                    <label>Cor</label>
                    <input type="color" name="color" class="form-control pt-1" value="<?php echo htmlspecialchars( $product["color"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="input-group input-group-static mb-4">
                    <label>Valor</label>
                    <input type="text" name="price" value="<?php echo htmlspecialchars( $product["price"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control money">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="input-group input-group-static mb-4">
                    <label>Quantidade</label>
                    <input type="text" name="amount" value="<?php echo htmlspecialchars( $product["amount"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control money">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="input-group input-group-static mb-2">
                    <label>Imagem</label>
                    <input type="text" name="image" value="<?php echo htmlspecialchars( $product["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="input-group input-group-static mb-3">
                      <input-select id="category" label="Categoria" class="w-100" value="<?php echo htmlspecialchars( $product["category_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value_id="<?php echo htmlspecialchars( $product["category_fk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" route="/api/load/categories"></input-select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="input-group input-group-static mb-3">
                    <!-- <select-db id="teste" label="Marca" class="w-100" route="/api/load/categories" value="<?php echo htmlspecialchars( $product["category_fk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></select-db> -->
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="input-group input-group-static mb-2">
                    <label>Largura</label>
                    <input type="text" name="width" value="<?php echo htmlspecialchars( $product["width"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control money">
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="input-group input-group-static mb-2">
                    <label>Altura</label>
                    <input type="text" name="height" value="<?php echo htmlspecialchars( $product["height"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control money">
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="input-group input-group-static mb-2">
                    <label>Peso</label>
                    <input type="text" name="weight" value="<?php echo htmlspecialchars( $product["weight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control money">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="input-group input-group-static mb-2">
                    <label>Descrição</label>
                    <textarea type="text" name="description"  class="form-control" ><?php echo htmlspecialchars( $product["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
                  <a href="/produto"><button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="button"
                      data-target="infoToast">Voltar</button></a>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <button type="submit" id="btn-submit" class="btn bg-gradient-success w-100 mb-0 toast-btn"
                    type="button" data-target="successToast">Gervar</button>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php require $this->checkTemplate("alert_float");?>