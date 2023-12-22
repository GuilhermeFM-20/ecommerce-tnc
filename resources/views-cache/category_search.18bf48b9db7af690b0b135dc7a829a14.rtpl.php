<?php if(!class_exists('Rain\Tpl')){exit;}?>  <div class="container-fluid py-1">
    Página/<h7 class="font-weight-bolder mb-0" style="color: aliceblue;" id="titile">Categoria</h7>
  </div>
  <div class="container-fluid py-1">
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
                    <?php $counter1=-1;  if( isset($category) && ( is_array($category) || $category instanceof Traversable ) && sizeof($category) ) foreach( $category as $key1 => $value1 ){ $counter1++; ?>
                      <tr>
                        <td>
                            <p class="text-xs font-weight-bold "><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="/categoria/update/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span class="badge badge-sm bg-gradient-info">Editar</span></a>          
                            <a data-bs-toggle="modal" href="#exampleModal"><span class="badge badge-sm bg-gradient-danger">Excluir</span></a>
                        </td>
                      </tr>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Aviso!</h5>
                              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Deseja realmente excluir esse registro?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Não</button>
                              <a href="/categoria/delete/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button type="button" class="btn bg-gradient-primary">Sim</button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>

    </script>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="javascript:;" tabindex="-1">
            <span class="material-icons">
              keyboard_arrow_left
            </span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
          <?php if( isset($_GET['page']) && $_GET['page'] == $value1["page"] ){ ?>
            <li class="page-item active"><a class="page-link" href="/categoria?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
          <?php }else{ ?>              
            <li class="page-item"><a class="page-link" href="/categoria?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
          <?php } ?>
        <?php } ?>
        <li class="page-item">
          <a class="page-link" href="javascript:;">
            <span class="material-icons">
              keyboard_arrow_right
            </span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
    <?php require $this->checkTemplate("alert_float");?>

  