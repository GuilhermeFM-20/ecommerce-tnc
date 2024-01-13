<?php if(!class_exists('Rain\Tpl')){exit;}?><nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="<?php echo htmlspecialchars( $_SERVER["PATH_INFO"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?<?php echo htmlspecialchars( $more["1"]["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        <span class="material-icons">
          keyboard_arrow_left
        </span>
      </a>
    </li>
    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
    <?php if( isset($_GET['page']) && $_GET['page'] == $value1["page"] ){ ?>
    <li class="page-item active"><a class="page-link" href="<?php echo htmlspecialchars( $_SERVER["PATH_INFO"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
    <?php }else{ ?>
    <li class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $_SERVER["PATH_INFO"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
    <?php } ?>
    <?php } ?>
    <li class="page-item">
      <a class="page-link" href="<?php echo htmlspecialchars( $_SERVER["PATH_INFO"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?<?php echo htmlspecialchars( $more["2"]["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        <span class="material-icons">
          keyboard_arrow_right
        </span>
      </a>
    </li>
  </ul>
</nav>