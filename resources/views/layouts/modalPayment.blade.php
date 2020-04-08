<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-body">
      <button type="button" class="cerrar border-0" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="close">&times;</span>
      </button>

      <div class="row mt-4">
        <div class="col-6 text-subtotal pb-3">Subtotal.</div>
        <div class="col-6 text-subtotal pb-3">${{ $subtotal }}</div>
        <div class="col-6 text-subtotal pb-3">IVA.</div>
        <div class="col-6 text-subtotal pb-3">${{ $iva }}</div>
        <div class="col-6 text-subtotal pb-3">Total.</div>
        <div class="col-6 text-total pb-4">${{ $total }}</div>
        <hr class="w-100 bg-white">
        <div class="col-md-12 text-center">
          <button class="mw-100 btn_continue pt-1 pb-1 mt-1 mb-1 text-uppercase">
              Comprar
          </button>
        </div>
      </div>
    </div><!-- /.modal-body -->
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
