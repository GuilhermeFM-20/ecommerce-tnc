<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid py-1">
  Página/<h7 class="font-weight-bolder mb-0" style="color: aliceblue;" id="titile">Produto</h7>
</div>
<div class="container-fluid py-1">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Filtro de Busca</h6>
          </div>
          <form method="post" action="/produto">
            <div class="card-body px-0 pb-2">
              <div class="row">
                <div class="col-md-2">
                  <div class="input-group input-group-static mb-4">
                    <label>Código</label>
                    <input type="text" name="id" value="<?php echo htmlspecialchars( $filter["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="input-group input-group-static mb-4">
                    <label>Nome</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars( $filter["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="input-group input-group-static mb-4">
                    <input-select id-input="category" label="Categoria" class="w-100" value="<?php echo htmlspecialchars( $filter["name_category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                      value-id="<?php echo htmlspecialchars( $filter["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" route="/api/load/categories"></input-select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="input-group input-group-static mb-3">
                    <input-select id-input="brand" label="Marca" class="w-100" value="<?php echo htmlspecialchars( $filter["name_brand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value-id="<?php echo htmlspecialchars( $filter["brand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" route="/api/load/brand"></input-select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-12 mt-sm-0 mt-2">
                  <button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="submit"
                    data-target="infoToast">Busca</button>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <a href="/produto/create"><button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="button"
                      data-target="successToast">Cadastrar</button></a>
                </div>
              </div>
            </div>
        </div>
        </form>
      </div>
      <div class="card my-4">
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Código</th>
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nome</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php $counter1=-1;  if( isset($product) && ( is_array($product) || $product instanceof Traversable ) && sizeof($product) ) foreach( $product as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                  <td>
                    <p class="text-xs font-weight-bold mb-0"><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                  </td>
                  <td class="d-flex justify-content-end">
                    <a href="/produto/update/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="px-2"><span
                        class="badge badge-sm bg-gradient-info">Editar</span></a>
                    <button-delete route="/produto/delete/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" w></button-delete>
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
<?php require $this->checkTemplate("pagination");?>