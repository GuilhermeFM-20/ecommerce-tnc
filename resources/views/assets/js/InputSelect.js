class InputSelect extends HTMLElement {

    constructor() {
      super();
    }

    connectedCallback() {

      const label = this.getAttribute('label') || 'Default Label';
      const id_input = this.getAttribute('id-input') || 'default-id';
      const value = this.getAttribute('value') || '';
      const value_id = this.getAttribute('value-id') || '';
      const route = this.getAttribute('route') || '';

      this.innerHTML = `
      <label for="${id_input}">${label}</label>
      <input type="text" id="${id_input}" class="form-control"
      onkeydown="inputSelect('${id_input}','${route}',this)" placeholder="Pesquisar..."
      onblur="emptySearch(this)" autocomplete="off" oninput="emptyHidden(this)" name="name_${id_input}" value="${value}">
      <ul class="dropdown-menu hide " style="top: 90%;z-index:99999; border:3px solid #1F8EF3; border-top:1px solid #ced4da;" id="busca_${id_input}"></ul>
      <input type="hidden" name="${id_input}" id="cod_${id_input}" value="${value_id}">
            `;
    }
    
  }

  customElements.define('input-select', InputSelect);