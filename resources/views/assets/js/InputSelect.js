class InputSelect extends HTMLElement {

    constructor() {
      super();
    }

    connectedCallback() {

      const label = this.getAttribute('label') || 'Default Label';
      const id = this.getAttribute('id') || 'default-id';
      const value = this.getAttribute('value') || '';
      const value_id = this.getAttribute('value_id') || '';
      const route = this.getAttribute('route') || '';

      this.innerHTML = `
      <label for="${id}">${label}</label>
      <input type="text" id="input_${id}" class="form-control"
      onkeydown="inputSelect('${id}','${route}',this)" placeholder="Pesquisar..."
      onblur="emptySearch(this)" value="${value}">
      <ul class="dropdown-menu hide " style="top: 90%;z-index:99999; border:3px solid #1F8EF3; border-top:1px solid #ced4da;" id="busca_${id}"></ul>
      <input type="hidden" name="${id}" id="cod_category" value="${value_id}">
            `;
    }
    
  }

  customElements.define('input-select', InputSelect);