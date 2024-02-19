
class Select extends HTMLElement {
  
    constructor() {
      super();
    }

    connectedCallback() {
    
      const label = this.getAttribute('label') || 'Default Label';
      const id_input = this.getAttribute('id-input') || 'default-id';
      const route = this.getAttribute('route') || '';
      const value = this.getAttribute('value') || '';

      changeValues(id_input,route,value);

      this.innerHTML = `
      <label>${label}</label>
      <select class="form-control" id="${id_input}">
       </select>
       `;

    }

  }

  customElements.define('select-db', Select);