<?php if(!class_exists('Rain\Tpl')){exit;}?>  <div class="container-fluid py-1">
    Página/<h7 class="font-weight-bolder mb-0" style="color: aliceblue;" id="titile">Categoria</h7>
  </div>
  <div class="container-fluid py-4">
    <?php require $this->checkTemplate("alert");?>
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Filtro de Busca</h6>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="row">
                <div class="col-md-2">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Código</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Nome</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
                  <button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="button"
                    data-target="infoToast">Busca</button>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <a href="/categoria/create"><button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="button"
                      data-target="successToast">Cadastrar</button></a>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card my-4">

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">Código</th></th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
                      <tr>
                        <td>
                            <p class="text-xs font-weight-bold "><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                        </td>
                        <td class="d-flex justify-content-end">
                          <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                            data-original-title="Edit user">
                            <a href="view_create.html"><span class="badge badge-sm bg-gradient-info">Editar</span></a>
                          </a>
                          <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                            data-original-title="Edit user">
                            <a href=""><span class="badge badge-sm bg-gradient-danger">Excluir</span></a>
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
