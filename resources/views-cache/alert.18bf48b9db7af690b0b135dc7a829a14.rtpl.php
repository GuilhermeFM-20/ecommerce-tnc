<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $alert["msg"] != '' ){ ?>
    <div class="alert alert-<?php echo htmlspecialchars( $alert["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?> alert-dismissible text-white fade show" role="alert">
        <span class="alert-text"><?php echo htmlspecialchars( $alert["msg"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
