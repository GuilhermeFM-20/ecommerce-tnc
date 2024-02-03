class ButtonDelete extends HTMLElement {

    constructor() {
      super();
    }

    connectedCallback() {

    const id = this.getAttribute('id') || '';
    const route = this.getAttribute('route') || '';
    const title = this.getAttribute('title') || 'Aviso!';
    const msg = this.getAttribute('msg') || 'Deseja realmente excluir esse registro?';

    this.innerHTML = `
    <a data-bs-toggle="modal" href="#exampleModal${id}" class="px-2"><span
    class="badge badge-sm bg-gradient-danger">Excluir</span></a>
    
    <div class="modal fade" id="exampleModal${id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">${title}</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ${msg}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Não</button>
                <a href="${route}" id="link_delete"><button type="button" class="btn bg-gradient-primary">Sim</button></a>
            </div>
            </div>
        </div>
    </div>`;
    }
    
  }

  customElements.define('button-delete', ButtonDelete);