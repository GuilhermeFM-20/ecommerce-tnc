<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $alert["msg"] != '' ){ ?>
    <div class="position-fixed top-1 end-1 z-index-2">
        <div class="toast fade p-2 mt-2 bg-gradient-<?php echo htmlspecialchars( $alert["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?> show" role="alert" aria-live="assertive" id="<?php echo htmlspecialchars( $alert["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>infoToast"
            aria-atomic="true">
            <div class="toast-header bg-transparent border-0">
                <i class="material-icons text-white me-2">
                    notifications
                </i>
                <span class="me-auto text-white font-weight-bold">Aviso do Sistema </span>
                <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"
                    aria-hidden="true"></i>
            </div>
            <hr class="horizontal light m-0">
            <div class="toast-body text-white">
                <?php echo htmlspecialchars( $alert["msg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </div>
        </div>
    </div>
<?php } ?>
