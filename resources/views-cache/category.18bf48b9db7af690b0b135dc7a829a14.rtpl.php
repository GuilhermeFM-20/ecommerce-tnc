<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid py-1">
  Página/Categoria/<h7 class="font-weight-bolder mb-0" style="color: aliceblue;" id="titile">Cadastro</h7>
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
                <div class="col-md-4">
                  <div class="input-group input-group-static mb-4">
                    <label>Nome</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars( $category["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
                    <a href="/categoria"><button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="button"
                        data-target="infoToast">Voltar</button></a>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-12">
                    <button type="submit" id="btn-submit" class="btn bg-gradient-success w-100 mb-0 toast-btn" type="button"
                      data-target="successToast">Gervar</button>
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
